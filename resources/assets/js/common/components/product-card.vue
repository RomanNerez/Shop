<template>
    <a :href="item.url" class="block-four product"
         :class="{'block-four--not-bulk': !item.price.bulk.length || !item.count.base}"
    >
        <slot name="removeFavorites"></slot>

        <div class="block-four__img product__img">
            <div class="block-four__group product__buttons">
                <button type="button" class="block-four__сompare product__compare"
                        :class="{'is-compare': item.compare_check}"
                        :disabled="item.compare_pending"
                        v-on:click="addToCompare"
                >
                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.3333 12V1H15.4667V12M9.06667 12V6H11.2V12M4.8 12V4H6.93333V12M0.533333 12V9H2.66667V12M16 12H0" stroke-miterlimit="10"></path>
                    </svg>
                    <span class="block-four__сompare-title">{{ __( getCompareBtn ) }}</span>
                </button>

                <button type="button" class="block-four__сompare product__compare"
                        :class="{'is-favorites': item.favorites_check}"
                        :disabled="item.favorites_pending"
                        v-on:click="addToFavorites"
                >
                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 13L6 10.2L1 13V1H11V13Z" stroke-miterlimit="10"></path>
                    </svg>
                    <span class="block-four__сompare-title">{{ __( getFavoritesBtn ) }}</span>
                </button>
            </div>

            <a class="block-four__links"
               :href="item.url"
            >
                <template v-if="item.sale">
                    <span class="block-four__status">{{ __('Акция') }}</span>
                </template>
                <template v-else-if="item.hit">
                    <span class="block-four__status block-four__status--top">{{ __('Топ продаж') }}</span>
                </template>
                <template v-else-if="item.new">
                    <span class="block-four__status">{{ __('Новинка') }}</span>
                </template>

                <img class="img-one" :src="item.images[0].source" alt="" />

                <template v-if="!!item.images[1]">
                    <img class="img-two" :src="item.images[1].source" alt="" />
                </template>
            </a>
        </div>

        <div class="block-four__text product__description">
            <a class="block-four__descript product__name"
            >{{ item.content.title }}</a>
            <span class="block-four__line"></span>

            <div class="block-four__show-box" v-show="item.count.base">
                <div class="block-four__price"
                     v-for="price in bulkPrice"
                >
                    <p>{{ __('Цена за') }} {{ price.count }} {{ __('шт.') }}</p>
                    <span>{{ price.sale.view }} <b>{{ item.price.currency.content.abbrev }}</b></span>
                </div>
            </div>
            <div class="block-four__text-bottom product__price">
                <div class="block-four__price">
                    <p>{{ __('Цена за') }} 1 {{ __('шт.') }}</p>
                    <span>{{ item.price.base.view }} <b>{{ item.price.currency.content.abbrev }}</b></span>
                </div>
                <template v-if="item.related_to === 'services'">
                    <div class="block-four__draw">
                        <p>{{ __('Тираж от') }}</p>
                        <span><b>{{ item.draw | numFormat(0, '.', ' ') }} <small>{{ __('шт.') }}</small></b></span>
                    </div>
                </template>
                <template v-else>
                    <button class="btn-border red text-upper product__btn"
                            :disabled="!item.count.base || item.cart_pending"
                            :class="{'is-cart': item.cart_check}"
                            v-on:click="addToCart"
                    >
                        <span class="btn-border__title">{{ __( getCartBtn ) }}</span>
                    </button>
                </template>
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        props: ['data'],
        computed: {
            item: function () {
                return this.data
            },
            bulkPrice: function () {
                return this.item.price.bulk.slice(0, 2);
            },
            getFavoritesBtn: function () {
                let item = this.item,
                    favorites = this.$root.favorites,
                    check = !!(favorites.count && favorites.items.some(that => that === item.id));

                this.$set(item, 'favorites_check', check);

                if ( check ) {
                    return 'В закладках'
                }else{
                    return item.favorites_pending ? 'обработка...' : 'В закладки'
                }
            },
            getCompareBtn: function () {
                let item = this.item,
                    compare = this.$root.compare,
                    check = !!(compare.count && compare.items.some(that => that === item.id));

                this.$set(item, 'compare_check', check);

                if ( check ) {
                    return 'Добавлено'
                }else{
                    return item.compare_pending ? 'обработка...' : 'Сравнить'
                }
            },
            getCartBtn: function () {
                let item = this.item,
                    cart = this.$root.cart,
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
            }
        },
        methods: {
            addToCart: function () {
                this.requestProduct(this.item, {
                    pending: 'cart_pending',
                    commit: 'addCart',
                    path: '/cart/add',
                    input: {
                        id: this.item.id,
                        attr: this.item.count.attr ? this.item.count.attr : [],
                        count: this.item.draw
                    }
                });
            },
            addToFavorites: function () {
                this.requestProduct(this.item, {
                    pending: 'favorites_pending',
                    commit: 'addFavorites',
                    path: '/favorites/add',
                    input: this.item.id
                });
            },
            addToCompare: function () {
                this.requestProduct(this.item, {
                    pending: 'compare_pending',
                    commit: 'addCompare',
                    path: '/compare/add',
                    input: this.item.id
                });
            }
        }
    }
</script>
