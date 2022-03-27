
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('productcard', require('./components/ProductCard.vue').default);
Vue.component('shoppingcart', require('./components/ShoppingCart.vue').default);

//communication between Vue components via eventbus Vue instance
Vue.prototype.eventbus = new Vue(); //sibling vue component communication via eventbus Vue instance

const app = new Vue({
    el: '#app',
});

//devtools in browser
Vue.config.devtools = true
Vue.config.productionTip = false


