<template>
    <v-row>
        <v-col
            cols="12"
            lg="6"
        >
            <base-material-chart-card
                :data="columnsData[0]"
                :options="columnarChart.options"
                :responsive-options="columnarChart.responsiveOptions"
                color="#E91E63"
                hover-reveal
                type="Bar"
            >
                <h4 class="card-title font-weight-light mt-2 ml-2">
                    Подписок за месяц
                </h4>

<!--                 <p class="d-inline-flex font-weight-light ml-2 mt-1">
                    <v-icon
                        :color="columnsData[1].colorArrow"
                        small
                    >
                        {{columnsData[1].arrow}} 
                    </v-icon>
                    &nbsp; на &nbsp;
                    <span :class="columnsData[1].colorText"> {{columnsData[1].result}}</span>&nbsp;
                    <template
                    	v-if="columnsData[1].colorArrow === 'red'"
                    >
                    	подписок меньше чем в прошлом месяце
                    </template>
                    <template 
                    	v-else
                    >
                    	подписок  больше чем в прошлом месяце
                    </template>
                </p> -->

<!--                 <template v-slot:actions>
                    <v-icon
                        class="mr-1"
                        small
                    >
                        mdi-clock-outline
                    </v-icon>
                    <span class="caption grey--text font-weight-light">{{updateTime}}</span>
                </template> -->
            </base-material-chart-card>
        </v-col>

        <v-col
            cols="12"
            lg="6"
        >
            <base-material-chart-card
                :data="blogsData[0]"
                :options="blogsChart.options"
                :responsive-options="blogsChart.responsiveOptions"
                color="success"
                hover-reveal
                type="Line"
            >
                <h4 class="card-title font-weight-light mt-2 ml-2">
                    Посещений за месяц
                </h4>

                <!-- <p class="d-inline-flex font-weight-light ml-2 mt-1">
                    <v-icon
                        :color="blogsData[1].colorArrow"
                        small
                    >
                        {{blogsData[1].arrow}}
                    </v-icon>
                    &nbsp; на &nbsp;
                    <span :class="blogsData[1].colorText"> {{blogsData[1].result}}</span>&nbsp;
                    <template
                    	v-if="blogsData[1].colorArrow === 'red'"
                    >
                    	посещений меньше чем в прошлом месяце
                    </template>
                    <template 
                    	v-else
                    >
                    	посещений больше чем в прошлом месяце
                    </template>
                </p> -->

<!--                 <template v-slot:actions>
                    <v-icon
                        class="mr-1"
                        small
                    >
                        mdi-clock-outline
                    </v-icon>
                    <span class="caption grey--text font-weight-light">{{updateTime}}</span>
                </template> -->
            </base-material-chart-card>
        </v-col>

        <v-col
            class="b-stat__plit"
            cols="12"
            sm="6"
            lg="3"
        >
            <base-material-stats-card
                color="info"
                icon="mdi-format-list-bulleted"
                title="Всего категорий"
                :value="categoriesLength"
            />
        </v-col>

        <v-col
            class="b-stat__plit"
            cols="12"
            sm="6"
            lg="3"
        >
            <base-material-stats-card
                color="primary"
                icon="mdi-clipboard-text"
                title="Всего статей"
                :value="blogsLength"
            />
        </v-col>

        <v-col
            class="b-stat__plit"
            cols="12"
            sm="6"
            lg="3"
        >
            <base-material-stats-card
                color="success"
                icon="mdi-link"
                title="Всего посещений"
                :value="visitsNumber"
            />
        </v-col>

        <v-col
            class="b-stat__plit"
            cols="12"
            sm="6"
            lg="3"
        >
            <base-material-stats-card
                color="orange"
                icon="mdi-account-plus"
                title="Всего подписок"
                :value="subscriptionNumber"
            />
        </v-col>
    </v-row>
</template>

<script>
    export default {
        name: 'summary-stat',
        props: ['statisticArrayVisits','statisticArrayBlogs'],
        data () {
            return {
                categories: this.$store.state.data.categories,
                blogs: this.$store.state.data.blogs,
                subscription: this.$store.state.data.followers,
                visits: 24950,
                blogsChart: {
                    options: {
                        lineSmooth: this.$chartist.Interpolation.cardinal({
                            tension: 0,
                        }),
                        low: 0,
                        chartPadding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0,
                        },
                    },
                },
                columnarChart: {
                    options: {
                        axisX: {
                            showGrid: false,
                        },
                        low: 0,
                        chartPadding: {
                            top: 0,
                            right: 5,
                            bottom: 0,
                            left: 0,
                        },
                    },
                },
            }
        },
        computed: {
            columnsData: function() {
                var array = this.statisticArrayVisits[0],
                	dateNumbers = this.statisticArrayVisits[1];
                return this.getDays(dateNumbers, array);
            },
            blogsData: function() {
                var array = this.statisticArrayBlogs[0],
                    dateNumbers = this.statisticArrayBlogs[1];
                return this.getDays(dateNumbers, array);
            },
            categoriesLength: function() {
                return this.categories.length.toString(); 
            },
            blogsLength: function() {
                return this.blogs.length.toString(); 
            },
            visitsNumber: function() {
                return this.visits.toString(); 
            },
            subscriptionNumber: function() {
                return this.subscription.length.toString(); 
            },
        },
        methods: {
        	getDays: function(dateNumbers, array) {
                var data = [
                        {
                            labels: [],
                            series: [
                                [],
                            ],
                        }
                    ];
        		for(var i = 0; i < dateNumbers; i++){
                    if(i % 2 === 0) {
                        if(array[i] !== undefined) {
                            data[0].labels.push(array[i].date);
                        } else {
                            data[0].labels.push(i + 1);
                        }
                    } else {
                        data[0].labels.push('');
                    }
                    if(array[i] !== undefined) {
                        data[0].series[0].push(array[i].statistic);
                    } else {
                        data[0].series[0].push(null);
                    }
                }
                return data;
        	},
        },
    }
</script>
