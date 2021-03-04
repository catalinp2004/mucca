<template>
    <div>
        <h1 class="mb-3">Categories</h1>
        <hr class="mb-5">
        <b-table striped hover responsive borderless :items="categories" :fields="fields" :sort-by.sync="sortBy"
                 :sort-desc.sync="sortDesc">
            <template v-slot:cell(index)="cat">
                {{ cat.index + 1 }}
            </template>

            <template v-slot:cell(name_ro)="cat">
                <a :href="main_route + '/admin/categories/' + cat.item.id">{{ cat.item.name_ro }}</a>
            </template>

            <template v-slot:cell(subcategories)="cat">
                <b-button pill :href="main_route + '/admin/categories/' + cat.item.id + '/products'" variant="secondary" size="sm">View products in Category</b-button>
                <b-button pill :href="main_route + '/admin/categories/' + cat.item.id" variant="primary" size="sm">View Subcategories</b-button>
            </template>

        </b-table>

        <a :href="main_route + '/admin'" class="btn-mucca mt-32"><i class="fas fa-arrow-circle-left"></i> Back</a>
    </div>
</template>

<script>
export default {
    name: "Categories",
    data() {
        return {

            fields: [{key: 'index', label: 'Item no.'}, {key: 'name_ro', label: 'Category', sortable: true}, {key: 'subcategories', label: 'Products / Subcategories', class: "text-right"}],
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
