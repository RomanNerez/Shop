<template>
	<div>
		<products-list
			:products="products"
			:infoModel.sync="infoModel"
			:editModel.sync="editModel"
		></products-list>
		<product-edit
			:subCategories="subCategories"
			:product="edit"
			:editModel.sync="editModel"
			:selected.sync="selected"
		></product-edit>
		<product-info
			:product="edit"
			:infoModel.sync="infoModel"
		></product-info>
	</div>
</template>

<script>
	import ProductsList from './ProductsList.vue';
	import ProductEdit from './ProductEdit.vue';
	import ProductInfo from './ProductInfo.vue';
	export default{
		components:{
			ProductsList,
			ProductEdit,
			ProductInfo
		},
		data: function () {
			return {
				subCategories: [],
				products: [],
				infoModel: false,
				editModel: false,
				selected: null,
				edit: {}
			}
		},
		watch: {
			selected: function(a) {
				if (!a) {
					this.edit = {
						title: '',
						description: '',
						price: null,
						brand: '',
						manufacturer: '',
						material: '',
						photos: [''],
						sub_categories_id: null,
						active: 1
					}
					return;
				} 
				for (let i = 0; i < this.products.length; i++) {
					let product = this.products[i];
					if (product.id === a) {
						if (!Array.isArray(product.photos)) {
							product.photos = JSON.parse(product.photos);
						}
						
						this.edit = JSON.parse(JSON.stringify(product));
					}
				}
			}
		},
		methods:{

		}
	}
</script>