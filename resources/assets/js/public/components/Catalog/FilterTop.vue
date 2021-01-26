<template>
    <div class="catalog__top"
         :class="{active: $root.checkOverlay(0)}"
    >
        <span class="catalog__title">{{ __('Найдено') }} <b>{{ counter }}</b> {{ __( declOfNum(counter, ['товар', 'товара', 'товаров']) ) }}</span>

        <button type="button" class="btn-filt"
                v-on:click="$root.setOverlay(0)"
        >
            <span class="btn-border__title">{{ __('Фильтр') }}</span>
        </button>

        <button type="button" class="btn-border red" v-if="data.length"
                v-on:click="removeFilter(0)"
        >
            <span class="btn-border__title">{{ __('Сбросить') }}</span>
        </button>

        <div class="catalog-filter__output">
            <button type="button" class="btn-border gray"
                    v-for="item in data"
                    v-on:click="removeFilter(item.id)"
                    :key="item.id"
            >
                <span class="btn-border__title">{{ item.name }}</span>
                <svg class="btn-border__svg" width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.48528 1L5.24264 5.24264M5.24264 5.24264L1 1M5.24264 5.24264L1.00007 9.48528M5.24264 5.24264L9.48535 9.48528" stroke="#F65353" stroke-width="2"/>
                </svg>
            </button>
        </div>

        <select-item
            type="small"
            :placeholder="__('Сортировать:')"
            :items="sort.items"
            v-model="sort.value"
        ></select-item>
    </div>
</template>

<script>
    export default {
        props: ['data', 'selected', 'counter', 'sortable'],
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
        },
        methods: {
            removeFilter: function (id) {
                let selected = [];
                if (id) {
                    selected = this.selected;
                    selected.splice(selected.indexOf(id), 1);
                }
                this.$store.commit('removeFilter', selected);
            }
        }
    }
</script>
