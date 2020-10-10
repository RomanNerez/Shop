<template>
  <v-main>
    <keep-alive including="home">
      <component :is="component"></component>
    </keep-alive>
    <dashboard-core-footer />
  </v-main>
</template>

<script>
  import DashboardCoreFooter from './Footer';
  import Categories from './Categories/Categories.vue';
  import SubCategories from './SubCategories/SubCategories.vue';
  import Products from './Products/Products.vue'; 
    export default {
        name: 'DashboardCoreView',

        components: {
          DashboardCoreFooter,
          Categories,
          SubCategories,
          Products
        },

        data: function () {
            return {
                
            }
        },
        computed: {
            component: function () {
                return this.$store.getters.component
            },
        },
    }
</script>
