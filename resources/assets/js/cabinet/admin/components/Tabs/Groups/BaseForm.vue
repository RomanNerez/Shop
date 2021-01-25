<template>
    <v-container class="pa-0">
        <v-row>
            <v-col class="pt-0">
                <v-text-field
                    v-model.trim="value.content[local].title"
                    label="Название"
                    color="green"
                    outlined
                    :error-messages="requiredErrors('title')"
                ></v-text-field>
            </v-col>
            <v-col class="pt-0">
                <v-row no-gutters>
                    <v-col cols="10">
                        <v-text-field
                            v-model.trim="value.slug"
                            label="Ccылка"
                            color="green"
                            outlined
                            :error-messages="slugErrors"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="2" class="text-right">
                        <v-tooltip top>
                            <template v-slot:activator="{ on }">
                                <v-btn fab dark color="light-blue lighten-1"
                                       v-on="on"
                                       v-on:click="generate_url"
                                       :disabled="local != 'ru'"
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
            <v-col class="py-0">
                <v-text-field
                    v-model="value.content[local].full_title"
                    label="Заголовок"
                    color="green"
                    outlined
                ></v-text-field>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12" class="pt-0">
                <v-card-title class="pa-0">Описание</v-card-title>
            </v-col>
            <v-col cols="12" class="pt-0">
                <ckeditor
                    v-model="value.content[local].desc"
                    :config="editorConfig"
                ></ckeditor>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import { validationMixin } from 'vuelidate';
    import { required, maxLength } from 'vuelidate/lib/validators';
    import CKEditor from 'ckeditor4-vue';

	export default{
        props:['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
        validations: function () {
            let value = {
                    content: {},
                    slug: {
                        required,
                        regexp:function (val) {
                            return !!val.match(/[^0-9a-z\-]+/gi);
                        }
                    }
                },
                isStatus = false;

            for (let i = 0; i < this.langs.length; i++) {
                let item = this.langs[i];

                if (this.value.status) {
                    isStatus = true;
                    value.content[item.local] = {
                        title: {
                            required
                        }
                    }
                } else {
                    value.content[item.local] = {
                        title: {}
                    }
                }
            }
            value.content.ru.title = { required };

            return { value };
        },
		data: function() {
			return {
                content: this.value,
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
        components: {
            ckeditor: CKEditor.component
        },
        watch: {
            local: function (newLocal, oldLocal) {
                for (let keyValue in this.value.content[oldLocal]) {
                    if (!this.value.content[newLocal][keyValue]) {
                        this.value.content[newLocal][keyValue] = this.value.content[oldLocal][keyValue];
                    }
                }
            }
        },
        computed: {
            slugErrors: function () {
                const errors = []
                this.$v.value.slug.regexp && errors.push('Допускаются только цифры, буквы латинского алфавита и тире')
                if (!this.$v.value.slug.$dirty) return errors
                if (this.$v.value.slug.required !== undefined) {
                    !this.$v.value.slug.required && errors.push('Это поле обязательно!')
                };

                return errors
            },
        },
        methods:{
            validate: function () {
                this.$v.value.$touch();

                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local;

                    if (this.value.status) {
                        if ( !this.$v.value.content[local].title.required
                            || !this.$v.value.slug.required
                            || this.$v.value.slug.regexp
                        ) {
                            this.$emit('update:tabSelect', 0);
                            this.$emit('update:select', this.langs[i].id);
                            return false;
                        }

                    } else if ( !this.$v.value.content.ru.title.required || !this.$v.value.slug.required
                        || this.$v.value.slug.regexp
                    ) {
                        this.$emit('update:tabSelect', 0);
                        return false;
                    }
                }
                return true;
            },
            handleInput (e) {
                this.$emit('input', this.content)
            },
            generate_url(){
                var url = this.value.content['ru'].title.replace(/[\s]+/gi, '-');
                url = this.translit(url);
                this.value.slug = url.replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();
                return url;
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
            requiredErrors: function (key) {
                const errors = []
                if (!this.$v.value.content[this.local][key].$dirty) return errors
                if (this.$v.value.content[this.local][key].required !== undefined) {
                    !this.$v.value.content[this.local][key].required && errors.push('Это поле обязательно!')
                }
                return errors
            },
        }
	}
</script>
