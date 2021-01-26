<template>
    <div class="search-results__top">
        <span class="search-results__title">{{ __('По вашему запросу  найдено') }} <b>{{ counter }}</b> {{ __( declOfNum(counter, ['товар', 'товара', 'товаров']) ) }}</span>

        <select-item type="small"
            v-if="counter"
            :placeholder="__('Сортировать:')"
            :items="sort.items"
            v-model="sort.value"
        ></select-item>
    </div>
</template>

<script>
    export default {
        props: ['counter', 'sortable'],
        data: function() {
            return {
                sort: {
                    value: null,
                    items: [{
                        value: 0,
                        name: 'По умолчанию'
                    },{
                        value: 1,
                        name: 'От дешевых к дорогим'
                    },{
                        value: 2,
                        name: 'От дорогих к дешевым'
                    }]
                }
            }
        },
        watch: {
            'sort.value': function () {
                this.$emit('update:sortable', this.sort.value);
            }
        }
    }
</script>
