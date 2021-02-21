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
                list: this.$store.getters.contentData.data.pages,
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
                        c: 'service-content',
                        t: 'контент',
                        k: 'services'
                    },{
                        c: 'standing-content',
                        t: 'контент',
                        k: 'standing'
                    },{
                        c: 'vinyls-content',
                        t: 'контент',
                        k: 'vinyls'
                    },{
                        c: 'delivery-content',
                        t: 'контент',
                        k: 'delivery'
                    },{
                        c: 'returns-content',
                        t: 'контент',
                        k: 'returns'
                    },{
                        c: 'certificates-content',
                        t: 'контент',
                        k: 'certificates'
                    },{
                        c: 'partnership-content',
                        t: 'контент',
                        k: 'partnership'
                    },{
                        c: 'home-content',
                        t: 'контент',
                        k: 'home'
                    },{
                        c: 'contacts-content',
                        t: 'контент',
                        k: 'contacts'
                    },{
                        c: 'policy-content',
                        t: 'контент',
                        k: 'policy'
                    },{
                        c: 'desc-content',
                        t: 'контент',
                        k: 'units'
                    },{
                        c: 'desc-content',
                        t: 'контент',
                        k: 'calculator'
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
