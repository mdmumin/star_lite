<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit Bnnaer</h6>
                        <router-link :to="{ name: 'teamAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
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
                            <!-- Contact Number -->
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.contact_number" class="form-control" type="text" required />
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.email" class="form-control" type="email" required />
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea v-model="form.short_description" class="form-control"></textarea>
                                </div>
                            </div>

                            <!-- Full Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea v-model="form.description" class="form-control"></textarea>
                                </div>
                            </div>


                            <!-- Social Links -->
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input v-model="form.facebook" class="form-control" type="text" />
                            </div>
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input v-model="form.linkedin" class="form-control" type="text" />
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input v-model="form.instagram" class="form-control" type="text" />
                            </div>
                            <div class="form-group">
                                <label for="whatsapp">WhatsApp</label>
                                <input v-model="form.whatsapp" class="form-control" type="text" />
                            </div>
                            <div class="form-group">
                                <label for="telegram">Telegram</label>
                                <input v-model="form.telegram" class="form-control" type="text" />
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
                await axios.post('/api/v1/team/update', formData);
                alert("Team updated successfully!");
            } catch (error) {
                console.error("Error updating team:", error);
                alert("Error updating the team.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/team/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.image;
            } catch (error) {
                console.error('Error fetching team data:', error);
                alert('Failed to load team data.');
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












