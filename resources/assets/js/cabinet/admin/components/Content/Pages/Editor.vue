<template>
    <v-overlay
        v-if="formDialog"
        :value="formDialog"
        class="b-overlay"
        z-index="7"
    >
        <v-snackbar
            v-model="alert.show"
            absolute top right
            elevation="24"
            :color="alertColor"
            :timeout="alert.option.type === 'loading' ? -1 : 4000"
        >
            <span v-html="alert.option.text"></span>

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

        <div class="b-drawer b-drawer--right"
             :class="{active: formDialogRight}"
        >
            <v-card
                light
                class="b-new-category rounded-0 mt-0 mb-0 b-new-article"
            >

                <v-form>
                    <v-card-title class="px-0 pt-0">
                        <!--<span class="headline">
                            {{ !selected ? 'Новая категория' : 'Редактирование' }}
                        </span>-->
                        <v-select style="margin-right: 5% !important"
                            class="b-lang"
                            v-model="langs.select"
                            :items="langs.items"
                            item-value="id"
                            item-text="title"
                            label="Язык"
                            color="green"
                            solo
                        ></v-select>

                        <v-btn
                            :loading="pending"
                            class="b-btn"
                            color="green darken-1"
                            style="margin-left: auto"
                            v-on:click="send"
                        >
                            Сохранить
                        </v-btn>
                        <v-btn class="b-close" large color="red" icon
                               v-on:click="closeModal($event)"
                        >
                            <svg height="329pt" fill="currentColor" viewBox="0 0 329.26933 329" width="329pt">
                                <path d="m21.339844 329.398438c-5.460938 0-10.925782-2.089844-15.082032-6.25-8.34375-8.339844-8.34375-21.824219 0-30.164063l286.589844-286.59375c8.339844-8.339844 21.824219-8.339844 30.164063 0 8.34375 8.339844 8.34375 21.824219 0 30.164063l-286.589844 286.59375c-4.183594 4.179687-9.621094 6.25-15.082031 6.25zm0 0"></path> <path d="m307.929688 329.398438c-5.460938 0-10.921876-2.089844-15.082032-6.25l-286.589844-286.59375c-8.34375-8.339844-8.34375-21.824219 0-30.164063 8.339844-8.339844 21.820313-8.339844 30.164063 0l286.589844 286.59375c8.34375 8.339844 8.34375 21.824219 0 30.164063-4.160157 4.179687-9.621094 6.25-15.082031 6.25zm0 0"></path>
                            </svg>
                        </v-btn>
                    </v-card-title>

                    <template>
                        <v-tabs
                            class="b-tabs"
                            color="green"
                            v-model="tabSelect"
                        >
                            <v-tab
                                v-for="(component, index) in getComponents"
                                :key="index"
                            >
                                {{'Шаг ' + (index + 1)}}
                                <span>{{component.t}}</span>
                            </v-tab>
                        </v-tabs>
                    </template>
                    <template v-for="(component, index) in getComponents">
                        <component
                            v-show="tabSelect == index"
                            :tabSelect.sync="tabSelect"
                            :selected="selected"
                            :is="component.c"
                            v-model="editor"
                            :local="getLocal"
                            :status="editor.status"
                            :langs="langs.items"
                            :invalid.sync="valid"
                            :ref="component.c"
                            :select.sync="langs.select"
                            :alert.sync="alert.option"
                        ></component>
                    </template>

                </v-form>
            </v-card>
            <template>
                <div class="text-center ma-2">
                    <v-snackbar
                        v-model="snackbar.show"
                    >
                        {{snackbar.text}}
                        <template v-slot:action="{ attrs }">
                            <v-btn
                                color="pink"
                                text
                                v-bind="attrs"
                                @click="snackbar.show = false"
                            >
                                Закрыть
                            </v-btn>
                        </template>
                    </v-snackbar>
                </div>
            </template>
        </div>
    </v-overlay>

</template>

<script>
    import Base from '../../Tabs/Pages/Base.vue';
    import Meta from '../../Tabs/Pages/Meta.vue';
    import ServiceContent from '../../Tabs/Pages/Content/Services.vue';
    import StandingContent from '../../Tabs/Pages/Content/Standing.vue';
    import VinylsContent from '../../Tabs/Pages/Content/Vinyls.vue';

    export default {
        props: [
            'formDialog',
            'edit',
            'selected',
            'list',
            'edt',
            'components'
        ],
        components: {
            'create-base': Base,
            'create-meta': Meta,
            'service-content': ServiceContent,
            'standing-content': StandingContent,
            'vinyls-content': VinylsContent
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
                location: window.location.origin,
                tabSelect: 0,
                pending: false,
                langs: {
                    items: this.$store.state.data.langs,
                    select: 1
                },
                status: {
                    items:[
                        {
                            key: 0,
                            caption: 'черновик'
                        },{
                            key: 1,
                            caption: 'опубликовано'
                        }
                    ]
                },
                snackbar:{
                    show: false,
                    text: ''
                },
                editor: null,
                valid: true,
                formDialogRight: false,
            }
        },
        mounted: function() {
            setTimeout(()=>{
                this.$emit('update:edt', false);
            },100)
        },
        watch: {
            edit: function() {
                this.editor = this.edit;
            },
            editor: {
                deep: true,
                handler: function(){
                    this.$emit('update:edt', true);
                }
            },
            formDialog: function(a){
                if(a){
                    setTimeout(()=>{
                        this.formDialogRight = a;
                    },100)
                }else{
                    this.formDialogRight = a;
                }
            },
            'alert.option': {
                deep: true,
                handler: function() {
                    if (this.alert.option.type && this.alert.option.text) {
                        this.alert.show = true;
                    }
                }
            },
            'alert.show': function() {
                if ( !this.alert.show ) {
                    setTimeout(() => {
                        this.alert.option = {
                            type: null,
                            text: null
                        }
                    }, 200)
                }
            }
        },
        computed:{
            alertColor: function () {
                switch (this.alert.option.type) {
                    case 'loading':
                        return 'blue darken-1';
                    case 'warning':
                        return 'orange darken-1';
                    default:
                        return this.alert.option.type;
                }
            },
            getLocal: function (){
                return this.langs.items[this.langs.select-1].local
            },
            getComponents: function () {
                return this.components.filter(item => {
                    return !item.k || item.k === this.editor.key
                })
            }
        },
        methods: {
            notification: function (text = 'Null') {
                this.snackbar.show = true;
                this.snackbar.text = text;
            },
            closeModal: function(e) {
                if (this.edt) {
                    this.$root.confirmAction(e, {
                        type: 'set_editor',
                        action: () =>{
                            this.editor = null;
                            this.$emit('update:formDialog', false);
                            this.$emit('update:selected', null);

                            setTimeout(()=>{
                                this.$emit('update:edt', false);
                            },100)
                        }
                    })
                } else {
                    this.$emit('update:formDialog', false);
                    this.$emit('update:alert', false);
                }
            },
            validate: function () {
                for (let i = 0; i < this.getComponents.length; i++) {
                    let compn = this.getComponents[i];
                    if (!this.$refs[compn.c][0].validate()) {
                        return false;
                    }
                }
                return true;
            },
            send: function(){
                if (!this.validate()) {
                    return;
                }

                let input = this.editor;
                this.pending = true;

                axios.post('/home/page/edit', {
                    _token: window._token,
                    data: input
                })
                .then((response) => {
                    setTimeout(() => {
                        let data = response.data;

                        for (var i = 0; i < this.list.length; i++) {
                            var item = this.list[i];
                            if (item.id === input.id) {
                                input.updated_at = data.updated_at;

                                this.$store.commit('editPage', {
                                    index: i,
                                    input: input
                                });
                            }
                        }

                        this.$emit('update:selected', null);
                        this.$emit('update:formDialog', false);
                    },200)
                })
                .catch((error)=> {
                    this.snackbar.show = true;

                    if (error.response && error.response.data.message) {
                        this.snackbar.text = error.response.data.message;
                    }else{
                        this.snackbar.text = 'Неизвестная ошибка, повторите попытку';
                    }
                })
                .finally(() => {
                    this.pending = false;

                    setTimeout(() => {
                        this.$emit('update:edt', false);
                    },300)
                })
            },
        }
    };
</script>
