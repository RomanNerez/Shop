export default {
    data: function() {
        return {
            query: 'all',
            sort: null,
            width: {
                wrap: 0,
                track: 0
            }
        }
    },
    mounted: function() {
        if (this.items && this.items.length) {
            this.sort = this.items[0].categories_id;
            this.handleResize();
            window.addEventListener('resize', this.handleResize);
        }
    },
    computed: {
        data: function() {
            return this.$store.state.data;
        },
        items: function() {
            return this.data.items
        },
        list: function() {
            return this.items.filter(item => item.categories_id === this.sort)
        },
        categories: function() {
            let data = {};

            this.items.forEach(item => {
                if ( !data[item.categories_id] ) {
                    data[item.categories_id] = {
                        value: item.categories_id,
                        name: item.cat.content.title
                    }
                }
            })

            return Object.values(data);
        },
        params: function () {
            let data = {},
                diff = {};

            this.list.forEach(item => {
                item.content.params.forEach(params => {
                    params.items.forEach(param => {
                        if (!data[param.name]) {
                            data[param.name] = {};
                        }
                        data[param.name][item.id] = param.value;
                    })
                })
            })

            for (let key in data) {
                let items = Object.values(data[key]),
                    check = {
                        first: items[0],
                        count: items.length > 1 ? 0 : 1
                    };

                items.forEach(item => {
                    if (item !== check.first) {
                        ++check.count;
                    }
                })

                if (check.count) {
                    diff[key] = data[key];
                }
            }

            return {
                all: data,
                diff: Object.keys(diff).length ? diff : null
            };
        },
        paramsSelected: function () {
            if (!this.params.diff) {
                this.query = 'all';
            }
            if (!this.list.length) {
                this.sort = this.items[0].categories_id;
            }
            return this.params[this.query];
        },
        widthTrack: function () {
            return Math.round( this.width.wrap - this.width.col ) +'px';
        }
    },
    methods: {
        prevPage: function () {
            window.location = this.data.option.prev_page;
        },
        handleResize: function () {
            this.width.wrap = this.$refs['wrap'].getBoundingClientRect().width;
            this.width.col = window.innerWidth > 991 ? this.$refs['col'].getBoundingClientRect().width : 0;
        },
        remove: function (index, id) {
            this.$store.commit('removeCompare', index);
            axios.post(window.location.origin +'/compare/remove', {
                data: id
            })
            .catch(() => {
                this.$notify({
                    group: 'foo',
                    type: 'error',
                    title: this.__('Не удалось обновить список избранных товаров'),
                    text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                });
            })
        },
        getCartBtn: function (item) {
            let cart = this.$root.cart,
                check = !!(cart.count && cart.items.some(that => that.id === item.id));

            this.$set(item, 'cart_check', check);

            if ( check ) {
                return 'в корзине'
            }else{
                if ( item.count.base ) {
                    return item.cart_pending ? 'обработка...' : 'В корзину'
                }else{
                    return 'Нет в наличии'
                }
            }
        },
        addToCart: function (item) {
            this.requestProduct(item, {
                pending: 'cart_pending',
                commit: 'addCart',
                path: '/cart/add',
                input: {
                    id: item.id,
                    attr: item.count.attr ? item.count.attr : [],
                    count: item.draw
                }
            });
        },
    }
};
