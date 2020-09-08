<template>
	<div>
		<edit-category></edit-category>
		<categories-table></categories-table>
	</div>
</template>

<script>
	import CategoriesTable from './CategoriesTables.vue';
	import EditCategory from './EditCategory.vue';
	export default{
		data: function () {
			return {

			}
		},
		components: {
			CategoriesTable,
			EditCategory
		}
	}
</script>