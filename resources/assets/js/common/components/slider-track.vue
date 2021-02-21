<template>
    <div ref="wrap">
        <div class="slider-track-item"
             ref="track"
             :style="{transform: 'translateX('+ position +'px)'}"
        >
            <slot name="slide"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                step: 0,
                length: 0,
                width: {
                    track: 0,
                    wrap: 0
                }
            }
        },
        mounted() {
            this.length = this.$slots.slide.length;

            this.handle();
            window.addEventListener('resize', this.handle);
        },
        computed: {
            show: function() {
                return this.width.wrap / this.slide
            },
            slide: function() {
                return this.width.track / this.length;
            },
            check: function() {
                return this.slide * this.step + this.slide * this.show;
            },
            disabled: function () {
                return {
                    next: this.check > this.width.track,
                    prev: !this.step
                }
            },
            position: function () {
                if ( this.length ) {
                    let val = this.slide * this.step;
                    if ( this.disabled.next ) {
                        val -= (this.slide * (this.show % 1));
                    }
                    return - val;
                }else{
                    return 0;
                }
            }
        },
        methods: {
            handle: function () {
                setTimeout(() => {
                    this.width.track = this.$refs.track.getBoundingClientRect().width;
                    this.width.wrap = this.$refs.wrap.getBoundingClientRect().right;
                }, 1000)
            },
            stepMove: function (val) {
                if ((val > 0 && this.disabled.next) || (val < 0 && this.disabled.prev)) {
                    return false;
                }
                this.step += val;
            }
        }
    }
</script>
