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
            v-if="chosen.categories"
        >
            <list
                :items="list"
                :select.sync="selected"
                :formState.sync="formDialog"
                :edit="edit"
                :edt.sync="edt"
                :langs="langs"
                :related="related"
                :alert.sync="alert.option"
                v-on:confirm="$root.confirmAction"
            >
            </list>

            <editor
                :formDialog.sync="formDialog"
                :edit.sync="edit"
                :selected.sync="selected"
                :parent="chosen.categories"
                :edt.sync="edt"
                :related="related"
                :available="available"
                :components="components"
            >
            </editor>
        </v-container>
    </v-col>
</template>

<script>
    import List from './List.vue'
    import Editor from './Editor.vue'

    export default {
        props: ['chosen', 'items', 'related', 'available'],
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
                selected: null,
                formDialog: false,
                edit: {},
                edt: false,
                langs: this.$store.state.data.langs,
                components: [
                    {
                        c: 'chose-attr',
                        t: 'атрибуты',
                        o: {
                            disabled: {
                                lang: true
                            }
                        }
                    },{
                        c: 'chose-groups',
                        t: 'группы',
                        o: {
                            disabled: {
                                lang: true
                            }
                        }
                    },{
                        c: 'price-count',
                        t: 'цена и количество',
                        o: {
                            disabled: {
                                lang: true
                            }
                        }
                    },{
                        c: 'set-media',
                        t: 'изображения',
                        o: {
                            disabled: {
                                lang: true
                            }
                        }
                    },{
                        c: 'content-item',
                        t: 'контент'
                    },{
                        c: 'params-item',
                        t: 'характеристики'
                    },{
                        c: 'option-item',
                        t: 'опции'
                    },{
                        c: 'meta-item',
                        t: 'meta данные'
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
            },
            list: function () {
                return this.items.filter(item => {
                    return item.categories_id === this.chosen.categories
                })
            }
        }
    }
</script>
