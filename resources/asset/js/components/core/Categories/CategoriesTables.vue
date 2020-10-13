<template>
    <v-container
        id="regular-tables"
        fluid
        tag="section"
    >
        <base-v-component
            heading="Категории"
        />
        <base-material-card
            icon="mdi-clipboard-text"
            title="Таблица Категорий"
            class="px-5 py-3"
            :disabled="disabledTable"
        >   
            <v-btn
                icon
                v-on:click="$emit('update:dialog', true)"
            >
                <v-icon>mdi-plus</v-icon>
            </v-btn>
            <v-skeleton-loader
                v-if="!categories.length && loading"
                type="table"
            ></v-skeleton-loader>
            <v-sheet
                v-if="!categories.length && !loading"
                class="d-flex justify-center align-center"
                width="100%"
                height="400px"
            >
                Категорий пока нет
            </v-sheet>
            <template v-else>
                <v-simple-table

                >
                    <thead>
                        <tr>
                            <th class="primary--text">ID</th>
                            <th class="primary--text">Алиас</th>
                            <th class="primary--text">Название</th>
                            <th class="primary--text">Активность</th>
                            <th class="text-right primary--text">Дата</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(category, index) in categories"
                        >
                            <td>{{category.id}}</td>
                            <td>{{category.slug}}</td>
                            <td>{{category.title}}</td>
                            <td>
                                <v-switch
                                    v-model="category.active"
                                    :false-value="0"
                                    :true-value="1"
                                    @change="active(category.id, category.active)"
                                ></v-switch>
                            </td>
                            <td class="text-right">
                                {{category.created_at}}
                            </td>
                            <td>
                                <v-menu offset-y>
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-btn
                                            depressed
                                            icon
                                            v-bind="attrs"
                                            v-on="on"
                                        >
                                            <v-icon>mdi-share-variant</v-icon>
                                        </v-btn> 
                                    </template>
                                    <v-list>
                                        <v-list-item
                                            v-for="(param, indexParams) in params"
                                            :key="indexParams"
                                            v-on:click="param.function(category.id)"
                                        >
                                            <v-list-item-icon>
                                                <v-icon>{{param.icon}}</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title>{{param.title}}</v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </v-list>
                                </v-menu>
                            </td>
                        </tr>
                    </tbody>
                </v-simple-table>
                <div class="text-center"
                    v-if="pagination.length > 1"
                >
                    <v-row justify="center">
                        <v-col cols="8">
                            <v-pagination
                                v-model="pagination.page"
                                class="my-4"
                                :length="pagination.length"
                            ></v-pagination>
                        </v-col>
                    </v-row>
                </div>
            </template>
        </base-material-card>
        <v-snackbar
            v-model="snackbar.show"
        >
            {{ snackbar.text }}
            <template v-slot:action="{ attrs }">
                <v-btn
                    color="pink"
                    text
                    v-bind="attrs"
                    @click="snackbar.show = false"
                >
                    Close
                </v-btn>
            </template>
        </v-snackbar>
        <template>
            <v-row justify="center">
                <v-dialog v-model="warningModal" max-width="390">
                    <v-card>
                        <v-card-title class="headline">Уведомление</v-card-title>
                        <v-card-text>Вы точно хотите удалить категорию?</v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn 
                                color="green darken-1" 
                                text 
                                @click="warningModal = selectedId = false"
                            >
                                Отмена
                            </v-btn>
                            <v-btn 
                                color="green darken-1" 
                                text 
                                @click="deleteCategory(selectedId)"
                            >
                                Подтвердить
                            </v-btn>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
            </v-row>
        </template>
    </v-container>
</template>

<script>
    import axios from 'axios';
    import BaseMaterialCard from '../../base/MaterialCard.vue';
    import BaseVComponent from '../../base/VComponent.vue';
    export default{
        props:['categories'],
        data: function () {
            return {
                pagination:{
                    length: 15,
                    page: 1
                },
                warningModal: false,
                selectedId: false,
                snackbar:{
                    text: '',
                    show: false
                },
                loading: false,
                disabledTable: false,
                params:[
                {
                    title: 'Удалить',
                    icon: 'mdi-delete',
                    function: (id) => {
                        this.warningModal = true;
                        this.selectedId = id;
                    }
                },
                {
                    title: 'Редактировать',
                    icon: 'mdi-pencil',
                    function: (id) => {
                        this.$parent.selected = id;
                        this.$emit('update:dialog', true)
                    }
                }
              ]
            }
        },
        created: function () {
            this.initData();
        },
        watch:{
            'pagination.page': function (a) {
                this.updateGetParam(window.PAGE_PARAM, a);
                this.getCategoryData(a);
            }
        },
        methods:{
            initData: function () {
                let page = this.getPage();
                console.log(page);
                if (page !== undefined) {
                    this.getCategoryData(this.pagination.page);
                    this.pagination.page = Number(page);
                } else {
                    this.pagination.page = page ? Number(page) : 1;
                    this.getCategoryData(this.pagination.page);
                }
            },
            getPage: function () {
                var url = new URL(window.location.href);
                    return url.searchParams.getAll(window.PAGE_PARAM)[0];
            },
            getCategoryData: function (page) {
                this.loading = true;
                this.disabledTable = true;
                axios.post('admin/category/getdata',{page})
                .then(response =>{
                    this.$parent.categories = response.data.categories;
                    this.pagination.length = response.data.count;
                    this.loading = false;
                    this.disabledTable = false;
                }).catch(err=>{
                    this.loading = false;
                    this.disabledTable = false;
                })
            },
            updateGetParam: function(param, val) {
                var url = new URL(window.location.href);
                if (!url.searchParams.has(param)){
                    url.searchParams.append(param, val);  
                } else {
                    url.searchParams.set(param, val);
                } 
                window.history.pushState(null, null, url.href);
            },
            deleteCategory: function (id) {
                this.warningModal = false;
                this.disabledTable = true;
                axios.post('admin/category/delete',{id})
                .then( response =>{
                    this.disabledTable = false;
                    this.$parent.categories = this.$parent.categories.filter(c => c.id !== id);
                    this.snackbarMess('Категория успешно удалена!');
                }).catch(err=>{
                    this.snackbarMess('Произошла ошибка при удалении категории!');
                });
            },
            active (id, active) {
                this.disabledTable = true;
                axios.post('admin/category/active',{id, active})
                .then( response =>{
                    this.disabledTable = false;
                    let msg = active ? 'Категория активирована' : 'Категория дезактивирована'
                    this.snackbarMess(msg)
                }).catch(err =>{
                    this.snackbarMess('Произошла ошибка');
                });
            },
            snackbarMess: function (text) {
                this.snackbar.show = true;
                this.snackbar.text = text; 
            }
        },
        components: {
            BaseMaterialCard,
            BaseVComponent
        }
    }
</script>
