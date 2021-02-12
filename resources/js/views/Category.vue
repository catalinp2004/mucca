<template>
    <div>
        <h1 class="mb-5 text-center">{{category.name_ro}}</h1>
        <hr class="mb-3">
        <b-button  @click="modal_show = !modal_show, modal_type = false " variant="success" class="mb-3 " >Adaugă o subcategorie nouă!</b-button>
        <b-table striped hover responsive :items="copy_of_category.subcategories" :fields="fields" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc">
            <template v-slot:cell(index)="subcat" >
                {{ subcat.index + 1 }}
            </template>

            <template v-slot:cell(name_ro)="subcat">
                    <a href="#">{{subcat.item.name_ro}}</a>
            </template>

            <template v-slot:cell(products)="subcat">
                <b-button  variant="primary">Vizionati produsele din această subcategorie!</b-button>
            </template>

            <template v-slot:cell(edit)="subcat">
                <b-button @click="form =JSON.parse(JSON.stringify(subcat.item)), modal_show = !modal_show, modal_type = true " variant="warning">Editați! </b-button>
            </template>


        </b-table>

        <b-modal id="modal-subcategory" :ok-title="modal_type ? 'Editare' : 'Adaugă'" ref="modal" v-model="modal_show" :title="modal_title" @hidden="resetModal" @ok="handleOk">
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group label="Nume(engleză)" label-for="name-input">
                    <b-form-input id="name-input" v-model="form.name_en"></b-form-input>
                    <span v-if=" errors != null && errors.hasOwnProperty('name_en')" class="text-danger">{{ errors.name_en[0] }}</span>
                </b-form-group>
                <b-form-group label="Nume(română)" label-for="name-ro-input">
                    <b-form-input id="name-ro-input" v-model="form.name_ro"></b-form-input>
                    <span v-if=" errors != null && errors.hasOwnProperty('name_ro')" class="text-danger">{{ errors.name_ro[0] }}</span>
                </b-form-group>

                <b-form-group v-if="form.image == null" label="Imagine" label-for="image-input">
                    <b-form-file id="image-input" v-model="file" placeholder="Alegeți o imagine sau plasați-o aici..." drop-placeholder="Plasați imaginea aici..."></b-form-file>
                    <span v-if=" errors != null && errors.hasOwnProperty('file')" class="text-danger">{{ errors.file[0] }}</span>
                </b-form-group>
                <div v-else class="row">
                    <b-img :src="'/storage/img/'+form.image" fluid :alt="form.image" class="mr-5"></b-img>
                    <a href="#" @click="form.image = null">X Înlocuire imagine</a>
                </div>

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
            file:null,
            form: {name_ro: null, name_en: null, image:null},
            fields: [{key: 'index', label: 'Nr.'}, {key: 'name_ro', label: 'Subcategorie', sortable:true}, {key: 'products', label: 'Produse'}, {key: 'edit', label: 'Editare'}],
            errors: null,
            sortBy: 'name_ro',
            sortDesc: false,
            modal_type: false,
            modal_show: false,
        }
    },
    props: {
        category: Object,
    },
    computed:{
        modal_title: function (){
            if (this.modal_type){
                return "Editați categoria!";
            } else return 'Creați o subcategorie nouă!';
        }
    },
    methods:{
        resetModal: function() {
           this.form = {name_ro: null, name_en: null, image:null};
        },
        handleOk: function(bvModalEvt) {
            // Prevent modal from closing
            bvModalEvt.preventDefault()
            // Trigger submit handler
            this.handleSubmit()
        },
        handleSubmit: function () {
            var self = this;
            var formData = new FormData();
            formData.append('name_ro', this.form.name_ro);
            formData.append('category_id', this.category.id);
            formData.append('name_en', this.form.name_en);
            formData.append('file', this.file);

            if (this.modal_type){
                formData.append('_method', 'PATCH');
                axios.post('/admin/subcategories/'+this.form.id, formData,  {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                }).then(response => {
                    self.errors = false;
                    self.copy_of_category = response.data.category;
                    this.$bvToast.toast(response.data.msg, {title: 'Success!', variant: 'success'});
                    self.modal_show = !self.modal_show;
                }).catch(error => {
                    self.errors = error.response.data.errors;
                });
            } else {
                axios.post('/admin/subcategories', formData,  {
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
    },

}
</script>

<style scoped>

</style>
