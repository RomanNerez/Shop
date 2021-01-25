<template>
    <v-app id="inspire">
        <v-navigation-drawer app
            v-model="drawer"
            :dark="true"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('/library/img/sidebar-1.jpg'); background-position: center;background-size: cover;"
        >
            <v-divider style="width:calc(100% - 32px)!important;" class="ml-4"></v-divider>

            <v-list-item class="px-3 py-3">
                <v-list-item-avatar class="mr-3 ml-2">
                    <span>{{ user.fullname | firstLetter }}</span>
                </v-list-item-avatar>
                <v-list-item-title class="mr-2">{{ user.fullname }}</v-list-item-title>
            </v-list-item>

            <v-divider style="width:calc(100% - 32px)!important;" class="ml-4"></v-divider>
            <v-list class="pa-4">
                <v-list-group
                    v-for="(menu, index) in menus"
                    :value="(index == selecteditem.menu)"
                    :key="index"
                    dense
                    class="py-1"
                >

                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title v-text="menu.title" class="white--text"></v-list-item-title>
                        </v-list-item-content>
                    </template>

                    <v-list-item
                        v-for="(child, index) in menu.child"
                        :key="index"
                        class="px-3 my-2"
                        :class="{'is-active': selectItem === child.component}"
                        v-on:click="selectItem = child.component"
                    >
                        <v-list-item-icon class="my-3 mr-4 ml-1">
                            <v-icon>{{child.icon}}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title class="font-weight-regular text-body-2">{{child.title}}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-group>
            </v-list>

        </v-navigation-drawer>

        <v-app-bar
            absolute
            app
            color="transparent"
            flat
            fixed
            height="90"
        >
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>{{selecteditem.data.title}}</v-toolbar-title>

            <template v-if="selecteditem.data.filter && selecteditem.data.filter.items.length">
                <v-autocomplete label="Категория:" class="nav__filter"
                                filled
                                color="#4bb04f"
                                v-model="selected.categories"
                                :items="selecteditem.data.filter.items"
                                item-text="content.ru.title"
                                item-value="id"
                                no-data-text="Нет совпадений..."
                ></v-autocomplete>
            </template>

            <v-spacer></v-spacer>

            <!--<v-menu
                bottom
                left
                offset-y
                origin="top right"
                transition="scale-transition"
            >
                <template v-slot:activator="{ attrs, on }">
                    <v-btn
                        class="ml-2"
                        min-width="0"
                        text
                        v-bind="attrs"
                        v-on="on"
                    >
                        <v-badge
                            color="red"
                            overlap
                            bordered
                        >
                            <template v-slot:badge>
                                <span>5</span>
                            </template>
                            <v-icon>mdi-bell</v-icon>
                        </v-badge>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item>
                        <v-list-item-title>Option 1</v-list-item-title>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title>Option 2</v-list-item-title>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title>Option 3</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>-->

            <a href="/" target="_blank" style="text-decoration: unset">
                <v-btn
                    class="ml-2"
                    min-width="0"
                    text
                >
                    <v-icon>mdi-home-export-outline</v-icon>
                </v-btn>
            </a>

            <v-menu
                bottom
                left
                offset-y
                origin="top right"
                transition="scale-transition"
            >
                <template v-slot:activator="{ attrs, on }">
                    <v-btn
                        class="ml-2"
                        min-width="0"
                        text
                        v-bind="attrs"
                        v-on="on"
                    >
                        <v-icon>mdi-account</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item>
                        <v-list-item
                            tag="a"
                            :href="location + '/logout'"
                            v-on:click.prevent="$root.confirmAction($event, {
                                type: 'logout',
                                action: logout
                            })"
                        >Выйти</v-list-item>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>

        <v-main>
            <keep-alive>
                <component
                    :is="selecteditem.data.component"
                    :chosen="selected"
                ></component>
            </keep-alive>
        </v-main>
    </v-app>
</template>

<script>
    import SettingsCurrency from './Settings/Currency/Index.vue'

    import StoreCategories from './Store/Categories.vue'
    import StoreGroups from './Store/Groups.vue'
    import StoreCollection from './Store/Collection/Index.vue'
    import StoreAttributes from './Store/Attributes/Index.vue'
    import StoreProducts from './Store/Products/Index.vue'
    import ContentCategories from './Content/Categories.vue'
    import ContentGroups from './Content/Groups.vue'
    import ContentArticles from './Content/Articles/Index.vue'

    export default {
        components: {
            'settings-currency': SettingsCurrency,
            'store-categories': StoreCategories,
            'store-groups': StoreGroups,
            'store-collection': StoreCollection,
            'store-attributes': StoreAttributes,
            'store-products': StoreProducts,
            'content-categories': ContentCategories,
            'content-groups': ContentGroups,
            'content-articles': ContentArticles
        },
        data: function() {
            return {
                location: window.location.origin,
                selectItem: this.$store.state.data.divide ? this.$store.state.data.divide : 'settings-currency',
                drawer: null,
                user: this.$store.getters.userData,
                selected: {
                    categories: null
                }
            }
        },
        watch:{
            selectItem: function(){
                window.history.replaceState(null, null, window.location.origin +'/home?divide='+ this.selecteditem.data.component);
            }
        },
        computed: {
            menus: function() {
                return [
                    {
                        title: 'Настройки',
                        icon: 'mdi-format-list-bulleted',
                        child: [
                            {
                                title: 'Валюты',
                                icon: 'mdi-currency-usd',
                                component: 'settings-currency',
                            }
                        ]
                    },{
                        title: 'Магазин',
                        icon: 'mdi-format-list-bulleted',
                        child: [
                            {
                                title: 'Категории',
                                icon: 'mdi-buffer',
                                component: 'store-categories',
                            },{
                                title: 'Группы',
                                icon: 'mdi-animation',
                                component: 'store-groups',
                                filter: {
                                    key: 'categories',
                                    items: this.getCategories
                                }
                            },{
                                title: 'Коллекции',
                                icon: 'mdi-rhombus-split',
                                component: 'store-collection',
                                filter: {
                                    key: 'categories',
                                    items: this.getCategories
                                }
                            },{
                                title: 'Атрибуты',
                                icon: 'mdi-tag-multiple-outline',
                                component: 'store-attributes'
                            },{
                                title: 'Продукты',
                                icon: 'mdi-unity',
                                component: 'store-products',
                                filter: {
                                    key: 'categories',
                                    items: this.getCategories.filter(item => {
                                        return !item.is_root;
                                    })
                                }
                            }
                        ]
                    },{
                        title: 'Контент',
                        icon: 'mdi-format-list-bulleted',
                        child: [
                            {
                                title: 'Категории',
                                icon: 'mdi-buffer',
                                component: 'content-categories'
                            },{
                                title: 'Рубрики',
                                icon: 'mdi-animation',
                                component: 'content-groups',
                                filter: {
                                    key: 'categories',
                                    items: this.$store.getters.contentData.available.categories
                                }
                            },{
                                title: 'Записи',
                                icon: 'mdi-content-paste',
                                component: 'content-articles',
                                filter: {
                                    key: 'categories',
                                    items: this.$store.getters.contentData.available.categories
                                }
                            }
                        ]
                    }
                ]
            },
            getCategories: function () {
                return this.$store.getters.storeData.available.categories.sort((a, b) => {
                    return Number(b.is_root) - Number(a.is_root);
                });
            },
            selecteditem: function() {
                for(let i = 0; i < this.menus.length; i++){
                    var index = i,
                        menu = this.menus[i].child;

                    for(let i = 0; i < menu.length; i++){
                        let item = menu[i];
                        if (item.component === this.selectItem) {
                            if (item.filter && item.filter.items.length) {
                                this.selected[ item.filter.key ] = item.filter.items[0].id
                            }
                            return {
                                data: item,
                                menu: index
                            };
                            break;
                        }
                    }
                }
            }
        },
        filters: {
            firstLetter: function (value) {
                return value[0];
            }
        },
        methods: {
            logout: function(){
                document.getElementById('logout-form').submit();
            },
        }
    }
</script>


