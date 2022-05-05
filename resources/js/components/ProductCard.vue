<template>
    
        <form class="productcard" @submit.prevent="addToBasket">
            <slot>
                <!--  csrf token from blade-->
            </slot>

            <p>
                <b>{{ this.description }}</b>
            </p>
            <p>Price: {{ this.price }}</p>
            <p>Stock: {{ this.stockcounter }}</p>
            
            <img v-for="(image , index) in this.getImgPaths"
                    :src="image"
                    :key="index"
                    alt="image"
                    class="img-fluid"/>

            <p>Found at: <b>{{this.site_name}}</b></p>

            <button type="submit" :disabled="!this.stockcounter">
                &#128722; add to cart
            </button>
        </form>
    
</template>

<script>
export default {
    name: "productcard",

    props: {
        id: Number,
        description: String,
        price: Number,
        stock: Number,
        site_name: String                
    },

    data: function () {
        return {
            //buy button disable counter variable
            stockcounter: this.stock,
            imageslist: [], 
            
        };
    },

    mounted: function () {
        //make a list of all pictures of this product
        axios({
                method: "get",
                url: `/pictures/${this.id}`,
                
            })
            .then(response => {
                this.imageslist = response.data
            })
            .catch(function (error) {
                alert(`error message says: ${error}`);
            });   
        
    },

    computed: {
        
        //turn picture filenames into usable filepaths
        getImgPaths(){

            let pathlist = [];
            this.imageslist.forEach(function(record){
                let name = record.name;
                let image_src = "/storage/pictures/" + name;
                pathlist.push(image_src);
            });
            return pathlist;
        }
    },

    methods: {
        //decrease counter and notify server
        addToBasket: function () {
            this.stockcounter -= 1;
            
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
    margin: 0.3rem;
}

button {
    margin: 0.3rem;
}
</style>
