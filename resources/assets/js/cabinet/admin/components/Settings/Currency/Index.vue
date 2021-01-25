<template>
    <v-col>
        <v-snackbar
            v-model="alert.show"
            absolute top right
            elevation="24"
            :color="alertColor"
            :timeout="alert.option.type === 'loading' ? -1 : 4000"
        >
            {{ alert.option.text }}

            <template v-slot:action="{ attrs }">
                <v-btn
                    :loading="alert.option.type === 'loading'"
                    color="white"
                    text
                    v-bind="attrs"
                    @click="alert.show = false"
                >
                    Закрыть
                </v-btn>
            </template>
        </v-snackbar>

        <v-container
            fluid
            tag="section"
        >
            <list
                :list="list"
                :values="values"
                :select.sync="selected"
                :formState.sync="formDialog"
                :edit="edit"
                :edt.sync="edt"
                :langs="langs"
                :alert.sync="alert.option"
                v-on:confirm="$root.confirmAction"
            >
            </list>
        </v-container>

        <editor
            :formDialog.sync="formDialog"
            :edit.sync="edit"
            :selected.sync="selected"
            :edt.sync="edt"
            :components="components"
        >
        </editor>
    </v-col>
</template>

<script>
    import List from './List.vue'
    import Editor from './Editor.vue'

    export default {
        props: ['chosen'],
        components: {
            list: List,
            editor: Editor
        },
        data: function() {
            return {
                alert: {
                    show: false,
                    option: {
                        type: null,
                        text: null
                    }
                },
                list: this.$store.getters.currencyData.list,
                values: this.$store.getters.currencyData.values,
                selected: null,
                formDialog: false,
                edit: {},
                edt: false,
                loading: false,
                langs: this.$store.state.data.langs,
                components: [
                    {
                        c: 'currency-base',
                        t: 'осн. данные',
                        o: {
                            disabled: {
                                lang: true,
                                status: true
                            }
                        }
                    },{
                        c: 'currency-info',
                        t: 'локализация',
                        o: {
                            disabled: {
                                status: true
                            },
                        }
                    }
                ],
            }
        },
        watch: {
            selected: function(a) {
                if (a) {
                    for( let i = 0; i < this.list.length; i++){
                        let item = this.list[i];
                        if(item.id === a){
                            this.edit = JSON.parse(JSON.stringify(item));
                            break;
                        }
                    }
                    setTimeout(()=>{
                        this.edt = false
                    },100)
                }else{
                    this.edit = {};
                    setTimeout(()=>{
                        this.edt = false
                    },100)
                }
            },
            'alert.option': {
                deep: true,
                handler: function() {
                    this.alert.show = true;
                }
            }
        },
        computed: {
            alertColor: function () {
                switch (this.alert.option.type) {
                    case 'loading':
                        return 'blue darken-1';
                    default:
                        return this.alert.option.type;
                }
            }
        },
        methods: {
            save: function () {
                if ( this.valid(null) ) {
                    let path = window.location.pathname,
                        url = path +'/currency/create';

                    this.loading = true;

                    axios.post(url, {
                        _token: window._token,
                        data: this.edit
                    })
                    .then(() => {

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
            }
        }
    }
</script>
