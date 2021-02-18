<template>
    <div>
        <h1 class="mb-5 text-center">{{ category.name_ro }}</h1>
        <hr class="mb-3">
        <b-button @click="modal_show = !modal_show, modal_type = false " variant="success" class="mb-3 ">Add new subcategory</b-button>
        <b-table striped hover responsive :items="copy_of_category.subcategories" :fields="fields" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc">
            <template v-slot:cell(index)="subcat">
                {{ subcat.index + 1 }}
            </template>

            <template v-slot:cell(name_ro)="subcat">
                <a href="#">{{ subcat.item.name_ro }}</a>
            </template>

            <template v-slot:cell(products)="subcat">
                <b-button variant="primary">View products</b-button>
            </template>

            <template v-slot:cell(edit)="subcat">
                <b-button @click="form =JSON.parse(JSON.stringify(subcat.item)), modal_show = !modal_show, modal_type = true " variant="warning">Edit</b-button>
            </template>

        </b-table>

        <b-button :href="main_route + '/admin/categories'" variant="primary" class="mb-3 ">Back</b-button>

        <b-modal id="modal-subcategory" :ok-title="modal_type ? 'Update' : 'Submit'" ref="modal" v-model="modal_show" :title="modal_title" @hidden="resetModal" @ok="handleOk">
            <form ref="form" @submit.stop.prevent="handleSubmit">

                <b-form-group label="Name (en)" label-for="name-input">
                    <b-form-input id="name-input" v-model="form.name_en"></b-form-input>
                    <span v-if=" errors != null && errors.hasOwnProperty('name_en')" class="text-danger">{{ errors.name_en[0] }}</span>
                </b-form-group>

                <b-form-group label="Name (ro)" label-for="name-ro-input">
                    <b-form-input id="name-ro-input" v-model="form.name_ro"></b-form-input>
                    <span v-if=" errors != null && errors.hasOwnProperty('name_ro')" class="text-danger">{{ errors.name_ro[0] }}</span>
                </b-form-group>

                <b-form-group v-if="form.image == null" label="Imagine" label-for="image-input">
                    <b-form-file id="image-input" v-model="file" placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..."></b-form-file>
                    <span v-if=" errors != null && errors.hasOwnProperty('file')" class="text-danger">{{errors.file[0] }}</span>
                </b-form-group>

                <b-img v-if="form.image != null" :src="main_route + '/storage/img/'+form.image" fluid :alt="form.image" class="mb-3"></b-img>
                <a v-if="form.image != null" href="#" class="d-flex flex-row justify-content-end" @click="form.image = null">X Replace image</a>

                <b-button v-if="modal_type" class="d-flex flex-row" @click="deleteSubcategory" variant="danger">Delete subcategory!</b-button>
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
                label: 'Subcategory',
                sortable: true
            }, {key: 'products', label: 'Product'}, {key: 'edit', label: 'Edit'}],
            errors: null,
            sortBy: 'name_ro',
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
                return "Edit subcategory!";
            } else return 'Create a new subcategory!';
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
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success'});
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
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success'});
                    self.modal_show = !self.modal_show;
                }).catch(error => {
                    self.errors = error.response.data.errors;
                });
            }
        },
        deleteSubcategory: function () {
            var self = this;
            var result = confirm("Are you sure? This process is irreversible.");
            if (result) {
                axios.delete(self.main_route + '/admin/subcategories/' + self.form.id).then(response => {
                    self.errors = false;
                    self.copy_of_category = response.data.category;
                    self.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success'});
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
