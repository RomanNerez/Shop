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
                      Категория
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
                    v-for="(item, index) in subCategories"
                  >
                    <td>{{item.id}}</td>
                    <td>{{item.slug}}</td>
                    <td>{{item.title}}</td>
                    <td>{{item.title}}</td>
                    <td>
                        <v-switch
                            v-model="item.active"
                        >
                        </v-switch></td>
                    <td class="text-right">
                      {{item.created_at}}
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
                                @click=""
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
  </v-container>
</template>

<script>
    import axios from 'axios';
    import BaseMaterialCard from '../../base/MaterialCard.vue';
    import BaseVComponent from '../../base/VComponent.vue';
    export default{
        props: ['subCategories'],
        data: function () {
            return {
                disabledTable: false,
                pagination:{
                    page:1,
                    length: 15
                },
                items:[
                    {
                        title: 'Удалить',
                        icon: 'mdi-delete'
                    },
                    {
                        title: 'Редактировать',
                        icon: 'mdi-pencil'
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
                axios.post('admin/sub_categories/getdata',{page})
                .then(response =>{
                    this.$parent.subCategories = response.data.subCategories;
                    this.pagination.length = response.data.count;
                    this.disabledTable = false;
                }).catch(err=>{
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
        }
        
    }
</script>
