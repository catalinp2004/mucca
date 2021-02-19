<template>
    <div>
        <b-button :href="main_route + '/admin/products/create'" variant="primary" class="mb-3 ">Add new product</b-button>
        <b-container fluid>
            <!-- User Interface controls -->
            <b-row>
                <b-col lg="6" class="my-1">
                    <b-form-group
                        label="Categories"
                        label-for="categories"
                        label-cols-sm="3"
                        label-align-sm="right"
                        class="mb-0"
                    >
                        <multiselect id="categories" v-model='selected_subcategories' :options="categories_options" :close-on-select="false" :clear-on-select="false" :multiple="true" group-values="subcategories" group-label="category" :group-select="true" placeholder="Type to search" track-by="value" label="text">
                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
                            <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
                        </multiselect>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row>
                <b-col lg="6" class="my-1">
                    <b-form-group
                        label="Filter"
                        label-for="filter-input"
                        label-cols-sm="3"
                        label-align-sm="right"
                        class="mb-0"
                    >
                        <b-input-group >
                            <b-form-input
                                id="filter-input"
                                v-model="filter"
                                type="search"
                                placeholder="Type to Search"
                            ></b-form-input>

                            <b-input-group-append>
                                <b-button :disabled="!filter || filter == ' ' " @click="filter = ''">Clear</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row>
                <b-col sm="5" md="6" class="my-1">
                    <b-form-group
                        label="Per page"
                        label-for="per-page-select"
                        label-cols-sm="6"
                        label-cols-md="4"
                        label-cols-lg="3"
                        label-align-sm="right"
                        class="mb-0"
                    >
                        <b-form-select
                            id="per-page-select"
                            v-model="perPage"
                            :options="pageOptions"
                        ></b-form-select>
                    </b-form-group>
                </b-col>

                <b-col sm="7" md="6" class="my-1">
                    <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        align="fill"
                        class="my-0"
                    ></b-pagination>
                </b-col>
            </b-row>

            <!-- Main table element -->
            <b-table
                :items="products"
                :fields="fields"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="filter"
                :filter-function="filterTable"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :sort-direction="sortDirection"
                stacked="md"
                show-empty
                @filtered="onFiltered"
                striped
                hover
                responsive
            >
                <template #cell(actions)="row">
                    <b-button :href="main_route + '/admin/products/'+ row.item.id + '/edit'"class="mr-1">
                        View/Edit
                    </b-button>
                </template>

            </b-table>
        </b-container>
        <b-button :href="main_route + '/admin'" variant="primary" class="mb-3 ">Back</b-button>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    name: "Products",
    components: { Multiselect},
    data() {
        return {
            fields: [
                { key: 'name', label: 'Product Name', sortable: true, sortDirection: 'desc' },
                { key: 'product_code', label: 'Product Code', sortable: true, class: 'text-center' },
                { key: 'actions', label: 'Actions' }
            ],
            totalRows: 1,
            currentPage: 1,
            perPage: 5,
            pageOptions: [5, 10, 15, 25, 50, 100],
            sortBy: '',
            sortDesc: false,
            sortDirection: 'asc',
            filter: " ",
            selected_subcategories: (this.filter_categories != undefined) ? this.filter_categories: [],
        }
    },
    mounted() {
        if (this.msg != undefined){
            this.$bvToast.toast(this.msg, {title: 'Success!', variant: 'success'});
        }
        this.totalRows = this.products.length;
    },
    props: {
        main_route: String,
        products: Array,
        msg: String,
        categories_options: Array,
        filter_categories: Array,
    },
    computed: {
        sortOptions() {
            // Create an options list from our fields
            return this.fields
                .filter(f => f.sortable)
                .map(f => {
                    return { text: f.label, value: f.key }
                })
        },

    },
    methods: {
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        filterTable(row, filter) {
            if (row.name.toLowerCase().search(filter.toLowerCase().trimEnd().trimStart()) == -1 && row.product_code.toLowerCase().search(filter.toLowerCase().trimEnd().trimStart()) == -1) {
                return false;
            } else {
                if (this.selected_subcategories.length == 0){
                    return true;
                } else {
                    var both = 0
                    for(var j = 0; j < this.selected_subcategories.length; j++){
                        for(var k = 0; k < row.subcategories_options.length; k++){
                            if (row.subcategories_options[k].value == this.selected_subcategories[j].value){
                                both ++;
                            }
                        }
                    }
                    if(both == 0){
                        return  false;
                    } else return true;
                }

            }
        }

    }
}
</script>

<style scoped>

</style>
