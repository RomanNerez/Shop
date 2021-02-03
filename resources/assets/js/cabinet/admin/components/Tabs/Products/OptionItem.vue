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

            <v-col class="pb-0">
                <v-card-title class="pa-0 pb-6">Минимальное кол-во для заказа:</v-card-title>

                <validation-observer
                    ref="observer"
                >
                    <validation-provider
                        v-slot="{ errors }"
                        name="Минимальное количество"
                        :rules="{
                            required: !!value.status,
                            min_value: 1
                        }"
                    >
                        <v-text-field
                            v-model.trim="value.draw"
                            :error-messages="errors"
                            type="number"
                            color="green"
                            outlined
                        ></v-text-field>
                    </validation-provider>
                </validation-observer>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import ChoseProduct from '../../ChoseProduct.vue';
    import { required, min_value } from 'vee-validate/dist/rules'
    import { extend, ValidationObserver, ValidationProvider } from 'vee-validate'

    extend('required', {
        ...required,
        message: 'Поле "{_field_}" должно быть заполнено',
    })

    extend('min_value', {
        ...min_value,
        message: 'Значение должно быть больше ноля',
    })

    export default {
        name: "OptionItem",
        props: ['value', 'local', 'status', 'langs', 'select', 'tabSelect', 'other', 'index'],
        components: {
            ChoseProduct,
            ValidationProvider,
            ValidationObserver,
        },
        methods: {
            validate: function () {
                if ( this.value.status && !this.value.draw ) {
                    return {
                        result: false,
                        index: this.index,
                        alert: 'Задайте минимальное количество'
                    };
                }
                return {
                    result: true,
                    index: this.index
                };
            }
        },
    }
</script>
