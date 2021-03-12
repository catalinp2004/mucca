<template>
    <div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">{{ category.name_ro }} / {{ category.name_en }}</h1>
            <b-button squared @click="modal_show = !modal_show, modal_type = false " class="btn-mucca btn-mucca-success">Add new subcategory</b-button>
        </div>
        <hr class="mb-5">

        <div class="text-center my-5">
        </div>

        <b-table striped borderless hover responsive :items="copy_of_category.subcategories" :fields="fields" :sort-desc.sync="sortDesc">
            <template v-slot:cell(index)="subcat">
                {{ subcat.index + 1 }}
            </template>

            <template v-slot:cell(name_ro)="subcat">
                <a :href="main_route + '/admin/subcategories/' + subcat.item.id">{{ subcat.item.name_ro }} / {{ subcat.item.name_en }}</a>
            </template>

            <template v-slot:cell(edit)="subcat">
                <b-button pill  size="sm" :href="main_route + '/admin/subcategories/' + subcat.item.id" variant="secondary" class="mr-3">View products in Subcategory</b-button>
                <b-button pill  size="sm" @click="form =JSON.parse(JSON.stringify(subcat.item)), modal_show = !modal_show, modal_type = true " variant="success"><i class="fas fa-edit mr-1"></i> Edit</b-button>
            </template>

        </b-table>

        <a :href="main_route + '/admin/categories'" class="btn-mucca mt-32"><i class="fas fa-arrow-circle-left"></i> Back to Categories</a>

        <b-modal id="modal-subcategory" :ok-title="modal_type ? 'Update' : 'Submit'" ref="modal" v-model="modal_show" :title="modal_title" @hidden="resetModal" @ok="handleOk">
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group label="Name (Romanian):" label-for="name-ro-input">
                    <b-form-input id="name-ro-input" v-model="form.name_ro"></b-form-input>
                    <span v-if=" errors != null && errors.hasOwnProperty('name_ro')" class="text-danger">{{ errors.name_ro[0] }}</span>
                </b-form-group>

                <b-form-group label="Name (English):" label-for="name-input">
                    <b-form-input id="name-input" v-model="form.name_en"></b-form-input>
                    <span v-if=" errors != null && errors.hasOwnProperty('name_en')" class="text-danger">{{ errors.name_en[0] }}</span>
                </b-form-group>

                <b-form-group v-if="form.image == null" label="Subcategory Image:" label-for="image-input">
                    <b-form-file id="image-input" v-model="file" placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..."></b-form-file>
                    <span v-if=" errors != null && errors.hasOwnProperty('file')" class="text-danger">{{errors.file[0] }}</span>
                </b-form-group>

                <b-img v-if="form.image != null" :src="main_route + '/storage/img/'+form.image" fluid :alt="form.image" class="mb-2"></b-img>
                <a v-if="form.image != null" href="#" class="d-flex flex-row justify-content-center" @click="form.image = null">&times; Remove image</a>

                <hr>
                <b-button v-if="modal_type && !form.has_products" @click="deleteSubcategory" class="btn-mucca btn-mucca-danger">Delete subcategory!</b-button>
                <b-button v-else-if="modal_type && form.has_products" disabled class="btn-mucca btn-mucca-danger">Delete subcategory!</b-button>
                <span  v-if="modal_type && form.has_products" class="text-danger">Has related products.</span>
            </form>
        </b-modal>

    </div>
</template>

<script>
export default {
    name: "Category",

    data() {
        return {
            copy_of_category: this.category,
            file: null,
            form: {name_ro: null, name_en: null, image: null},
            fields: [{key: 'index', label: 'No.'}, {
                key: 'name_ro',
                label: 'Subcategory (RO / EN)',
                sortable: true
            }, {key: 'edit', label: 'Actions', class: "text-right"}],
            errors: null,
            sortDesc: false,
            modal_type: false,
            modal_show: false,
        }
    },
    props: {
        category: Object,
        main_route: String,
    },
    computed: {
        modal_title: function () {
            if (this.modal_type) {
                return "Edit subcategory:";
            } else return 'Create a new subcategory:';
        }
    },
    methods: {
        resetModal: function () {
            this.form = {name_ro: null, name_en: null, image: null};
            this.file = null;
            this.errors = null;
        },
        handleOk: function (bvModalEvt) {
            // Prevent modal from closing
            bvModalEvt.preventDefault()
            // Trigger submit handler
            this.handleSubmit()
        },
        handleSubmit: function () {
            var self = this;
            var formData = new FormData();
            formData.append('name_ro', self.form.name_ro);
            formData.append('category_id', self.category.id);
            formData.append('name_en', self.form.name_en);


            if (this.modal_type) {
                if (self.form.image == null) {
                    formData.append('file', self.file);
                }
                formData.append('_method', 'PATCH');
                axios.post(self.main_route + '/admin/subcategories/' + self.form.id, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                }).then(response => {
                    self.errors = false;
                    self.copy_of_category = response.data.category;
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success', solid: true, toaster: 'b-toaster-bottom-right'});
                    self.modal_show = !self.modal_show;
                }).catch(error => {
                    self.errors = error.response.data.errors;
                });
            } else {
                formData.append('file', self.file);
                axios.post(self.main_route + '/admin/subcategories', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                }).then(response => {
                    self.errors = false;
                    self.copy_of_category = response.data.category;
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success', solid: true, toaster: 'b-toaster-bottom-right'});
                    self.modal_show = !self.modal_show;
                }).catch(error => {
                    self.errors = error.response.data.errors;
                });
            }
        },
        deleteSubcategory: function () {
            var self = this;
            var result = confirm("Are you sure ou want to delete the subcategory? This cannot be undone!");
            if (result) {
                axios.delete(self.main_route + '/admin/subcategories/' + self.form.id).then(response => {
                    self.errors = false;
                    self.copy_of_category = response.data.category;
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success', solid: true, toaster: 'b-toaster-bottom-right'});
                    self.modal_show = !self.modal_show;
                }).catch(errors => {
                    self.errors = errors.response.data.errors;
                });
            }
        },
    },

}
</script>

<style scoped>

</style>
