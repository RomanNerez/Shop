<template>
    <div class="header-select">
        <div class="lang lang--desktop dropdown-item"
             v-on:click="action.lang = !action.lang"
             v-click-outside="hideLang"
             :class="{active: action.lang}"
        >
            <span class="lang__title">{{ data.lang.selected.abbrev }}</span>
            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.65625 2.82843L3.82782 5.65686L0.999396 2.82843" stroke="black"
                      stroke-opacity="0.45" stroke-width="2"/>
            </svg>
            <div class="dropdown-box">
                <a class="dropdown-box__title"
                   v-for="item in data.lang.items"
                   :href="item.url"
                >{{ item.title }}</a>
            </div>
        </div>
        <div class="currency currency--desktop"
             v-on:click="action.currency = !action.currency"
             v-click-outside="hideCurrency"
             :class="{active: action.currency}"
        >
            <span class="currency__title">{{ data.currency.selected.code }}</span>
            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.65625 2.82843L3.82782 5.65686L0.999396 2.82843" stroke="black"
                      stroke-opacity="0.45" stroke-width="2"/>
            </svg>
            <div class="dropdown-box">
                <a class="dropdown-box__title"
                   v-for="item in data.currency.items"
                   :href="item.url"
                >{{ item.content.name }}</a>
            </div>
        </div>
        <div class="phone"
             v-on:click="action.phone = !action.phone"
             v-click-outside="hidePhone"
             :class="{active: action.phone}"
        >
            <svg  x="0px" y="0px"  viewBox="0 0 480 480" >
                <path d="M256,128c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c35.296,0,64,28.704,64,64c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16C352,171.072,308.928,128,256,128z"/>
                <path d="M256,64c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c70.592,0,128,57.408,128,128c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16C416,135.776,344.224,64,256,64z"/>
                <path d="M256,0c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c105.888,0,192,86.112,192,192c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16C480,100.48,379.488,0,256,0z"/>
                <path d="M432,352c-46.464,0-90.72-10.112-131.52-30.048c-3.84-1.92-8.256-2.144-12.256-0.736c-4.032,1.408-7.328,4.352-9.184,8.16l-25.152,52.064C188.8,345.12,134.912,291.264,98.624,226.176l52.032-25.216c3.84-1.856,6.752-5.152,8.16-9.184c1.376-4,1.12-8.416-0.768-12.256C138.112,138.72,128,94.464,128,48c0-8.832-7.168-16-16-16H16C7.168,32,0,39.168,0,48c0,238.208,193.792,432,432,432c8.832,0,16-7.168,16-16v-96C448,359.168,440.832,352,432,352z"/>
            </svg>

            <div class="phone__box">
                <a class="phone__title"
                   v-for="phone in data.options.phones"
                   :href="'tel:'+ phone"
                >
                    {{ phone }}
                </a>
                <span class="phone__info">{{ data.options.content.schedule }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                action: {
                    lang: false,
                    currency: false,
                    phone: false
                }
            }
        },
        computed: {
            data: function () {
                return this.$store.state.header;
            }
        },
        methods: {
            hideLang: function () {
                this.action.lang = false;
            },
            hideCurrency: function () {
                this.action.currency = false;
            },
            hidePhone: function () {
                this.action.phone = false;
            }
        }
    }
</script>

<style scoped>

</style>
