<template>
  <v-container
    id="regular-tables"
    fluid
    tag="section"
  >
    <base-v-component
      heading="Подкатегории"
    />

    <base-material-card
      icon="mdi-clipboard-text"
      title="Таблица Подкатегорий"
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
            v-if="!subCategories.length"
            type="table"
        ></v-skeleton-loader>
        <template v-else>
            <v-simple-table>
                <thead>
                  <tr>
                    <th class="primary--text">
                      ID
                    </th>
                    <th class="primary--text">
                      Алиас
                    </th>
                    <th class="primary--text">
                      Название
                    </th>
                    <th class="primary--text">
                      Активность
                    </th>
                    <th class="text-right primary--text">
                      Дата
                    </th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  <tr
                    v-for="(subCategory, index) in subCategories"
                  >
                    <td>{{subCategory.id}}</td>
                    <td>{{subCategory.slug}}</td>
                    <td>{{subCategory.title}}</td>
                    <td>
                        <v-switch
                            v-model="subCategory.active"
                            :false-value="0"
                            :true-value="1"
                            @change="active(subCategory.id, subCategory.active)"
                        ></v-switch>
                    <td class="text-right">
                      {{subCategory.created_at}}
                    </td>
                    <td class="text-right">
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
                                v-for="(item, index) in items"
                                :key="index"
                                @click="item.function(subCategory.id)"
                            >
                                <v-list-item-icon>
                                    <v-icon>{{item.icon}}</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                  <v-list-item-title>{{item.title}}</v-list-item-title>
                              </v-list-item-content>
                            </v-list-item>
                          </v-list>
                        </v-menu>
                    </td>
                  </tr>
                </tbody>
            </v-simple-table>
            <div class="text-center">
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
        props: ['subCategories', 'dialog', 'selected'],
        data: function () {
            return {
                warningModal: false,
                disabledTable: false,
                snackbar:{
                    text: '',
                    show: false
                },
                pagination:{
                    page:1,
                    length: 15
                },
                items:[
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
        components: {
            BaseMaterialCard,
            BaseVComponent
        },
        watch:{
            'pagination.page': function (a) {
                this.updateGetParam(window.PAGE_PARAM, a);
                this.getSubCategoryData(a);
            }
        },
        created: function () {
            this.initData();
        },
        computed: {

        },
        methods:{
            initData: function () {
                let page = this.getPage();
                console.log(page);
                if (page !== undefined) {
                    this.getSubCategoryData(this.pagination.page);
                    this.pagination.page = Number(page);
                } else {
                    this.pagination.page = page ? Number(page) : 1;
                    this.getSubCategoryData(this.pagination.page);
                }
            },
            getPage: function () {
                var url = new URL(window.location.href);
                    return url.searchParams.getAll(window.PAGE_PARAM)[0];
            },
            getSubCategoryData: function (page) {
                this.disabledTable = true;
                axios.post('admin/sub-categories/getdata',{page})
                .then(response =>{
                    this.$parent.subCategories = response.data.subCategories;
                    this.pagination.length = response.data.count;
                    this.disabledTable = false;
                }).catch(err=>{
                    this.disabledTable = false;
                })
            },
            deleteCategory: function (id) {
                this.warningModal = false;
                this.disabledTable = true;
                axios.post('admin/sub-categories/delete',{id})
                .then( response =>{
                    this.disabledTable = false;
                    this.$parent.subCategories = this.$parent.subCategories.filter(c => c.id !== id);
                    this.snackbarMess('Категория успешно удалена!');
                }).catch(err=>{
                    this.snackbarMess('Произошла ошибка при удалении категории!');
                });
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
            active (id, active) {
                this.disabledTable = true;
                axios.post('admin/sub-categories/active',{id, active})
                .then( response =>{
                    this.disabledTable = false;
                    let msg = active ? 'Подкатегория активирована' : 'Подкатегория дезактивирована'
                    this.snackbarMess(msg)
                }).catch(err =>{
                    this.snackbarMess('Произошла ошибка');
                });
            },
            snackbarMess: function (text) {
                this.snackbar.show = true;
                this.snackbar.text = text; 
            }
        }
        
    }
</script>
