<template>
    <div>
        <!-- display one single "form" of v-model editable shopping cart data -->
        <!-- several buttons to reach different cart related routes-->
        <!-- pulls related activities together in one screen -->

        <slot><!-- csrf token --></slot>
    </div>
</template>

<script>
export default {

    props:{},
    data:{ function(){
        return{}
    }},

    mounted:function(){
        //get shoppingcart data, put in data property, for template display and editing 
    },
    methods:{
        emptyCart(){
            //calls route   /cart/clear
        },

        updateCart(){
            //calls route   /cart/store
        },

        checkout(){
            //call route    /order/store
        }
    }
};
</script>
<style scoped></style>
