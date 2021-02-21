<template>
    <v-col class="group-app py-0 full-height">
        <v-row>
            <v-col class="py-0">
                <v-btn
                    color="success"
                    :disabled="selected.section !== null"
                    v-on:click="setAction('attribute', 'create')"
                >
                    <v-icon left>
                        mdi-playlist-plus
                    </v-icon>
                    Группа
                </v-btn>
                <v-btn
                    color="success"
                    :disabled="selected.section !== 'attribute'"
                    v-on:click="setAction('attribute-list', 'create')"
                >
                    <v-icon left>
                        mdi-playlist-plus
                    </v-icon>
                    Вид
                </v-btn>
                <v-btn
                    color="#ff9800"
                    :disabled="selected.section === null"
                    v-on:click="setAction(selected.section, 'edit')"
                >
                    <v-icon left>
                        mdi-pencil
                    </v-icon>
                    Изменить
                </v-btn>
                <v-btn
                    color="red darken-1"
                    :loading="loading === 'remove'"
                    :disabled="selected.section === null || disabledDelete"
                    v-on:click="remove"
                >
                    <v-icon left>
                        mdi-delete-outline
                    </v-icon>
                    Удалить
                </v-btn>
                <v-btn
                    color="red blue darken-2"
                    :loading="loading === 'sort'"
                    :disabled="!sort.action"
                    v-on:click="saveSort"
                >
                    <v-icon left>
                        mdi-content-save-outline
                    </v-icon>
                    Сортировка
                </v-btn>
            </v-col>
        </v-row>

        <div class="groups-list">
            <draggable class="groups-list__wrap" group="cat"
                       handle=".groups-list__items-head"
                       v-model="groups"
                       v-bind="options"
                       @change="sort.action = true"
            >
                <div class="groups-list__items"
                     v-for="group in groups"
                     :key="group.id"
                     :class="{active: selected.id === group.id && selected.section === 'attribute'}"
                >
                    <div class="groups-list__items-head">
                        <div class="groups-list__status"
                            :class="{
                                'groups-list__status--active': group.status,
                            }"
                        ></div>

                        <div class="groups-list__name">
                            <span class="items-head__title">{{ group.content.ru.title }}</span>
                            <span class="items-head__count">({{ group.subs.length }})</span>
                        </div>

                        <v-tooltip top>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn icon
                                       v-bind="attrs"
                                       v-on="on"
                                       v-on:click="chose('attribute', group.id)"
                                >
                                    <v-icon color="#8b8b8b">mdi-dots-vertical</v-icon>
                                </v-btn>
                            </template>
                            <span>{{ selected.id === group.id ? 'Отменить' : 'Выбрать' }}</span>
                        </v-tooltip>
                    </div>

                    <draggable class="groups-list__items-wrap" group="group"
                               v-model="group.subs"
                               v-bind="options"
                               @change="sort.action = true"
                               :move="onMove"
                    >
                        <div class="groups-list__items-item"
                             v-for="item in group.subs"
                             :key="item.id"
                             :class="{active: selected.id === item.id && selected.section === 'attribute-list'}"
                        >
                            <div class="groups-list__box">
                                <span>{{ item.content.ru.title }}</span>
                                <div class="groups-list__box-params">
                                    <div class="groups-list__box-attr groups-list__box-attr--date">{{ item.updated_at }}</div>
                                    <div class="groups-list__box-attr groups-list__box-attr--status"
                                         :class="{
                                            'groups-list__box-attr--active': item.status,
                                         }"
                                    >{{ item.status | getStatus }}</div>
                                </div>
                            </div>
                            <v-tooltip top>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn icon
                                           v-bind="attrs"
                                           v-on="on"
                                           v-on:click="choseSubs(item)"
                                    >
                                        <v-icon color="#8b8b8b">mdi-dots-vertical</v-icon>
                                    </v-btn>
                                </template>
                                <span>{{ selected.id === item.id ? 'Отменить' : 'Выбрать' }}</span>
                            </v-tooltip>
                        </div>
                    </draggable>
                </div>
            </draggable>
        </div>
    </v-col>
</template>

<script>
    export default {
        props: ['items', 'selected', 'formState', 'action', 'edit', 'edt', 'langs', 'related', 'alert'],
        data() {
            return {
                loading: false,
                sort: {
                    action: false,
                    status: null
                },
                options: {
                    animation: 200,
                    disabled: false,
                    ghostClass: 'move-active'
                },
                subs: {
                    parent: null,
                    id: null,
                },
                mutations: {
                    attribute: {
                        remove: 'rmAttribute'
                    },
                    'attribute-list': {
                        remove: 'rmAttrList'
                    }
                },
            };
        },
        watch: {
            'sort.status': function () {
                if (this.sort.status) {
                    this.$emit('update:alert', {
                        type: 'warning',
                        text: 'Не возможно переместить! В этой группе уже присутвует запись с ключем: <b>"'+ this.sort.status.slug +'"</b>'
                    });
                    this.sort.status = null;
                }
            }
        },
        computed: {
            groups: {
                get() {
                    return this.items;
                },
                set(data) {
                    this.$store.commit('updateAttribute', {
                        data: data,
                        related: this.related
                    });
                }
            },
            selectedGroup: function() {
                if (this.selected.section === 'attribute') {
                    for (let i = 0; i < this.groups.length; i++) {
                        let group = this.groups[i];

                        if (group.id === this.selected.id) {
                            return group;
                        }
                    }
                }
                return false;
            },
            disabledDelete: function () {
                return Boolean(this.selectedGroup && this.selectedGroup.subs.length);
            },
            getMutation: function () {
                return this.mutations[this.selected.section];
            }
        },
        filters: {
            getStatus: function (value) {
                switch (value) {
                    case 0:
                        return 'черновик';
                    case 1:
                        return 'активно';
                }
            }
        },
        methods: {
            setAction: function(section, type) {
                this.$emit('update:action', {
                    section: section,
                    type: type
                });

                this.$emit('update:formState', true);
            },
            chose: function (section, id) {
                this.$emit('update:selected', {
                    section: this.selected.section === section && this.selected.id === id ? null : section,
                    id: this.selected.section === section && this.selected.id === id ? null : id
                })
            },
            choseSubs: function(item) {
                this.subs.parent = item.attribute_id;
                this.subs.id = item.id;

                this.chose('attribute-list', item.id);
            },
            remove: function (e) {
                this.$root.confirmAction(e, {
                    type: 'set_editor',
                    action: () => {
                        let path = window.location.pathname +'/'+ this.selected.section +'/delete';

                        this.loading = 'remove';

                        axios.post(path, {
                            _token: window._token,
                            id: this.selected.id
                        })
                        .then(response => {
                            response = response.data;

                            let payload = {
                                related: this.related
                            };

                            switch (this.selected.section) {
                                case 'attribute':
                                    payload.id = this.selected.id;
                                    break;
                                default:
                                    payload.id = this.subs.id;
                                    break;
                            }

                            this.$store.commit(this.getMutation.remove, payload);
                            this.$emit('update:selected', {
                                section: null,
                                id: null
                            })
                            if (response.instance === 'list') {
                                this.$store.commit('reloadProducts', {
                                    related: this.related,
                                    data: response.data
                                });
                            }
                        })
                        .catch(() => {
                            this.$emit('update:alert', {
                                type: 'error',
                                text: 'Неизвестная ошибка, повторите попытку'
                            });
                        })
                        .finally(() => {
                            this.loading = false;
                        })
                    }
                })
            },
            onMove: function(event) {
                let list = event.relatedContext.list,
                    item = event.draggedContext.element;

                for (let i = 0; i < list.length; i++) {
                    let target = list[i];

                    if ( target.slug === item.slug && target.id !== item.id ) {
                        this.sort.status = target;
                        return false;
                    }
                }
            },
            saveSort: function () {
                let path = window.location.pathname +'/attribute/sort';

                this.loading = 'sort';

                axios.post(path, {
                    _token: window._token,
                    data: this.groups
                })
                .then(() => {
                    this.sort.action = false;

                    this.$emit('update:alert', {
                        type: 'success',
                        text: 'Сортировка выполнена успешно'
                    });
                })
                .catch((error) => {
                    let msg = null;

                    if (error.response && error.response.data.message) {
                        msg = error.response.data.message;
                    }else{
                        msg = 'Неизвестная ошибка, повторите попытку';
                    }
                    this.$emit('update:alert', {
                        type: 'error',
                        text: msg
                    });
                })
                .finally(() => {
                    this.loading = false;
                })
            }
        }
    };
</script>
