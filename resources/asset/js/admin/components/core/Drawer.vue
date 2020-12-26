<template>
  <v-navigation-drawer
    id="core-navigation-drawer"
    v-model="drawer"
    :dark="barColor !== 'rgba(228, 226, 226, 1), rgba(255, 255, 255, 0.7)'"
    :expand-on-hover="expandOnHover"
    :right="$vuetify.rtl"
    :src="barImage"
    mobile-breakpoint="960"
    app
    width="260"
    v-bind="$attrs"
  >
    <template v-slot:img="props">
      <v-img
        :gradient="`to bottom, ${barColor}`"
        v-bind="props"
      />
    </template>

    <v-divider class="mb-1" />

    <v-list
      dense
      nav
    >
      <v-list-item>
        <v-list-item-avatar
          class="align-self-center"
          color="white"
          contain
        >
          <v-img
            src="https://demos.creative-tim.com/vuetify-material-dashboard/favicon.ico"
            max-height="30"
          />
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title
            class="display-1"
          />
          Админ Панель
        </v-list-item-content>
      </v-list-item>
    </v-list>

    <v-divider class="mb-2" />

    <v-list
      expand
      nav
    >
      <div />
      
        <!-- <template >
          <base-item-group
            v-if="item.children"
            :key="`group-${i}`"
            :item="item"
          >
          </base-item-group>
            <base-item
              v-else
              :key="`item-${i}`"
              :item="item"
            />
        </template> -->
    <v-list-item-group 
        v-model="component" 
        mandatory
    >
        <v-list-item
            v-for="(item, i) in computedItems"
            :key="`item-${i}`"
            :active-class="`primary ${!isDark ? 'white' : 'white'}--text`"
            link
            :value="item.component"
        >
            <v-list-item-icon>
              <v-icon v-text="item.icon" />
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title v-text="item.title" />
            </v-list-item-content>
        </v-list-item>
    </v-list-item-group>
      <div />
    </v-list>

    <template v-slot:append>
      <v-list-item
        :active-class="`primary ${!isDark ? 'black' : 'white'}--text`"
        link
        v-on:click="updates = true"
      >
        <v-list-item-icon>
          <v-icon>mdi-package-up</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>Настройки</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </template>
  </v-navigation-drawer>
</template>

<script>
  import { mapState, } from 'vuex';
  import BaseItem from '../base/Item.vue';
  import BaseItemGroup from '../base/ItemGroup.vue';
  import Themeable from 'vuetify/lib/mixins/themeable'

  export default {
    name: 'DashboardCoreDrawer',
    mixins: [Themeable],
    props: {
      expandOnHover: {
        type: Boolean,
        default: false,
      },
    },

    components:{
        BaseItem,
        BaseItemGroup
    },

    data: () => ({
      items: [
        {
          title: 'Меню',
          icon: 'mdi-menu',
          component: 'public-menu'
        },
        {
          title: 'Категории',
          icon: 'mdi-clipboard-outline',
          component: 'categories'
        },
        {
          title: 'Подкатегории',
          icon: 'mdi-format-font',
          component: 'sub-categories'
        },
        {
          title: 'Продукты',
          icon: 'mdi-chart-bubble',
          component: 'products'
        },
      ],
    }),

    computed: {
        ...mapState(['barColor', 'barImage']),
        drawer: {
            get () {
              return this.$store.state.drawer
            },
            set (val) {
              this.$store.commit('SET_DRAWER', val)
            },
        },
        component: {
            get () {
              return this.$store.getters.component
            },
            set (val) {
                this.updateGetParam(window.SECTION_PARAM, val);
                this.$store.commit('SET_COMPONENT', val)
            },
        },
        updates: {
            get () {
                return this.$store.state.updates
            },
            set (val) {
                this.$store.commit('SET_UPDATES', val)
            },
        },
        computedItems () {
            return this.items.map(this.mapItem)
        },
        profile () {
            return {
              avatar: true,
              title: 'Vuetify MD',
            }
        },
    },
    methods: {
        mapItem (item) {
            return {
                ...item,
                children: item.children ? item.children.map(this.mapItem) : undefined,
                title: item.title,
            }
        },
        updateGetParam: function(param, val) {
            var url = new URL(window.location.href);
            url.searchParams.delete(window.PAGE_PARAM);
            if (!url.searchParams.has(param)){
                url.searchParams.append(param, val);  
            } else {
                url.searchParams.set(param, val);
            } 
            window.history.pushState(null, null, url.href);
        },
    },
  }
</script>

<style lang="sass">
  @import '~vuetify/src/styles/tools/_rtl.sass'

  #core-navigation-drawer
    .v-list-group__header.v-list-item--active:before
      opacity: .24

    .v-list-item
      &__icon--text,
      &__icon:first-child
        justify-content: center
        text-align: center
        width: 20px

        +ltr()
          margin-right: 24px
          margin-left: 12px !important

        +rtl()
          margin-left: 24px
          margin-right: 12px !important

    .v-list--dense
      .v-list-item
        &__icon--text,
        &__icon:first-child
          margin-top: 10px

    .v-list-group--sub-group
      .v-list-item
        +ltr()
          padding-left: 8px

        +rtl()
          padding-right: 8px

      .v-list-group__header
        +ltr()
          padding-right: 0

        +rtl()
          padding-right: 0

        .v-list-item__icon--text
          margin-top: 19px
          order: 0

        .v-list-group__header__prepend-icon
          order: 2

          +ltr()
            margin-right: 8px

          +rtl()
            margin-left: 8px
</style>
