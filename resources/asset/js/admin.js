import Vue from 'vue';
import Vuex from 'vuex';
import Vuelidate from 'vuelidate';
import vuetify from './components/plugins/vuetify.js';


Vue.use(Vuelidate); 
Vue.use(Vuex);

window.SECTION_PARAM = 'section';
window.PAGE_PARAM = 'page';


const store = new Vuex.Store({
    state: {
        data: window.data,
        barColor: 'rgba(0, 0, 0, .8), rgba(0, 0, 0, .8)',
        barImage: 'https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-1.jpg',
        drawer: null,
        updates: false,
        componentInfo:{}
    },
    getters:{
        component: (state) => state.data.params[window.SECTION_PARAM]
    },
    mutations: {
        SET_BAR_IMAGE (state, payload) {
            state.barImage = payload
        },
        SET_DRAWER (state, payload) {
            state.drawer = payload
        },
        SET_COMPONENT (state, payload) {
            state.data.params[window.SECTION_PARAM] = payload;
        },
        SET_UPDATES (state, payload) {
            state.updates = payload;
        },
    },
    actions: {

    },
});

Vue.component('Index', require('./components/Index.vue').default);

new Vue({
	el: '#wrapper',
	store,
    vuetify,
	data:{
	   
	}
});