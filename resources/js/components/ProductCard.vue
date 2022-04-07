<template>
    <div class="col-4">
        <form class="productcard" @submit.prevent="addToBasket">
            <slot>
                <!--  csrf token from blade-->
            </slot>

            <p>
                <b>{{ this.description }}</b>
            </p>
            <p>Price: {{ this.price }}</p>
            <p>Stock: {{ this.stockcounter }}</p>
            <img
                :src="this.getImgUrl"
                alt="image"
                class="img-fluid"
                v-show="this.image"
            />

            <!-- only show an image element if there is an image -->
            <span v-show="!this.image">No image available &#128248; </span>
            <button type="submit" :disabled="!this.stockcounter">
                &#128722; add to cart
            </button>
        </form>
    </div>
</template>

<script>
export default {
    name: "productcard",

    props: {
        id: Number,
        description: String,
        price: Number,
        stock: Number,
        image: String,
    },

    data: function () {
        return {
            //buy button disable counter variable
            stockcounter: this.stock,
            imageslist: []
        };
    },

    mounted: function () {
        //make a list of all pictures of this product
        
    },

    computed: {
        getImgUrl() {
            return "../pictures/" + this.image;
        },
    },

    methods: {
        //write purchase data to browser session storage:
        addToBasket: function () {
            this.stockcounter -= 1;
            
            //experiment: axios call to server
            axios({
                method: "post",
                url: `/cart/add/${this.id}`,
                data: { 
                    modifier:  1
                }
            })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    alert(`error message says: ${error}`);
                });
        },
        
    },
};
</script>

<style scoped>
.productcard {
    margin: 1rem;
    padding: 0.5rem;
    border-style: solid;
    border-width: 1px;
    border-color: orangered;
    border-radius: 0.3rem;
    background-color: aquamarine;
}
img {
    border-radius: 0.3rem;
}

button {
    margin: 0.3rem;
}
</style>
