window.Vue = require('vue');
window.axios = require('axios');

Vue.component('login-form', require('./components/login-form.vue').default);

new Vue({
    el: '#login',
});
