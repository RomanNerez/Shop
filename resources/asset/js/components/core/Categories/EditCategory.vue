<template>
 	<v-row justify="center">
	    <v-dialog v-model="dialog" persistent max-width="800px">
	      	<v-card>
		        <v-card-title>
		          	<span class="headline">Новая категория</span>
		        </v-card-title>
	        	<v-card-text>
	          		<v-container>
	          			<v-form
      						ref="form"
      						v-model="valid"
    					>
		          			<v-row align="center" justify="center">
			          			<v-img
			          				height="150"
			          				width="150"
			          				contain
			          				class="grey lighten-2"
			          				v-on:click="catchPhoto"
			          				:src="category.file"
			          			>
				          			<v-row align="center" justify="center" class="lightbox white--black pa-2 fill-height">
							          <v-col
							          	align="center" justify="center"
							          >
							            <svg x="0px" y="0px"  viewBox="0 0 419.2 419.2"
							            	style="height:50px; width: 50px;"
							            >
			                                <circle cx="158" cy="144.4" r="28.8"/>
			                                <path d="M394.4,250.4c-13.6-12.8-30.8-21.2-49.6-23.6V80.4c0-15.6-6.4-29.6-16.4-40C318,30,304,24,288.4,24h-232c-15.6,0-29.6,6.4-40,16.4C6,50.8,0,64.8,0,80.4v184.4V282v37.2c0,15.6,6.4,29.6,16.4,40c10.4,10.4,24.4,16.4,40,16.4h224.4c14.8,12,33.2,19.6,53.6,19.6c23.6,0,44.8-9.6,60-24.8c15.2-15.2,24.8-36.4,24.8-60C419.2,286.8,409.6,265.6,394.4,250.4z M21.2,80.4c0-9.6,4-18.4,10.4-24.4c6.4-6.4,15.2-10.4,24.8-10.4h232c9.6,0,18.4,4,24.8,10.4c6.4,6.4,10.4,15.2,10.4,24.8v124.8l-59.2-59.2c-4-4-10.8-4.4-15.2,0L160,236l-60.4-60.8c-4-4-10.8-4.4-15.2,0l-63.2,64V80.4z M56,355.2v-0.8c-9.6,0-18.4-4-24.8-10.4c-6-6.4-10-15.2-10-24.8V282v-12.4L92,198.4l60.4,60.4c4,4,10.8,4,15.2,0l89.2-89.6l58.4,58.8c-1.2,0.4-2.4,0.8-3.6,1.2c-1.6,0.4-3.2,0.8-5.2,1.6c-1.6,0.4-3.2,1.2-4.8,1.6c-1.2,0.4-2,0.8-3.2,1.6c-1.6,0.8-2.8,1.2-4,2c-2,1.2-4,2.4-6,3.6c-1.2,0.8-2,1.2-3.2,2c-0.8,0.4-1.2,0.8-2,1.2c-3.6,2.4-6.8,5.2-9.6,8.4c-15.2,15.2-24.8,36.4-24.8,60c0,6,0.8,11.6,2,17.6c0.4,1.6,0.8,2.8,1.2,4.4c1.2,4,2.4,8,4,12v0.4c1.6,3.2,3.2,6.8,5.2,9.6H56z M378.8,355.2c-11.6,11.6-27.2,18.4-44.8,18.4c-16.8,0-32.4-6.8-43.6-17.6c-1.6-1.6-3.2-3.6-4.8-5.2c-1.2-1.2-2.4-2.8-3.6-4c-1.6-2-2.8-4.4-4-6.8c-0.8-1.6-1.6-2.8-2.4-4.4c-0.8-2-1.6-4.4-2-6.8c-0.4-1.6-1.2-3.6-1.6-5.2c-0.8-4-1.2-8.4-1.2-12.8c0-17.6,7.2-33.2,18.4-44.8c11.2-11.6,27.2-18.4,44.8-18.4s33.2,7.2,44.8,18.4c11.6,11.6,18.4,27.2,18.4,44.8C397.2,328,390,343.6,378.8,355.2z"/>
			                                <path d="M341.6,267.6c-0.8-0.8-2-1.6-3.6-2.4c-1.2-0.4-2.4-0.8-3.6-0.8c-0.4,0-0.4,0-0.4,0c-0.4,0-0.4,0-0.4,0c-1.2,0-2.4,0.4-3.6,0.8c-1.2,0.4-2.4,1.2-3.6,2.4l-24.8,24.8c-4,4-4,10.8,0,15.2c4,4,10.8,4,15.2,0l6.4-6.4v44c0,6,4.8,10.8,10.8,10.8s10.8-4.8,10.8-10.8v-44l6.4,6.4c4,4,10.8,4,15.2,0c4-4,4-10.8,0-15.2L341.6,267.6z"/>
			                            </svg>
							          </v-col>
							        </v-row>	
							    </v-img>
							</v-row>
		            		<v-row>
		              			<v-col cols="12" sm="6" md="6">
		                			<v-text-field
		                				label="Название"
		                				v-model="category.title"
		                				required
		                				:error-messages="requiredErrors('title')"
		                			></v-text-field>
		              			</v-col>
		              			<v-col cols="12" sm="6" md="6">
		                			<v-text-field
		                				label="Meta Название"
		                				v-model="category.meta_title"
		                				required
		                				:error-messages="requiredErrors('meta_title')"
		                			></v-text-field>
		              			</v-col>
		              			<v-col cols="12" sm="6" md="6">
		                			<v-textarea
	          							outlined
	          							name="input-7-4"
	          							label="Описание"
	          							v-model="category.desc"
	          							required
	          							:error-messages="requiredErrors('desc')"
	        						></v-textarea>
		              			</v-col>
		              			<v-col cols="12" sm="6" md="6">
		                			<v-textarea
	          							outlined
	          							name="input-7-4"
	          							label="Meta Описание"
	          							v-model="category.meta_desc"
	          							required
	          							:error-messages="requiredErrors('meta_desc')"
	        						></v-textarea>
		              			</v-col>
		              			<v-col cols="12">
			              			<v-checkbox
								        v-model="category.active"
								        false-value="0"
								        true-value="1"
								        label="Активность"
								        required
								    ></v-checkbox>
							  	</v-col>
		            		</v-row>
		            	</v-form>
	          		</v-container>
	        	</v-card-text>
	        	<v-card-actions>
	          		<v-spacer></v-spacer>
	          		<v-btn color="blue darken-1" text @click="cansel">Отмена</v-btn>
	          		<v-btn color="blue darken-1" text @click="$v.$reset">Сбросить</v-btn>
	          		<v-btn color="blue darken-1" text @click="pushForm">Сохранить</v-btn>
	        	</v-card-actions>
	      	</v-card>
	    </v-dialog>
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
 	</v-row>
</template>

<script>
	import axios from 'axios';
	import { required } from 'vuelidate/lib/validators'
	export default{
		validations: {
			category:{
			    file: {
			    	required
			    },
			    title: {
			     	required
			    },
			    desc:{
			    	required
			    },
			    meta_title:{
			    	required
			    },
			    meta_desc:{
			    	required
			    }
			}
		},
		props:['dialog', 'edit', 'selected'],
		data: function () {
			return {
				snackbar:{
                    text: '',
                    show: false
                },
				location: window.location.origin,
				valid: null,
				category:{
					file: '',
					active: 1,
					title: '',
					desc: '',
					meta_title: '',
					meta_desc: ''
				}
			}
		},
		watch: {
			edit: function () {
				this.category = this.edit
				if (!this.edit.file) return; 
				this.category.file = this.location + '/storage/' +this.edit.file
			} 
		},
		mounted: function () {
			
		},
		methods:{
			snackbarMess: function (text) {
                this.snackbar.show = true;
                this.snackbar.text = text; 
            },
			cansel: function () {
				if (this.selected) {
					this.$emit('update:selected', null);	
				}
				this.$emit('update:dialog', false)
			},
			requiredErrors: function (key) {
                const errors = []
                if (!this.$v.category[key].$dirty) return errors
                !this.$v.category[key].required && errors.push('Это поле обязательно!')
                return errors
            },
			catchPhoto: function () {
				let that = this;
				window.open(
					'admin/laravel-filemanager' + '?type=file', 
					'FileManager', 
					'width=900,height=600'
				);
				window.SetUrl = function (items) {
				    that.category.file = items.map(function (item) {
				    	return item.url;
					}).join(',');
				
				}
			},
			clearCategory: function () {
				this.category = {
					file: '',
					active: 1,
					title: '',
					desc: '',
					meta_title: '',
					meta_desc: ''
				}
			},
			pushForm() {
				this.$v.$touch()
				if (this.$v.$invalid) { 
					return;
				}
				let s = this.selected
				let url = s ? 'admin/category/edit' : 'admin/category/add';

				this.category.active = Number(this.category.active); 

				axios.post(url,{
					category: this.category
				})
				.then(responce =>{
					if (s) {
						for (let i = 0; i < this.$parent.categories.length; i++) {
							let category = this.$parent.categories[i];
							if (category.id === s) {
								this.$parent.categories.splice(i, 1, responce.data);
								break;
							}
						}
						this.snackbarMess('Категория успешно отредактирована!');
						this.cansel();
						this.$v.$reset();
						return;
					}
					this.$parent.categories.unshift(responce.data);
					this.snackbarMess('Категория успешно создана!');
					this.clearCategory();
					this.cansel();
					this.$v.$reset();
				}).catch(error =>{
					console.log('error');
				});
			}
		}
	}
</script>