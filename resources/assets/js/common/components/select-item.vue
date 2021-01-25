<template>
    <div class="select"
         :class="[type, {active: show}]"
         v-on:click="show = !show"
         v-click-outside="hide"
    >
        <input type="text" :placeholder="placeholder" class="select__input"
            :value="getValue"
        />
        <img :src="_asset('library/img/select-arrow.svg')" alt="" class="select__img">

        <transition name="select">
            <div class="select__show"
                 v-if="show"
            >
                <span class="select__text"
                      v-for="item in items"
                      v-on:click="set(item.value)"
                      :class="{active: item.value === value}"
                >
                    {{ __(item.name) }}
                </span>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['type', 'placeholder', 'items', 'value'],
        data: function () {
            return {
                show: false,
            }
        },
        computed: {
            getValue: function () {
                let value = this.items.find(item => item.value === this.value);

                return value ? this.__(value.name) : null;
            }
        },
        methods: {
            hide: function () {
                this.show = false
            },
            set: function (val) {
                this.$emit('input', val);
            }
        }
    }
</script>
