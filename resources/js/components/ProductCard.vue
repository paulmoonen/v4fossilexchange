<template>
    <div class="col-4">
        <form class="productcard" @submit.prevent="addToBasket">
           
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
            picturedisplaylist: []
        };
    },

    mounted: function () {
        //counter and display reset
        this.eventbus.$on("emptycart", () => {
            this.reset();
        });
        this.eventbus.$on("stockdecrease", (product_id) => {
            if (product_id == this.id) {
                this.stockcounter -= 1;
            }
        });

        this.eventbus.$on("stockincrease", (product_id) => {
            if (product_id == this.id) {
                this.stockcounter += 1;
            }
        });
		//prepare a list of pictures
		this.makePictureList();        
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
            let product = [this.id, this.price, this.stock, this.description];
            this.eventbus.$emit("tocart", product);
        },

        /*
		displayed stock will be reset to initial value
		add-to-basket button will be enabled again
		*/
        reset() {
            if (this.stockcounter < this.stock) {
                this.stockcounter = this.stock;
            }
        },
		/*
		function to return a list of all picture filepaths for this product
		for v-binding to src property of one or more <img> elements
		*/
		makePictureList: function(){
			/*
			find a list of all pictures for this product
			*/
			axios({
				method: "get",
				url: "/pictures/"+this.id,
				data: this.id,
			})
			.then((response) => {
				//this.picturedatalist = response.data;
				let responselist = response.data;
				responselist.forEach(function(picturedata){
					let name = picturedata.name;
					console.log(name);
					
					

				})
			})
			.catch(function (error) {
				alert(`error message says: ${error}`);
			});
			
			


		}
    },
};
</script>

<style scoped>
.productcard {
    margin: 1rem;
    padding: 0.5rem;
    border-radius: 0.3rem;
    background-color: aqua;
}
img {
    border-radius: 0.3rem;
}

button {
    margin: 0.3rem;
}
</style>
