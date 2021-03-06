<template>
	<v-container
        id="regular-tables"
        fluid
        tag="section"
    >
        <base-v-component
            heading="Продукты"
        />
        <base-material-card
            icon="mdi-clipboard-text"
            title="Таблица Продуктов"
            class="px-5 py-3"
            :disabled="disabledTable"
        >    
            <v-btn
                icon
                v-on:click="$emit('update:editModel', true)"
            >
                <v-icon>mdi-plus</v-icon>
            </v-btn>
            <v-skeleton-loader
            	v-if="!products.length && loading"
		      	type="table"
		    ></v-skeleton-loader>
		    <v-sheet
                v-if="!products.length && !loading"
                class="d-flex justify-center align-center"
                width="100%"
                height="400px"
            >
                Продуктов пока нет
            </v-sheet>
            <template v-else>
	            <v-simple-table
	                disabled
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
	                        v-for="(products, index) in products"
	                    >
	                        <td>{{products.id}}</td>
	                        <td>{{products.slug}}</td>
	                        <td>{{products.title}}</td>
	                        <td>
	                            <v-switch
	                                v-model="products.active"
	                                :false-value="0"
	                                :true-value="1"
	                                @change="active(products.id, products.active)"
	                            ></v-switch>
	                        </td>
	                        <td class="text-right">
	                            {{products.created_at}}
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
	                                        v-on:click="param.function(products.id)"
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
                        <v-card-text>Вы точно хотите удалить продукт?</v-card-text>
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
                                @click="deleteProduct(selectedId)"
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
		props: ['products', 'infoModel', 'editModel'],
		components: {
            BaseMaterialCard,
            BaseVComponent
        },
		data: function () {
			return {
				pagination:{
					page:1,
					length: 15
				},
				warningModal: false,
				loading: false,
				disabledTable: false,
				selectedId: false,
				snackbar:{
					show: false,
					title: '',
				},
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
	                        this.$emit('update:editModel', true)
	                    }
	                },
	                {
	                    title: 'Информация', 
	                    icon: 'mdi-share-variant',
	                    function: (id) => {
	                        this.$parent.selected = id;
	                        this.$emit('update:infoModel', true)
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
				this.getProductData(a);
			}
		},
		methods:{
			deleteProduct: function (id) {
                this.warningModal = false;
                this.disabledTable = true;
                axios.post('admin/product/delete',{id})
                .then( response =>{
                    this.disabledTable = false;
                    this.$parent.products = this.$parent.products.filter(p => p.id !== id);
                    this.snackbarMess('Продукт успешно удален!');
                }).catch(err=>{
                    this.snackbarMess('Произошла ошибка при удалении продукта!');
                });
            },
			active (id, active) {
                this.disabledTable = true;
                axios.post('admin/product/active',{id, active})
                .then( response =>{
                    this.disabledTable = false;
                    let msg = active ? 'Продукт активирован' : 'Продукт дезактивирован'
                    this.snackbarMess(msg)
                }).catch(err =>{
                	this.disabledTable = false;
                    this.snackbarMess('Произошла ошибка');
                });
            },
            snackbarMess: function (text) {
                this.snackbar.show = true;
                this.snackbar.text = text; 
            },
			initData: function () {
				let page = this.getPage();
				console.log(page);
				if (page !== undefined) {
					this.getProductData(this.pagination.page);
					this.pagination.page = Number(page);
				} else {
					this.pagination.page = page ? Number(page) : 1;
					this.getProductData(this.pagination.page);
				}
			},
			getPage: function () {
				var url = new URL(window.location.href);
					return url.searchParams.getAll(window.PAGE_PARAM)[0];
			},
			getProductData: function (page) {
				this.loading = true;
				this.disabledTable = true;
				axios.post('admin/product/getdata',{page})
				.then(response =>{
					this.$parent.products = response.data.products;
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
		}
	}
</script>