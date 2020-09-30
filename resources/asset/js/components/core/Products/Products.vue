<template>
	<div>
		<products-list
			:products="products"
		></products-list>
		<product-edit></product-edit>
		<product-info></product-info>
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
				products: this.$store.state.data.products
			}
		},
		methods:{

		}
	}
</script>