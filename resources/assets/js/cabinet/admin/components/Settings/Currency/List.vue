<template>
    <v-card>
        <v-card-title class="py-0 table-header__btn">
            <v-sheet style="position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded b-user-info__square"
                elevation="5"
            >
                <v-icon class="theme--dark" style="font-size: 32px;">
                    mdi-currency-usd
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
                    <span>Добавить валюту</span>
                </v-tooltip>
            </v-sheet>
            <span class="mb-6 font-weight-regular user-info__title">Доступные валюты и курсы</span>
            <v-spacer></v-spacer>
            <transition name="fade" mode="out-in">
                <div class="d-flex is-disabled" transition="fab-transition" v-if="select"
                     :disabled="alert.type === 'loading'"
                >
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
                        <span>Редактировать валюту</span>
                    </v-tooltip>

                    <div class="mx-2"></div>
                    <v-tooltip top>
                        <template v-slot:activator="{ on, attrs }">
                            <v-icon
                                v-bind="attrs"
                                v-on="on"
                                v-on:click="$emit('confirm', $event, {type:'deleteCurrency', action: deleteCurrency})"
                            >
                                mdi-delete
                            </v-icon>
                        </template>
                        <span>Удалить валюту</span>
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
            v-if="!getList.length"
        >
            Список валют пуст
        </div>
        <template v-else>
            <v-row>
                <v-col>
                    <v-simple-table
                        class="b-table"
                        :fixed-header="true"
                        style='overflow-x: hidden;padding: 0 16px 16px 16px;'
                    >
                        <thead>
                        <tr class="b-tr">
                            <th class="b-td green--text">
                                Обозначение
                            </th>
                            <th class="b-td green--text">
                                Название
                            </th>
                            <th class="b-td green--text">
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr class="b-tr"
                                :class="{'green lighten-3': select === item.id}"
                                v-for="item in getList"
                                :key="item.id"
                            >
                                <td class="b-td">
                                    {{ item.code }} / {{ item.symbol }}
                                </td>
                                <td class="b-td">
                                    {{ item.content.ru.name }}
                                </td>
                                <td class="b-td is-disabled" style="text-align: right; padding-top: 0!important;padding-bottom: 0!important;"
                                    :disabled="alert.type === 'loading'"
                                >
                                    <v-tooltip top>
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-btn icon
                                                   v-bind="attrs"
                                                   v-on="on"
                                                   v-on:click="selectedId($event, null)"
                                                   v-if="select === item.id"
                                            >
                                                <v-icon color="green">mdi-dots-vertical</v-icon>
                                            </v-btn>
                                            <v-btn icon
                                                   v-bind="attrs"
                                                   v-on="on"
                                                   v-on:click="selectedId($event, item.id)"
                                                   v-else
                                            >
                                                <v-icon color="grey lighten-1">mdi-dots-vertical</v-icon>
                                            </v-btn>
                                        </template>
                                        <span>{{select === item.id ? 'Отменить':'Выбрать'}}</span>
                                    </v-tooltip>
                                </td>
                            </tr>
                        </tbody>
                    </v-simple-table>
                </v-col>
                <v-col>
                    <v-simple-table
                        class="b-table"
                        :fixed-header="true"
                        style='overflow-x: hidden;padding: 0 16px 16px 16px;'
                    >
                        <thead>
                        <tr class="b-tr">
                            <th class="b-td green--text">
                                ID
                            </th>
                            <th class="b-td green--text">
                                Валютная пара
                            </th>
                            <th class="b-td green--text">
                                Курс
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="b-tr"
                            v-for="(item, index) in getValues"
                            :key="item.id"
                        >
                            <td class="b-td">
                                {{ index + 1 }}
                            </td>
                            <td class="b-td">
                                {{ currencyScope(item.first) }} / {{ currencyScope(item.last) }}
                            </td>
                            <td class="b-td">
                                <v-row class="d-flex align-center is-disabled"
                                    :disabled="item.pending"
                                >
                                    <v-text-field class="py-3" style="max-width: 150px;" type="number" color="success"
                                                  v-on:input="setValue(index)"
                                                  v-model="item.value"
                                                  :loading="item.pending"
                                                  solo dense
                                                  hide-details="true"
                                    ></v-text-field>

                                    <v-tooltip top>
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-btn icon
                                                   v-bind="attrs"
                                                   v-on="on"
                                                   v-on:click="changeScope(index)"
                                            >
                                                <v-icon color="green">mdi-arrow-expand-horizontal</v-icon>
                                            </v-btn>
                                        </template>
                                        <span>Перевернуть пару</span>
                                    </v-tooltip>
                                </v-row>
                            </td>
                        </tr>
                        </tbody>
                    </v-simple-table>
                </v-col>
            </v-row>
        </template>
    </v-card>
</template>

<script>
    export default {
        props: ['select', 'formState', 'list', 'values', 'edit', 'edt', 'langs', 'alert'],
        data: function() {
            return {
                location: window.location.origin
            }
        },
        computed: {
            getList: function() {
                return this.list;
            },
            getValues: function() {
                return this.values;
            },
            getLocal: function () {
                return 'ru';
            }
        },
        methods: {
            changeScope: function(index) {
                let item = this.values[index],
                    first = item.first;

                item.first = item.last;
                item.last = first;

                this.updateValue( item );
            },
            setValue: function(index) {
                clearTimeout(window._bounce);
                window._bounce = setTimeout(() => {
                    let item = this.values[index];

                    if (item.value) {
                        this.updateValue(item);
                    }
                }, 1000);
            },
            updateValue: function(item) {
                item.pending = true;

                axios.post(window.location.pathname +'/currency/update', {
                    _token: window._token,
                    data: item
                })
                .catch(() => {
                    this.$emit('update:alert', {
                        type: 'error',
                        text: 'Неизвестная ошибка, повторите попытку'
                    });
                })
                .finally(() => {
                    item.pending = false;
                })
            },
            currencyScope: function(id) {
                return this.getList.find(item => item.id === id).code;
            },
            getString:function(str){
                let stringArr = str.split(" ", 4);
                return stringArr.join(' ')+' ...';
            },
            selectedId: function(e, item){
                if ( this.edt ) {
                    this.$emit('confirm', e, {
                        type: 'set_editor',
                        input: item,
                        action: this.emitId
                    });
                }else{
                    this.$emit('update:select', item)
                }
            },
            emitId:function(item){
                this.$emit('update:select', item)
            },
            deleteCurrency: function(){
                let data = new FormData();

                data.append('_token', window._token);
                data.append('id', this.select);

                this.$emit('update:alert', {
                    type: 'loading',
                    text: 'Удаление валюты и связанных пар...'
                });

                axios.post(window.location.pathname +'/currency/delete', data)
                    .then(response => {
                        this.$store.commit('rmCurrencyList', response.data);
                        this.$emit('update:select', null);

                        this.$emit('update:alert', {
                            type: 'success',
                            text: 'Валюта и связанные пары успешно удалены'
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
