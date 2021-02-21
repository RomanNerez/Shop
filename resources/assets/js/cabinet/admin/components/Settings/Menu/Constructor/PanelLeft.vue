<template>
    <v-expansion-panels
        accordion
    >
        <v-expansion-panel
            v-for="(panel, index) in panels"
            :key="index"
            :value="index"
        >
            <v-expansion-panel-header>
                {{panel.title}}
            </v-expansion-panel-header>
            <v-expansion-panel-content>
                <component
                    :is="panel.component"
                    :data="panel.data"
                    :state="panel.state"
                ></component>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script>
    import InsideDetails from './InsideDetails.vue';
    import ArbitraryLinks from './ArbitraryLinks.vue'

    export default{
        components:{
            InsideDetails,
            ArbitraryLinks
        },
        data: function (){
            return {
                panels:[
                    {
                        title: 'Категории',
                        component: 'inside-details',
                        state: 'store',
                        data: 'categories'
                    },{
                        title: 'Коллекции',
                        component: 'inside-details',
                        state: 'store',
                        data: 'collections'
                    },{
                        title: 'Страницы',
                        component: 'inside-details',
                        state: 'content',
                        data: 'pages'
                    },{
                        title: 'Произвольные ссылки',
                        component: 'arbitrary-links',
                        state: 'store',
                        data: ''
                    }
                ]
            }
        }
    }
</script>
