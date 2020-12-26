import Vue from 'vue';
import Vuelidate from 'vuelidate';
import vuetify from './components/plugins/vuetify.js';
import draggable from 'vuedraggable';
window.axios = require('axios');


Vue.use(Vuelidate);

window.SECTION_PARAM = 'section';
window.PAGE_PARAM = 'page';

import store from './store/index.js';

Vue.component('Index', require('./components/Index.vue').default);
Vue.component('draggable', draggable);

new Vue({
	el: '#wrapper',
	store,
    vuetify,
	data:{
	   
	}
});