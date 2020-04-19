<template>
    

    <footer>

        <!-- FOOTER INFOS -->
        <section id="info" class="container grid">
        
            <article class="col-xs-12 col-xl-3" v-for="page in pages" :key="page.id">
                <h3 class="txt-type-up">{{ page.titre }}</h3>
                <p>{{ page.texte }}</p>
                
                <form action="" v-if="page.id == 4">
                    <input type="text" name="newsletter" id="newsletter-footer">
                </form>
            
            </article>
        
        </section>

        <!-- FOOTER COPY & SOCIAL -->
        <section id="copy-social">
            
            <div class="container">
            
                <div>
                    Copyright &copy; 2016. Template by&nbsp;<a href="https://designseer.com/">Dcrazed</a>
                </div>
            
                <ul>
                    <li><a href="#">d</a></li>
                    <li><a href="#">i</a></li>
                    <li><a href="#">f</a></li>
                    <li><a href="#">g</a></li>
                </ul>
            
            </div>

        </section>

    </footer>

</template>

<script>
    export default {
        computed: {
            global() {
                return this.$store.getters.getGlobalVariables
            },
            pages() {
                return this.$store.getters.getPages
            }
        },
    }
</script>