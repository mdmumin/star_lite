<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit Bnnaer</h6>
                        <router-link :to="{ name: 'blogAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input v-model="form.id" class="form-control" type="text" name="id" readonly/>
                                <label for="title">Title</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.title" class="form-control" type="text" name="title" />
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.sub_title" class="form-control" type="text" name="sub_title" />
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="short_descripton">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.short_descripton" class="form-control" type="text" name="short_descripton"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="button_text">Button Text</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.button_text" class="form-control" type="text" name="button_text"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="button_url">Button Url</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.button_url" class="form-control" type="text" name="button_url"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header py-2 position-sticky d-flex justify-content-start">
                    <button type="submit" class="btn btn-info btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import config from './config/index.js';
import PageTitle from './components/PageTitle.vue';
import axios from 'axios';

export default {
    components: {
        PageTitle,
    },
    data: () => ({
        config,
        form: {},
    }),
    created() {
        this.get_data();
    },
    methods: {
        // Submit the form data
        async from_submit() {
            let formData = new FormData();
            for (let key in this.form) {
                formData.append(key, this.form[key]);
            }

            try {
                await axios.post('/api/v1/banner/update', formData);
                alert("Banner updated successfully!");
            } catch (error) {
                console.error("Error updating banner:", error);
                alert("Error updating the banner.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/banner/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.cover_image;
            } catch (error) {
                console.error('Error fetching banner data:', error);
                alert('Failed to load banner data.');
            }
        },
    }
};
</script>












