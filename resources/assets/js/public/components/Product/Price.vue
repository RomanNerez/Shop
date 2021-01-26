<template>
    <div class="card__price">
        <div class="price-colum">
            <span class="price-title">{{ __('Цена за') }} 1 {{ __('шт.') }}</span>
            <span class="price-number">{{ price.value.view }}<b>{{ price.currency.content.abbrev }}</b></span>
        </div>

        <div class="price-colum"
            v-for="item in bulk"
        >
            <span class="price-title">{{ __('Цена от') }} {{ item.count | numFormat(0, '.', ' ') }} {{ __('шт.') }}</span>
            <span class="price-number">{{ item.price | numFormat(2, '.', ' ') }}<b>{{ price.currency.content.abbrev }}</b></span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        computed: {
            price: function () {
                return this.data;
            },
            bulk: function () {
                let value = this.price.value.origin;

                return this.price.bulk.map(item => {
                    item.price = Math.round((value - (value * (item.sale / 100))) * 100) / 100;
                    return item;
                })
            }
        },
    }
</script>
