<template>
    <div class="single_element_in_template">
        <form class="adminproductsearch" @submit.prevent="findProducts">
            <h2>Admin Product Searchfield</h2>

            <select name="ctegory" id="category">
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

            <select name="origin" id="origin">
                <option
                    v-for="(origin, index) in this.getSitesList"
                    :key="index"
                    :value="category"
                >
                    {{ origin }}
                </option>
            </select>
            <label for="origin">select origin site</label>
            <br />

            <input type="number" min="1" step="1" id="product_id" />
            <label for="product_id">if known: fill in the product id</label>
            <br />

            <input type="submit" value="search" />
        </form>


    </div>
</template>

<script>
export default {
    name: "adminproductsearchfield",

    props: {},

    data: function () {
        return {
            categories: [],
            originsites: [],
            product_id_numbers: [],
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
        //urn arrays of objects into more practical arrays of strings, for v-for displaying

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
    },

    methods: {
        findProducts: function(){
            
        }
    },
};
</script>

<style scoped></style>
