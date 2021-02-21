var Vue = require('vue'),
    Vuex = require('vuex'),
    Vuetify = require('vuetify');

const { validationMixin, default: Vuelidate } = require('vuelidate')

window.axios = require('axios');

require('../../common/helper/helper.js');
require('../../common/helper/polyfill.js');

import vuexStore from './store/index.js';
import draggable from 'vuedraggable';

Vue.use(Vuex);
Vue.use(Vuetify);
Vue.use(Vuelidate)

Vue.component('create-base',    require('./components/Tabs/BaseForm.vue').default);
Vue.component('create-filters', require('./components/Tabs/Filters.vue').default);
Vue.component('create-meta',    require('./components/Tabs/MetaForm.vue').default);
Vue.component('chose-subs',     require('./components/Tabs/ChoseSubs.vue').default);
Vue.component('base-attr',      require('./components/Tabs/BaseAttr.vue').default);
Vue.component('option-attr',    require('./components/Tabs/OptionAttr.vue').default);
Vue.component('currency-base',  require('./components/Tabs/CurrencyBase.vue').default);
Vue.component('currency-info',  require('./components/Tabs/CurrencyInfo.vue').default);
Vue.component('product-base',   require('./components/Tabs/ProductBase.vue').default);
Vue.component('confirm-item',   require('../../common/components/confirm-item.vue').default);
Vue.component('index',          require('./components/Index.vue').default);
Vue.component('draggable',      draggable);

new Vue({
  	el: '#editor',
  	store: new Vuex.Store(vuexStore),
  	vuetify: new Vuetify(),
  	methods: {
  		confirmAction: function(e, data) {
            this.$refs.confirm.action({
                target: e,
                type: data.type,
                confirm: () => {
                    data.action(data.input);
                    this.$refs.confirm.open = false;
                },
                revoke: () => {
                    this.$refs.confirm.open = false;
                }
            })
        }
  	}
});

