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
                            :disabled="activeItem.o && activeItem.o.disabled.lang"
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
                                v-for="(component, index) in components"
                                :key="index"
                            >
                                {{'Шаг ' + (index + 1)}}
                                <span>{{component.t}}</span>
                            </v-tab>
                        </v-tabs>
                    </template>
                    <template v-for="(component, index) in components">
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
                            :other="parent"
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
            'parent',
            'alert',
            'edt',
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
                editor: {
                    file: '',
                    slug: '',
                    status: 0
                },
                valid: true,
                formDialogRight: false
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
                        file: '',
                        slug: '',
                        status: 0
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
        computed:{
            getLocal: function (){
                return this.langs.items[this.langs.select-1].local
            },
            activeItem: function () {
                return this.components[this.tabSelect];
            }
        },
        methods: {
            setup: function(){
                this.$set(this.editor, 'content', this.langs.items.reduce(function(acc, item) {
                    acc[item.local] = {
                        title: '',
                        desc: '',
                        metaTitle: '',
                        metaDesc: ''
                    };
                    return acc;
                }, {}));
                this.$set(this.editor, 'subs', []);
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
                                file: '',
                                slug: '',
                                status: 0
                            }
                            this.setup();
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
            selectFile: function () {
                var route_prefix = '/laravel-filemanager';
                window.open(route_prefix + '?type=image', 'FileManager', 'width=900,height=600');
                var that = this;
                window.SetUrl = function (items) {
                    var file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');
                    that.editor.file = file_path;
                };
            },
            validate: function () {
                for (let i = 0; i < this.components.length; i++) {
                    let compn = this.components[i];
                    if (!this.$refs[compn.c][0].validate()) {
                        return false;
                    }
                }
                return true;
            },
            editCategory: function(){
                if (!this.validate()) {
                    return;
                }

                var s = this.selected,
                    input = this.editor,
                    path = window.location.pathname +'/',
                    url = s ? path +'collection/edit' : path +'collection/create';

                this.pending = true;
                input.parent = this.parent;

                axios.post(url, {
                    _token: window._token,
                    data: input
                })
                .then((response) => {
                    setTimeout(() => {
                        var data = response.data;

                        if (data.collection) {
                            this.$store.commit('addCollections', data.collection);
                        }else{
                            input.updated_at = data.updated_at;
                            this.$store.commit( 'editCollections', input);
                        }
                        this.editor = {
                            file: '',
                            slug: '',
                            status: 0
                        }
                        this.setup();

                        this.$emit('update:selected', null);
                        this.$emit('update:formDialog', false);
                        //this.$v.reset();
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
