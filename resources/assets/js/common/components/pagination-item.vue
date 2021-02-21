<template>
    <ul class="pagination" v-if="count > 1">
        <li class="prev" v-on:click="step(-1)" :disabled="!page.now">
            <a href="#0" disabled>
                <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 1L1 8L8 15" stroke="black" stroke-opacity="0.5"></path>
                </svg>
            </a>
        </li>
        <div class="pag_group">
            <template>
                <li class="number" v-if="(page.now + 1) > page.scale" v-on:click="page.now = pageCoef - 1">
                    <a href="#0" disabled>...</a>
                </li>
                <li class="number"
                    v-for="item in scale"
                    v-if="item + pageCoef <= count"
                    :class="{active: (item + pageCoef) == page.now + 1}"
                    v-on:click="page.now = item + pageCoef - 1"
                >
                    <a href="#0" disabled>{{ item + pageCoef }}</a>
                </li>
                <li class="number" v-if="(count - page.scale) > pageCoef" v-on:click="page.now = pageCoef + page.scale">
                    <a href="#0" disabled="">...</a>
                </li>
                <span class="bottom"></span>
            </template>
        </div>
        <li class="next" v-on:click="step(1)" :disabled="page.now + 1 == count">
            <a href="#0" disabled>
                <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 15L8 8L1 1" stroke="black" stroke-opacity="0.5"></path>
                </svg>
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['current', 'total', 'size'],
        data: function() {
            return {
                page: {
                    now: 0,
                    scale: 0
                }
            }
        },
        mounted() {
            this.resize();
            window.addEventListener('resize', this.resize);

            this.page.now = this.current - 1;
        },
        watch: {
            'page.now': function () {
                this.$emit('update:current', this.page.now + 1);
            }
        },
        computed: {
            count: function() {
                return Math.ceil(this.total / this.size)
            },
            pageCoef: function(){
                let calc = Math.floor(this.page.now / this.page.scale);

                return calc * this.page.scale;
            },
            scale: function() {
                return this.count > this.page.scale ? this.page.scale : this.count;
            }
        },
        methods: {
            resize: function() {
                this.page.scale = window.innerWidth > 500 ? 5 : 3;
            },
            step: function( step ) {
                var prop = this.page.now + step;

                if ( prop >= 0 && prop < this.count ) {
                    this.page.now = prop;
                }
            },
        }
    }
</script>
