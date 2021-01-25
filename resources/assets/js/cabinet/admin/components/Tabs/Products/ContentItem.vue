<template>
    <v-container class="pt-0">
        <validation-observer
            ref="observer"
        >
            <v-row>
                <v-col cols="12" sm="6" class="py-0">
                    <validation-provider
                        v-slot="{ errors }"
                        name="Название"
                        rules="required"
                    >
                        <v-text-field
                            v-model.trim="value.content[local].title"
                            :error-messages="errors"
                            label="Название"
                            color="green"
                            outlined
                        ></v-text-field>
                    </validation-provider>
                </v-col>
                <v-col cols="12" sm="6" class="py-0">
                    <v-row>
                        <v-col cols="10" class="py-0">
                            <validation-provider
                                v-slot="{ errors }"
                                name="Ссылка"
                                :rules="{
                                    required: true,
                                    link: true
                                }"
                            >
                                <v-text-field
                                    v-model.trim="value.slug"
                                    :error-messages="errors"
                                    label="Ссылка"
                                    color="green"
                                    outlined
                                ></v-text-field>
                            </validation-provider>
                        </v-col>
                        <v-col cols="2" class="text-right is-disabled py-0"
                               :disabled="local != 'ru'"
                        >
                            <v-tooltip top>
                                <template v-slot:activator="{ on }">
                                    <v-btn fab dark color="light-blue lighten-1"
                                           v-on="on"
                                           v-on:click="generate_url"
                                    >
                                        <v-icon>mdi-link-plus</v-icon>
                                    </v-btn>
                                </template>
                                <span>Генерация URL</span>
                            </v-tooltip>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="7">
                    <v-card-title class="pa-0">Описание товара</v-card-title>
                </v-col>
                <template v-if="variables.check.data">
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
                </template>
            </v-row>
            <v-row>
                <v-col class="pt-0">
                    <template v-if="attribute >= 0">
                        <ckeditor
                            v-model="value.content[local].desc.attrs[attribute].value"
                            :config="editorConfig"
                        ></ckeditor>
                    </template>
                    <template v-else>
                        <ckeditor
                            v-model="value.content[local].desc.base"
                            :config="editorConfig"
                        ></ckeditor>
                    </template>
                </v-col>
            </v-row>
        </validation-observer>
    </v-container>
</template>

<script>
    import { required } from 'vee-validate/dist/rules'
    import { extend, ValidationObserver, ValidationProvider } from 'vee-validate'
    import CKEditor from 'ckeditor4-vue';

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
        name: "ContentItem",
        props: ['value', 'local', 'status', 'langs', 'select', 'tabSelect', 'other', 'index'],
        components: {
            ValidationProvider,
            ValidationObserver,
            ckeditor: CKEditor.component
        },
        data: function () {
            return {
                attribute: -1,
                editorConfig: {
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=image',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=image&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                    contentsCss: '/library/css/editor.css',
                    height: '42vh',
                    removeButtons: 'Scayt,Anchor,Specialchar,Styles,About,Blockquote'
                }
            }
        },
        computed: {
            variables: function () {
                return this.other;
            },
            varData: function () {
                if (!this.value.content[this.local].desc.attrs[this.attribute]) {
                    this.attribute = -1;
                }
                return [
                    {
                        id: 0,
                        index: -1,
                        name: 'Без атрибутов'
                    },
                    ...this.value.content.ru.desc.attrs.map((item, index) => {
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
            generate_url(){
                var url = this.value.content.ru.title.replace(/[\s]+/gi, '-');
                this.value.slug = this.translit(url).replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();
            },
            translit(str){
                var ru=("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")
                var en=("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")
                var res = '';
                for(var i=0, l=str.length; i<l; i++){
                    var s = str.charAt(i), n = ru.indexOf(s);
                    if(n >= 0) {
                        res += en[n];
                    } else {
                        res += s;
                    }
                }
                return res;
            },
            validate: function () {
                return this.$refs.observer.validate().then(result => {
                    if (result && this.value.status && this.value.content[this.local].desc.base === '') {
                        this.attribute = -1;
                        return {
                            result: false,
                            index: this.index,
                            alert: 'Поле <b>"Описание товара"</b> обязательное для опубликованных товаров'
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
