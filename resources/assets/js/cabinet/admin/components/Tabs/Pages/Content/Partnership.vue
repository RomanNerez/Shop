<template>
    <v-container class="pt-0 content-page">
        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0">Документы</v-card-title>

                <v-col cols="7" class="pb-0">
                    <v-btn class="mb-2" text
                           v-on:click="addItem"
                    >
                        <v-icon left>
                            mdi-playlist-plus
                        </v-icon>
                        Документ
                    </v-btn>
                </v-col>

                <template v-if="value.content[local].data.length">
                    <draggable class="wrap-draggable"
                               handle=".move-shape-btn"
                               v-model="value.content[local].data"
                               v-bind="options"
                    >
                        <v-card class="mt-0 py-0 mb-10"
                                v-for="item in value.content[local].data"
                                :key="item.id"
                        >
                            <v-container class="pa-8">
                                <v-row>
                                    <v-col cols="12" sm="11" class="py-0">
                                        <v-text-field
                                            label="Название"
                                            color="green"
                                            outlined dense
                                            hide-details
                                            class="mb-6"
                                            v-model="item.title"
                                        ></v-text-field>

                                        <v-textarea
                                            label="Описание"
                                            color="green"
                                            outlined dense
                                            hide-details
                                            class="mb-6"
                                            v-model="item.desc"
                                        ></v-textarea>

                                        <v-row>
                                            <v-col sm="6" class="py-0">
                                                <v-text-field
                                                    label="Кнопка"
                                                    color="green"
                                                    outlined dense
                                                    hide-details
                                                    v-model="item.btn"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col sm="5" class="py-0">
                                                <v-text-field
                                                    label="Ссылка"
                                                    color="green"
                                                    outlined dense
                                                    hide-details
                                                    v-model="item.link"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col sm="1" class="py-0">
                                                <v-btn fab dark small color="light-blue lighten-1"
                                                       v-on:click="setMedia(item, 'link', -1)"
                                                >
                                                    <v-icon>mdi-link-plus</v-icon>
                                                </v-btn>
                                            </v-col>
                                        </v-row>
                                    </v-col>

                                    <v-col cols="12" sm="1" class="py-0 text-right">
                                        <v-row>
                                            <v-col class="pt-0">
                                                <v-btn fab dark small color="orange darken-1" class="move-shape-btn">
                                                    <v-icon>mdi-cursor-move</v-icon>
                                                </v-btn>
                                            </v-col>
                                            <v-col>
                                                <v-btn fab dark small color="red lighten-1 is-disabled"
                                                       v-on:click="rmItem(index)"
                                                >
                                                    <v-icon>mdi-delete-outline</v-icon>
                                                </v-btn>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>
                    </draggable>
                </template>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        props: ['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect', 'alert'],
        data: function () {
            return {
                options: {
                    animation: 200,
                    disabled: false
                }
            }
        },
        watch: {
            local: function (a, b) {
                this.value.content[a].data.forEach((item, index) => {
                    if (!item.title) {
                        this.value.content[a].data[index].title = this.value.content[b].data[index].title;
                    }
                    if (!item.link) {
                        this.value.content[a].data[index].link = this.value.content[b].data[index].link;
                    }
                    if (!item.btn) {
                        this.value.content[a].data[index].btn = this.value.content[b].data[index].btn;
                    }
                    if (!item.desc) {
                        this.value.content[a].data[index].desc = this.value.content[b].data[index].desc;
                    }
                })
            }
        },
        methods: {
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
            addItem: function() {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.unshift({
                        title: '',
                        link: '',
                        btn: '',
                        desc: '',
                        id: +new Date()
                    })
                })
            },
            rmItem: function(index) {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data.splice(index, 1);
                })
            },
            validate: function () {
                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local,
                        lang = this.langs[i].id;

                    for (let i = 0; i < this.value.content[local].data.length; ++i) {
                        let item = this.value.content[local].data[i];

                        if ( !item.title || !item.link || !item.btn || !item.desc ) {
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
