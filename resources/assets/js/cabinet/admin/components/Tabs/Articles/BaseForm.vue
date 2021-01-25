<template>
    <v-row>
        <v-col cols="12" class="pt-0">
            <div class="b-steps b-one">
                <div class="b-colum">
                    <v-text-field
                        v-model.trim="value.content[local].title"
                        label="Название"
                        color="green"
                        outlined
                        :error-messages="requiredErrors('title')"
                    ></v-text-field>

                    <v-img
                        class="b-add-img"
                        :src="value.file"
                        v-on:click="selectFile"
                    >
                        <svg x="0px" y="0px"  viewBox="0 0 419.2 419.2">
                            <circle cx="158" cy="144.4" r="28.8"/>
                            <path d="M394.4,250.4c-13.6-12.8-30.8-21.2-49.6-23.6V80.4c0-15.6-6.4-29.6-16.4-40C318,30,304,24,288.4,24h-232c-15.6,0-29.6,6.4-40,16.4C6,50.8,0,64.8,0,80.4v184.4V282v37.2c0,15.6,6.4,29.6,16.4,40c10.4,10.4,24.4,16.4,40,16.4h224.4c14.8,12,33.2,19.6,53.6,19.6c23.6,0,44.8-9.6,60-24.8c15.2-15.2,24.8-36.4,24.8-60C419.2,286.8,409.6,265.6,394.4,250.4z M21.2,80.4c0-9.6,4-18.4,10.4-24.4c6.4-6.4,15.2-10.4,24.8-10.4h232c9.6,0,18.4,4,24.8,10.4c6.4,6.4,10.4,15.2,10.4,24.8v124.8l-59.2-59.2c-4-4-10.8-4.4-15.2,0L160,236l-60.4-60.8c-4-4-10.8-4.4-15.2,0l-63.2,64V80.4z M56,355.2v-0.8c-9.6,0-18.4-4-24.8-10.4c-6-6.4-10-15.2-10-24.8V282v-12.4L92,198.4l60.4,60.4c4,4,10.8,4,15.2,0l89.2-89.6l58.4,58.8c-1.2,0.4-2.4,0.8-3.6,1.2c-1.6,0.4-3.2,0.8-5.2,1.6c-1.6,0.4-3.2,1.2-4.8,1.6c-1.2,0.4-2,0.8-3.2,1.6c-1.6,0.8-2.8,1.2-4,2c-2,1.2-4,2.4-6,3.6c-1.2,0.8-2,1.2-3.2,2c-0.8,0.4-1.2,0.8-2,1.2c-3.6,2.4-6.8,5.2-9.6,8.4c-15.2,15.2-24.8,36.4-24.8,60c0,6,0.8,11.6,2,17.6c0.4,1.6,0.8,2.8,1.2,4.4c1.2,4,2.4,8,4,12v0.4c1.6,3.2,3.2,6.8,5.2,9.6H56z M378.8,355.2c-11.6,11.6-27.2,18.4-44.8,18.4c-16.8,0-32.4-6.8-43.6-17.6c-1.6-1.6-3.2-3.6-4.8-5.2c-1.2-1.2-2.4-2.8-3.6-4c-1.6-2-2.8-4.4-4-6.8c-0.8-1.6-1.6-2.8-2.4-4.4c-0.8-2-1.6-4.4-2-6.8c-0.4-1.6-1.2-3.6-1.6-5.2c-0.8-4-1.2-8.4-1.2-12.8c0-17.6,7.2-33.2,18.4-44.8c11.2-11.6,27.2-18.4,44.8-18.4s33.2,7.2,44.8,18.4c11.6,11.6,18.4,27.2,18.4,44.8C397.2,328,390,343.6,378.8,355.2z"/>
                            <path d="M341.6,267.6c-0.8-0.8-2-1.6-3.6-2.4c-1.2-0.4-2.4-0.8-3.6-0.8c-0.4,0-0.4,0-0.4,0c-0.4,0-0.4,0-0.4,0c-1.2,0-2.4,0.4-3.6,0.8c-1.2,0.4-2.4,1.2-3.6,2.4l-24.8,24.8c-4,4-4,10.8,0,15.2c4,4,10.8,4,15.2,0l6.4-6.4v44c0,6,4.8,10.8,10.8,10.8s10.8-4.8,10.8-10.8v-44l6.4,6.4c4,4,10.8,4,15.2,0c4-4,4-10.8,0-15.2L341.6,267.6z"/>
                        </svg>
                    </v-img>
                </div>

                <div class="b-colum">
                    <v-row no-gutters>
                        <v-col cols="10">
                            <v-text-field
                                v-model="value.slug"
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
                    <v-row>
                        <v-col class="py-0">
                            <v-textarea
                                v-model.trim="value.content[local].desc"
                                label="Краткое описание"
                                height="380px"
                                no-resize
                                color="green"
                                outlined
                                :error-messages="requiredErrors('desc')"
                            ></v-textarea>
                        </v-col>
                    </v-row>
                </div>
            </div>
        </v-col>
    </v-row>
</template>

<script>
    import { required, maxLength } from 'vuelidate/lib/validators';

	export default{
        props:['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
        validations: function () {
            let value = {
                    file: {},
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
                        },
                        desc: {
                            required
                        }
                    }
                } else {
                    value.content[item.local] = {
                        title: {},
                        desc: {},
                    }
                }
            }
            value.content.ru.title = { required };

            if (isStatus) {
                value.file.required = required;
            }

            return { value };
        },
		data: function() {
			return {
                content: this.value
			}
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
                            || !this.$v.value.content[local].desc.required
                            || !this.$v.value.slug.required
                            || this.$v.value.slug.regexp
                        ) {
                            this.$emit('update:tabSelect', 0);
                            this.$emit('update:select', this.langs[i].id);
                            return false;
                        }

                        if ( !this.$v.value.file.required ) {
                            this.$emit('update:tabSelect', 0);
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
            selectFile: function () {
                window.open('/laravel-filemanager?type=image', 'FileManager', 'width=1280,height=700');
                var that = this;
                    window.SetUrl = function (items) {
                        var file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');
                    that.value.file = file_path;
                };
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
