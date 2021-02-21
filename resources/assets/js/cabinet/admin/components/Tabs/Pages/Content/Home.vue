<template>
    <v-container class="pt-0 content-page">
        <v-row>
            <v-col class="pt-0">
                <v-card class="my-0">
                    <v-tabs
                        v-model="tabs.selected"
                        background-color="light-blue darken-1"
                        show-arrows
                        dark
                    >
                        <v-tab
                            v-for="(tab, index) in tabs.items"
                            :key="index"
                        >
                            {{ tab }}
                        </v-tab>
                        <v-menu
                            bottom
                            left
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    text
                                    class="align-self-center mr-4"
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    <v-icon class="mr-2">
                                        mdi-format-align-bottom
                                    </v-icon>
                                    Импортировать
                                </v-btn>
                            </template>

                            <v-list>
                                <v-list-item
                                    v-for="item in otherLang"
                                    :key="item.id"
                                    v-on:click="importContent(item.local)"
                                    :disabled="checkImportContent()"
                                >
                                    импорт контента "{{ item.local }}"
                                </v-list-item>

                                <v-list-item
                                    v-on:click="resetImport"
                                    :disabled="!checkImportContent()"
                                >
                                    отменить импорт
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </v-tabs>
                </v-card>
            </v-col>
        </v-row>

        <template v-if="tabs.selected === 0">
            <v-row>
                <v-col class="pt-0">
                    <v-col cols="7" class="pb-0">
                        <v-btn class="mb-2" text
                               v-on:click="addLocalItem('slider')"
                        >
                            <v-icon left>
                                mdi-playlist-plus
                            </v-icon>
                            Слайд
                        </v-btn>
                    </v-col>

                    <draggable class="wrap-draggable"
                               handle=".move-shape-btn"
                               v-model="value.content[local].data.slider"
                               v-bind="options"
                    >
                        <v-card class="mt-0 pt-0 mb-10"
                                v-for="(item, index) in value.content[local].data.slider"
                                :key="item.id"
                        >
                            <v-container class="pt-5 px-8 pb-8">
                                <v-row>
                                    <v-col cols="12" sm="11" class="py-0">
                                        <v-card-title class="pa-0"><small>Параметры слайда</small></v-card-title>
                                        <v-row class="mb-4">
                                            <v-col cols="12" sm="6" class="py-0">
                                                <v-select v-model="item.type"
                                                          :items="[
                                                              {
                                                                  name: 'контент',
                                                                  val: 'content'
                                                              },{
                                                                  name: 'банер',
                                                                  val: 'banner'
                                                              }
                                                          ]"
                                                          item-value="val"
                                                          item-text="name"
                                                          label="Вид слайда"
                                                          color="green"
                                                          outlined dense hide-details
                                                ></v-select>
                                            </v-col>
                                            <v-col cols="12" sm="6" class="py-0">
                                                <v-select v-model="item.align"
                                                          :items="[
                                                              {
                                                                  name: 'изображение справа',
                                                                  val: 'right'
                                                              },{
                                                                  name: 'изображение слева',
                                                                  val: 'left'
                                                              }
                                                          ]"
                                                          item-value="val"
                                                          item-text="name"
                                                          label="Позиционирование"
                                                          color="green"
                                                          :disabled="item.type === 'banner'"
                                                          outlined dense hide-details
                                                ></v-select>
                                            </v-col>
                                        </v-row>

                                        <v-card-title class="pa-0"><small>Ссылка</small></v-card-title>
                                        <v-row class="mb-2">
                                            <v-col sm="3" class="py-0">
                                                <v-text-field
                                                    label="Текст"
                                                    color="green"
                                                    outlined dense
                                                    hide-details
                                                    :disabled="item.type === 'banner'"
                                                    v-model="item.content.btn.name"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col sm="3" class="py-0">
                                                <v-select v-model="item.content.btn.target"
                                                          :items="[
                                                              {
                                                                  name: 'текущая вкладка',
                                                                  val: 'self'
                                                              },{
                                                                  name: 'новая вкладка',
                                                                  val: 'blank'
                                                              },{
                                                                  name: 'загрузка',
                                                                  val: 'download'
                                                              }
                                                          ]"
                                                          item-value="val"
                                                          item-text="name"
                                                          label="Цель"
                                                          color="green"
                                                          outlined dense hide-details
                                                ></v-select>
                                            </v-col>

                                            <v-col sm="5" class="py-0">
                                                <v-row>
                                                    <v-col sm="10" class="py-0">
                                                        <v-text-field
                                                            label="Ссылка"
                                                            color="green"
                                                            outlined dense
                                                            hide-details
                                                            v-model="item.content.btn.link"
                                                        ></v-text-field>
                                                    </v-col>
                                                    <v-col sm="2" class="py-0">
                                                        <v-btn fab dark small color="light-blue lighten-1"
                                                               v-on:click="setMedia(item.content.btn, 'link', -1)"
                                                               :disabled="item.content.btn.target !== 'download'"
                                                        >
                                                            <v-icon>mdi-link-plus</v-icon>
                                                        </v-btn>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                            <v-col sm="1" class="py-0">
                                                <v-hover>
                                                    <template v-slot:default="{ hover }">
                                                        <v-btn class="ma-0 pa-0 overflow-hidden set-media-item" style="margin-top: -8px !important;" fab
                                                               elevation="4"
                                                               color="#FAFAFA"
                                                               :disabled="item.type === 'banner'"
                                                               v-on:click="setMedia(item.content.btn, 'ico', -1)"
                                                        >
                                                            <template v-if="item.content.btn.ico">
                                                                <v-img :src="item.content.btn.ico"></v-img>
                                                            </template>
                                                            <template v-else>
                                                                <v-sheet
                                                                    class="d-flex align-center justify-center"
                                                                    color="#FAFAFA"
                                                                >
                                                                    <v-icon color="#BDBDBD" medium>
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
                                                                    <v-icon medium>
                                                                        mdi-folder-multiple-image
                                                                    </v-icon>
                                                                </v-overlay>
                                                            </v-fade-transition>
                                                        </v-btn>
                                                    </template>
                                                </v-hover>
                                            </v-col>
                                        </v-row>
                                    </v-col>

                                    <v-col cols="12" sm="1" class="py-0 mt-2 text-right">
                                        <v-row>
                                            <v-col class="pt-0">
                                                <v-btn fab dark small color="orange darken-1" class="move-shape-btn">
                                                    <v-icon>mdi-cursor-move</v-icon>
                                                </v-btn>
                                            </v-col>
                                            <v-col>
                                                <v-btn fab dark small color="red lighten-1 is-disabled"
                                                       v-on:click="rmLocalItem('slider', index)"
                                                >
                                                    <v-icon>mdi-delete-outline</v-icon>
                                                </v-btn>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>

                                <v-card-title class="pa-0"><small>Контент</small></v-card-title>
                                <v-row>
                                    <v-col cols="12" sm="9" class="pr-12 py-0">
                                        <v-text-field
                                            label="Заголовок"
                                            color="green"
                                            outlined
                                            hide-details
                                            class="mb-6"
                                            :disabled="item.type === 'banner'"
                                            v-model="item.content.title"
                                        ></v-text-field>

                                        <v-textarea
                                            label="Описание"
                                            color="green"
                                            outlined dense
                                            hide-details
                                            :disabled="item.type === 'banner'"
                                            v-model="item.content.subtitle"
                                        ></v-textarea>
                                    </v-col>

                                    <v-col cols="12" sm="3" class="media-box my-0">
                                        <v-hover>
                                            <template v-slot:default="{ hover }">
                                                <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                                       elevation="4"
                                                       color="#FAFAFA"
                                                       v-on:click="setMedia(item.content, 'img', -1)"
                                                >
                                                    <template v-if="item.content.img">
                                                        <v-img :src="item.content.img"></v-img>
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
                                </v-row>
                            </v-container>
                        </v-card>
                    </draggable>
                </v-col>
            </v-row>
        </template>
        <template v-else-if="tabs.selected === 1">
            <div class="b-steps">
                <div class="b-colum ">
                    <div class="groups-list groups-list--chose">
                        <div class="groups-list__wrap">
                            <div class="groups-list__items"
                                 v-for="group in groups"
                                 :key="group.id"
                            >
                                <div class="groups-list__items-head">
                                    <div class="groups-list__name">
                                        <span class="items-head__title">{{ group.content.ru.title }}</span>
                                    </div>
                                </div>

                                <div class="groups-list__items-wrap">
                                    <div class="groups-list__items-item"
                                         v-for="item in group.subs"
                                         :key="item.id"
                                         v-if="item.status"
                                    >
                                        <v-checkbox
                                            class="ma-0"
                                            v-model="value.data.filter"
                                            :value="item.id"
                                            color="success"
                                            hide-details
                                        ></v-checkbox>
                                        <div class="groups-list__box">
                                            <span>{{ item.content.ru.title }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-else-if="tabs.selected === 2">
            <v-row>
                <v-col class="pt-0">
                    <v-row>
                        <v-col class="mt-1 mb-4">
                            <v-text-field
                                label="Заголовок блока"
                                color="green"
                                outlined
                                hide-details
                                v-model="value.content[local].data.collection.title"
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-card class="mt-0 pt-0 mb-10"
                            v-for="(item, index) in value.content[local].data.collection.items"
                            :key="item.id"
                    >
                        <v-container class="pa-8">
                            <v-row>
                                <v-col cols="12" sm="9" class="pr-12 py-0">
                                    <v-row>
                                        <v-col class="pt-0">
                                            <v-text-field
                                                label="Заголовок"
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
                                                v-model="item.desc"
                                                rows="3"
                                            ></v-textarea>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col sm="6" class="pb-0">
                                            <v-text-field
                                                label="Текст ссылки"
                                                color="green"
                                                outlined dense
                                                hide-details
                                                v-model="item.link.name"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col sm="6" class="pb-0">
                                            <v-text-field
                                                label="Ссылка"
                                                color="green"
                                                outlined dense
                                                hide-details
                                                v-model="item.link.url"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-col>

                                <v-col cols="12" sm="3" class="media-box my-0">
                                    <v-hover>
                                        <template v-slot:default="{ hover }">
                                            <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                                   elevation="4"
                                                   color="#FAFAFA"
                                                   v-on:click="setMedia(item, 'img', -1)"
                                            >
                                                <template v-if="item.img">
                                                    <v-img :src="item.img"></v-img>
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
                            </v-row>
                        </v-container>
                    </v-card>
                </v-col>
            </v-row>
        </template>
        <template v-else-if="tabs.selected === 3">
            <v-row>
                <v-col class="pt-0">
                    <v-row>
                        <v-col class="mt-1 mb-0">
                            <v-text-field
                                label="Заголовок блока"
                                color="green"
                                outlined
                                hide-details
                                v-model="value.content[local].data.advantages_title"
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-col cols="7" class="pb-0">
                        <v-btn class="mb-2" text
                               v-on:click="addLocalItem('advantages_items')"
                        >
                            <v-icon left>
                                mdi-playlist-plus
                            </v-icon>
                            Блок
                        </v-btn>
                    </v-col>

                    <draggable class="wrap-draggable"
                               handle=".move-shape-btn"
                               v-model="value.content[local].data.advantages_items"
                               v-bind="options"
                    >
                        <v-card class="mt-0 pt-0 mb-10"
                                v-for="(item, index) in value.content[local].data.advantages_items"
                                :key="item.id"
                        >
                            <v-container class="pa-8">
                                <v-row>
                                    <v-col cols="12" sm="8" class="pr-12 py-0">
                                        <v-textarea
                                            label="Описание"
                                            color="green"
                                            outlined
                                            hide-details
                                            class="mb-6"
                                            v-model="item.name"
                                        ></v-textarea>
                                        <v-text-field
                                            label="Ссылка"
                                            color="green"
                                            outlined
                                            hide-details
                                            v-model="item.link"
                                        ></v-text-field>
                                    </v-col>

                                    <v-col cols="12" sm="3" class="media-box my-0">
                                        <v-hover>
                                            <template v-slot:default="{ hover }">
                                                <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                                       elevation="4"
                                                       color="#FAFAFA"
                                                       v-on:click="setMedia(item, 'img', -1)"
                                                >
                                                    <template v-if="item.img">
                                                        <v-img :src="item.img"></v-img>
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
                                        <v-row>
                                            <v-col class="pt-0">
                                                <v-btn fab dark small color="orange darken-1" class="move-shape-btn">
                                                    <v-icon>mdi-cursor-move</v-icon>
                                                </v-btn>
                                            </v-col>
                                            <v-col>
                                                <v-btn fab dark small color="red lighten-1 is-disabled"
                                                       v-on:click="rmLocalItem('advantages_items', index)"
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
                </v-col>
            </v-row>
        </template>
        <template v-else-if="tabs.selected === 4">
            <v-row>
                <v-col class="pt-0">
                    <v-row>
                        <v-col class="mt-1 mb-0">
                            <v-text-field
                                label="Заголовок блока"
                                color="green"
                                outlined
                                hide-details
                                v-model="value.content[local].data.partners"
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-col cols="7" class="pb-0">
                        <v-btn class="mb-2" text
                               v-on:click="addPartner"
                        >
                            <v-icon left>
                                mdi-playlist-plus
                            </v-icon>
                            Партнер
                        </v-btn>
                    </v-col>

                    <draggable class="wrap-draggable"
                               handle=".move-shape-btn"
                               v-model="value.data.partners"
                               v-bind="options"
                    >
                        <v-card class="mt-0 pt-0 mb-10"
                                v-for="(item, index) in value.data.partners"
                                :key="item.id"
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
                                                       v-on:click="setMedia(item, 'img', -1)"
                                                >
                                                    <template v-if="item.img">
                                                        <v-img :src="item.img"></v-img>
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
                                        <v-row>
                                            <v-col class="pt-0">
                                                <v-btn fab dark small color="orange darken-1" class="move-shape-btn">
                                                    <v-icon>mdi-cursor-move</v-icon>
                                                </v-btn>
                                            </v-col>
                                            <v-col>
                                                <v-btn fab dark small color="red lighten-1 is-disabled"
                                                       v-on:click="rmPartner(index)"
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
                </v-col>
            </v-row>
        </template>

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
                },
                tabs: {
                    selected: 0,
                    items: ['Слайдер', 'Фильтр', 'Коллекции', 'Преимущества', 'Партнеры']
                },
                buffer: {
                    content: {}
                }
            }
        },
        computed: {
            otherLang: function () {
                return this.langs.filter(item => {
                    return item.id !== this.select;
                })
            },
            rootCatalog: function() {
                return this.$store.getters.storeData.root_catalog;
            },
            groups: function () {
                let groups = this.$store.getters.storeData.data.groups;

                return groups.filter(item => {
                    return item.status && item.subs.length && (item.categories_id === this.other || (this.rootCatalog && item.categories_id === this.rootCatalog.id));
                })
            }
        },
        methods: {
            addPartner: function() {
                this.value.data.partners.unshift({
                    id: +new Date(),
                    name: '',
                    img: '',
                    link: ''
                });
            },
            rmPartner: function(index) {
                this.value.data.partners.splice(index, 1);
            },
            addLocalItem: function(key) {
                this.langs.forEach(lang => {
                    let data = null;

                    switch (key) {
                        case 'slider':
                            data = {
                                id: +new Date(),
                                type: null,
                                align: null,
                                content: {
                                    img: '',
                                    title: '',
                                    subtitle: '',
                                    btn: {
                                        name: '',
                                        link: '',
                                        ico: '',
                                        target: ''
                                    }
                                }
                            };
                            break;
                        case 'advantages_items':
                            data = {
                                id: +new Date(),
                                name: '',
                                img: '',
                                link: ''
                            };
                            break;
                    }
                    this.value.content[lang.local].data[key].unshift(data);
                })
            },
            rmLocalItem: function(key, index) {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data[key].splice(index, 1);
                })
            },
            importContent: function (local) {
                if (!this.buffer.content[this.local]) {
                    this.buffer.content[this.local] = JSON.parse(JSON.stringify( this.value.content[this.local].data ));
                }
                this.value.content[this.local].data = JSON.parse(JSON.stringify( this.value.content[local].data ));
            },
            resetImport: function () {
                this.value.content[this.local].data = JSON.parse(JSON.stringify( this.buffer.content[this.local] ));
                this.buffer.content[this.local] = null;
            },
            checkImportContent: function () {
                return !!this.buffer.content[this.local];
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
                if (!this.value.data.filter.length) {
                    this.$emit('update:tabSelect', 1);
                    this.tabs.selected = 1;

                    this.$emit('update:alert', {
                        type: 'warning',
                        text: 'Необходимо выбрать хотя бы одну группу товаров'
                    });

                    return false;
                }

                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local,
                        lang = this.langs[i].id,
                        slider = this.value.content[local].data.slider,
                        collection = this.value.content[local].data.collection,
                        advantages = {
                            title: this.value.content[local].data.advantages_title,
                            items: this.value.content[local].data.advantages_items
                        };

                    if (!slider.length) {
                        this.$emit('update:tabSelect', 1);
                        this.$emit('update:select', lang);
                        this.tabs.selected = 0;

                        if (this.local === local) {
                            this.$emit('update:alert', {
                                type: 'warning',
                                text: 'Необходимо добавить хотя бы один слайд'
                            });
                        }

                        return false;
                    }

                    for (let i = 0; i < slider.length; ++i) {
                        let item = slider[i],
                            result = true;

                        if ((item.type === 'banner' || !item.type) && (!item.content.img || !item.content.btn.target || !item.content.btn.link)) {
                            result = false;
                        }else if (item.type !== 'banner' && (!item.align || !item.content.img || !item.content.title)) {
                            result = false;
                        }

                        if (!result) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', lang);
                            this.tabs.selected = 0;

                            if (this.local === local) {
                                this.$emit('update:alert', {
                                    type: 'warning',
                                    text: 'Необходимо заполнить <b>все активные поля</b>'
                                });
                            }

                            return false;
                        }
                    }

                    if (!collection.title) {
                        this.$emit('update:tabSelect', 1);
                        this.$emit('update:select', lang);
                        this.tabs.selected = 2;

                        if (this.local === local) {
                            this.$emit('update:alert', {
                                type: 'warning',
                                text: 'Необходимо заполнить <b>все активные поля</b>'
                            });
                        }

                        return false;
                    }

                    for (let i = 0; i < collection.items.length; ++i) {
                        let item = collection.items[i];

                        if (!item.title || !item.desc || !item.link.name || !item.link.url || !item.img) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', lang);
                            this.tabs.selected = 2;

                            if (this.local === local) {
                                this.$emit('update:alert', {
                                    type: 'warning',
                                    text: 'Необходимо заполнить <b>все активные поля</b>'
                                });
                            }

                            return false;
                        }
                    }

                    if (!advantages.title) {
                        this.$emit('update:tabSelect', 1);
                        this.$emit('update:select', lang);
                        this.tabs.selected = 3;

                        if (this.local === local) {
                            this.$emit('update:alert', {
                                type: 'warning',
                                text: 'Необходимо заполнить <b>все активные поля</b>'
                            });
                        }

                        return false;
                    }

                    for (let i = 0; i < advantages.items.length; ++i) {
                        let item = advantages.items[i];

                        if (!item.name || !item.img || !item.link.link) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', lang);
                            this.tabs.selected = 3;

                            if (this.local === local) {
                                this.$emit('update:alert', {
                                    type: 'warning',
                                    text: 'Необходимо заполнить <b>все активные поля</b>'
                                });
                            }

                            return false;
                        }
                    }

                    if (!this.value.content[local].data.partners) {
                        this.$emit('update:tabSelect', 1);
                        this.$emit('update:select', lang);
                        this.tabs.selected = 4;

                        if (this.local === local) {
                            this.$emit('update:alert', {
                                type: 'warning',
                                text: 'Необходимо заполнить заголовок блока'
                            });
                        }

                        return false;
                    }
                }

                for (let i = 0; i < this.value.data.partners.length; ++i) {
                    let item = this.value.data.partners[i];

                    if (!item.name || !item.link || !item.img) {
                        this.$emit('update:tabSelect', 1);
                        this.tabs.selected = 4;

                        this.$emit('update:alert', {
                            type: 'warning',
                            text: 'Необходимо заполнить <b>все активные поля</b>'
                        });

                        return false;
                    }
                }

                return true
            }
        }
    }
</script>
