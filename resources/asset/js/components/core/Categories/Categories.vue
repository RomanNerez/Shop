<template>
	<div>
		<edit-category
			:dialog.sync="dialog"
		></edit-category>
		<categories-table
			:categories="categories"
			:dialog.sync="dialog"
		></categories-table>
	</div>
</template>

<script>
	import CategoriesTable from './CategoriesTables.vue';
	import EditCategory from './EditCategory.vue';
	export default{
		data: function () {
			return {
				categories: this.$store.state.data.categories,
				dialog: false
			}
		},
		components: {
			CategoriesTable,
			EditCategory
		}
	}
</script>