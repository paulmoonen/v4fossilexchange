
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('productcard', require('./components/ProductCard.vue').default);

const app = new Vue({
    el: '#app',
});

//devtools in browser
Vue.config.devtools = true
Vue.config.productionTip = false


