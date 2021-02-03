<template>
    <v-container class="pt-0 content-page">
        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0">Формы магнитов</v-card-title>

                <v-col cols="7" class="pb-0">
                    <v-btn class="mb-2" text
                           v-on:click="addItem('shape')"
                    >
                        <v-icon left>
                            mdi-playlist-plus
                        </v-icon>
                        Форма
                    </v-btn>
                </v-col>

                <v-card class="mt-0 py-0 mb-10"
                    v-if="value.content[local].data.shape.length"
                >
                    <v-container class="pa-8 pb-1">
                        <draggable class="wrap-draggable"
                                   handle=".move-shape-btn"
                                   v-model="getShape"
                                   v-bind="options"
                        >
                            <v-row
                                v-for="item in value.content[local].data.shape"
                                :key="item.val"
                            >
                                <v-col cols="12" sm="10" class="py-0">
                                    <v-text-field
                                        label="Значение"
                                        color="green"
                                        outlined dense
                                        class="mb-0"
                                        v-model="item.name"
                                    ></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="1" class="py-0">
                                    <v-btn fab dark small color="orange darken-1" class="move-shape-btn">
                                        <v-icon>mdi-cursor-move</v-icon>
                                    </v-btn>
                                </v-col>

                                <v-col cols="12" sm="1" class="py-0">
                                    <v-btn fab dark small color="red lighten-1"
                                        v-on:click="rmItem('shape', item.val)"
                                    >
                                        <v-icon>mdi-delete-outline</v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </draggable>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>

        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0">Толщина магнитов</v-card-title>

                <v-col cols="7" class="pb-0">
                    <v-btn class="mb-2" text
                           v-on:click="addItem('depth')"
                    >
                        <v-icon left>
                            mdi-playlist-plus
                        </v-icon>
                        Толщина
                    </v-btn>
                </v-col>

                <v-card class="mt-0 py-0 mb-10"
                        v-if="value.content[local].data.depth.length"
                >
                    <v-container class="pa-8 pb-1">
                        <draggable class="wrap-draggable"
                                   handle=".move-shape-btn"
                                   v-model="getDepth"
                                   v-bind="options"
                        >
                            <v-row
                                v-for="item in value.content[local].data.depth"
                                :key="item.val"
                            >
                                <v-col cols="12" sm="10" class="py-0">
                                    <v-text-field
                                        label="Значение"
                                        color="green"
                                        outlined dense
                                        class="mb-0"
                                        v-model="item.name"
                                    ></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="1" class="py-0">
                                    <v-btn fab dark small color="orange darken-1" class="move-shape-btn">
                                        <v-icon>mdi-cursor-move</v-icon>
                                    </v-btn>
                                </v-col>

                                <v-col cols="12" sm="1" class="py-0">
                                    <v-btn fab dark small color="red lighten-1"
                                           v-on:click="rmItem('depth', item.val)"
                                    >
                                        <v-icon>mdi-delete-outline</v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </draggable>
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
                options: {
                    animation: 200,
                    disabled: false
                }
            }
        },
        watch: {
            local: function (a, b) {
                this.value.content[a].data.shape.forEach((item, index) => {
                    if (!item.name) {
                        this.value.content[a].data.shape[index].name = this.value.content[b].data.shape[index].name;
                    }
                })
                this.value.content[a].data.depth.forEach((item, index) => {
                    if (!item.name) {
                        this.value.content[a].data.depth[index].name = this.value.content[b].data.depth[index].name;
                    }
                })
            }
        },
        computed: {
            getShape: {
                get: function() {
                    return this.value.content[this.local].data.shape;
                },
                set: function (val) {
                    this.value.content[this.local].data.shape = val;
                }
            },
            getDepth: {
                get: function() {
                    return this.value.content[this.local].data.depth;
                },
                set: function (val) {
                    this.value.content[this.local].data.depth = val;
                }
            }
        },
        methods: {
            addItem: function(key) {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data[key].unshift({
                        name: '',
                        val: +new Date()
                    })
                })
            },
            rmItem: function(key, val) {
                this.langs.forEach(lang => {
                    this.value.content[lang.local].data[key].forEach((item, index) => {
                        if (item.val === val) {
                            this.value.content[lang.local].data[key].splice(index, 1);
                        }
                    })
                })
            },
            validate: function () {
                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local,
                        lang = this.langs[i].id;

                    for (let i = 0; i < this.value.content[local].data.shape.length; ++i) {
                        let item = this.value.content[local].data.shape[i];

                        if (!item.name) {
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

                    for (let i = 0; i < this.value.content[local].data.depth.length; ++i) {
                        let item = this.value.content[local].data.depth[i];

                        if (!item.name) {
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
