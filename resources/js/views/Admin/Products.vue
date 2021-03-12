<template>
    <div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">Products</h1>
            <b-button squared :href="main_route + '/admin/products/create'" class="btn-mucca btn-mucca-success">Add new product</b-button>
        </div>
        <hr class="mb-5">

        <div class="text-center my-5">
        </div>
        <b-container fluid>
            <!-- User Interface controls -->
            <b-row class="mb-5 align-items-center">
                <b-col lg="6" class="my-1">
                    <b-form-group
                        label="Categories"
                        label-for="categories"
                        label-cols="auto"
                        label-align="left"
                        class="mb-0"
                    >
                        <multiselect
                            id="categories"
                            v-model='selected_subcategories'
                            :options="categories_options"
                            @select="filter = filter.length == '' ? filter + ' ' : filter"
                            :close-on-select="false"
                            :clear-on-select="false"
                            :multiple="true"
                            group-values="subcategories"
                            group-label="category"
                            :group-select="true"
                            placeholder="Type to search Categories and Subcategories"
                            track-by="value"
                            label="text"
                        >
                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                                class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span>
                            </template>
                            <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
                        </multiselect>
                    </b-form-group>
                </b-col>
                <b-col lg="6" class="my-1">
                    <b-form-group
                        label="Product Search"
                        label-for="filter-input"
                        label-cols="auto"
                        label-align-sm="left"
                        class="mb-0"
                    >
                        <b-input-group>
                            <b-form-input
                                id="filter-input"
                                v-model="filter"
                                type="search"
                                placeholder="Search in product names and codes"
                            ></b-form-input>

                            <b-input-group-append>
                                <b-button :disabled="!filter || filter == ' ' " @click="filter = ''">Clear</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row class="mb-3">
                <b-col lang="6">
                    <b-button @click="sortBy = 'sort', sortDesc=false" class="btn-mucca mr-5">Click to sort table below according to current website order </b-button>
                </b-col>
            </b-row>

            <!-- Main table element -->
            <b-table
                :items="products"
                :fields="fields"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="computed_filter"
                :filter-function="filterTable"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :sort-direction="sortDirection"
                stacked="md"
                show-empty
                @filtered="onFiltered"
                striped
                hover
                borderless
                responsive
            >
                <template v-slot:cell(index)="prod">
                    {{ prod.index + 1 }}
                </template>

                <template v-slot:cell(created_at)="prod">
                    {{ formatDate(prod.item.created_at) }}
                </template>

                <template v-slot:cell(updated_at)="prod">
                    {{ formatDate(prod.item.updated_at) }}
                </template>

                <template #cell(actions)="row">
                    <b-button pill :href="main_route + '/admin/products/'+ row.item.id + '/edit'" class="mr-1" variant="success" size="sm">
                        <i class="fas fa-edit mr-1"></i>
                        View/Edit
                    </b-button>
                </template>

            </b-table>

            <hr class="my-4">

            <b-row>
                <b-col sm="6" md="4" class="my-1">
                    <b-form-group
                        label="Products per page"
                        label-for="per-page-select"
                        label-cols-sm="auto"
                        label-align-sm="left"
                        class="mb-0"
                    >
                        <b-form-select
                            id="per-page-select"
                            v-model="perPage"
                            :options="pageOptions"
                        ></b-form-select>
                    </b-form-group>
                </b-col>

                <b-col sm="6" md="8" class="my-1">
                    <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        align="right"
                        class="my-0"
                    ></b-pagination>
                </b-col>
            </b-row>

            <hr class="my-4">

            <b-row>
                <b-col class="text-right">
                    <b-button @click="randomize" class="btn-warning" variant="warning">Randomize product ordering on website!</b-button>
                </b-col>
            </b-row>
            <hr class="my-4">
        </b-container>
        <a :href="main_route + '/admin'" class="btn-mucca mt-32"><i class="fas fa-arrow-circle-left"></i> Back</a>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    name: "Products",
    components: {Multiselect},
    data() {
        return {
            fields: [
                {key: 'index', label: 'Item no.'},
                {key: 'name', label: 'Product Name (click to sort)', sortable: true, sortDirection: 'desc'},
                {key: 'product_code', label: 'Product Code (click to sort)', sortable: true},
                {key: 'created_at', label: 'Created at (click to sort)', sortable: true, sortDirection: 'desc'},
                {key: 'updated_at', label: 'Updated at (click to sort)', sortable: true, sortDirection: 'desc'},
                {key: 'actions', label: 'Actions', class: 'text-right'}
            ],
            products: this.products_prop,
            totalRows: 1,
            currentPage: 1,
            perPage: 10,
            pageOptions: [10, 25, 50, 100],
            sortBy: 'created_at',
            sortDesc: true,
            sortDirection: 'desc',
            filter: " ",
            selected_subcategories: (this.filter_categories != undefined) ? this.filter_categories : [],
        }
    },
    mounted() {
        if (this.msg != undefined) {
            this.$bvToast.toast(this.msg, {title: 'Success!', variant: 'success', solid: true, toaster: 'b-toaster-bottom-right'});
        }
        this.totalRows = this.products.length;
    },
    props: {
        main_route: String,
        products_prop: Array,
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
                    return {text: f.label, value: f.key}
                })
        },
        computed_filter() {
            // Create an options list from our fields
            return this.filter.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
        },

    },
    methods: {
        formatDate(date) {
            var d = new Date(date);
            var date =
                d.getUTCFullYear() + "-" +
                ("0" + (d.getUTCMonth()+1)).slice(-2) + "-" +
                ("0" + d.getUTCDate()).slice(-2) + ", " +
                ("0" + d.getUTCHours()).slice(-2) + ":" +
                ("0" + d.getUTCMinutes()).slice(-2);

            return date;
        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        filterTable(row, filter) {
            if (row.name.toLowerCase().search(filter.toLowerCase().trimEnd().trimStart()) == -1 && row.product_code.toLowerCase().search(filter.toLowerCase().trimEnd().trimStart()) == -1) {
                return false;
            } else {
                if (this.selected_subcategories.length == 0) {
                    return true;
                } else {
                    var both = 0
                    for (var j = 0; j < this.selected_subcategories.length; j++) {
                        for (var k = 0; k < row.subcategories_options.length; k++) {
                            if (row.subcategories_options[k].value == this.selected_subcategories[j].value) {
                                both++;
                            }
                        }
                    }
                    if (both == 0) {
                        return false;
                    } else return true;
                }

            }
        },
        randomize() {
            var self = this;
            var result = confirm("Are you sure you want to randomize the product order on the website?");
            if (result) {
                axios.get(self.main_route + '/admin/products/randomize').then(response => {
                    self.products = response.data.products;
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success', solid: true, toaster: 'b-toaster-bottom-right'});
                }).catch(errors => {

                });
            }
        }

    }
}
</script>

<style scoped>

</style>
