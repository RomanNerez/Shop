<template>
    <v-container class="pt-0">
        <v-row>
            <v-col class="py-0">
                <chose-product
                    :chose.sync="value.related"
                    :hide="false"
                    placeholder="Рекомендуемые товары"
                ></chose-product>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="pb-0">
                <v-card-title class="pa-0">Особые обозначения:</v-card-title>
                <v-checkbox
                    v-model="value.hit"
                    color="success"
                    label="Хит продаж"
                    hide-details
                ></v-checkbox>
                <v-checkbox
                    v-model="value.new"
                    color="success"
                    label="Новинка"
                    hide-details
                ></v-checkbox>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import ChoseProduct from '../../ChoseProduct.vue';

    export default {
        name: "OptionItem",
        props: ['value', 'local', 'status', 'langs', 'select', 'tabSelect', 'other', 'index'],
        components: {
            'chose-product': ChoseProduct
        },
        methods: {
            validate: function () {
                return {
                    result: true,
                    index: this.index
                };
            }
        },
    }
</script>
