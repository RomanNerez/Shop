<template>
    <div class="catalog-filter" ref="catalog-filter"
         :class="{active: $root.checkOverlay(0)}"
         :style="{top: positionFilter}"
    >
        <div class="catalog-filter__box"
             v-for="subs in items"
             v-if="subs.enabled"
             :key="subs.group.id"
        >
            <div class="catalog-filter__btn"
                 :class="{active: subs.show}"
                 v-on:click="subs.show = !subs.show"
            >
                <span class="catalog-filter__title unselectable">{{ subs.group.content.title }}</span>
                <svg class="catalog-filter__arrow" width="9" height="9" viewBox="0 0 9 9" stroke="#1E2F3D" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.07129 3.53552L4.53576 7.07106L1.00022 3.53552"  stroke-width="2"/>
                </svg>
            </div>

            <slide-up-down class="catalog-filter__show"
                           :active="subs.show"
                           :duration="150"
            >
                <label class="checked"
                       v-for="sub in subs.items"
                       :key="sub.item.id"
                >
                    <input type="checkbox" class="checked__inout"
                           :value="sub.item.id"
                           v-model="data.selected"
                    >
                    <span class="checked__square"></span>
                    <span class="checked__text">{{ sub.item.content.title }}</span>
                </label>
            </slide-up-down>
        </div>

        <div class="catalog-filter__box" v-if="false">
            <div class="catalog-filter__btn active">
                <span class="catalog-filter__title">Цена</span>
                <svg class="catalog-filter__arrow" width="9" height="9" viewBox="0 0 9 9" stroke="#1E2F3D" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.07129 3.53552L4.53576 7.07106L1.00022 3.53552"  stroke-width="2"/>
                </svg>
            </div>

            <div class="catalog-filter__price">
                <div class="price__group">
                    <input type="number" class="price__input" placeholder="0 грн.">
                    <span class="price__text">-</span>
                    <input type="number" class="price__input" placeholder="10 000 грн.">
                </div>

                <div class="price__progress"><!-- Внутри линию ТЕСТ удаляем и вставляем туда линию или плагин -->
                    <span class="test" style="width: 100%;height: 2px;background: #0069B4"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data: function() {
            return {
                deltaScroll: 0,
                filterHeight: 0,
                windowHeight: window.innerHeight,
                positionFilter: '0px'
            }
        },
        mounted: function() {
            this.filterHeight = this.$refs['catalog-filter'].getBoundingClientRect().height;

            window.addEventListener('scroll', this.handleScroll);
            window.addEventListener('resize', this.handleResize);
        },
        computed: {
            items: function () {
                return this.data.items;
            }
        },
        methods: {
            handleResize: function() {
                this.windowHeight = window.innerHeight;
                this.filterHeight = this.$refs['catalog-filter'].getBoundingClientRect().height;
            },
            handleScroll: function() {
                if ((window.pageYOffset > this.deltaScroll) && (this.windowHeight < this.filterHeight)) {
                    this.positionFilter = this.windowHeight - this.filterHeight +'px';
                }else{
                    this.positionFilter = '0px';
                }
                this.deltaScroll = window.pageYOffset;
            }
        }
    }
</script>
