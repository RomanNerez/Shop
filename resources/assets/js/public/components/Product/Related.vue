<template>
    <section class="also-buy" v-if="data.length">
        <load-content
            :show="!init"
        ></load-content>

        <h2 class="unselectable">{{ __('С этим товаром также покупают') }}</h2>
        <transition-group name="slider" tag="div" class="also-buy__slider"
                          :class="{'before-load': !init}"
        >
            <product-card
                class="slide-item unselectable"
                cls="block-three"
                v-for="item in list"
                :key="item.id"
                :data="item"
            ></product-card>

            <div class="slider-btn"
                key="slider-btn"
            >
                <div class="slider-btn__arrow"
                     v-on:click="--step"
                     :disabled="disabled.prev"
                >
                    <svg style="transform: scale(-1,1)" width="28" height="16" viewBox="0 0 28 16"
                         fill="#BFBFBF" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27.7071 8.7071C28.0976 8.31658 28.0976 7.68342 27.7071 7.29289L21.3431 0.92893C20.9526 0.538406 20.3195 0.538406 19.9289 0.92893C19.5384 1.31945 19.5384 1.95262 19.9289 2.34314L25.5858 8L19.9289 13.6569C19.5384 14.0474 19.5384 14.6805 19.9289 15.0711C20.3195 15.4616 20.9526 15.4616 21.3431 15.0711L27.7071 8.7071ZM8.74228e-08 9L27 9L27 7L-8.74228e-08 7L8.74228e-08 9Z"/>
                    </svg>
                </div>
                <div class="slider-btn__arrow"
                     v-on:click="++step"
                     :disabled="disabled.next"
                >
                    <svg width="28" height="16" viewBox="0 0 28 16" fill="#BFBFBF"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M27.7071 8.7071C28.0976 8.31658 28.0976 7.68342 27.7071 7.29289L21.3431 0.92893C20.9526 0.538406 20.3195 0.538406 19.9289 0.92893C19.5384 1.31945 19.5384 1.95262 19.9289 2.34314L25.5858 8L19.9289 13.6569C19.5384 14.0474 19.5384 14.6805 19.9289 15.0711C20.3195 15.4616 20.9526 15.4616 21.3431 15.0711L27.7071 8.7071ZM8.74228e-08 9L27 9L27 7L-8.74228e-08 7L8.74228e-08 9Z"/>
                    </svg>
                </div>
            </div>
        </transition-group>
    </section>
</template>

<script>
    export default {
        props: ['data', 'id'],
        data: function() {
            return {
                step: 0,
                init: false,
                window: window.innerWidth,
                items: []
            }
        },
        mounted() {
            this.step = this.data.length - this.slide;

            if (this.data.length) {
                axios.post(window.origin +'/product/'+ this.id +'/related', {
                    data: this.data
                })
                .then(response => {
                    this.items = response.data;
                    setTimeout(() => {
                        for (let i = this.step; i >= 0; --i) {
                            setTimeout(() => {
                                this.step = i;
                            }, 50)
                        }
                        setTimeout(() => {
                            this.init = true;
                        }, 1000)
                    }, 250)
                })
            }
            window.addEventListener('resize', this.setCount);
        },
        computed: {
            list: function () {
                return this.items.slice(this.step, (this.slide + this.step));
            },
            disabled: function() {
                return {
                    prev: !this.step,
                    next: (this.step + this.slide) === this.data.length || this.data.length <= this.slide
                }
            },
            slide: function () {
                if (this.window > 1366) {
                    return 4
                } else if (this.window > 767) {
                    return 3
                } else if (this.window > 480) {
                    return 2
                } else {
                    return 1
                }
            }
        },
        methods: {
            setCount: function () {
                this.window = window.innerWidth;
            }
        }
    }
</script>
