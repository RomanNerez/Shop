<template>
        <v-card
            class="ma-0 pa-0 elevation-0"
        >
            <v-card-text
                class="pr-0 pl-0"
            >
                <v-form
                    ref="form"
                >
                    <v-text-field
                        v-model="data.link"
                        label="Ссылка"
                        single-line
                        dense
                        :placeholder="hostname"
                        :rules="rules('Ссылка обязательна')"
                        required
                        outlined
                    ></v-text-field>
                    <v-text-field
                        v-for="(lang, item) in langs"
                        :key="lang.id"
                        :label="`Название на (${lang.abbrev})`"
                        v-model="data.content[lang.local].title"
                        single-line
                        dense
                        :rules="rules('Название обязательно')"
                        required
                        outlined
                    ></v-text-field>
                    <template v-if="dataEdit">
                        <v-btn
                            x-small
                            color="primary"
                            class="text-caption"
                            v-on:click="editArbitraryLink"
                            :loading="btnLoading"
                        >
                            Редактировать
                        </v-btn>
                        <v-btn
                            x-small
                            color="error"
                            class="text-caption"
                            v-on:click="$emit('delete', dataEdit)"
                        >
                            Удалить
                        </v-btn>
                    </template>
                    <v-btn
                        v-if="!dataEdit"
                        x-small
                        color="primary"
                        class="text-caption"
                        v-on:click="addArbitraryLink"
                        :loading="btnLoading"
                    >
                        Добавить
                    </v-btn>
                </v-form>
            </v-card-text>
        </v-card>
</template>

<script>
    import { mapState } from "vuex";

    export default {
        props:{
            dataEdit:{
                type: Object,
                required: false,
                default: null
            }
        },
        data: function () {
            return {
                data: {
                    link: '',
                    content: {}
                },
                btnLoading: false,
                hostname: window.location.origin
            }
        },
        created: function () {
            this._setup();
        },
        computed: {
            ...mapState('MenuAreaVisibilities',{
                selectedAreaVisibility: (state) => state.selectedAreaVisibility
            }),
            ...mapState({
                langs: state => state.data.langs
            }),
        },
        methods:{
            _setup: function (){
                var dataEdit = {};
                if (this.dataEdit) {
                    dataEdit = JSON.parse(JSON.stringify(this.dataEdit));
                    this.data.content = dataEdit.instance.content;
                    this.data.link = dataEdit.instance.link;
                    this.data.id = dataEdit.instance.id;
                    return;
                }
                this.langs.forEach((item)=>{
                    const data = {
                        title: ''
                    };
                    this.$set(this.data.content, item.local, data);
                });
            },
            clearData: function(){
                this.data = {
                    link: '',
                    content: {},
                };
                this._setup();
            },
            resetForm: function(){
                this.$refs.form.reset();
            },
            rules: function (requiredMessage){
                return [
                    v => !!v || requiredMessage
                ]
            },
            editArbitraryLink(){
                if (!this.$refs.form.validate()) {
                    return;
                }
                this.btnLoading = true;
                this.data.area_visibility_id = this.selectedAreaVisibility;
                this.$store.dispatch(
                    'ArbitraryLinks/editArbitraryLink',
                    this.data
                ).then((res)=>{
                    if (res.status === 200) {
                        let data = {
                            id: res.data.id,
                            link: res.data.link,
                            content: res.data.content
                        };
                        this.$store.commit('Menu/updateArbitraryMenu', data);
                    }
                })
                .catch((error) =>{

                })
                .finally(()=>{
                    this.btnLoading = false;
                    this.$store.commit('Menu/updateChanges', false);
                });
            },
            addArbitraryLink: function () {
                if (!this.$refs.form.validate()) {
                    return;
                }
                this.btnLoading = true;
                this.data.area_visibility_id = this.selectedAreaVisibility;
                this.$store.dispatch(
                    'ArbitraryLinks/addArbitraryLink',
                    this.data
                )
                .then((response)=>{
                    this.$store.commit(
                        'Menu/addMenu',
                        response.data
                    );
                    this.clearData();
                    this.resetForm();
                })
                .catch((error) =>{

                })
                .finally(()=>{
                    this.btnLoading = false;
                });
            }
        }
    }
</script>
