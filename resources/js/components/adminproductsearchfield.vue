<template>
    <div class="single_element_in_template">
        <form class="adminproductsearch" @submit.prevent="findProducts">
        <slot>
            <!-- csrf token slot-->
        </slot>
            <h2>Admin Product Searchfield</h2>

            <select v-model="category">
                <option
                    v-for="(category, index) in this.getCategoriesList"
                    :key="index"
                    :value="category"
                >
                    {{ category }}
                </option>
            </select>
            <label for="category">select category</label>
            <br />

            <select v-model="origin">
                <option
                    v-for="(origin, index) in this.getSitesList"
                    :key="index"
                    :value="origin"
                >
                    {{ origin }}
                </option>
            </select>
            <label for="origin">select origin site</label>
            <br />

            <input type="number" value="0" min="0" step="1" v-model="product_id"/>
            <label for="product_id">if known: fill in the product id</label>
            <br />

            <input type="submit" value="search" />
        </form>

        <!-- list of subset of products that match search criteria -->
        <!-- made with function listSubset under computed -->


    </div>
</template>

<script>
export default {
    name: "adminproductsearchfield",

    props: {},

    data: function () {
        return {
            categories: [],         //all possible categories
            originsites: [],        //all possible originsites
            category: "unknown",    //data from category selection field
            origin: "unknown",      //data from origin site selection field
            product_id: 0,          //data from product id selection field
            subset: []              //all products that match the search criteria
        };
    },

    mounted: function () {
        //get all categories
        axios({
            method: "get",
            url: "/admin/categories",
        })
            .then((response) => {
                this.categories = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });

        //get all originsites
        axios({
            method: "get",
            url: "/admin/originsites",
        })
            .then((response) => {
                this.originsites = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
    },

    computed: {
        //turn arrays of objects into more practical arrays of strings, for v-for displaying

        //displayable array of categories name strings
        getCategoriesList() {
            let list = [];
            this.categories.forEach(function (record) {
                list.push(record.name);
            });
            return list;
        },

        //displayable array of originsites name strings
        getSitesList() {
            let list = [];
            this.originsites.forEach(function (record) {
                list.push(record.site_name);
            });
            return list;
        },

        //display a list of the found subset of products

    },

    methods: {
        findProducts: function(){
             
            console.log(`category: ${this.category}, origin: ${this.origin}, ID: ${this.product_id}`);
            //axios call to /admin/product/subset
            
            axios({
                method: "post",
                url: "/admin/product/subset"
            })
            .then((response)=>{
                subset = response.data;
            })
            .catch();
            

        }
    },
};
</script>

<style scoped></style>
