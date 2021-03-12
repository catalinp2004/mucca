<template>
    <div>
        <div class="row align-items-lg-center">
            <div class="col-lg mb-3 mb-lg-0">
                <h1 class="mb-0">{{ title }}</h1>
            </div>
            <div class="col-lg-auto">
                <a :href="main_route + '/admin/products'" class="btn-mucca"><i class="fas fa-arrow-circle-left"></i> Back to product list</a>
            </div>
        </div>

        <hr class="mb-5">

        <b-form @submit.stop.prevent="onSubmit">
            <div class="row">
                <div class="col-lg-8">
                    <b-form-group id="input-group-name" label="Product Name:" label-for="name">
                        <b-form-input id="name" v-model="form.name" placeholder="Enter name"></b-form-input>
                        <span v-if=" errors != null && errors.hasOwnProperty('name')" class="text-danger">{{ errors.name[0] }}</span>
                    </b-form-group>

                    <b-form-group id="input-group-product-code" label="Product Code:" label-for="product-code">
                        <b-form-input id="product-code" v-model="form.product_code" placeholder="EG: MO8647"></b-form-input>
                        <span v-if=" errors != null && errors.hasOwnProperty('product_code')" class="text-danger">{{ errors.product_code[0] }}</span>
                    </b-form-group>

                    <b-form-group id="input-group-last-name" label="Product description" label-for="description" class="mb-lg-0">
                        <b-form-textarea id="description" v-model="form.description" placeholder="Enter description here..." rows="5"></b-form-textarea>
                        <span v-if=" errors != null && errors.hasOwnProperty('description')" class="text-danger">{{ errors.description[0] }}</span>
                    </b-form-group>
                </div>

                <div class="col-lg-4">
                    <b-form-group id="input-group-categories" label="Subcategories:" label-for="categories" class="mb-5">
                        <multiselect id="categories" v-model='form.subcategories' :options="categories_options" :close-on-select="false" :clear-on-select="false" :multiple="true" group-values="subcategories" group-label="category" :group-select="true" placeholder="Type to search" track-by="value" label="text">
                            <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
                        </multiselect>
                        <span v-if=" errors != null && errors.hasOwnProperty('subcategories')" class="text-danger">{{ errors.subcategories[0] }}</span>
                    </b-form-group>

                    <b-form-group label="Available product colors:">
                        <b-form-checkbox
                            v-for="color in colors_options"
                            v-model="form.colors"
                            :key="color.id"
                            :value="color"
                            :name="color.hex_code"
                            inline
                            plain
                            class="color-check"
                        >
                            <span class="color-label" :class="(color.hex_code == 'FFFFFF') ? 'is-white' : ''" :style="'background-color:#'+ color.hex_code"><!-- --></span>
                        </b-form-checkbox>
                        <span v-if=" errors != null && errors.hasOwnProperty('colors')" class="text-danger">{{ errors.colors[0] }}</span>
                    </b-form-group>
                </div>
            </div>

            <hr class="my-5" v-if="form_type == 'edit'">

            <my-drop-zone v-if="form_type == 'edit'" :csrf="csrf" :store_image="main_route + '/admin/images'" :product="product"></my-drop-zone>

            <hr class="mt-5 mb-4" v-if="form_type == 'edit'">

            <div class="row">
                <div class="col text-right">
                    <b-button v-if="form_type == 'edit'" @click="deleteProduct" class="btn-mucca btn-mucca-danger"><i class="fas fa-trash-alt mr-2"></i> Delete product!</b-button>
                </div>
            </div>

            <hr class="my-4" v-if="form_type == 'edit'">

            <div class="row">
                <div class="col">
                    <div class="light-bg p-4 mt-4">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between">
                            <a class="btn-mucca" :href="main_route + '/admin/products'"><i class="fas fa-long-arrow-alt-left mr-1"></i> Back to product list</a>
                            <b-button type="submit" class="btn-mucca btn-mucca-success"><i class="fas fa-save mr-2"></i> {{form_type == "create" ? "Create" : "Update"}}</b-button>
                        </div>
                    </div>
                </div>
            </div>
        </b-form>

    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
import MyDropZone from "../../components/MyDropZone"
export default {
    name: "ProductForm",
    components: { Multiselect, MyDropZone},
    data: function () {
        return {
            form: {
                id: (this.product != undefined) ? this.product.id : null,
                product_code: (this.product != undefined) ? this.product.product_code : null,
                name: (this.product != undefined) ? this.product.name : null,
                description: (this.product != undefined) ? this.product.description : null,
                colors: (this.product != undefined) ? this.product.colors : [],
                subcategories: (this.product != undefined) ? this.product.subcategories_options : null,
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
        csrf: String,
    },
    computed: {
        title: function () {
            if (this.form_type == 'create'){
                return 'Add new product';
            } else if (this.form_type == 'edit'){
                return 'Edit product: ' + this.form.name + ' (' + this.form.product_code + ')';
            }
        }
    },
    mounted() {
        if (this.msg != undefined){
            this.$bvToast.toast(this.msg, {title: 'Success!', variant: 'success', solid: true, toaster: 'b-toaster-bottom-right'});
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
                    let url = response.data.route;
                    self.errors = false;
                    window.location.href = url;
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success', solid: true, toaster: 'b-toaster-bottom-right'});
                }).catch(error => {
                    self.errors = error.response.data.errors;
                });
            }
        },
        deleteProduct: function () {
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
