<template>
    <div class="container examplecomponent">
        <p>ExampleComponent</p>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data(){
            return{
                
            }
        },
        
        props:{
            text: String,
        }

    }
</script>

<style lang="css">

.examplecomponent{
    background-color: salmon;
    padding: 1rem;
    margin: 1rem;
    border-radius: 1rem;
}

</style>
