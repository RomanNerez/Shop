<template>
    <v-container class="pt-0">
        <v-card-title class="pa-0">Основные изображения</v-card-title>

        <div class="custom-row">
            <div class="media-box" v-if="value.images.base.length < 6">
                <v-hover>
                    <template v-slot:default="{ hover }">
                        <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                               elevation="4"
                               color="#FAFAFA"
                               v-on:click="setMedia(value.images.base, 0, 1)"
                        >
                            <v-sheet
                                class="d-flex align-center justify-center"
                                color="#FAFAFA"
                            >
                                <v-icon size="50" color="#BDBDBD">
                                    mdi-image-size-select-large
                                </v-icon>
                            </v-sheet>

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
            </div>

            <draggable class="wrap-media"
                       v-model="value.images.base"
                       v-bind="options"
            >
                <div class="media-box"
                       v-for="(item, index) in value.images.base"
                       :key="item.id"
                >
                    <v-badge
                        class="set-media-rm"
                        overlap
                        color="error"
                        :value="!!item.source"
                    >
                        <template v-slot:badge>
                            <v-icon
                                v-on:click="rmMedia(value.images.base, index)"
                            >
                                mdi-minus
                            </v-icon>
                        </template>
                        <v-hover>
                            <template v-slot:default="{ hover }">
                                <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                       elevation="4"
                                       color="#FAFAFA"
                                       v-on:click="setMedia(value.images.base, index, 0)"
                                >
                                    <v-img
                                        :src="item.source"
                                    ></v-img>

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
                    </v-badge>
                </div>
            </draggable>
        </div>
        <v-row v-if="variables.check.data">
            <v-col class="pt-7">
                <v-card-title class="pa-0">Изображения атрибутов</v-card-title>

                <v-card class="mb-0 mt-3">
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
                                    Изображения
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="b-tr"
                                v-for="(item, i) in value.images.attrs"
                            >
                                <td class="b-td">{{ (i + 1) }}</td>
                                <td class="b-td">{{ nameAttrs(item.keys) }}</td>
                                <td class="b-td">
                                    <div class="custom-row custom-row--attr-media">
                                        <div class="media-box" v-if="item.value.length < 6">
                                            <v-hover>
                                                <template v-slot:default="{ hover }">
                                                    <v-btn class="ma-0 pa-0 overflow-hidden set-media-item" fab
                                                           elevation="4"
                                                           color="#FAFAFA"
                                                           v-on:click="setMedia(item.value, 0, 1)"
                                                    >
                                                        <v-sheet
                                                            class="d-flex align-center justify-center"
                                                            color="#FAFAFA"
                                                        >
                                                            <v-icon color="#BDBDBD" medium>
                                                                mdi-image-size-select-large
                                                            </v-icon>
                                                        </v-sheet>

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
                                        </div>

                                        <draggable class="wrap-media"
                                                   v-model="item.value"
                                                   v-bind="options"
                                        >
                                            <div class="media-box"
                                                 v-for="(attrs, index) in item.value"
                                                 :key="attrs.id"
                                            >
                                                <v-badge
                                                    class="set-media-rm"
                                                    overlap
                                                    color="error"
                                                    :value="!!attrs.source"
                                                >
                                                    <template v-slot:badge>
                                                        <v-icon
                                                            v-on:click="rmMedia(item.value, index)"
                                                        >
                                                            mdi-minus
                                                        </v-icon>
                                                    </template>
                                                    <v-hover>
                                                        <template v-slot:default="{ hover }">
                                                            <v-btn class="ma-0 pa-0 overflow-hidden set-media-item" fab
                                                                   elevation="4"
                                                                   color="#FAFAFA"
                                                                   v-on:click="setMedia(item.value, index, 0)"
                                                            >
                                                                <v-img
                                                                    :src="attrs.source"
                                                                ></v-img>

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
                                                </v-badge>
                                            </div>
                                        </draggable>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </v-simple-table>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "SetMedia",
        props: ['value', 'local', 'status', 'langs', 'select', 'tabSelect', 'other', 'index'],
        data: function () {
            return {
                options: {
                    animation: 200,
                    disabled: false
                }
            }
        },
        computed: {
            variables: function () {
                return this.other;
            }
        },
        methods: {
            nameAttrs: function(keys) {
                return keys.map(item => {
                    item = this.variables.items.find(el => el.id === item);
                    return item.content.ru.title;
                }).join(' + ');
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
                })
            },
            rmMedia: function(current, index) {
                current.splice(index, 1);
            },
            validate: function () {
                if ( this.value.status && !this.value.images.base.length ) {
                    return {
                        result: false,
                        index: this.index,
                        alert: '<b>Установите</b> хотя бы одно <b>изображение</b> в блоке "Основные изображения" перед публикацией товара'
                    };
                }
                return {
                    result: true
                };
            }
        }
    }
</script>
