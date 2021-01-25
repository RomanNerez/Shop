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
                :items="list"
                :select.sync="selected"
                :formState.sync="formDialog"
                :edit="edit"
                :edt.sync="edt"
                :langs="langs"
                :alert.sync="alert.option"
                v-on:confirm="$root.confirmAction"
            >
            </list>

            <editor
                :formDialog.sync="formDialog"
                :edit.sync="edit"
                :selected.sync="selected"
                :list="list"
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
                        c: 'create-base',
                        t: 'осн. данные'
                    },{
                        c: 'create-meta',
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
            list: function() {
                return this.items;
            },
            alertColor: function () {
                switch (this.alert.option.type) {
                    case 'loading':
                        return 'blue darken-1';
                    default:
                        return this.alert.option.type;
                }
            }
        }
    }
</script>
