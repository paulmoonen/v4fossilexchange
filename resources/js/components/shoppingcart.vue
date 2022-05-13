<template>
    <div>
        <h2>Shopping cart</h2>
                
        <span v-for="(cartitem, key) in this.cartitems" v-bind:key="key">
                                        
            <input type="number" v-model="cartitem[0]" min="0" v-bind:max="cartitem[2]">
            
            <p>   
                <b>price:</b>          {{cartitem[1]}}
                <b>name:</b>           {{cartitem[3]}}
                <b>description:</b>    {{cartitem[4]}}
            </p>
                       
        </span>                 
        
        <input type="button" value="empty shopping cart"    @click="emptyCart()">
        <input type="button" value="save changes"           @click="saveChanges()">
        <input type="button" value="buy"                    @click="checkout()">

        <pre>
            sum:        {{this.sum}}

            <b>shipment data</b>
            name:       {{this.name}}
            street:     {{this.street}}
            country:    {{this.country}}
        </pre>
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
            /*
            data in cartitems[]:
            product_id : [ count, price, stock, name, description ]
            */  
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
        //fill form with data
        this.freshData();
    },

    methods: {
        emptyCart() {
            //calls route   /cart/clear
            axios({
                method: "post",
                url: "/cart/clear"
            }).catch(function(error){
                console.log(error);
            });
            this.freshData();
        },

        //save customer updated version of cart on the server
        saveChanges() {

            //make a key-value list of product_id's and their counts
            let id_list = Object.keys(this.cartitems); 
            let sentdata = {}; //empty key-value list
            
            for(let i = 0; i < id_list.length; i++){
                sentdata[id_list[i]] = this.cartitems[id_list[i]][0];
                //key: product_id = value: count of this item in cartitems array
            }
                        
            axios({
                method: "post",
                url:    "/cart/store",
                data:{
                    shoppingcart: sentdata
                }
            }).catch(function(error){
                console.log(error);
            });

            this.freshData();
        },

        checkout() {
            //call route    /order/store
            axios({
                method:         "post",
                url:            "/order/store",
                data:{
                    shoppinglist: this.cartitems
                }
            }).catch(function(error){
                console.log(error);
            });
        },        

        //called on creation of component, and after plus or minus buttons pressed
        freshData(){
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
        }
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

span{
    display: flex;
    flex-direction: row;
}
</style>
