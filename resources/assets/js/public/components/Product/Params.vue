<template>
    <div class="card__info-wrapper">
        <div class="card__info"
            v-for="group in data"
        >
            <div class="card__info-btn"
                 v-on:click="group.show = !group.show"
                 :class="{active: group.show}"
            >
                <span>{{ group.title }}</span>
                <svg width="9" height="9" viewBox="0 0 9 9" stroke="#1E2F3D" fill="none" class="catalog-filter__arrow">
                    <path d="M8.07129 3.53552L4.53576 7.07106L1.00022 3.53552" stroke-width="2"></path>
                </svg>
            </div>
            <slide-up-down class="card__info-show"
                           :active="group.show"
                           :duration="150"
            >
                <div class="card__info-text"
                     v-for="item in group.items"
                >
                    <span class="left">{{ item.name }}:</span>
                    <span class="right">{{ item.value }}</span>
                </div>
            </slide-up-down>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['items'],
        computed: {
            data: function () {
                return this.items;
            }
        }
    }
</script>
