<template>
    <v-container class="pt-0 content-page">
        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0">Список услуг</v-card-title>

                <v-col cols="7" class="pb-0">
                    <v-btn class="mb-2" text
                           v-on:click="addItem"
                    >
                        <v-icon left>
                            mdi-playlist-plus
                        </v-icon>
                        Услуга
                    </v-btn>
                </v-col>

                <v-card class="mt-0 pt-0 mb-10"
                        v-for="(item, index) in value.data"
                        :key="index"
                >
                    <v-container class="pa-8">
                        <v-row>
                            <v-col cols="12" sm="9" class="pr-12 py-0">
                                <v-text-field
                                    label="Заголовок"
                                    color="green"
                                    outlined
                                    hide-details
                                    class="mb-6"
                                    v-model="value.content[local].data[index].title"
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
                                    v-on:click="rmItem(index)"
                                >
                                    <v-icon>mdi-delete-outline</v-icon>
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        props: ['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect', 'alert'],
        data: function () {
            return {
            }
        },
        watch: {
            local: function (a, b) {
                this.value.content[a].data.forEach((item, index) => {
                    if (!item.title) {
                        item.title = this.value.content[b].data[index].title;
                    }
                })
            }
        },
        methods: {
            addItem: function() {
                this.value.data.unshift({
                    link: '',
                    image: '',
                });
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.unshift({
                        title: ''
                    })
                })
            },
            rmItem: function(index) {
                this.value.data.splice(index, 1);

                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.splice(index, 1);
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
                for (let i = 0; i < this.value.data.length; ++i) {
                    let item = this.value.data[i];

                    if (!item.link || !item.image) {
                        this.$emit('update:tabSelect', 1);

                        this.$emit('update:alert', {
                            type: 'warning',
                            text: 'Необходимо заполнить <b>все активные поля</b>'
                        });

                        return false;
                    }
                }

                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local,
                        lang = this.langs[i].id;

                    for (let i = 0; i < this.value.content[local].data.length; ++i) {
                        let item = this.value.content[local].data[i];

                        if (!item.title) {
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
                    }
                }

                return true
            }
        }
    }
</script>
