<template>
    <v-card>
        <v-card-title class="py-0 table-header__btn is-copy-control">
            <v-sheet style="position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded b-user-info__square"
                elevation="5"
            >
                <v-icon class="theme--dark" style="font-size: 32px;">
                    mdi-unity
                </v-icon>

                <v-tooltip
                    top
                >
                    <template v-slot:activator="{ on }">
                        <v-icon
                            :disabled="Boolean(select)"
                            v-on="on"
                            v-on:click="$emit('update:formState', true);"
                        >
                            mdi-plus
                        </v-icon>
                    </template>
                    <span>Создать продукт</span>
                </v-tooltip>
            </v-sheet>
            <span class="mb-6 font-weight-regular user-info__title">Управление продуктами</span>
            <v-spacer></v-spacer>
            <transition name="fade" mode="out-in">
                <div class="d-flex is-disabled" transition="fab-transition" v-if="select"
                     :disabled="alert.type === 'loading'"
                >
                    <v-tooltip top>
                        <template v-slot:activator="{ on, attrs }">
                            <v-icon
                                v-bind="attrs"
                                v-on="on"
                                v-on:click="copyItem"
                            >
                                mdi-content-copy
                            </v-icon>
                        </template>
                        <span>Копировать</span>
                    </v-tooltip>
                    <div class="mx-2"></div>
                    <v-tooltip top>
                        <template v-slot:activator="{ on, attrs }">
                            <v-icon
                                v-bind="attrs"
                                v-on="on"
                                v-on:click="$emit('update:formState', true)"
                            >
                                mdi-pencil
                            </v-icon>
                        </template>
                        <span>Редактировать</span>
                    </v-tooltip>
                    <div class="mx-2"></div>
                    <v-tooltip top>
                        <template v-slot:activator="{ on, attrs }">
                            <v-icon
                                v-bind="attrs"
                                v-on="on"
                                v-on:click="$emit('confirm', $event, {type:'deleteProduct', action: deleteItem})"
                            >
                                mdi-delete
                            </v-icon>
                        </template>
                        <span>Удалить</span>
                    </v-tooltip>
                    <div class="mx-2"></div>
                </div>
            </transition>

        </v-card-title>
        <div
            style="width:100%;
                   height:400px;
                   display: flex;
                   justify-content: center;
                   align-items: center;"
            v-if="!list.length"
        >
            Нет ни одного продукта
        </div>
        <v-simple-table
            v-else
            class="b-table b-table-categories"
            :fixed-header="true"
            style='overflow-x: hidden;padding: 0 16px 16px 16px;'
        >
            <thead>
                <tr class="b-tr">
                    <th class="b-td green--text">
                        ID
                    </th>
                    <th class="b-td text-center green--text">
                        URL
                    </th>
                    <th class="b-td green--text">
                        Продукт
                    </th>
                    <th class="b-td green--text">
                        Обновление
                    </th>
                    <th class="b-td green--text">
                        Статус
                    </th>
                    <th class="b-td text-center green--text">
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr class="b-tr"
                    :class="{'green lighten-3': select === item.id}"
                    v-for="item in list"
                    :key="item.id"
                >
                    <td class="b-td text-left">{{ item.id }}</td>
                    <td class="b-td" style="text-align: center; padding-top: 0!important;padding-bottom: 0!important;">
                        <v-menu
                            bottom
                            right
                            offset-y
                            transition="scale-transition"
                        >
                            <template v-slot:activator="{ attrs, on }">
                                <v-btn
                                    text
                                    icon
                                    v-bind="attrs"
                                    v-on="on"
                                    :disabled="!item.slug"
                                >
                                    <v-icon>mdi-share-variant-outline</v-icon>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item>
                                    <v-list-item-title>
                                        <a :href="item.url" target="blank">{{ item.url }}</a>
                                    </v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </td>
                    <td class="b-td text-left">
                        <v-row>
                            <v-col class="d-flex flex-row align-center py-0">
                                <v-avatar class="mr-4"
                                          size="42px"
                                          v-if="item.images.base.length"
                                >
                                    <img
                                        alt="Avatar"
                                        :src="item.images.base[0].source"
                                    >
                                </v-avatar>
                                <span>
                                    {{ item.content.ru.title }}
                                </span>
                            </v-col>
                        </v-row>
                    </td>
                    <td class="b-td text-left">
                        {{ item.updated_at }}
                    </td>
                    <td class="b-td text-left">
                        <div tabindex="-1" class="pa-0 v-list-item theme--light">
                            <div class="v-list-item__content">
                                <div class="v-list-item__title">
                                    {{ item.status ? 'опубликовано' : 'черновик' }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="b-td is-disabled" style="text-align: right; padding-top: 0!important;padding-bottom: 0!important;"
                        :disabled="alert.type === 'loading'"
                    >
                        <v-tooltip top>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn icon
                                       v-bind="attrs"
                                       v-on="on"
                                       v-on:click="selectedId($event, item.id)"
                                >
                                    <v-icon color="grey lighten-1">mdi-dots-vertical</v-icon>
                                </v-btn>
                            </template>
                            <span>{{select === item.id ? 'Отменить' : 'Выбрать'}}</span>
                        </v-tooltip>
                    </td>
                </tr>
            </tbody>
        </v-simple-table>
    </v-card>
</template>

<script>
    export default {
        props: ['select', 'formState', 'items', 'edit', 'edt', 'langs', 'alert'],
        data: function() {
            return {
                location: window.location.origin,
            }
        },
        computed: {
            list: function () {
                return this.items;
            }
        },
        methods: {
            selectedId: function(e, item){
                this.$emit('update:select', this.select === item ? null : item)
            },
            copyItem: function() {
                this.$emit('update:alert', {
                    type: 'loading',
                    text: 'Копирование продукта...'
                });

                axios.post(window.location.pathname +'/products/copy', {
                    _token: window._token,
                    id: this.select
                })
                .then((response) => {
                    this.$store.commit('addProducts', response.data);

                    this.$emit('update:select', null);
                    this.$emit('update:alert', {
                        type: 'success',
                        text: 'Продукт успешно скопирован'
                    });
                })
                .catch((error)=> {
                    let data = error.response.data,
                        text = 'Неизвестная ошибка, повторите попытку';

                    if (data.errors) {
                        text = Object.values(data.errors)[0][0];
                    } else if(data.message) {
                        text = data.message;
                    }

                    this.$emit('update:alert', {
                        type: 'error',
                        text: text
                    });
                })
            },
            deleteItem: function(){
                this.$emit('update:alert', {
                    type: 'loading',
                    text: 'Удаление продукта...'
                });

                axios.post('/home/products/delete', {
                    _token: window._token,
                    id: this.select
                })
                .then(() => {
                    this.$store.commit('rmProducts', this.select);
                    this.$emit('update:select', null);

                    this.$emit('update:alert', {
                        type: 'success',
                        text: 'Продукт успешно удален'
                    });
                })
                .catch(() => {
                    this.$emit('update:alert', {
                        type: 'error',
                        text: 'Неизвестная ошибка, повторите попытку'
                    });
                })
            },
        },
    }
</script>
