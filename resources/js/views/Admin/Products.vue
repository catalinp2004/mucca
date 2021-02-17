<template>
    <div>
        <b-button :href="main_route + '/admin/products/create'" variant="primary" class="mb-3 ">Add new product</b-button>
        <b-button :href="main_route + '/admin'" variant="primary" class="mb-3 ">Back</b-button>
    </div>
</template>

<script>
export default {
    name: "Products",
    props: {
        main_route: String,
    }
}
</script>

<style scoped>

</style>
