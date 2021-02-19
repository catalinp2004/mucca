<template>
    <div>
        <h1 class="mb-5 text-center">Categories</h1>
        <hr class="mb-3">
        <b-table striped hover responsive :items="categories" :fields="fields" :sort-by.sync="sortBy"
                 :sort-desc.sync="sortDesc">
            <template v-slot:cell(index)="cat">
                {{ cat.index + 1 }}
            </template>

            <template v-slot:cell(name_ro)="cat">
                <a class="h5" :href="main_route + '/admin/categories/' + cat.item.id">{{ cat.item.name_ro }}</a>
            </template>

            <template v-slot:cell(products)="cat">
                <b-button :href="main_route + '/admin/categories/' + cat.item.id + '/products'" variant="primary">View products</b-button>
            </template>

            <template v-slot:cell(subcategories)="cat">
                <b-button :href="main_route + '/admin/categories/' + cat.item.id" variant="warning">View Subcategory</b-button>
            </template>

        </b-table>

        <b-button :href="main_route + '/admin'" variant="primary" class="mb-3 ">Back</b-button>
    </div>
</template>

<script>
export default {
    name: "Categories",
    data() {
        return {

            fields: [{key: 'index', label: 'No.'}, {key: 'name_ro', label: 'Category', sortable: true}, {key: 'products', label: 'Product'}, {key: 'subcategories', label: 'Subcategories'}],
            sortBy: 'name_ro',
            sortDesc: false,
            modal_type: false,
            modal_show: false,
        }
    },
    props: {
        categories: Array,
        main_route: String,
    },
}
</script>

<style scoped>

</style>
