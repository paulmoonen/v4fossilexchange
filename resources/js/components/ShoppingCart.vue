<template>
    <div class="shoppingcart">
        <slot>
            <!--  csrf token from blade-->
        </slot>

        <h1>Shopping Cart</h1>

        <div
            class=""
            v-for="(product_data, product_id) in shoppinglist"
            :key="product_id"
        >
            <!-- count: method parameters id and price -->
            <button @click="increase(product_id, product_data[1])">
                <b>+</b>
            </button>
            {{ product_data[0] }}
            <button @click="decrease(product_id, product_data[1])">
                <b>-</b>
            </button>

            <!-- description -->
            {{ product_data[3] }}
        </div>

        <h2>Sum: {{ this.getSum }}</h2>

        <button v-on:click="makePurchase">Buy</button>
        <button v-on:click="emptyCart">Empty Shopping Cart</button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "shoppingcart",

    props: {
        csrf_token: String,
    },

    /*
    shopping cart data is stored in browser SessionStorage
    for reactive displaying the Vue ShoppingCart component keeps its own, synchronized copy
    */
    data: function () {
        return {
            sum: 0.0,
            shoppinglist: {},
            loggedin: 0, //referenced by makePurchase()S
        };
    },

    mounted: function () {
        this.eventbus.$on("tocart", (product) => {
            this.addToCart(product);
        });
        this.readSessionStorage();
        this.loginCheck();
        console.log(`loggedin: ${this.loggedin}`);
    },

    computed: {
        getSum() {
            return Math.abs(this.sum).toFixed(2);
        },
    },

    methods: {
        addToCart: function (product) {
            /*
            shopping cart data is stored as a JSON string in browser Session Storage memory
            {
                id:         [count, price, stock, description],
                next_id:    [count, price, stock, description],
                ...
            }
            */

            //data received from productcard
            let id = product[0];
            let price = product[1];
            let stock = product[2];
            let description = product[3];

            if (sessionStorage.getItem("shoppingList") === null) {
                let JsonShoppingList = {};

                JsonShoppingList[id] = [1, price, stock, description];
                sessionStorage.setItem(
                    "shoppingList",
                    JSON.stringify(JsonShoppingList)
                );
            } else {
                let JsonShoppingList = JSON.parse(
                    sessionStorage.getItem("shoppingList")
                );
                if (JsonShoppingList[id] === undefined) {
                    JsonShoppingList[id] = [1, price, stock, description];
                } else {
                    //avoid string concatenation
                    let number = parseInt(JsonShoppingList[id][0]);
                    number = number + 1;
                    JsonShoppingList[id][0] = number;
                }
                sessionStorage.setItem(
                    "shoppingList",
                    JSON.stringify(JsonShoppingList)
                );
            }

            //already a sum declared in session storage?
            if (sessionStorage.getItem("sum") != null) {
                let sum = parseFloat(sessionStorage.getItem("sum"));
                sum = sum + price;
                sessionStorage.setItem("sum", sum);
            }
            if (sessionStorage.getItem("sum") === null) {
                sessionStorage.setItem("sum", price);
            }
            //update displayed data
            this.readSessionStorage();
        },

        increase(product_id, price) {
            //retrieve data from sessionstorage
            let JsonShoppingList = JSON.parse(
                sessionStorage.getItem("shoppingList")
            );
            let thisproduct = JsonShoppingList[product_id];
            let count = thisproduct[0];
            let stock = thisproduct[2];

            if (count < stock) {
                count += 1;
                //update productcard stock, try an event $emit?
                thisproduct[0] = count; //updated count
                JsonShoppingList[product_id] = thisproduct;
                sessionStorage.setItem(
                    "shoppingList",
                    JSON.stringify(JsonShoppingList)
                );
                this.eventbus.$emit("stockdecrease", product_id);

                let sum = parseFloat(sessionStorage.getItem("sum"));
                sum = sum + price;
                sessionStorage.setItem("sum", sum);
            }

            //update displayed data
            this.readSessionStorage();
        },

        decrease(product_id, price) {
            //retrieve data from sessionstorage
            let JsonShoppingList = JSON.parse(
                sessionStorage.getItem("shoppingList")
            );
            let thisproduct = JsonShoppingList[product_id];
            let count = thisproduct[0];

            if (count > 0) {
                count -= 1;
                //update productcard stock, try an event $emit?
                thisproduct[0] = count; //updated count
                JsonShoppingList[product_id] = thisproduct;
                sessionStorage.setItem(
                    "shoppingList",
                    JSON.stringify(JsonShoppingList)
                );
                this.eventbus.$emit("stockincrease", product_id);

                let sum = parseFloat(sessionStorage.getItem("sum"));
                sum = sum - price;
                sessionStorage.setItem("sum", sum);
            }

            //update displayed data
            this.readSessionStorage();
        },

        emptyCart() {
            sessionStorage.clear();
            this.readSessionStorage(); //update ShoppingCart component
            this.eventbus.$emit("emptycart");
        },

        //retrieve sum from browser's session storage
        readSessionStorage() {
            //sum
            if (sessionStorage.getItem("sum")) {
                //if a not-empty string is returned
                let sumstr = JSON.parse(sessionStorage.getItem("sum"));
                let sumfloat = parseFloat(sumstr);
                this.sum = sumfloat;
            } else {
                this.sum = 0.0;
            }

            //selected items and their numbers
            if (sessionStorage.getItem("shoppingList")) {
                //if a not-empty string is returned
                let templist = JSON.parse(
                    sessionStorage.getItem("shoppingList")
                );
                this.shoppinglist = templist;
            } else {
                this.shoppinglist = {};
            }
        },

        loginCheck() {
            //check if customer is logged in, before continuing with axios call
            axios({
                method: "get",
                url: "/logged_in",
            })
                //arrow notation is crucial for using keyword 'this'
                .then((response) => {
                    this.loggedin = response.data;
                })
                .catch(function (error) {
                    console.log(`error message says: ${error}`);
                });
        },

        makePurchase() {
            if (this.loggedin == 0) {
                alert("please log in to make a purchase.");
            }
            if (this.loggedin == 1) {
                //add sum to shoppinglistdata
                let localsum = this.sum;
                this.shoppinglist["sum"] = localsum;

                //check if customer is logged in, before continuing with axios call

                axios({
                    method: "post",
                    url: "/order/store",
                    data: this.shoppinglist,
                })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        alert(`error message says: ${error}`);
                    });

                //empty cart again
                this.emptyCart();
                alert(
                    "Thank you for making a purchase, we will make a more stylish route for a confirmation message soon."
                );
            }
        },
    },
};
</script>

<style scoped>
.shoppingcart {
    padding: 1rem;
    margin: 1rem;
    background-color: darkkhaki;
    border-radius: 0.3rem;
}
</style>
