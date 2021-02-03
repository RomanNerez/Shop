<template>
    <v-card>
        <v-card-title class="py-0 table-header__btn is-copy-control">
            <v-sheet style="pointer-events: none; position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded b-user-info__square"
                elevation="5"
            >
                <v-icon class="theme--dark" style="font-size: 32px;">
                    mdi-format-page-break
                </v-icon>
            </v-sheet>
            <span class="mb-6 font-weight-regular user-info__title">Управление страницами</span>
        </v-card-title>
        <div
            style="width:100%;
                   height:400px;
                   display: flex;
                   justify-content: center;
                   align-items: center;"
            v-if="!list.length"
        >
            Нет не одной страницы
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
                        Название
                    </th>
                    <th class="b-td green--text">
                        Дата изменения
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
                        {{ item.content[getLocal].title }}
                    </td>
                    <td class="b-td text-left">
                        {{ item.updated_at }}
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
                                    <v-icon color="green">mdi-pencil</v-icon>
                                </v-btn>
                            </template>
                            <span>Редактировать</span>
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
                list: this.items,
                location: window.location.origin,
            }
        },
        computed: {
            getLocal: function () {
                return 'ru';
            }
        },
        methods: {
            selectedId: function(e, item){
                if ( this.edt ) {
                    this.$emit('confirm', e, {
                        type: 'set_editor',
                        input: item,
                        action: this.emitId
                    });
                }else{
                    this.emitId(item);
                }

            },
            emitId:function(item){
                this.$emit('update:select', item);
                this.$emit('update:formState', true);
            }
        },
    }
</script>
