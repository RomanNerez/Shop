<template>
    <v-container class="pt-0">
        <v-row>
            <v-col cols="12" class="py-0 px-6">
                <div class="custom-row">
                    <div class="media-box">
                        <v-hover>
                            <template v-slot:default="{ hover }">
                                <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                       elevation="4"
                                       color="#FAFAFA"
                                       v-on:click="setMedia(value.data.items, 0, 1)"
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
                </div>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12">
                <draggable class="wrap-media" style="flex-wrap: wrap"
                           v-model="value.data.items"
                           v-bind="options"
                >
                    <div class="media-box"
                         v-for="(item, index) in value.data.items"
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
                                    v-on:click="rmMedia(value.data.items, index)"
                                >
                                    mdi-minus
                                </v-icon>
                            </template>
                            <v-hover>
                                <template v-slot:default="{ hover }">
                                    <v-btn class="ma-0 pa-0 overflow-hidden set-media-item"
                                           elevation="4"
                                           color="#FAFAFA"
                                           v-on:click="setMedia(value.data.items, index, 0)"
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
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        props: ['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
        data: function () {
            return {
                options: {
                    animation: 200,
                    disabled: false
                }
            }
        },
        methods: {
            selectFile: function () {
                window.open('/laravel-filemanager?type=image', 'FileManager', 'width=1280,height=700');
                return new Promise(resolve => {
                    window.SetUrl = (items) => {
                        resolve(items);
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
            rmMedia: function(current, index) {
                current.splice(index, 1);
            },
            validate: function () {
                return {
                    result: true
                }
            }
        }
    }
</script>
