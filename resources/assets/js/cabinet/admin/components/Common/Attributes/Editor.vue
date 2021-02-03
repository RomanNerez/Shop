<template>
    <v-overlay
        v-if="formDialog"
        :value="formDialog"
        class="b-overlay"
        z-index="7"
    >
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
                            :disabled="activeItem.o.disabled && activeItem.o.disabled.lang"
                            class="b-lang"
                            v-model="langs.select"
                            :items="langs.items"
                            item-value="id"
                            item-text="title"
                            label="Язык"
                            color="green"
                            solo
                        ></v-select>
                        <v-select
                            class="b-lang"
                            v-model.trim="editor.status"
                            :items="status.items"
                            item-value="key"
                            color="green"
                            item-text="caption"
                            label="Статус"
                            solo
                        ></v-select>

                        <v-btn
                            :loading="pending"
                            class="b-btn"
                            color="green darken-1"
                            v-on:click="editCategory"
                        >
                            Сохранить
                        </v-btn>
                        <v-btn class="b-close"  large color="red" icon
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
                                v-for="(component, index) in getComponent"
                                :key="index"
                            >
                                {{'Шаг ' + (index + 1)}}
                                <span>{{component.t}}</span>
                            </v-tab>
                        </v-tabs>
                    </template>
                    <template v-for="(component, index) in getComponent">
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
    import { validationMixin } from 'vuelidate';
    import { required, maxLength } from 'vuelidate/lib/validators';

    export default {
        props: [
            'formDialog',
            'edit',
            'selected',
            'action',
            'parent',
            'edt',
            'alert',
            'related',
            'available',
            'components'
        ],
        data: function() {
            return {
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
                editor: {},
                mutations: {
                    attribute: {
                        create: 'addAttribute',
                        edit: 'editAttribute'
                    },
                    'attribute-list': {
                        create: 'addAttrList',
                        edit: 'editAttrList'
                    }
                },
                valid: true,
                formDialogRight: false,
            }
        },
        mounted: function() {
            this.setup();
            setTimeout(()=>{
                this.$emit('update:edt', false);
            },100)
        },
        watch: {
            edit: function() {
                if (!Object.keys(this.edit).length) {
                    this.editor = {
                        slug: '',
                        status: 0,
                        price: false,
                        count: false,
                        data: false,
                        type: null
                    }
                    this.setup();
                }else{
                    this.editor = this.edit;
                }
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
            }
        },
        computed: {
            getLocal: function (){
                return this.langs.items[this.langs.select-1].local
            },
            getMutation: function () {
                return this.mutations[this.action.section][this.action.type];
            },
            activeItem: function () {
                return this.components[this.tabSelect];
            },
            getComponent: function () {
                return this.components.filter(item => {
                    return item.o.section.includes(this.action.section)
                });
            }
        },
        methods: {
            setup: function(){
                this.$set(this.editor, 'content', this.langs.items.reduce(function(acc, item) {
                    acc[item.local] = {
                        title: ''
                    };
                    return acc;
                }, {}));
            },
            notification: function (text = 'Null') {
                this.snackbar.show = true;
                this.snackbar.text = text;
            },
            checkEmpty(value, field){
                if(!value.trim()){
                    this.user[field] = this.currentGator[field];
                }
            },
            closeModal: function(e) {
                if (this.edt) {
                    this.$root.confirmAction(e, {
                        type: 'set_editor',
                        action: () =>{
                            this.editor = {
                                slug: '',
                                status: 0,
                                price: false,
                                count: false,
                                data: false,
                                type: null
                            }
                            this.setup();
                            this.$emit('update:formDialog', false);

                            setTimeout(() => {
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
                let comps = this.getComponent;
                for (let i = 0; i < comps.length; i++) {
                    let comp = comps[i];
                    if (!this.$refs[comp.c][0].validate()) {
                        return false;
                    }
                }
                return true;
            },
            editCategory: function(){
                if (!this.validate()) {
                    return;
                }

                let input = this.editor,
                    path = window.location.pathname +'/'+ this.action.section,
                    url = path +'/'+ this.action.type;

                input.related = this.related;

                this.pending = true;

                input.parent = this.parent;
                axios.post(url, {
                    _token: window._token,
                    data: input
                })
                .then((response) => {
                    setTimeout(() => {
                        let data = response.data;

                        if (data.item) {
                            this.$store.commit(this.getMutation, this.action.section === 'attribute' ? data.item : {
                                parent: input.parent,
                                related: this.related,
                                item: data.item
                            });
                        }else{
                            input.file = data.done;
                            this.$store.commit(this.getMutation, input);
                        }
                        this.editor = {
                            file: '',
                            slug: '',
                            status: 0
                        }
                        this.setup();

                        this.$emit('update:formDialog', false);
                        //this.$v.reset();
                    },200)
                })
                .catch((error)=> {
                    this.snackbar.show = true;

                    if (error.response && error.response.status === 422) {
                        this.snackbar.text = error.response.data.message;
                    }else{
                        this.snackbar.text = 'Неизвестная ошибка, повторите попытку';
                    }
                })
                .finally(()=>{
                    this.pending = false;

                    setTimeout(()=>{
                        this.$emit('update:edt', false);
                    },300)
                })
            },
        }
    };
</script>
