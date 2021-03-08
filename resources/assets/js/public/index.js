window.Vue = require('vue');
window.axios = require('axios');

let Vuex = require('vuex'),
    mixins = [];

require('../common/helper/helper.js');
require('../common/helper/polyfill.js');

import Mixin from './mixin.js';
import vuexStore from './store.js';
import SlideUpDown from 'vue-slide-up-down'
import ClickOutside from 'vue-click-outside'
import Notifications from 'vue-notification'
import smoothscroll from 'smoothscroll-polyfill';
import VueTelInput from 'vue-tel-input';

Vue.component('Auth', require('./components/Auth/Auth').default);
Vue.component('header-select', require('./components/Header/selects-layout').default);
Vue.component('search-layout', require('./components/Header/search-layout').default);
Vue.component('select-item',   require('../common/components/select-item').default);
Vue.component('product-card',  require('../common/components/product-card').default);
Vue.component('load-content',  require('../common/components/load-content').default);
Vue.component('slide-up-down', SlideUpDown)

Vue.mixin(Mixin);
Vue.directive('click-outside', ClickOutside);

Vue.use(Notifications)
Vue.use(Vuex);
Vue.use(VueTelInput);

if (response.component === 'cart') {
    Vue.component('cart-layout', require('./components/Cart/Index.vue').default);
    Vue.component('cart-order', require('./components/Cart/Order.vue').default);
}
if (response.component === 'favorites') {
    Vue.component('favorites-layout', require('./components/Favorites/Index.vue').default);
}
if (response.component === 'catalog') {
    mixins.push(require('./instance/products.js').default);
}
if (response.component === 'product') {
    mixins.push(require('./instance/product.js').default);
}
if (response.component === 'compare') {
    mixins.push(require('./instance/compare.js').default);
}
if (response.component === 'search') {
    mixins.push(require('./instance/search.js').default);
}
if (response.component === 'articles') {
    mixins.push(require('./instance/articles.js').default);
}
if (response.component === 'service-vinyls') {
    mixins.push(require('./instance/service-vinyls.js').default);
}
if (response.component === 'service-standing') {
    mixins.push(require('./instance/service-standing.js').default);
}
if (response.component === 'certificates') {
    mixins.push(require('./instance/certificates.js').default);
}
if (response.component === 'home') {
    mixins.push(require('./instance/home.js').default);
}
if (response.component === 'units') {
    mixins.push(require('./instance/units.js').default);
}

new Vue ({
    el: '#app',
    store: new Vuex.Store(vuexStore),
    mixins: mixins,
    data: {
        auth:{
            show: false
        },
        loading: false,
        overlay: null,
        navbar: null,
        headFilterMob: false,
        calc_tabs: 0,
        cabinet_tabs: 0,
        notifyRequest: null,
        orders_user: {
            one: false,
            two: false,
            three: false,
        }
    },
    mounted: function() {
        smoothscroll.polyfill();
        document.querySelectorAll('[data-action=scrollTo]').forEach(item => {
            item.onclick = function (e) {
                e.preventDefault();
                document.querySelector( item.getAttribute('href') ).scrollIntoView({ behavior: 'smooth' });
            }
        })
    },
    computed: {
        cart: function () {
            let cart = this.$store.getters.getCart,
                count = 0;

            if (cart && cart.length) {
                if (cart.length > 1) {
                    count = cart.reduce((result, current) => result + current.count, 0);
                }else{
                    count = cart[0].count;
                }
            }
            return {
                items: cart,
                count: count
            };
        },
        favorites: function () {
            let favorites = this.$store.getters.getFavorites,
                count = favorites ? favorites.length : 0;

            return {
                items: favorites,
                count: count
            };
        },
        compare: function () {
            let compare = this.$store.getters.getCompare,
                count = compare ? compare.length : 0;

            return {
                items: compare,
                count: count
            };
        }
    },
    methods: {
        setOverlay: function (param) {
            this.overlay = this.overlay == null ? param : null;
        },
        checkOverlay: function (param) {
            return this.overlay === param
        },
        overlayClick: function(param) {
            this.overlay = this.overlay == null ? param : null;
        },
        navbarClick: function(param) {
            this.navbar = this.navbar == null ? param : null;
        }
    }
})
