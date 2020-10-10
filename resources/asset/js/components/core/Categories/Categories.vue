<template>
	<div>
		<edit-category
			:dialog.sync="dialog"
			:edit="edit"
			:selected.sync="selected"
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
				categories: [],
				dialog: false,
				selected: null,
				edit: {},
				edt: false
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
						meta_desc: ''
					}
					return;
				} 
				for (let i = 0; i < this.categories.length; i++) {
					let category = this.categories[i];
					if (category.id === a) {
						this.edit = JSON.parse(JSON.stringify(category));
					}
				}
			}
		},
		components: {
			CategoriesTable,
			EditCategory
		}
	}
</script>