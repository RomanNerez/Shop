<template>
    <v-container
        id="summaring"
        fluid
        tag="section"
    >
        <summary-stat
            :statisticArrayBlogs="statisticArrayBlogs"
            :statisticArrayVisits="statisticArrayVisits"
        ></summary-stat>
    </v-container>  
</template>

<script>
    import Statistics from './Statistics.vue'
    export default {
        name: 'summaring',
        components: {
            'summary-stat': Statistics,
        },
        data () {
            return {
                statisticArrayVisits: [
                    [
                        {
                            date: 1,
                            statistic: 234
                        },
                        {
                            date: 2,
                            statistic: 234
                        },
                        {
                            date: 3,
                            statistic: 23
                        },
                        {
                            date: 4,
                            statistic: 234
                        },
                        {
                            date: 5,
                            statistic: 234
                        },
                        {
                            date: 6,
                            statistic: 234
                        },
                        {
                            date: 7,
                            statistic: 234
                        },
                        {
                            date: 8,
                            statistic: 234
                        },
                        {
                            date: 9,
                            statistic: 234
                        },
                        {
                            date: 10,
                            statistic: 234
                        },
                        {
                            date: 11,
                            statistic: 234
                        },
                        {
                            date: 12,
                            statistic: 234
                        },
                        {
                            date: 13,
                            statistic: 23
                        },
                        {
                            date: 14,
                            statistic: 234
                        },
                        {
                            date: 15,
                            statistic: 234
                        },
                        {
                            date: 16,
                            statistic: 234
                        },
                        {
                            date: 17,
                            statistic: 234
                        },
                    ],
                    [30]
                ],
                statisticArrayBlogs: [
                    [
                        {
                            date: 1,
                            statistic: 234
                        },
                        {
                            date: 2,
                            statistic: 234
                        },
                        {
                            date: 3,
                            statistic: 23
                        },
                        {
                            date: 4,
                            statistic: 234
                        },
                        {
                            date: 5,
                            statistic: 234
                        },
                        {
                            date: 6,
                            statistic: 234
                        },
                        {
                            date: 7,
                            statistic: 234
                        },
                        {
                            date: 8,
                            statistic: 234
                        },
                        {
                            date: 9,
                            statistic: 234
                        },
                        {
                            date: 10,
                            statistic: 234
                        },
                        {
                            date: 11,
                            statistic: 234
                        },
                        {
                            date: 12,
                            statistic: 234
                        },
                        {
                            date: 13,
                            statistic: 23
                        },
                        {
                            date: 14,
                            statistic: 234
                        },
                        {
                            date: 15,
                            statistic: 234
                        },
                        {
                            date: 16,
                            statistic: 234
                        },
                        {
                            date: 17,
                            statistic: 234
                        },
                        {
                            date: 18,
                            statistic: 50
                        },
                        {
                            date: 19,
                            statistic: 234
                        },
                        {
                            date: 20,
                            statistic: 234
                        },
                        {
                            date: 21,
                            statistic: 234
                        },
                        {
                            date: 22,
                            statistic: 234
                        },
                        {
                            date: 23,
                            statistic: 23
                        },
                        {
                            date: 24,
                            statistic: 0
                        },
                        {
                            date: 25,
                            statistic: 234
                        },
                        {
                            date: 26,
                            statistic: 234
                        },
                    ],
                    [30]
                ],
            }   
        }
    }
</script>
