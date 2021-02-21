<template>
    <section class="reviews">
        <h2>{{ __('Отзывы и комментарии') }}</h2>
        <transition-group name="slider" tag="div" class="reviews-slider">
            <div class="reviews-block__wrap"
                 v-for="item in list"
                 :key="item.id"
            >
                <div class="reviews-block">
                    <div class="reviews-block__top">
                        <a :href="item.product.url" class="reviews-block__img">
                            <img :src="item.product.image" alt="" />
                        </a>
                        <div class="reviews-block__box">
                            <span class="reviews-block__name">{{ item.name }}</span>
                            <a :href="item.product.url" class="reviews-block__view">{{ item.product.title }}</a>
                            <div class="reviews-block__rating">
                                <div class="star"
                                     v-for="index in 5"
                                     :class="{active: index <= item.rating}"
                                >
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="#F65353"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 5.7292L9.54964 5.35696L7.49701 0L5.44439 5.35696L0 5.7292L4.1758 9.41256L2.80553 15L7.49701 11.9194L12.1885 15L10.8183 9.41256L15 5.7292Z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="reviews-block__text">{{ item.message }}</p>
                    <span class="reviews-block__info">{{ item.created_at }} <!--<b>Отзыв в otzovik.ua</b>--></span>
                </div>
                <!--<div class="reviews-admin">
                    <span class="reviews-admin__title">Ответ от <b>Magniton</b></span>
                    <span class="reviews-admin__text">Спасибо за отзыв, будем стараться делать сервис еще лучше.</span>
                    <span class="reviews-admin__btn">подробнее</span>
                </div>-->
            </div>

            <div class="slider-btn" key="btn">
                <div class="slider-btn__arrow"
                     v-on:click="--step"
                     :disabled="!step"
                >
                    <svg style="transform: scale(-1,1)" width="28" height="16" viewBox="0 0 28 16"
                         fill="#BFBFBF" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27.7071 8.7071C28.0976 8.31658 28.0976 7.68342 27.7071 7.29289L21.3431 0.92893C20.9526 0.538406 20.3195 0.538406 19.9289 0.92893C19.5384 1.31945 19.5384 1.95262 19.9289 2.34314L25.5858 8L19.9289 13.6569C19.5384 14.0474 19.5384 14.6805 19.9289 15.0711C20.3195 15.4616 20.9526 15.4616 21.3431 15.0711L27.7071 8.7071ZM8.74228e-08 9L27 9L27 7L-8.74228e-08 7L8.74228e-08 9Z"/>
                    </svg>
                </div>
                <div class="slider-btn__arrow"
                     v-on:click="++step"
                     :disabled="(step + slide) === items.length || items.length <= slide"
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
        props: ['items'],
        data: function() {
            return {
                step: 0,
                window: window.innerWidth
            }
        },
        mounted() {
            window.addEventListener('resize', this.setCount);
        },
        computed: {
            list: function () {
                return this.items.slice(this.step, (this.slide + this.step));
            },
            slide: function () {
                if (this.window > 900) {
                    return 3
                } else if (this.window > 600) {
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
