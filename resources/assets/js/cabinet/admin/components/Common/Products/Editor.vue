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
                class="b-new-category rounded-0 mt-0 mb-0 b-new-article editor-small-tabs"
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
                            :class="{'editor-is-option': otherLang.length && !activeItem.o || !activeItem.o.disabled.lang}"
                            v-model.trim="editor.status"
                            :items="status.items"
                            item-value="key"
                            color="green"
                            item-text="caption"
                            label="Статус"
                            solo
                        ></v-select>

                        <v-menu
                            v-if="otherLang.length && !activeItem.o || !activeItem.o.disabled.lang"
                            bottom
                            right
                            offset-y
                            transition="scale-transition"
                        >
                            <template v-slot:activator="{ attrs, on }">
                                <v-btn
                                    class="editor-option-btn"
                                    text
                                    icon
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    <v-icon color="#000">mdi-format-align-bottom</v-icon>
                                </v-btn>
                            </template>
                            <v-list dense>
                                <v-list-item-group
                                    color="primary"
                                >
                                    <v-list-item
                                        v-for="item in otherLang"
                                        :key="item.id"
                                        v-on:click="importContent(item.local)"
                                        :disabled="checkImportContent"
                                    >
                                        <v-list-item-content>
                                            <v-list-item-title>
                                                импорт контента "{{ item.local }}"
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item
                                        v-on:click="resetImport"
                                        :disabled="!checkImportContent"
                                    >
                                        <v-list-item-content>
                                            <v-list-item-title>
                                                отменить импорт
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-list-item-group>
                            </v-list>
                        </v-menu>

                        <v-btn
                            :loading="pending"
                            class="b-btn"
                            color="green darken-1"
                            v-on:click="save"
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
                        <v-card class="mb-9">
                            <v-tabs
                                background-color="light-blue darken-1"
                                v-model="tabSelect"
                                show-arrows
                                dark
                            >
                                <v-tab
                                    v-for="(component, index) in components"
                                    :key="index"
                                >
                                    {{ component.t }}
                                </v-tab>
                            </v-tabs>
                        </v-card>
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
                            :ref="component.c"
                            :select.sync="langs.select"
                            :other="getOtherProps(component.c)"
                            :index="index"
                            :related="related"
                        ></component>
                    </template>

                </v-form>
            </v-card>

            <v-snackbar
                v-model="alert.show"
                absolute top right
                elevation="24"
                color="orange darken-1"
            >
                <span v-html="alert.text"></span>
                <template v-slot:action="{ attrs }">
                    <v-btn text
                           color="white"
                           v-bind="attrs"
                           @click="alert.show = false"
                    >
                        Закрыть
                    </v-btn>
                </template>
            </v-snackbar>
        </div>
    </v-overlay>
</template>

<script>
    import ChoseAttr from '../../Tabs/Products/ChoseAttr.vue';
    import ChoseGroups from '../../Tabs/Products/ChoseGroups.vue';
    import PriceCount from '../../Tabs/Products/PriceCount.vue';
    import SetMedia from "../../Tabs/Products/SetMedia";
    import ContentItem from "../../Tabs/Products/ContentItem";
    import ParamsItem from "../../Tabs/Products/ParamsItem";
    import OptionItem from "../../Tabs/Products/OptionItem";
    import MetaItem from "../../Tabs/Products/MetaItem";

    export default {
        props: [
            'formDialog',
            'edit',
            'selected',
            'parent',
            'edt',
            'related',
            'available',
            'components'
        ],
        components: {
            'chose-attr': ChoseAttr,
            'chose-groups': ChoseGroups,
            'price-count': PriceCount,
            'set-media': SetMedia,
            'content-item': ContentItem,
            'params-item': ParamsItem,
            'option-item': OptionItem,
            'meta-item': MetaItem,
        },
        data: function() {
            return {
                location: window.location.origin,
                tabSelect: 0,
                pending: false,
                is_edit: false,
                editor: {},
                langs: {
                    items: this.$store.state.data.langs,
                    select: null
                },
                buffer: {
                    content: {}
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
                alert: {
                    show: false,
                    text: null
                },
                formDialogRight: false,
            }
        },
        mounted: function() {
            this.setup();
            setTimeout(() => {
                this.$emit('update:edt', false);
            },100)
        },
        watch: {
            editor: {
                deep: true,
                handler: function(){
                    if (this.formDialogRight) {
                        this.$emit('update:edt', true);
                    }
                }
            },
            'editor.attr': {
                deep: true,
                handler: function() {
                    this.setAttrValue();
                },
            },
            formDialog: function(a){
                if(a){
                    if (Object.keys(this.edit).length) {
                        this.is_edit = true;
                        this.editor = this.edit;

                        if (this.editor.status) {
                            this.langs.items.forEach(item => {
                                item.valid = true;
                            });
                        }
                        if (Object.keys(this.editor.attr).length < this.attributes.length) {
                            this.editor.attr = this.attributes.reduce((acc, item) => {
                                acc[item.id] = this.editor.attr[item.id] ? this.editor.attr[item.id] : [];
                                return acc;
                            }, {});
                        }
                        this.editor.related = this.editor.related.map(item => item.related);
                    }else{
                        this.setup();
                    }

                    this.setAttrValue();

                    setTimeout(()=>{
                        this.formDialogRight = a;
                    },100)
                }else{
                    this.setup();
                    this.formDialogRight = a;
                }
            }
        },
        computed:{
            getLang: function() {
                return this.langs.items.find(item => item.id === this.langs.select);
            },
            getLocal: function (){
                return this.getLang.local;
            },
            activeItem: function () {
                return this.components[this.tabSelect];
            },
            attributes: function () {
                switch (this.related) {
                    case 'store':
                        return this.$store.getters.storeData.data.attributes;
                    case 'services':
                        return this.$store.getters.servicesData.data.attributes;
                }
            },
            variables: function () {
                const items = [];
                const values = {
                    price: [],
                    count: [],
                    data: []
                };

                this.attributes.forEach(item => {
                    let attr = this.editor.attr[item.id];
                    if (attr && attr.length) {
                        if ( item.price ) {
                            values.price.push(attr)
                        }
                        if ( item.count ) {
                            values.count.push(attr)
                        }
                        if ( item.data ) {
                            values.data.push(attr)
                        }
                    }
                    items.push(...item.subs);
                });

                return {values, items, check: {
                        price: !!values.price.length,
                        count: !!values.count.length,
                        data: !!values.data.length
                    }
                };
            },
            otherLang: function () {
                return this.langs.items.filter(item => {
                    return item.id !== this.langs.select;
                })
            },
            checkImportContent: function () {
                return !!this.buffer.content[this.getLocal];
            }
        },
        methods: {
            setAttrValue: function() {
                let variables = this.variables;

                if (!this.is_edit) {
                    let sets = [{
                        val: 'price',
                        keys: ['price']
                    },{
                        val: 'count',
                        keys: ['count']
                    },{
                        val: 'data',
                        keys: [
                            'images',
                            'content.desc,params,meta_title,meta_desc'
                        ]
                    }];

                    sets.forEach(set => {
                        let value = this.combine(variables.values[set.val]);

                        set.keys.forEach(key => {
                            let _key = key.split('.'),
                                _set = _key.length > 1 ? _key[0] : key,
                                target = this.editor[_set],
                                keys   = _key.length > 1 ? _key[1].split(',') : null;

                            if (keys) {
                                this.langs.items.forEach(lang => {
                                    keys.forEach(key => {
                                        let setValue = JSON.parse(JSON.stringify(value));
                                        target[lang.local][key].attrs = this.getOldAttr(setValue, target[lang.local][key].attrs);
                                    });
                                })
                            }else{
                                let setValue = JSON.parse(JSON.stringify(value));
                                if ( _set === 'images' ) {
                                    setValue = setValue.map(item => {
                                        item.value = [];
                                        return item;
                                    });
                                }
                                target.attrs = this.getOldAttr(setValue, target.attrs);
                            }
                        })
                    })
                }else{
                    this.is_edit = false;
                }
            },
            combine: function(array) {
                let r = [];
                function c(part, index) {
                    if (array.length) {
                        array[index].forEach(function (a) {
                            var p = part.concat(a);
                            if (p.length === array.length) {
                                r.push({
                                    keys: p,
                                    id: Number(p.join('')),
                                    value: null
                                });
                                return;
                            }
                            c(p, index + 1);
                        });
                    }
                }

                c([], 0);
                return r;
            },
            getOldAttr: function(value, target) {
                return value.map(item => {
                    const find = target.find(attr => attr.id === item.id);
                    if (find) {
                        item.value = find.value;
                    }
                    return item;
                });
            },
            setup: function(){
                this.langs.items.forEach(item => {
                    item.valid = false;
                    this.$set(this.buffer.content, item.local, null);
                });
                this.langs.select = this.langs.items[0].id;

                this.editor = {
                    slug: '',
                    status: 0,
                    hit: false,
                    new: false,
                    draw: 1,
                    subs: [],
                    related: [],
                    attr: this.attributes.reduce(function(acc, item) {
                        acc[item.id] = [];
                        return acc;
                    }, {}),
                    price: {
                        currency: null,
                        base: null,
                        bulk: [],
                        attrs: []
                    },
                    count: {
                        base: null,
                        attrs: []
                    },
                    images: {
                        base: [],
                        attrs: []
                    },
                    content: this.langs.items.reduce(function(acc, item) {
                        acc[item.local] = {
                            title: '',
                            desc: {
                                base: '',
                                attrs: []
                            },
                            meta_title: {
                                base: '',
                                attrs: []
                            },
                            meta_desc: {
                                base: '',
                                attrs: []
                            },
                            params: {
                                base: [{
                                    id: +new Date(),
                                    title: '',
                                    items: [{
                                        id: +new Date(),
                                        name: '',
                                        value: ''
                                    }]
                                }],
                                attrs: []
                            }
                        };
                        return acc;
                    }, {})
                };
            },
            closeModal: function(e) {
                if (this.edt) {
                    this.$root.confirmAction(e, {
                        type: 'set_editor',
                        action: () =>{
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
                const comp = this.components.map(item => {
                    return this.$refs[ item.c ][0].validate()
                });

                return Promise.all(comp).then(values => {
                    for (let i = 0; i < values.length; ++i) {
                        const item = values[i];

                        if (!item.result) {
                            this.tabSelect = item.index;

                            if (item.alert) {
                                this.alert.show = true;
                                this.alert.text = item.alert;
                            }
                            return false;
                        }
                    }
                    if ( this.editor.status ) {
                        this.getLang.valid = true;
                        const checkLang = this.langs.items.find(item => !item.valid);

                        if ( checkLang ) {
                            this.langs.select = checkLang.id;
                            return false;
                        }
                    }

                    return true;
                });
            },
            save: function(){
                this.validate().then(result => {
                    if (result) {
                        let input = this.editor,
                            path = window.location.pathname +'/',
                            url = this.selected ? path +'products/edit' : path +'products/create';

                        input.related_to = this.related;
                        console.log(input);
                        this.pending = true;
                        input.categories_id = this.parent;

                        axios.post(url, {
                            _token: window._token,
                            data: input
                        })
                        .then((response) => {
                            setTimeout(() => {
                                var data = response.data;

                                if (this.selected) {
                                    input.updated_at = data.updated_at;
                                    input.related = data.related;
                                    this.$store.commit( 'editProducts', input);
                                }else{
                                    this.$store.commit('addProducts', data);
                                }
                                this.setup();

                                this.$emit('update:selected', null);
                                this.$emit('update:formDialog', false);
                            },200)
                        })
                        .catch((error)=> {
                            let data = error.response.data;

                            if (data.errors) {
                                this.alert.text = Object.values(data.errors)[0][0];
                            } else if(data.message) {
                                this.alert.text = data.message;
                            } else {
                                this.alert.text = 'Неизвестная ошибка, повторите попытку';
                            }

                            this.alert.show = true;
                        })
                        .finally(() => {
                            this.pending = false;

                            setTimeout(() => {
                                this.$emit('update:edt', false);
                            },300)
                        })
                    }
                })
            },
            getOtherProps: function (component) {
                switch (component) {
                    case 'chose-attr':
                        return this.attributes;
                    case 'price-count':
                    case 'set-media':
                    case 'content-item':
                    case 'params-item':
                    case 'meta-item':
                        return this.variables;
                    case 'chose-groups':
                        return this.parent;
                    default:
                        return null;
                }
            },
            importContent: function (local) {
                if (!this.buffer.content[this.getLocal]) {
                    this.buffer.content[this.getLocal] = JSON.parse(JSON.stringify( this.editor.content[this.getLocal] ));
                }
                this.editor.content[this.getLocal] = JSON.parse(JSON.stringify( this.editor.content[local] ));
            },
            resetImport: function () {
                this.editor.content[this.getLocal] = JSON.parse(JSON.stringify( this.buffer.content[this.getLocal] ));
                this.buffer.content[this.getLocal] = null;
            }
        }
    };
</script>
