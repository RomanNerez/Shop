<template>
    <section class="basket container">
        <div class="basket__wrap"
            v-if="items.length"
        >
            <div class="basket__block"
                 v-for="(item, index) in items"
                 :key="item.slug"
            >
                <button type="button" class="basket__block-close"
                    v-on:click="remove(item.id, index)"
                >
                    <svg x="0px" y="0px" height="100%" width="100%" viewBox="0 0 298.667 298.667">
                        <polygon points="298.667,30.187 268.48,0 149.333,119.147 30.187,0 0,30.187 119.147,149.333 0,268.48 30.187,298.667 149.333,179.52 268.48,298.667 298.667,268.48 179.52,149.333 "/>
                    </svg>
                </button>

                <a href="#" class="basket__block-img">
                    <img :src="item.image" alt="" />
                </a>

                <div class="basket__block-text">
                    <a :href="item.url" class="title">{{ item.title }}</a>
                    <span class="subtitle"
                          :class="{'is-active': item.price.data.bulk.length && item.quantity < item.price.data.bulk[0].count}"
                    >
                        {{ __('Цена за') }} 1 {{ __('шт.') }} - <b>{{ item.price.value.view }} {{ item.price.data.currency.content.abbrev }}</b>
                    </span>
                    <template v-if="item.price.data.bulk.length">
                        <span class="subtitle"
                              v-for="(bulk, i) in item.price.data.bulk"
                              :class="{'is-active': checkActiveBulk(item.quantity, item.price.data.bulk, i)}"
                        >
                            {{ __('Цена от') }} {{ bulk.count | numFormat(0, '.', ' ') }} {{ __('шт.') }} - <b>{{ bulk.price | numFormat(2, '.', ' ') }} {{ item.price.data.currency.content.abbrev }}</b>
                        </span>
                    </template>
                </div>

                <div class="quantity">
                    <div class="quantity__box">
                        <button type="button" class="quantity__btn"
                                :disabled="item.quantity <= item.draw"
                                v-on:click="changeQuantity(index, -1)"
                        >-</button>
                        <input type="number" class="quantity__input"
                               :disabled="!item.count.origin || (item.count.origin < item.draw && item.count.origin >= 0)"
                               v-model.number="item.quantity"
                               v-on:input="quantity(index)"
                        >
                        <button type="button" class="quantity__btn"
                                :disabled="item.quantity >= item.count.origin && item.count.origin >= 0"
                                v-on:click="changeQuantity(index, 1)"
                        >+</button>
                    </div>
                    <template v-if="item.count.origin >= 0">
                        <span class="quantity__text">{{ __('В наличии') }}: {{ item.count.view }} {{ __('шт.') }}</span>
                    </template>
                    <template v-if="item.draw > 1">
                        <span class="quantity__text">{{ __('Мин. кол-во') }}: {{ item.draw | numFormat(0, '.', ' ') }} {{ __('шт.') }}</span>
                    </template>
                </div>

                <span class="basket__block-price">{{ getPrice(item) | numFormat(2, '.', ' ') }} <b>{{ item.price.data.currency.content.abbrev }}</b></span>
            </div>

            <div class="basket__price">
                <div class="basket__price-row">
                    <div class="basket__price-box">
                        <span class="title">{{ __('Стоимость заказа') }}:</span>
                        <span class="price">{{ getAmount | numFormat(2, '.', ' ') }}<b>{{ items[0].price.data.currency.content.abbrev }}</b></span>
                    </div>

                    <!--<div class="basket__price-box">
                        <span class="title">Вес заказа:</span>
                        <span class="price">12<b>кг</b></span>
                    </div>-->

                    <button type="button" class="btn big"
                        :disabled="checkCount || checkAmount"
                    >
                        <span class="btn__titlte">{{ __('оформить заказ') }}</span>
                    </button>
                </div>

                <div class="basket__price-row bottom">
                    <span class="title"
                          :class="{'invalid-amount': checkAmount}"
                    >
                        {{ __('Минимальная сумма заказа') }} {{ data.option.min_price | numFormat(2, '.', ' ') }} {{ items[0].price.data.currency.content.abbrev }}
                    </span>
                    <a :href="data.option.prev_page" class="btn-text">{{ __('Продолжить покупки') }}</a>
                </div>
            </div>
        </div>

        <div class="basket__empty"
            v-else
        >
            <img class="basket__empty-img" :src="_asset('library/img/basket__empty.svg')" alt="" />
            <span class="basket__empty-title">{{ __('Ваша корзина пуста') }}</span>
            <button type="button" class="btn big"
                v-on:click="prevPage"
            >
                <span class="btn__titlte">{{ __('Вернуться к покупкам') }}</span>
            </button>
        </div>
    </section>
</template>

<script>
    export default {
        computed: {
            data: function() {
                return this.$store.state.data;
            },
            items: function() {
                return this.data.items
            },
            getAmount: function () {
                let amount = this.items.reduce((result, current) => result + current.amount, 0);
                return Math.round(amount * 100) / 100;
            },
            checkCount: function () {
                return this.items.some(item => !item.count.origin || item.quantity < item.draw || (item.count.origin < item.draw && item.count.origin >= 0) || (item.quantity > item.count.origin && item.count.origin >= 0));
            },
            checkAmount: function () {
                return this.data.option.min_price > this.getAmount;
            }
        },
        methods: {
            changeQuantity: function(index, step) {
                this.items[index].quantity += step;
                this.quantity(index);
            },
            quantity: function (index) {
                let item = this.items[index];

                clearTimeout(window._bounce);
                window._bounce = setTimeout(() => {
                    if ( item.quantity > item.count.origin && item.count.origin >= 0 ) {
                        item.quantity = item.count.origin;
                    }else if (item.quantity < item.draw && item.count.origin){
                        item.quantity = (item.count.origin >= item.draw || item.count.origin < 0) ? item.draw : item.count.origin;
                    }
                    this.update(index);
                }, 1000)
            },
            getPrice: function (item) {
                let price = item.price.value.origin,
                    bulk  = item.price.data.bulk;

                for (let i = 0; i < bulk.length; ++i) {
                    let next = i + 1;

                    if (bulk[i].count <= item.quantity && (next === bulk.length || item.quantity < bulk[next].count)) {
                        price = bulk[i].price;
                        break;
                    }
                }

                this.$set(item, 'amount', (price * item.quantity));

                return Math.round(item.amount * 100) / 100;
            },
            prevPage: function () {
                window.location = this.data.option.prev_page;
            },
            checkActiveBulk: function(quantity, bulk, index) {
                let item = bulk[index],
                    next = bulk[index + 1];

                return bulk.length && quantity >= item.count && ((next && quantity < next.count) || !next);
            },
            update: function (index) {
                let item = this.items[index],
                    input = {
                        index: index,
                        count: item.quantity
                    };

                this.$store.commit('countCart', input);

                axios.post(window.location.origin +'/cart/update', {
                    data: input
                })
                .catch(() => {
                    this.$notify({
                        group: 'foo',
                        type: 'error',
                        title: this.__('Не удалось обновить корзину'),
                        text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                    });
                })
            },
            remove: function (id, index) {
                this.$store.commit('removeCart', index);
                axios.post(window.location.origin +'/cart/remove', {
                    data: id
                })
                .catch(() => {
                    this.$notify({
                        group: 'foo',
                        type: 'error',
                        title: this.__('Не удалось обновить корзину'),
                        text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                    });
                })
            }
        }
    }
</script>
