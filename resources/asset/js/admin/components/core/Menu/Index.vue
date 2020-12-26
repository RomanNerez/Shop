<template>
    <div>
        <v-container
            id="regular-tables"
            fluid
            tag="section"
        >
            <v-tabs
                v-model="tab"
                background-color="success accent-4"
                dark
            >
                <v-tabs-slider></v-tabs-slider>
                <v-tab
                    v-for="(tab, index) in tabs"
                    :key="index"
                    :href="`#tab-${index}`"
                >
                    {{tab.title}}
                    <v-icon v-if="tab.icons">mdi-phone</v-icon>
                </v-tab>

                <v-tab-item
                    v-for="(tab, index) in tabs"
                    :key="index"
                    :value="'tab-' + index"
                >
                    <component :is="tab.component"></component>
                </v-tab-item>
            </v-tabs>
        </v-container>
    </div>
</template>

<script>
    import Constructor from './Constructor/Index.vue';
    import List from './List.vue';

    export default {
        components: {
            Constructor,
            List
        },
        data: function() {
            return {
                tab: null,
                tabs: [
                    {
                        title: 'Редактор Меню',
                        component: 'constructor'
                    },
                    {
                        title: 'Управление областями',
                        component: 'list'
                    },
                ],
            }
        },
    }
</script>
