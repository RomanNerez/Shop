import Gallery from '../components/Product/Gallery.vue'
import Price from '../components/Product/Price.vue'
import Params from '../components/Product/Params.vue'
import Attr from '../components/Product/Attr.vue'
import ReviewForm from '../components/Product/Reviews/Form.vue'
import ReviewList from '../components/Product/Reviews/List.vue'
import Related from '../components/Product/Related.vue'

export default {
    data: function() {
        return {
            quantity: 0,
            phone: {
                input: null,
                value: null,
                valid: false,
                invalid: null,
                pending: false
            },
            show: {
                review: false
            }
        }
    },
    mounted: function() {
        if ( this.count.origin ) {
            this.quantity = 1
        }
    },
    components: {
        'gallery-item': Gallery,
        'price-item': Price,
        'params-item': Params,
        'attr-item': Attr,
        'review-form': ReviewForm,
        'review-list': ReviewList,
        'related-item': Related
    },
    watch: {
        'count.origin': function() {
            if ( this.quantity > this.count.origin && this.count.origin ) {
                this.quantity = this.count.origin;
            }
        },
        quantity: function () {
            clearTimeout(window._bounce);
            window._bounce = setTimeout(() => {
                if ( this.quantity > this.count.origin ) {
                    this.quantity = this.count.origin;
                }else if (this.quantity < 1 && this.count.origin){
                    this.quantity = 1;
                }
            }, 1000)
        },
        attr: function () {
            let data = [],
                path = window.location.href.split('/option')[0];

            this.data.attr.forEach(item => {
                let subs = item.subs.find(sub => sub.id === item.selected);
                data.push(item.group.slug +'_'+ subs.slug);
            })

            if ( data.length ) {
                path += '/option/' + data.join('/');
            }

            if ( this.count.origin ) {
                this.quantity = 1
            }

            window.history.replaceState(null, null, path);
        }
    },
    computed: {
        data: function() {
            return this.$store.state.data.product;
        },
        status: function() {
            return {
                hit: this.data.hit,
                new: this.data.new
            }
        },
        reviews: function() {
            return this.$store.state.data.reviews;
        },
        attr: function() {
            return this.data.attr.map(item => {
                return item.selected;
            });
        },
        count: function() {
            return this.findAttr(this.data.count);
        },
        price: function () {
            let data = this.data.price;

            return {
                bulk: data.bulk,
                currency: data.currency,
                value: this.findAttr(data)
            }
        },
        images: function () {
            return this.findAttr(this.data.images);
        },
        desc: function () {
            return this.findAttr(this.data.desc);
        },
        params: function() {
            return this.findAttr(this.data.params);
        },
        checkCart: function() {
            let cart = this.$root.cart;
            return !!(cart.count && cart.items.some(item => {
                return item.id === this.data.id && JSON.stringify(item.attr) === JSON.stringify(this.attr);
            }));
        },
        cartBtn: function () {
            if ( this.checkCart ) {
                return 'в корзине'
            }else{
                return this.data.cart_pending ? 'обработка...' : 'заказать'
            }
        },
        favoritesBtn: function () {
            let favorites = this.$root.favorites,
                check = !!(favorites.count && favorites.items.some(that => that === this.data.id));

            this.$set(this.data, 'favorites_check', check);

            if ( check ) {
                return 'В закладках'
            }else{
                return this.data.favorites_pending ? 'обработка...' : 'В закладки'
            }
        },
        compareBtn: function () {
            let compare = this.$root.compare,
                check = !!(compare.count && compare.items.some(that => that === this.data.id));

            this.$set(this.data, 'compare_check', check);

            if ( check ) {
                return 'Добавлено'
            }else{
                return this.data.compare_pending ? 'обработка...' : 'Сравнить'
            }
        }
    },
    methods: {
        findAttr: function (data) {
            if ( this.attr.length && data.attrs.length ) {
                let find = data.attrs.find(item => {
                    let check = item.keys.filter(key => {
                        return this.attr.indexOf(key) !== -1;
                    });

                    return check.length === item.keys.length;
                });

                if (find && find.value) {
                    return find.value
                }else{
                    return data.base
                }
            }else{
                return data.base
            }
        },
        addToCart: function () {
            this.requestProduct(this.data, {
                pending: 'cart_pending',
                commit: 'addCart',
                path: '/cart/add',
                input: {
                    id: this.data.id,
                    attr: this.attr,
                    count: this.quantity
                }
            });
        },
        addToFavorites: function () {
            this.requestProduct(this.data, {
                pending: 'favorites_pending',
                commit: 'addFavorites',
                path: '/favorites/add',
                input: this.data.id
            });
        },
        addToCompare: function () {
            this.requestProduct(this.data, {
                pending: 'compare_pending',
                commit: 'addCompare',
                path: '/compare/add',
                input: this.data.id
            });
        },
        validateNumber: function (data) {
            this.phone.valid = data.valid;
            this.phone.value = data.number.international;
        },
        fastOrder: function () {
            if ( !this.phone.valid ) {
                this.phone.invalid = 'Номер телефона указан некорректно';
            }else{
                this.phone.invalid = null;
                this.phone.pending = true;

                axios.post(window.location.origin +'/product/'+ this.data.id +'/fast_order', {
                    data: {
                        phone: this.phone.value,
                        product: {
                            name: this.data.title,
                            quantity: this.quantity
                        }
                    }
                })
                .then(response => {
                    axios.get(response.data)
                    .then(() => {
                        this.$root.setOverlay(4);
                        this.phone.value = '';
                        this.phone.input = '';
                    })
                    .catch(() => {
                        this.$notify({
                            group: 'foo',
                            type: 'error',
                            title: this.__('Произошла ошибка'),
                            text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                        });
                    })
                    .finally(() => {
                        this.phone.pending = false;
                    })
                })
                .catch(() => {
                    this.phone.pending = false;
                    this.$notify({
                        group: 'foo',
                        type: 'error',
                        title: this.__('Произошла ошибка'),
                        text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                    });
                })
            }
        }
    }
};
