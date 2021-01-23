<template>
    <v-container class="pt-0">
        <validation-observer
            ref="observer"
        >
            <v-row>
                <v-col class="pt-0"
                       cols="12"
                       sm="4"
                >
                    <validation-provider
                        v-slot="{ errors }"
                        name="Валюта"
                        :rules="{
                            required: !!value.status && !variables.check.price
                        }"
                    >
                        <v-select
                                  :items="currencies"
                                  v-model.number="value.price.currency"
                                  :error-messages="errors"
                                  item-value="id"
                                  item-text="content.ru.name"
                                  label="Валюта"
                                  color="green"
                                  outlined
                        ></v-select>
                    </validation-provider>
                </v-col>

                <v-col class="pt-0"
                       cols="12"
                       sm="4"
                >
                    <validation-provider
                        v-slot="{ errors }"
                        name="Основная цена"
                        :rules="{
                            required: !!value.status && !variables.check.price
                        }"
                    >
                        <v-text-field
                            v-model.number="value.price.base"
                            :error-messages="errors"
                            label="Основная цена"
                            color="green"
                            type="number"
                            outlined
                        ></v-text-field>
                    </validation-provider>
                </v-col>

                <v-col class="pt-0"
                       cols="12"
                       sm="4"
                >
                    <validation-provider
                        v-slot="{ errors }"
                        name="Количество"
                        :rules="{
                            required: !!value.status && !variables.check.count
                        }"
                    >
                        <v-text-field
                            v-model.number="value.count.base"
                            :disabled="!!variables.check.count"
                            :error-messages="errors"
                            label="Количество"
                            color="green"
                            type="number"
                            outlined
                        ></v-text-field>
                    </validation-provider>
                </v-col>
            </v-row>

            <v-row v-if="variables.check.price || variables.check.count">
                <v-col class="pt-0 pb-8">
                    <v-card class="my-0">
                        <v-simple-table
                            :fixed-header="true"
                        >
                            <thead>
                                <tr class="b-tr">
                                    <th class="b-td green--text">№</th>
                                    <th class="b-td green--text">
                                        Атрибуты
                                    </th>
                                    <th class="b-td green--text">
                                        Стоимость
                                    </th>
                                    <th class="b-td green--text">
                                        Количество
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr class="b-tr"
                                v-for="(item, index) in attrList"
                            >
                                <td class="b-td">{{ (index + 1) }}</td>
                                <td class="b-td">{{ item.name }}</td>
                                <td class="b-td is-disabled">
                                    <v-text-field class="py-3" style="max-width: 150px;" type="number" color="success"
                                                  v-if="typeof item.price === 'number'"
                                                  v-model.number="value.price.attrs[item.price].value"
                                                  solo dense
                                                  hide-details
                                    ></v-text-field>
                                </td>
                                <td class="b-td is-disabled">
                                    <v-text-field class="py-3" style="max-width: 150px;" type="number" color="success"
                                                  v-if="typeof item.count === 'number'"
                                                  v-model.number="value.count.attrs[item.count].value"
                                                  solo dense
                                                  hide-details
                                    ></v-text-field>
                                </td>
                            </tr>
                            </tbody>
                        </v-simple-table>
                    </v-card>
                </v-col>
            </v-row>

            <v-row>
                <v-col class="pt-0">
                    <v-btn class="mb-2" text
                           v-on:click="addBulk"
                    >
                        <v-icon left>
                            mdi-playlist-plus
                        </v-icon>
                        Оптовые цены
                    </v-btn>

                    <v-card class="mt-0 pt-0 mb-10" v-if="value.price.bulk && value.price.bulk.length">
                        <v-container class="pa-8 pb-0">
                            <draggable class="params-wrap__items"
                                       handle=".move-param-btn"
                                       v-model="value.price.bulk"
                                       v-bind="options"
                            >
                                <v-row
                                    v-for="(bulk, index) in value.price.bulk"
                                    :key="bulk.id"
                                >
                                    <v-col cols="4" class="py-0">
                                        <v-text-field
                                            v-model.trim="bulk.name"
                                            label="Ярлык"
                                            color="green"
                                            outlined dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3" class="py-0">
                                        <v-text-field
                                            v-model.number="bulk.count"
                                            label="Количество"
                                            color="green"
                                            type="number"
                                            outlined dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3" class="py-0 pr-0">
                                        <v-text-field
                                            v-model.number="bulk.sale"
                                            label="Cкидка, %"
                                            color="green"
                                            type="number"
                                            outlined dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="1" class="py-0 pr-0 text-right move-param-btn is-disabled"
                                           :disabled="bulk.length === 1"
                                    >
                                        <v-btn fab dark small color="orange darken-1">
                                            <v-icon>mdi-cursor-move</v-icon>
                                        </v-btn>
                                    </v-col>

                                    <v-col cols="1" class="py-0 text-right is-disabled"
                                           :disabled="bulk.length === 1"
                                    >
                                        <v-btn fab dark small color="red lighten-1"
                                               v-on:click="rmBulk(index)"
                                        >
                                            <v-icon>mdi-delete-outline</v-icon>
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </draggable>
                        </v-container>
                    </v-card>
                </v-col>
            </v-row>
        </validation-observer>
    </v-container>
</template>

<script>
    import { required } from 'vee-validate/dist/rules'
    import { extend, ValidationObserver, ValidationProvider } from 'vee-validate'

    extend('required', {
        ...required,
        message: 'Поле "{_field_}" должно быть заполнено',
    })

    export default {
        name: "PriceCount",
        props:['value', 'local', 'status', 'langs', 'select', 'tabSelect', 'other', 'index'],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data: function () {
            return {
                currencies: this.$store.getters.currencyData.list,
                options: {
                    animation: 200,
                    disabled: false
                }
            }
        },
        watch: {
            'variables.values.count': function () {
                if (this.variables.check.count) {
                    this.value.count.base = null;
                }
                if (this.variables.check.price) {
                    this.value.price.base = null;
                }
            }
        },
        computed: {
            variables: function () {
                return this.other;
            },
            attrList: function () {
                let data = this.value.price.attrs.map((item, index) => {
                    return {
                        name: this.nameAttrs(item.keys),
                        id: item.id,
                        price: index
                    }
                });

                this.value.count.attrs.forEach((item, index) => {
                    for (let i = 0; i < data.length; ++i) {
                        if (item.id === data[i].id) {
                            data[i].count = index;
                            return;
                        }
                    }

                    data.push({
                        name: this.nameAttrs(item.keys),
                        id: item.id,
                        count: index
                    })
                })

                return data;
            }
        },
        methods: {
            nameAttrs: function(keys) {
                return keys.map(item => {
                    item = this.variables.items.find(el => el.id === item);
                    return item.content.ru.title;
                }).join(' + ');
            },
            addBulk: function () {
                this.value.price.bulk.unshift({
                    id: +new Date(),
                    name: '',
                    count: null,
                    sale: null
                })
            },
            rmBulk: function (index) {
                this.value.price.bulk.splice(index, 1);
            },
            validate: function() {
                return this.$refs.observer.validate().then(result => {
                    if (result && this.value.status) {
                        const variables = this.variables.check;

                        for (let i = 0; i < this.attrList.length; ++i) {
                            const attr = this.attrList[i];

                            if (
                                (variables.price && typeof attr.price === 'number' && typeof this.value.price.attrs[attr.price].value !== 'number')
                                ||
                                (variables.count && typeof attr.count === 'number' && typeof this.value.count.attrs[attr.count].value !== 'number')
                            ) {
                                return {
                                    result: false,
                                    index: this.index,
                                    alert: 'Заполните <b>все активные поля</b> для заданных атрибутов'
                                };
                            }
                        }

                        if (this.value.price.bulk.length) {
                            for (let i = 0; i < this.value.price.bulk.length; ++i) {
                                let bulk = this.value.price.bulk[i];
                                if (
                                    bulk.name === ''
                                    ||
                                    (typeof bulk.count !== 'number')
                                    ||
                                    (typeof bulk.sale !== 'number')
                                ) {
                                    return {
                                        result: false,
                                        index: this.index,
                                        alert: 'Заполните <b>все активные поля</b> для оптовых цен'
                                    };
                                }
                            }
                        }
                    }
                    return {
                        result: result,
                        index: this.index
                    };
                });
            }
        }
    }
</script>
