
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('productcard', require('./components/ProductCard.vue').default);
Vue.component('adminproductsearchfield', require('./components/adminproductsearchfield.vue').default);

const app = new Vue({
    el: '#app',
    data:{
        subset: [] //stores a selection of products, used by adminproductsearchfield.vue 
    }
});

//devtools in browser
Vue.config.devtools = true
Vue.config.productionTip = false


