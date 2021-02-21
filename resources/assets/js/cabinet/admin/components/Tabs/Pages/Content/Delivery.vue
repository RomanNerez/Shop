<template>
    <v-container class="pt-0 content-page">
        <v-row>
            <v-col class="pt-0">
                <v-text-field
                    label='Заголовок блока "Доставка"'
                    color="green"
                    outlined
                    hide-details
                    class="mb-6"
                    v-model="value.content[local].data.delivery.title"
                ></v-text-field>

                <v-card-title class="pa-0">Транспортные компании</v-card-title>

                <v-col cols="7" class="pb-0">
                    <v-btn class="mb-2" text
                           v-on:click="addItemDelivery"
                    >
                        <v-icon left>
                            mdi-playlist-plus
                        </v-icon>
                        Перевозчик
                    </v-btn>
                </v-col>

                <v-card class="mt-0 pt-0 mb-10"
                        v-for="(item, index) in value.content[local].data.delivery.items"
                        :key="index"
                >
                    <v-container class="pa-8">
                        <v-row>
                            <v-col cols="12" sm="9" class="pr-12 py-0">
                                <v-text-field
                                    label="Название"
                                    color="green"
                                    outlined
                                    hide-details
                                    class="mb-6"
                                    v-model="item.name"
                                ></v-text-field>
                                <v-text-field
                                    label="Ссылка"
                                    color="green"
                                    outlined
                                    hide-details
                                    v-model="item.link"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="2" class="media-box my-0">
                                <v-hover>
                                    <template v-slot:default="{ hover }">
                                        <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                               elevation="4"
                                               color="#FAFAFA"
                                               v-on:click="setMedia(item, 'image', -1)"
                                        >
                                            <template v-if="item.image">
                                                <v-img :src="item.image"></v-img>
                                            </template>
                                            <template v-else>
                                                <v-sheet
                                                    class="d-flex align-center justify-center"
                                                    color="#FAFAFA"
                                                >
                                                    <v-icon size="50" color="#BDBDBD">
                                                        mdi-image-size-select-large
                                                    </v-icon>
                                                </v-sheet>
                                            </template>

                                            <v-fade-transition>
                                                <v-overlay
                                                    color="light-blue darken-1"
                                                    v-if="hover"
                                                    absolute
                                                >
                                                    <v-icon large>
                                                        mdi-folder-multiple-image
                                                    </v-icon>
                                                </v-overlay>
                                            </v-fade-transition>
                                        </v-btn>
                                    </template>
                                </v-hover>
                            </v-col>

                            <v-col cols="12" sm="1" class="py-0 text-right">
                                <v-btn fab dark small color="red lighten-1 is-disabled"
                                       v-on:click="rmItemDelivery(index)"
                                >
                                    <v-icon>mdi-delete-outline</v-icon>
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0 pb-4">Описание блока "Доставка"</v-card-title>

                <ckeditor
                    v-model="value.content[local].data.desc"
                    :config="editorConfig"
                ></ckeditor>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="my-8">
                <hr>
            </v-col>
        </v-row>
        <v-row>
            <v-col >
                <v-text-field
                    label='Заголовок блока "Локации"'
                    color="green"
                    outlined
                    hide-details
                    class="mb-6"
                    v-model="value.content[local].data.area.title"
                ></v-text-field>

                <v-card-title class="pa-0">Локации</v-card-title>

                <v-col cols="7" class="pb-0">
                    <v-btn class="mb-2" text
                           v-on:click="addItemArea"
                    >
                        <v-icon left>
                            mdi-playlist-plus
                        </v-icon>
                        Локация
                    </v-btn>
                </v-col>

                <v-card class="mt-0 pt-0 mb-10"
                        v-for="(item, index) in value.content[local].data.area.items"
                        :key="index"
                >
                    <v-container class="pa-8">
                        <v-row>
                            <v-col cols="12" sm="11" class="py-0">
                                <v-text-field
                                    label="Название"
                                    color="green"
                                    outlined
                                    hide-details
                                    class="mb-6"
                                    v-model="item.name"
                                ></v-text-field>
                                <v-textarea
                                    label="Содержимое"
                                    color="green"
                                    outlined
                                    hide-details
                                    v-model="item.content"
                                ></v-textarea>
                            </v-col>

                            <v-col cols="12" sm="1" class="py-0 text-right">
                                <v-btn fab dark small color="red lighten-1 is-disabled"
                                       v-on:click="rmItemArea(index)"
                                >
                                    <v-icon>mdi-delete-outline</v-icon>
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="my-8">
                <hr>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="pt-0">
                <v-text-field
                    label='Заголовок блока "Оплата"'
                    color="green"
                    outlined
                    hide-details
                    class="mb-6"
                    v-model="value.content[local].data.payment.title"
                ></v-text-field>
                <v-text-field
                    label='Подзаголовок блока "Оплата"'
                    color="green"
                    outlined
                    hide-details
                    class="mb-6"
                    v-model="value.content[local].data.payment.subtitle"
                ></v-text-field>

                <v-card-title class="pa-0">Финансовые организации</v-card-title>

                <v-col cols="7" class="pb-0">
                    <v-btn class="mb-2" text
                           v-on:click="addItemPayment"
                    >
                        <v-icon left>
                            mdi-playlist-plus
                        </v-icon>
                        Организация
                    </v-btn>
                </v-col>

                <v-card class="mt-0 pt-0 mb-10"
                        v-for="(item, index) in value.content[local].data.payment.items"
                        :key="index"
                >
                    <v-container class="pa-8">
                        <v-row>
                            <v-col cols="12" sm="9" class="pr-12 py-0">
                                <v-text-field
                                    label="Название"
                                    color="green"
                                    outlined
                                    hide-details
                                    class="mb-6"
                                    v-model="item.name"
                                ></v-text-field>
                                <v-text-field
                                    label="Ссылка"
                                    color="green"
                                    outlined
                                    hide-details
                                    v-model="item.link"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="2" class="media-box my-0">
                                <v-hover>
                                    <template v-slot:default="{ hover }">
                                        <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                               elevation="4"
                                               color="#FAFAFA"
                                               v-on:click="setMedia(item, 'image', -1)"
                                        >
                                            <template v-if="item.image">
                                                <v-img :src="item.image"></v-img>
                                            </template>
                                            <template v-else>
                                                <v-sheet
                                                    class="d-flex align-center justify-center"
                                                    color="#FAFAFA"
                                                >
                                                    <v-icon size="50" color="#BDBDBD">
                                                        mdi-image-size-select-large
                                                    </v-icon>
                                                </v-sheet>
                                            </template>

                                            <v-fade-transition>
                                                <v-overlay
                                                    color="light-blue darken-1"
                                                    v-if="hover"
                                                    absolute
                                                >
                                                    <v-icon large>
                                                        mdi-folder-multiple-image
                                                    </v-icon>
                                                </v-overlay>
                                            </v-fade-transition>
                                        </v-btn>
                                    </template>
                                </v-hover>
                            </v-col>

                            <v-col cols="12" sm="1" class="py-0 text-right">
                                <v-btn fab dark small color="red lighten-1 is-disabled"
                                       v-on:click="rmItemPayment(index)"
                                >
                                    <v-icon>mdi-delete-outline</v-icon>
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0 pb-4">Описание блока "Оплата"</v-card-title>

                <ckeditor
                    v-model="value.content[local].data.payment.desc"
                    :config="editorConfig"
                ></ckeditor>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import CKEditor from 'ckeditor4-vue';

    export default {
        props: ['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect', 'alert'],
        components: {
            ckeditor: CKEditor.component
        },
        data: function () {
            return {
                editorConfig: {
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=image',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=image&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                    contentsCss: '/library/css/editor.css',
                    height: '30vh',
                    removeButtons: 'Scayt,Anchor,Specialchar,Styles,About,Blockquote'
                }
            }
        },
        watch: {
            local: function (a, b) {
                if (!this.value.content[a].data.delivery.title) {
                    this.value.content[a].data.delivery.title = this.value.content[b].data.delivery.title;
                }
                if (!this.value.content[a].data.desc) {
                    this.value.content[a].data.desc = this.value.content[b].data.desc;
                }
                if (!this.value.content[a].data.area.title) {
                    this.value.content[a].data.area.title = this.value.content[b].data.area.title;
                }
                if (!this.value.content[a].data.payment.title) {
                    this.value.content[a].data.payment.title = this.value.content[b].data.payment.title;
                }
                if (!this.value.content[a].data.payment.subtitle) {
                    this.value.content[a].data.payment.subtitle = this.value.content[b].data.payment.subtitle;
                }
                if (!this.value.content[a].data.payment.desc) {
                    this.value.content[a].data.payment.desc = this.value.content[b].data.payment.desc;
                }

                this.value.content[a].data.delivery.items.forEach((item, index) => {
                    if (!item.name) {
                        item.name = this.value.content[b].data.delivery.items[index].name;
                    }
                    if (!item.link) {
                        item.link = this.value.content[b].data.delivery.items[index].link;
                    }
                    if (!item.image) {
                        item.image = this.value.content[b].data.delivery.items[index].image;
                    }
                })

                this.value.content[a].data.area.items.forEach((item, index) => {
                    if (!item.name) {
                        item.name = this.value.content[b].data.area.items[index].name;
                    }
                    if (!item.content) {
                        item.content = this.value.content[b].data.area.items[index].content;
                    }
                })

                this.value.content[a].data.payment.items.forEach((item, index) => {
                    if (!item.name) {
                        item.name = this.value.content[b].data.payment.items[index].name;
                    }
                    if (!item.link) {
                        item.link = this.value.content[b].data.payment.items[index].link;
                    }
                    if (!item.image) {
                        item.image = this.value.content[b].data.payment.items[index].image;
                    }
                })
            }
        },
        methods: {
            addItemDelivery: function() {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.delivery.items.unshift({
                        name: '',
                        link: '',
                        image: ''
                    })
                })
            },
            rmItemDelivery: function(index) {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.delivery.items.splice(index, 1);
                })
            },
            addItemArea: function() {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.area.items.unshift({
                        name: '',
                        content: ''
                    })
                })
            },
            rmItemArea: function(index) {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.area.items.splice(index, 1);
                })
            },
            addItemPayment: function() {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.payment.items.unshift({
                        name: '',
                        link: '',
                        image: ''
                    })
                })
            },
            rmItemPayment: function(index) {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.payment.items.splice(index, 1);
                })
            },
            selectFile: function () {
                window.open('/laravel-filemanager?type=image', 'FileManager', 'width=1280,height=700');
                return new Promise(resolve => {
                    window.SetUrl = (items) => {
                        resolve(items.slice(0, 6));
                    };
                })
            },
            setMedia: function(current, index, type) {
                this.selectFile().then(response => {
                    if (type !== -1) {
                        const replace = type ? 0 : response.length;

                        current.splice(index, replace, ...response.map((item, index) => {
                            return {
                                id: index + (+new Date()),
                                source: item.url
                            }
                        }))

                        if ( current.length > 6 ) {
                            const delta = current.length - 6;
                            current.splice(-delta, delta);
                        }
                    }else{
                        let source = response[0].url;

                        if ( typeof index === 'number') {
                            current.splice(index, 1, source)
                        }else{
                            current[index] = source
                        }
                    }
                })
            },
            validate: function () {
                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local,
                        lang = this.langs[i].id;

                    if (
                        !this.value.content[local].data.delivery.title
                        ||
                        !this.value.content[local].data.desc
                        ||
                        !this.value.content[local].data.area.title
                        ||
                        !this.value.content[local].data.payment.title
                        ||
                        !this.value.content[local].data.payment.subtitle
                        ||
                        !this.value.content[local].data.payment.desc
                    ) {
                        this.$emit('update:tabSelect', 1);
                        this.$emit('update:select', lang);

                        if (this.local === local) {
                            this.$emit('update:alert', {
                                type: 'warning',
                                text: 'Необходимо заполнить <b>все активные поля</b>'
                            });
                        }

                        return false;
                    }

                    this.value.content[local].data.delivery.items.forEach((item, index) => {
                        if (!item.name || !item.link || !item.image) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', lang);

                            if (this.local === local) {
                                this.$emit('update:alert', {
                                    type: 'warning',
                                    text: 'Необходимо заполнить <b>все активные поля</b>'
                                });
                            }

                            return false;
                        }
                    })

                    this.value.content[local].data.area.items.forEach((item, index) => {
                        if (!item.name || !item.content) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', lang);

                            if (this.local === local) {
                                this.$emit('update:alert', {
                                    type: 'warning',
                                    text: 'Необходимо заполнить <b>все активные поля</b>'
                                });
                            }

                            return false;
                        }
                    })

                    this.value.content[local].data.payment.items.forEach((item, index) => {
                        if (!item.name || !item.link || !item.image) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', lang);

                            if (this.local === local) {
                                this.$emit('update:alert', {
                                    type: 'warning',
                                    text: 'Необходимо заполнить <b>все активные поля</b>'
                                });
                            }

                            return false;
                        }
                    })
                }

                return true
            }
        }
    }
</script>
