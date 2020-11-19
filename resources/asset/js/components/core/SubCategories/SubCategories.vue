<template>
	<div>
		<sub-categories-table
			:subCategories="subCategories"
			:dialog.sync="dialog"
			:selected.sync="selected"
		></sub-categories-table>
		<edit-sub-category
			:edit="edit"
			:dialog.sync="dialog"
			:categories="categories"
			:selected.sync="selected"
		></edit-sub-category>
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
				categories: [],
				subCategories: [],
				dialog: false,
				selected: null,
				edit: {}
			}
		},
		watch: {
			selected: function(a) {
				if (!a) {
					this.edit = {
						file: '',
						active: 1,
						title: '',
						desc: '',
						meta_title: '',
						meta_desc: '',
						categories_id: null
					}
					return;
				} 
				for (let i = 0; i < this.subCategories.length; i++) {
					let subCategory = this.subCategories[i];
					if (subCategory.id === a) {
						this.edit = JSON.parse(JSON.stringify(subCategory));
					}
				}
			}
		},
	}
</script>