<template>
	<div>
		<sub-categories-table
			:subCategories="subCategories"
		></sub-categories-table>
		<edit-sub-category></edit-sub-category>
	</div>
</template>

<script>
	import SubCategoriesTable from './SubCategoriesTable.vue';
	import EditSubCategory from './EditSubCategory.vue';

	export default {
		components: {
			SubCategoriesTable,
			EditSubCategory
		},
		data: function (){
			return {
				subCategories: [],
			}
		}
	}
</script>