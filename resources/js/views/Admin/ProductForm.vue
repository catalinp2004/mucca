<template>
    <div>
        <h1 class="mb-5 text-center">Add new product</h1>
        <hr class="mb-3">
        <b-form @submit.stop.prevent="onSubmit">
            <div class="row">
                <div class="col-lg-10">
                    <b-form-group id="input-group-product-code" label="Product Code:" label-for="product-code" c>
                        <b-form-input id="product-code" v-model="form.product_code" placeholder="EG: MO8647"></b-form-input>
                        <span v-if=" errors != null && errors.hasOwnProperty('product_code')" class="text-danger">{{ errors.product_code[0] }}</span>
                    </b-form-group>
                    <b-form-group id="input-group-name" label="Product Name:" label-for="name">
                        <b-form-input id="name" v-model="form.name" placeholder="Enter name"></b-form-input>
                        <span v-if=" errors != null && errors.hasOwnProperty('name')" class="text-danger">{{ errors.name[0] }}</span>
                    </b-form-group>
                    <b-form-group id="input-group-last-name" label="Description" label-for="description">
                        <b-form-textarea id="description" v-model="form.description" placeholder="Enter something..." rows="3" max-rows="6"></b-form-textarea>
                        <span v-if=" errors != null && errors.hasOwnProperty('description')" class="text-danger">{{ errors.description[0] }}</span>
                    </b-form-group>

                    <b-form-group id="input-group-categories" label="Categories:" label-for="categories">
                        <multiselect id="categories" v-model='form.subcategories' :options="categories_options" :close-on-select="false" :clear-on-select="false" :multiple="true" group-values="subcategories" group-label="category" :group-select="true" placeholder="Type to search" track-by="text" label="text">
                            <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
                        </multiselect>
                        <span v-if=" errors != null && errors.hasOwnProperty('subcategories')" class="text-danger">{{ errors.subcategories[0] }}</span>
                    </b-form-group>
                    <b-form-group id="input-group-color" label="Colors Available:" label-for="colors">
                        <multiselect v-model="form.colors" :options="colors_options" :multiple="true" :close-on-select="false" :clear-on-select="false" :searchable="false" placeholder="Pick some" label="hex_code" track-by="hex_code">
                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
                            <template slot="option" slot-scope="props">
                                <i class="fas fa-circle" :style="'color:#'+ props.option.hex_code"></i> {{props.option.hex_code}}
                            </template>
                        </multiselect>
                        <span v-if=" errors != null && errors.hasOwnProperty('colors')" class="text-danger">{{ errors.colors[0] }}</span>
                    </b-form-group>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="light-bg p-4 mt-5">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between">
                            <a class="btn btn-primary" :href="main_route + '/admin/products'"><i class="fas fa-long-arrow-alt-left mr-1"></i> Back to Product list</a>
                            <b-button variant="success" type="submit"><i class="fas fa-save mr-2"></i> {{form_type == "create" ? "Create" : "Update"}}</b-button>
                        </div>
                    </div>
                </div>
            </div>
        </b-form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
export default {
    name: "ProductForm",
    components: { Multiselect },
    data: function () {
        return {
            form: {
                id: (this.product != undefined) ? this.product.id : null,
                product_code: (this.product != undefined) ? this.product.product_code : null,
                name: (this.product != undefined) ? this.product.name : null,
                description: (this.product != undefined) ? this.product.description : null,
                colors: (this.product != undefined) ? this.product.colors : null,
                subcategories: (this.product != undefined) ? this.product.subcategories : null,
                images: (this.product != undefined) ? this.product.images : null,
            },
            errors: null,
        }
    },
    props: {
        form_type: String,
        product: Object,
        filter: Array,
        main_route: String,
        categories_options: Array,
        colors_options: Array,
        msg: String,
    },
    mounted() {
        if (this.msg != undefined){
            this.$bvToast.toast(this.msg, {title: 'Success!', variant: 'success'});
        }
    },
    methods: {
        onSubmit: function (){
            var self =this;
            if (self.form_type == 'create' ){
                axios.post(self.main_route + '/admin/products', self.form)
                    .then(response => {
                        let url = response.data.route;
                        self.errors = false;
                        window.location.href = url;
                    }).catch(error => {
                    self.errors = error.response.data.errors;
                });
            }
            if (self.form_type == 'edit' ){
                axios.patch(self.main_route + '/admin/products/' + self.product.id, self.form).then(response => {
                    self.errors = false;
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success'});
                }).catch(error => {
                    self.errors = error.response.data.errors;
                });
            }
        },
        deleteCustomer: function () {
            var self =this;
            var result = confirm("Are you sure? This process is irreversible.");
            if (result) {
                axios.delete(self.main_route + '/admin/products/'+ this.product .id).then(response => {
                    let url = response.data.route;
                    this.errors = false;
                    window.location.href = url;
                }).catch(errors => {
                    this.errors = errors.response.data.errors;
                });
            }
        },
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
