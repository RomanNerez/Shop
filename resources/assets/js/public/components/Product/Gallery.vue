<template>
    <div class="gallery">
        <div class="gallery__main-img">
            <img :src="gallery.selected.source" :key="gallery.selected.id" alt="">

            <template v-if="status.sale">
                <span class="gallery__status">{{ __('Акция') }}</span>
            </template>
            <template v-else-if="status.hit">
                <span class="gallery__status">{{ __('Топ продаж') }}</span>
            </template>
            <template v-else-if="status.new">
                <span class="gallery__status">{{ __('Новинка') }}</span>
            </template>
        </div>

        <div class="gallery__block">
            <div class="gallery__mini-img"
                 v-for="(item, index) in gallery.items"
                 v-on:click="selected = index"
                 :class="{active: selected === index}"
                 :key="item.id"
            >
                <img :src="item.source" alt="" />
            </div>
            <!--<div class="gallery__mini-video">
                <svg width="23" height="26" viewBox="0 0 23 26" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 13L0.500001 25.9904L0.500002 0.00961778L23 13Z"/>
                </svg>
                <span>Видео</span>
            </div>-->
        </div>
    </div>
</template>

<script>
    export default {
        props: ['items', 'status'],
        data: function() {
            return {
                selected: 0,
                screen: window.innerWidth,
                breakpoint: 480
            }
        },
        mounted() {
            window.addEventListener('resize', this.resize);
        },
        watch: {
            items: function () {
                this.selected = 0;
            }
        },
        computed: {
            gallery: function () {
                let count = this.screen > this.breakpoint ? 6 : 4;
                return {
                    selected: this.items[this.selected],
                    items: this.items.slice(0, count)
                }
            }
        },
        methods: {
            resize: function () {
                this.screen = window.innerWidth;
            }
        }
    }
</script>
