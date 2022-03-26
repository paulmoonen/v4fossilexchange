<template>
    <div class="container headercomponent">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ this.sitetitle  }}</h1>
                <p>{{ this.text }}</p>
                
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        name: "headercomponent",

        mounted() {
            console.log('Component mounted.')
        },

        data(){
            return{
                text: "Header text from Vue component"
            }
        },
        
        props:{
            sitetitle: String,
        },       

    }
</script>

<style lang="css">

.headercomponent{
    background-color: mediumseagreen;
    padding: 1rem;
    margin: 1rem;
    border-radius: 1rem;
}

</style>