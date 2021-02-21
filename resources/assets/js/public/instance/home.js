import SpecialOffers from '../components/Product/SpecialOffers'
import ReviewList from '../components/Product/Reviews/List'
import PartnersList from '../components/Pages/Home/Partners'

export default {
    components: {
        SpecialOffers,
        ReviewList,
        PartnersList
    },
    data: function() {
        return {
            data: this.$store.state.data.content.body,
            params: this.$store.state.data.params,
            catalogCount: -1,
            progressSlide: {
                step: 100,
                pause: false
            },
            selected: {
                slide: 0
            }
        }
    },
    mounted: function() {
        this.slideAuto();
    },
    watch: {
        'selected.slide': function () {
            this.slideAuto();
        },
        'progressSlide.pause': function() {
            this.progressSlide.step = 0.1;

            if (!this.progressSlide.pause) {
                setTimeout(this.slideAuto, 100);
            }
        },
        'progressSlide.step': function () {
            if (!this.progressSlide.step && !this.progressSlide.pause) {
                setTimeout(() => {
                    this.progressSlide.step = 100;
                }, 100)
            }
        },
        filters: function () {
            this.updateFilter();
        }
    },
    computed: {
        slide: function() {
            return this.data.local.slider[ this.selected.slide ];
        },
        getSlide: function () {
            return this.slide.content;
        },
        slideType: function () {
            return {
                type: this.slide.type,
                cls: this.slide.type === 'content' ? 'slider-block__text-img slider-block__text-img--align-'+ this.slide.align : 'slider-block__img-full'
            }
        },
        checkBtn: function () {
            return this.getSlide.btn.name && this.getSlide.btn.link && this.getSlide.btn.target
        },
        filters: function () {
            let data = [];

            this.params.filters.forEach(filter => {
                if (filter.selected) {
                    data.push(filter.group.slug +'_'+ filter.selected);
                }
            });

            return data.length ? this._locale('/catalog/'+ this.params.catalog +'/group/'+ data.join('/')) : '';
        },
        reviews: function () {
            return this.data.base.reviews;
        },
        partners: function () {
            return this.data.base.partners;
        }
    },
    methods: {
        goToCatalog: function() {
            window.location = this.filters;
        },
        updateFilter: function () {
            let href = this.filters,
                get = '?is-async=true';

            if ( href ) {
                this.$root.loading = true;

                axios.get(href + get)
                .then(response => {
                    const data = response.data;

                    this.catalogCount = data.list.total
                })
                .catch(error => {
                    if (error.response && error.response.status === 404) {
                        this.catalogCount = 0;
                    }else{
                        this.$notify({
                            group: 'foo',
                            type: 'error',
                            title: this.__('Произошла ошибка'),
                            text: this.__('Не удалось обработать запрос, пожалуйста обновите страницу и попробуйте еще раз')
                        });
                    }
                })
                .finally(() => {
                    this.$root.loading = false;
                })
            }else{
                this.catalogCount = -1;
            }
        },
        slideAuto: function() {
            this.progressSlide.step = 0;

            clearTimeout( window._debounce );
            window._debounce = setTimeout(() => {
                if ( !this.progressSlide.pause ) {
                    this.slideMove(1);
                }
            }, 7000)
        },
        slideMove: function (step) {
            let index = this.selected.slide + step,
                max = this.data.local.slider.length - 1;

            if (index < 0) {
                index = max
            }else if (index > max) {
                index = 0;
            }

            this.selected.slide = index;
        }
    }
};
