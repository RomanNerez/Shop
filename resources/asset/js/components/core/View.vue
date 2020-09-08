<template>
  <v-main>
    <component :is="component"></component>
    <dashboard-core-footer />
  </v-main>
</template>

<script>
  import DashboardCoreFooter from './Footer';
  import Categories from './Categories/Categories.vue';
  import SubCategoriesTable from './SubCategories/SubCategoriesTables.vue';
  import Products from './Products/Products.vue'; 
    export default {
        name: 'DashboardCoreView',

        components: {
          DashboardCoreFooter,
          Categories,
          SubCategoriesTable,
          Products
        },

        data: function () {
            return {
                
            }
        },
        computed: {
            component: function () {
                return this.$store.state.component
            },
        },
    }
</script>
