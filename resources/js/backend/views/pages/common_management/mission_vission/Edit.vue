<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit Mission Vission</h6>
                        <router-link :to="{ name: 'missionVissionAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <div class="mt-1 mb-3">
                                    <select v-model="form.type" class="form-control" name="type">
                                        <option value="mission">Mission</option>
                                        <option value="vission">Vission</option>
                                    </select>
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
                                <label for="description">Description</label>
                                <div class="mt-1 mb-3">
                                    <SummernoteEditor v-model="form.description"/>  
                                    <!-- <textarea v-model="form.description" class="form-control"></textarea> -->
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
                await axios.post('/api/v1/mission/vission/update', formData);
                alert("Team updated successfully!");
            } catch (error) {
                console.error("Error updating mission vission:", error);
                alert("Error updating the mission vission.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/mission/vission/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.image;
            } catch (error) {
                console.error('Error fetching mission vission data:', error);
                alert('Failed to load mission vission data.');
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












