<template>

    <div>
        {{ test }}
    </div>
              
</template>

<script>
    export default {
        data () {
            return {
                test: this.$route.params.produitId
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
