<template>
    <div class="select"
         :class="[type, {active: show}]"
         v-on:click="show = !show"
         v-click-outside="hide"
    >
        <input type="text" :placeholder="placeholder" class="select__input"
            :value="getValue"
        />
        <template v-if="checkValue && !show && !notreset">
            <div type="button" class="select__img"
                 v-on:click="set(null)"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386.667 386.667"><path d="m386.667 45.564-45.564-45.564-147.77 147.769-147.769-147.769-45.564 45.564 147.769 147.769-147.769 147.77 45.564 45.564 147.769-147.769 147.769 147.769 45.564-45.564-147.768-147.77z"/></svg>
            </div>
        </template>
        <template v-else>
            <div type="button" class="select__img">
                <img :src="_asset('library/img/select-arrow.svg')" alt="" />
            </div>
        </template>

        <transition name="select">
            <div class="select__show"
                 v-if="show"
            >
                <span class="select__text"
                      v-for="item in items"
                      v-on:click="set( getUse(item) )"
                      :class="{active: getUse(item) === value}"
                >
                    {{ getName(item) }}
                </span>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['type', 'placeholder', 'items', 'value', 'label', 'name', 'use', 'notreset'],
        data: function () {
            return {
                show: false,
            }
        },
        computed: {
            checkValue: function() {
                return this.value !== null && this.value !== undefined
            },
            getValue: function () {
                let value = this.items.find(item => this.getUse(item) === this.value);

                return value ? this.getNameHolder(value) : null;
            }
        },
        methods: {
            hide: function () {
                this.show = false
            },
            set: function (val) {
                this.$emit('input', val);
            },
            getNameHolder: function(value) {
                let result = this.getName(value);
                if ( this.label && this.label === 'save-holder' ) {
                    return this.placeholder + result;
                }

                return result;
            },
            getName: function (item) {
                if (this.name) {
                    return this.getKeys('name', item)
                }
                return this.__(item.name)
            },
            getUse: function (item) {
                if (this.use) {
                    return this.getKeys('use', item)
                }
                return item.value
            },
            getKeys: function (key, item) {
                let keys = this[key].split('.');

                for (let i = 0; i < keys.length; ++i) {
                    item = item[ keys[i] ];
                }

                return item;
            }
        }
    }
</script>
