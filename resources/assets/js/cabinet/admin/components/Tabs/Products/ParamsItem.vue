<template>
    <v-container class="pt-0">
        <v-row>
            <v-col class="pt-0">
                <v-row>
                    <v-col cols="7" class="pb-0">
                        <v-btn class="mb-2" text
                               v-on:click="addGroup"
                        >
                            <v-icon left>
                                mdi-playlist-plus
                            </v-icon>
                            Группа характеристик
                        </v-btn>
                    </v-col>
                    <template v-if="variables.check.data">
                        <v-col cols="5" class="py-0">
                            <v-row>
                                <v-col cols="2" class="pa-0 d-flex align-center">
                                    <v-menu
                                        bottom
                                        right
                                        offset-y
                                        transition="scale-transition"
                                    >
                                        <template v-slot:activator="{ attrs, on }">
                                            <v-btn
                                                class="editor-option-btn"
                                                text
                                                icon
                                                v-bind="attrs"
                                                v-on="on"
                                            >
                                                <v-icon color="#000">mdi-format-align-bottom</v-icon>
                                            </v-btn>
                                        </template>
                                        <v-list dense>
                                            <v-list-item-group
                                                color="primary"
                                            >
                                                <v-list-item
                                                    v-for="item in varData"
                                                    v-on:click="setImport(item.index)"
                                                    :key="item.id"
                                                    :disabled="checkImport(item.index)"
                                                >
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            импорт из "{{ item.name }}"
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list-item-group>
                                        </v-list>
                                    </v-menu>
                                </v-col>
                                <v-col cols="10" class="py-0 pl-0">
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
                            </v-row>
                        </v-col>
                    </template>
                </v-row>

                <draggable class="params-wrap"
                           handle=".move-group-btn"
                           v-model="getParams"
                           v-bind="options"
                >
                    <v-card class="mt-0 pt-0 mb-10"
                            v-for="(group, index) in getParams"
                            :key="group.id"
                    >
                        <v-container class="pa-8 pb-0">
                            <v-row>
                                <v-col cols="10" class="py-0 pr-0">
                                    <v-text-field
                                        v-model.trim="group.title"
                                        label="Название группы характеристик"
                                        color="green"
                                        outlined
                                        dense
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="1" class="py-0 pr-0 text-right move-group-btn is-disabled"
                                       :disabled="getParams.length === 1"
                                >
                                    <v-btn fab dark small color="orange darken-1">
                                        <v-icon>mdi-cursor-move</v-icon>
                                    </v-btn>
                                </v-col>
                                <v-col cols="1" class="py-0 text-right is-disabled"
                                       :disabled="getParams.length === 1"
                                >
                                    <v-btn fab dark small color="red lighten-1"
                                           v-on:click="rmGroup(index)"
                                    >
                                        <v-icon>mdi-delete-outline</v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>

                            <v-btn class="mb-2" text
                                   v-on:click="addParam(index)"
                            >
                                <v-icon left>
                                    mdi-playlist-plus
                                </v-icon>
                                Характеристика
                            </v-btn>

                            <draggable class="params-wrap__items"
                                       handle=".move-param-btn"
                                       v-model="group.items"
                                       v-bind="options"
                            >
                                <v-row
                                    v-for="(item, i) in group.items"
                                    :key="item.id"
                                >
                                    <v-col cols="5" class="py-0">
                                        <v-text-field
                                            v-model.trim="item.name"
                                            label="Название характеристики"
                                            color="green"
                                            outlined dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="5" class="py-0 pr-0">
                                        <v-text-field
                                            v-model.trim="item.value"
                                            label="Значение характеристики"
                                            color="green"
                                            outlined dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="1" class="py-0 pr-0 text-right move-param-btn is-disabled"
                                           :disabled="group.items.length === 1"
                                    >
                                        <v-btn fab dark small color="orange darken-1">
                                            <v-icon>mdi-cursor-move</v-icon>
                                        </v-btn>
                                    </v-col>

                                    <v-col cols="1" class="py-0 text-right is-disabled"
                                           :disabled="group.items.length === 1"
                                    >
                                        <v-btn fab dark small color="red lighten-1"
                                               v-on:click="rmParam(index, i)"
                                        >
                                            <v-icon>mdi-delete-outline</v-icon>
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </draggable>
                        </v-container>
                    </v-card>
                </draggable>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "ParamsItem",
        props: ['value', 'local', 'status', 'langs', 'select', 'tabSelect', 'other', 'index'],
        data: function() {
            return {
                attribute: -1,
                options: {
                    animation: 200,
                    disabled: false
                }
            }
        },
        computed: {
            getParams: {
                get: function() {
                    let params = this.value.content[this.local].params;
                    return this.attribute >= 0 ? params.attrs[this.attribute].value : params.base;
                },
                set: function (val) {
                    let params = this.value.content[this.local].params;

                    if ( this.attribute >= 0 ) {
                        params.attrs[this.attribute].value = val;
                    }else{
                        params.base = val;
                    }
                }
            },
            variables: function () {
                return this.other;
            },
            varData: function () {
                if (!this.value.content[this.local].params.attrs[this.attribute]) {
                    this.attribute = -1;
                }
                return [
                    {
                        id: 0,
                        index: -1,
                        name: 'Без атрибутов'
                    },
                    ...this.value.content.ru.params.attrs.map((item, index) => {
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
            addGroup: function () {
                this.langs.forEach(lang => {
                    let params = this.value.content[lang.local].params,
                        data = null;

                    if (this.attribute >= 0) {
                        if (!params.attrs[this.attribute].value) {
                            params.attrs[this.attribute].value = [];
                        }
                        data = params.attrs[this.attribute].value;
                    }else{
                        data = params.base;
                    }

                    data.unshift({
                        id: +new Date(),
                        title: '',
                        items: [{
                            id: +new Date(),
                            name: '',
                            value: ''
                        }]
                    })
                })
            },
            rmGroup: function (index) {
                this.langs.forEach(lang => {
                    let params = this.value.content[lang.local].params,
                        data = this.attribute >= 0 ? params.attrs[this.attribute].value : params.base;

                    data.splice(index, 1);
                })
            },
            addParam: function (index) {
                this.langs.forEach(lang => {
                    let params = this.value.content[lang.local].params,
                        data = this.attribute >= 0 ? params.attrs[this.attribute].value : params.base;

                    if (!data[index].items) {
                        data[index].items = [];
                    }

                    data[index].items.unshift({
                        id: +new Date(),
                        name: '',
                        value: ''
                    })
                })
            },
            rmParam: function (group, index) {
                this.langs.forEach(lang => {
                    let params = this.value.content[lang.local].params,
                        data = this.attribute >= 0 ? params.attrs[this.attribute].value : params.base;

                    data[group].items.splice(index, 1);
                })
            },
            checkImport: function (index) {
                let params = this.value.content[this.local].params,
                    data = index >= 0 ? params.attrs[index].value : params.base;

                return !(!!data && this.attribute !== index && JSON.stringify(this.getParams) !== JSON.stringify(data));
            },
            setImport: function (index) {
                this.langs.forEach(lang => {
                    let params = this.value.content[lang.local].params,
                        data = index >= 0 ? params.attrs[index].value : params.base,
                        input = JSON.parse( JSON.stringify(data) );

                    if (this.attribute >= 0) {
                        params.attrs[this.attribute].value = input;
                    }else{
                        params.base = input;
                    }
                })
            },
            validate: function () {
                if (this.value.status) {
                    const groups = this.value.content[this.local].params.base;
                    for (let i = 0; i < groups.length; ++i) {
                        const group = groups[i];

                        if (group.title === '' || group.items.find(item => item.name === '' || item.value === '')) {
                            this.attribute = -1;
                            return {
                                result: false,
                                index: this.index,
                                alert: 'Заполните <b>все активные поля</b> созданных характеристик'
                            };
                        }
                    }
                    const attrs = this.value.content[this.local].params.attrs;
                    for (let i = 0; i < attrs.length; ++i) {
                        const attr = attrs[i];

                        if (attr.value) {
                            for (let ii = 0; ii < attr.value.length; ++ii) {
                                const value = attr.value[ii];

                                if (value.title === '' || value.items.find(item => item.name === '' || item.value === '')) {
                                    this.attribute = i;
                                    return {
                                        result: false,
                                        index: this.index,
                                        alert: 'Заполните <b>все активные поля</b> созданных характеристик'
                                    };
                                }
                            }
                        }
                    }
                }

                return {
                    result: true
                };
            }
        }
    }
</script>
