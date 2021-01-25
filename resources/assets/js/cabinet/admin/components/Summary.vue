<template>
    <v-container
        id="dashboard"
        fluid
        tag="section"
    >
        <v-row>
            <v-col
                cols="12"
                lg="8	"
            >
                <base-material-chart-card
                    :data="columnarChart.data"
                    :options="columnarChart.options"
                    :responsive-options="columnarChart.responsiveOptions"
                    color="#E91E63"
                    hover-reveal
                    type="Bar"
                >
                    <template v-slot:reveal-actions>
                        <v-tooltip bottom>
                            <template v-slot:activator="{ attrs, on }">
                                <v-btn
                                    v-bind="attrs"
                                    color="info"
                                    icon
                                    v-on="on"
                                >
                                    <v-icon
                                        color="info"
                                    >
                                        mdi-refresh
                                    </v-icon>
                                </v-btn>
                            </template>

                            <span>Refresh</span>
                        </v-tooltip>

                        <v-tooltip bottom>
                            <template v-slot:activator="{ attrs, on }">
                                <v-btn
                                    v-bind="attrs"
                                    light
                                    icon
                                    v-on="on"
                                >
                                    <v-icon>mdi-pencil</v-icon>
                                </v-btn>
                            </template>

                            <span>Change Date</span>
                        </v-tooltip>
                    </template>

                    <h4 class="card-title font-weight-light mt-2 ml-2">
                        Website Views
                    </h4>

                    <p class="d-inline-flex font-weight-light ml-2 mt-1">
                        Last Campaign Performance
                    </p>

                    <template v-slot:actions>
                        <v-icon
                            class="mr-1"
                            small
                        >
                            mdi-clock-outline
                        </v-icon>
                        <span class="caption grey--text font-weight-light">updated 10 minutes ago</span>
                    </template>
                </base-material-chart-card>
            </v-col>

            <v-col
                cols="12"
                lg="4"
            >
                <base-material-chart-card
                    :data="dailySalesChart.data"
                    :options="dailySalesChart.options"
                    color="success"
                    hover-reveal
                    type="Line"
                >
                    <template v-slot:reveal-actions>
                        <v-tooltip bottom>
                            <template v-slot:activator="{ attrs, on }">
                                <v-btn
                                    v-bind="attrs"
                                    color="info"
                                    icon
                                    v-on="on"
                                >
                                    <v-icon
                                        color="info"
                                    >
                                        mdi-refresh
                                    </v-icon>
                                </v-btn>
                            </template>

                            <span>Refresh</span>
                        </v-tooltip>

                        <v-tooltip bottom>
                            <template v-slot:activator="{ attrs, on }">
                                <v-btn
                                    v-bind="attrs"
                                    light
                                    icon
                                    v-on="on"
                                >
                                    <v-icon>mdi-pencil</v-icon>
                                </v-btn>
                            </template>

                            <span>Change Date</span>
                        </v-tooltip>
                    </template>

                    <h4 class="card-title font-weight-light mt-2 ml-2">
                        Daily Sales
                    </h4>

                    <p class="d-inline-flex font-weight-light ml-2 mt-1">
                        <v-icon
                            color="green"
                            small
                        >
                            mdi-arrow-up
                        </v-icon>
                        <span class="green--text">55%</span>&nbsp;
                        increase in today's sales
                    </p>

                    <template v-slot:actions>
                        <v-icon
                            class="mr-1"
                            small
                        >
                            mdi-clock-outline
                        </v-icon>
                        <span class="caption grey--text font-weight-light">updated 4 minutes ago</span>
                    </template>
                </base-material-chart-card>
            </v-col>

            <v-col
                cols="12"
                lg="4"
            >
                <base-material-chart-card
                    :data="dataCompletedTasksChart.data"
                    :options="dataCompletedTasksChart.options"
                    hover-reveal
                    color="info"
                    type="Line"
                >
                    <template v-slot:reveal-actions>
                        <v-tooltip bottom>
                            <template v-slot:activator="{ attrs, on }">
                                <v-btn
                                    v-bind="attrs"
                                    color="info"
                                    icon
                                    v-on="on"
                                >
                                    <v-icon
                                        color="info"
                                    >
                                        mdi-refresh
                                    </v-icon>
                                </v-btn>
                            </template>

                            <span>Refresh</span>
                        </v-tooltip>

                        <v-tooltip bottom>
                            <template v-slot:activator="{ attrs, on }">
                                <v-btn
                                    v-bind="attrs"
                                    light
                                    icon
                                    v-on="on"
                                >
                                    <v-icon>mdi-pencil</v-icon>
                                </v-btn>
                            </template>

                            <span>Change Date</span>
                        </v-tooltip>
                    </template>

                    <h3 class="card-title font-weight-light mt-2 ml-2">
                        Completed Tasks
                    </h3>

                    <p class="d-inline-flex font-weight-light ml-2 mt-1">
                        Last Last Campaign Performance
                    </p>

                    <template v-slot:actions>
                        <v-icon
                            class="mr-1"
                            small
                        >
                            mdi-clock-outline
                        </v-icon>
                        <span class="caption grey--text font-weight-light">campaign sent 26 minutes ago</span>
                    </template>
                </base-material-chart-card>
            </v-col>

            <v-col
                cols="12"
                sm="6"
                lg="3"
            >
                <base-material-stats-card
                    color="info"
                    icon="mdi-format-list-bulleted"
                    title="Всего категорий"
                    :value="categoriesLength"
                    sub-icon="mdi-clock"
                    sub-text="Just Updated"
                />
            </v-col>

            <v-col
                cols="12"
                sm="6"
                lg="3"
            >
                <base-material-stats-card
                    color="primary"
                    icon="mdi-clipboard-text"
                    title="Всего статей"
                    :value="blogsLength"
                    sub-icon="mdi-tag"
                    sub-text="Tracked from Google Analytics"
                />
            </v-col>

            <v-col
                cols="12"
                sm="6"
                lg="3"
            >
                <base-material-stats-card
                    color="success"
                    icon="mdi-store"
                    title="Всего посещений"
                    value="$ 34,245"
                    sub-icon="mdi-calendar"
                    sub-text="Last 24 Hours"
                />
            </v-col>

            <v-col
                cols="12"
                sm="6"
                lg="3"
            >
                <base-material-stats-card
                    color="orange"
                    icon="mdi-sofa"
                    title="Всего подписок"
                    value="184"
                    sub-icon="mdi-alert"
                    sub-icon-color="red"
                    sub-text="Get More Space..."
                />
            </v-col>
        </v-row>
    </v-container>  
</template>

<script>
    export default {
        name: 'summaring',

        data () {
            return {
                categories: this.$store.state.data.categories,
                blogs: this.$store.state.data.blogs,
                statisticArray: [
                    {
                        month: 'январь',
                        statistic: 234
                    },
                    {
                        month: 'фераль',
                        statistic: 54
                    },
                    {
                        month: 'март',
                        statistic: 145
                    },
                    {
                        month: 'апрель',
                        statistic: 180
                    },
                    {
                        month: 'январь',
                        statistic: 234
                    },
                    {
                        month: 'фераль',
                        statistic: 54
                    },
                    {
                        month: 'март',
                        statistic: 145
                    },
                    {
                        month: 'апрель',
                        statistic: 180
                    },
                    {
                        month: 'январь',
                        statistic: 234
                    },
                    {
                        month: 'фераль',
                        statistic: 54
                    },
                    {
                        month: 'март',
                        statistic: 145
                    },
                    {
                        month: 'апрель',
                        statistic: 180
                    },
                ],
                dailySalesChart: {
                    data: {
                        labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                        series: [
                            [12, 17, 7, 17, 23, 18, 38],
                        ],
                    },
                    options: {
                        lineSmooth: this.$chartist.Interpolation.cardinal({
                            tension: 0,
                        }),
                        low: 0,
                        high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                        chartPadding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0,
                        },
                    },
                },
                dataCompletedTasksChart: {
                    data: {
                        labels: ['12am', '3pm', '6pm', '9pm', '12pm', '3am', '6am', '9am'],
                        series: [
                            [230, 750, 450, 300, 280, 240, 200, 190],
                        ],
                    },
                    options: {
                        lineSmooth: this.$chartist.Interpolation.cardinal({
                            tension: 0,
                        }),
                        low: 0,
                        high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                        chartPadding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0,
                        },
                    },
                },
                columnarChart: {
                    data: {
                        labels: [],
                        series: [
                            [],

                        ],
                    },
                    options: {
                        axisX: {
                            showGrid: false,
                        },
                        low: 0,
                        high: 1000,
                        chartPadding: {
                            top: 0,
                            right: 5,
                            bottom: 0,
                            left: 0,
                        },
                    },
                    responsiveOptions: [
                        ['screen and (max-width: 640px)', {
                            seriesBarDistance: 5,
                            axisX: {
                                labelInterpolationFnc: function (value) {
                                    return value[0]
                                },
                            },
                        }],
                    ],
                },
            }
        },
        computed: {
            categoriesLength: function() {
                
                 var array = this.statisticArray;
                for(var i = 0; i < array.length; i++){
                    this.columnarChart.data.labels.push(array[i].month); 
                    this.columnarChart.data.series[0].push(array[i].statistic);
                }

                // console.log(this.columnarChart.data.series[0]);
                // var maxVal = Math.max(...this.columnarChart.data.series[0]);
                // var roundVal = Math.round(maxVal / 10) * 10;
                // if (roundVal <= maxVal) {
                //     roundVal += 10;
                // }
                // this.columnarChart.options.high = roundVal;


                return this.categories.length.toString(); 
            },
            blogsLength: function() {
                return this.blogs.length.toString(); 
            },
        },
        watch: {
            // statisticArray: function() {
            //     var array = this.statisticArray;
            //     for(var i = 0; i < array.length; i++){
            //         this.columnarChart.data.labels.push(array[i].month); 
            //         this.columnarChart.data.series[0].push(array[i].statistic);
            //     }
            // },
            'columnarChart.data.series': function() {
                console.log(this.columnarChart.data.series[0]);
                var maxVal = Math.max(...this.columnarChart.data.series[0]);
                var roundVal = Math.round(maxVal / 10) * 10;
                if (roundVal <= maxVal) {
                    roundVal += 10;
                }
                this.columnarChart.options.high = roundVal;
            },
        },
        methods: {
            complete (index) {
                this.list[index] = !this.list[index]
            },
        },
    }
</script>
