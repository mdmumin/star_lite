<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit Testimonial</h6>
                        <router-link :to="{ name: 'testimonialAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name"> Name </label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.name" class="form-control" type="text" required />
                                </div>
                            </div>

                            <!-- Designation -->
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.designation" class="form-control" type="text" required />
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="mt-1 mb-3">
                                    <input ref="image" class="form-control" name="image" type="file" @change="handleFileUpload"/>
                                </div>
                                <!-- Image Preview -->
                                <div v-if="previewImage" class="mb-3">
                                    <img :src="previewImage" alt="Selected Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                                <!-- Existing Image Preview -->
                                <div v-else-if="form.image" class="mb-3">
                                    <img :src="form.image" alt="Existing Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            </div>
                            <!-- Full Description -->
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <div class="mt-1 mb-3">
                                    <SummernoteEditor v-model="form.comment"/>
                                    <!-- <textarea v-model="form.comment" class="form-control"></textarea> -->
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
import SummernoteEditor from '../../../layout/components/SummernoteEditor.vue';

import axios from 'axios';

export default {
    components: {
        PageTitle,
        SummernoteEditor,

    },
    data: () => ({
        config,
        form: {},
        previewImage: null, // Image preview URL
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
            // Add the file if it's selected
            const file = this.$refs.image.files[0];
            if (file) {
                formData.append("image", file);
            }

            try {
                await axios.post('/api/v1/testimonial/update', formData);
                alert("Team updated successfully!");
            } catch (error) {
                console.error("Error updating testimonial:", error);
                alert("Error updating the testimonial.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/testimonial/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.image;
            } catch (error) {
                console.error('Error fetching testimonial data:', error);
                alert('Failed to load testimonial data.');
            }
        },
        // Handle file upload preview
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.image = file;
                this.previewImage = URL.createObjectURL(file);
            }
        }
    }
};
</script>












