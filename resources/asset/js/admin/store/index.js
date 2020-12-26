import Vue from 'vue';
import Vuex from 'vuex';
import menu from './modules/menu.js';

Vue.use(Vuex);

const store = new Vuex.Store({
	modules:{
		menu
	},
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

export default store;