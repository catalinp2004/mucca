<template>
    <div>
        <p v-if="lang == 'en'" class="align-items-center mt-5">404 - We could not find that product!</p>
        <p v-else class="align-items-center mt-5">404 - Nu am gasit acest produs!</p>
    </div>
</template>

<script>
export default {
    name: "NotFound",
    computed: {
        lang(){
            if(this.$route.path.split('/')[1] == 'en') {
                return 'en';
            }
            else return 'ro';
        },
    },
}
</script>