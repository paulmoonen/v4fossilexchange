<template>
    <div class="single_element_in_template">
        <div class="adminproductsearch">
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

            <button v-on:click="sendQuery">Search</button>
        </div>

        <!-- list of subset of products that match search criteria -->
        <ul>
            <li v-for="(item, index) in this.getSelection" :key="index">
                <a :href="item.edit_url">Edit product {{ item.id }}</a>
                <p>
                    name: {{ item.name }} description:
                    {{ item.description }} 
                </p>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "adminproductsearchfield",

    props: {},

    data: function () {
        return {
            categories: [], //all possible categories
            originsites: [], //all possible originsites
            category: "unknown", //data from category selection field
            origin: "unknown", //data from origin site selection field
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
        getSelection() {
            let selection = this.$root.$data;
            //add an url string for easy rerouting
            let subset = selection.subset;
            subset.forEach((element) => {
                element.edit_url = `/admin/product/edit/${element.id}`;
            });
            return selection.subset;
        },
    },

    methods: {
        //send a query for products that match the criteria
        sendQuery: function () {
            axios({
                method: "post",
                url: "/admin/product/subset",
                data: {
                    origin: this.origin,
                    category: this.category,
                },
            })
                .then((response) => {
                    //root reference works fine from here, in contrast to 'this'
                    this.$root.$data.subset = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        
    },
};
</script>

<style scoped></style>
