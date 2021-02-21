<template>
    <section class="favorites container">
        <template v-if="items.length">
            <h1 class="title--big">{{ __('Избранное') }}</h1>

            <div class="favorites__top">
                <div class="favorites__info-price">
                    <div class="info-price__box">
                        <span class="info-price__total-goods">{{ amount.count | numFormat(0, '.', ' ') }} {{ __( declOfNum(amount.count, ['товар', 'товара', 'товаров']) ) }} {{ __('на сумму') }}</span>
                        <span class="info-price__total-price">{{ amount.sum | numFormat(2, '.', ' ') }} <b>{{ currency.content.abbrev }}</b></span>
                    </div>
                    <button type="button" class="btn big"
                            :disabled="!availableProduct.length || pending"
                            v-on:click="toCart"
                    >
                        <span class="btn__titlte">{{ __(pending ? 'Обработка...' : 'В корзину') }}</span>
                    </button>
                </div>

                <!--<div class="select small">
                    <input type="text" placeholder="От дешевых к дорогим" class="select__input">
                    <img src="library/img/select-arrow.svg" alt="" class="select__img">
                </div>-->
            </div>

            <div class="favorites__cont">
                <product-card
                    v-for="(item, index) in items"
                    :key="item.id"
                    :data="item"
                >
                    <template v-slot:removeFavorites>
                        <a href="#" class="block-four__btn"
                           v-on:click.prevent="remove(index, item.id)"
                        >
                            <span class="block-four__close">
                                <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L4.5 4.5M8 8L4.5 4.5M4.5 4.5L8 1M4.5 4.5L1 8"/>
                                </svg>
                            </span>
                        </a>
                    </template>
                </product-card>
            </div>
        </template>
        <template v-else>
            <div class="basket__empty">
                <svg viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 26L11 20.1667L1 26V1H21V26Z" stroke="#0A7CCD" stroke-width="2" stroke-miterlimit="10"></path></svg>
                <span class="basket__empty-title">{{ __('У вас нет избранных товаров') }}</span>
                <button type="button" class="btn big"
                        v-on:click="prevPage"
                >
                    <span class="btn__titlte">{{ __('Вернуться к покупкам') }}</span>
                </button>
            </div>
        </template>
    </section>
</template>

<script>
    export default {
        data: function() {
            return {
                pending: false
            }
        },
        computed: {
            data: function() {
                return this.$store.state.data;
            },
            items: function() {
                return this.data.items
            },
            currency: function() {
                return this.items[0].price.currency
            },
            amount: function() {
                let data = this.items;

                return {
                    count: data.length,
                    sum: data.reduce((result, current) => result + current.price.base.origin, 0)
                }
            },
            availableProduct: function () {
                return this.items.filter(item => {
                    return !item.cart_check && item.related_to === 'store';
                });
            }
        },
        methods: {
            prevPage: function () {
                window.location = this.data.option.prev_page;
            },
            remove: function (index, id) {
                this.$store.commit('removeFavorites', index);
                axios.post(window.location.origin +'/favorites/remove', {
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
            toCart: function () {
                let data = this.availableProduct.map(item => {
                        return {
                            id: item.id,
                            attr: [],
                            count: item.draw
                        }
                    });

                this.pending = true;

                axios.post(window.location.origin + '/cart/bulk_add', {
                    data: data
                })
                .then(() => {
                    this.$store.commit('bulkAddCart', data);
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
                    this.pending = false;
                })
            }
        }
    }
</script>
