<template>
    <div>
        <h2>Shopping cart Vue Component</h2>
        <!-- display one single "form" of v-model editable shopping cart data -->
        <!-- several buttons to reach different cart related routes-->
        <!-- pulls related activities together in one screen -->

        <p>name: {{ this.name }}</p>
        <slot><!-- csrf token --></slot>
    </div>
</template>

<script>
import { createUnionTypeAnnotation } from "@babel/types";
import axios from "axios";

export default {
    name: "shoppingcart",

    props: {},
    data: function () {
        return {
            cartitems: [],
            sum: 0.0,
            name: "Bob",
            street: "Mijnstraat",
            housenumber: "123",
            postal_code: "4321ZZ",
            city: "Thuis",
            country: "Aarde",
        };
    },

    mounted: function () {
        //get cart content
        axios({
            method:     "get",
            url:        "/cart/contentlist"
        }).then(response =>{
            this.cartitems = response.data;
        }).catch(function(error){
            console.log(error);
        });

        //get cart sum
        axios({
            method: "get",
            url:    "/cart/sum"
        }).then(response =>{
            this.sum = response.data;
        }).catch(function(error){
            console.log(error);
        });
        //get address data
    },
    methods: {
        emptyCart() {
            //calls route   /cart/clear
        },

        updateCart() {
            //calls route   /cart/store
        },

        checkout() {
            //call route    /order/store
        },
    },
};
</script>
<style scoped>
div {
    background-color: darkkhaki;
}

h2 {
    color: green;
}
</style>
