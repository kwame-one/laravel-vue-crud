/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import App from "./views/App.vue"
import router from "./router"
import MainContent from "./components/layouts/MainContent.vue"
import 'vue-loading-overlay/dist/vue-loading.css';
import Loading from 'vue-loading-overlay';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


window.Vue.component("main-content", MainContent)
window.Vue.component("loading", Loading)

Vue.use(VueSweetalert2);






const app = new Vue({
    el: '#app',
    router,
    components: {"main-app": App}
});
