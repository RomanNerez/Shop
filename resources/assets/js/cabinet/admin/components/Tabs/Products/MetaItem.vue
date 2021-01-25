<template>
    <v-container class="pt-0">
        <validation-observer
            ref="observer"
        >
            <v-row v-if="variables.check.data">
                <v-col cols="7">
                    <v-card-title class="pa-0">Мета данные</v-card-title>
                </v-col>
                <v-col cols="5" class="py-0">
                    <v-select
                        label="Атрибут"
                        v-model="attribute"
                        :items="varData"
                        item-value="index"
                        item-text="name"
                        color="green"
                        filled
                        hide-details
                    ></v-select>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" class="py-0">
                    <validation-provider
                        v-slot="{ errors }"
                        name="Meta Title"
                        :rules="{
                            required: !!(value.status && attribute < 0)
                        }"
                    >
                        <v-text-field
                            v-on:input="setValue('meta_title', $event)"
                            :value="getValue('meta_title')"
                            :error-messages="errors"
                            label="Meta Title"
                            color="green"
                            outlined
                        ></v-text-field>
                    </validation-provider>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="pt-0">
                    <validation-provider
                        v-slot="{ errors }"
                        name="Meta Description"
                        :rules="{
                            required: !!(value.status && attribute < 0)
                        }"
                    >
                        <v-textarea
                            v-on:input="setValue('meta_desc', $event)"
                            :value="getValue('meta_desc')"
                            :error-messages="errors"
                            label="Meta Description"
                            class="mb-4"
                            height="380px"
                            no-resize
                            color="green"
                            outlined
                        ></v-textarea>
                    </validation-provider>
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

    extend('link', value => {
        if (!value.match(/[^0-9a-z\-]+/gi)) {
            return true;
        }
        return 'Поле "{_field_}" содержит недопустимые символы';
    });

    export default {
        name: "MetaItem",
        props: ['value', 'local', 'status', 'langs', 'select', 'tabSelect', 'other', 'index'],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data: function () {
            return {
                attribute: -1
            }
        },
        computed: {
            variables: function () {
                return this.other;
            },
            varData: function () {
                return [
                    {
                        id: 0,
                        index: -1,
                        name: 'Без атрибутов'
                    },
                    ...this.value.content.ru.meta_title.attrs.map((item, index) => {
                        return {
                            id: item.id,
                            index: index,
                            name: this.nameAttrs(item.keys)
                        }
                    })
                ];
            },
        },
        methods: {
            nameAttrs: function(keys) {
                return keys.map(item => {
                    item = this.variables.items.find(el => el.id === item);
                    return item.content.ru.title;
                }).join(' + ');
            },
            setValue: function (key, val) {
                const item = this.value.content[this.local][key];
                if (this.attribute >= 0) {
                    item.attrs[this.attribute].value = val.trim();
                }else{
                    item.base = val.trim();
                }
            },
            getValue: function (key) {
                const item = this.value.content[this.local][key];
                return this.attribute >= 0 ? item.attrs[this.attribute].value : item.base;
            },
            validate: function () {
                return this.$refs.observer.validate().then(result => {
                    if (result && this.value.status) {
                        const data = this.value.content[this.local];

                        if (data.meta_title.base === '' || data.meta_desc.base === '') {
                            this.attribute = -1;
                            return {
                                result: false,
                                index: this.index
                            }
                        }
                    }
                    return {
                        result: result,
                        index: this.index
                    }
                });
            }
        }
    }
</script>
