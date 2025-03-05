<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit about Us</h6>
                        <router-link :to="{ name: 'aboutAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                             <!-- Title -->
                             <div class="form-group">
                                <label for="title">Title</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="title" v-model="form.title" />
                                </div>
                            </div>

                            <!-- Designation -->
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="sub_title" v-model="form.sub_title" required />
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea class="form-control" name="short_description" v-model="form.short_description"></textarea>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div class="mt-1 mb-3">
                                    <SummernoteEditor name="description" v-model="form.description"/>  
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
                            <!-- video_thumbnail_image -->
                            <div class="form-group">
                                <label for="video_thumbnail_image">Image</label>
                                <div class="mt-1 mb-3">
                                    <input ref="video_thumbnail_image" class="form-control" name="video_thumbnail_image" type="file" @change="handleVideoThumbnailUpload"/>
                                </div>
                                <!-- Image Preview -->
                                <div v-if="previewVideoThumbnail" class="mb-3">
                                    <img :src="previewVideoThumbnail" alt="Selected Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                                <!-- Existing Image Preview -->
                                <div v-else-if="form.video_thumbnail_image" class="mb-3">
                                    <img :src="form.video_thumbnail_image" alt="Existing Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            </div>

                             <!-- Video URL -->
                             <div class="form-group">
                                <label for="video_url">Video URL</label>
                                <input class="form-control" type="url" v-model="form.video_url" />
                            </div>

                            <!-- Quote -->
                            <div class="form-group">
                                <label for="quote_text">Quote</label>
                                <input class="form-control" type="text" name="quote_text" v-model="form.quote_text" />
                            </div>

                            <!-- Button Text & URL -->
                            <div class="form-group">
                                <label for="button_text">Button Text</label>
                                <input class="form-control" type="text" name="button_text" v-model="form.button_text" />
                            </div>
                            <div class="form-group">
                                <label for="button_url">Button URL</label>
                                <input class="form-control" type="url" name="button_url" v-model="form.button_url" />
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
        previewVideoThumbnail: null,
    }),
    created() {
        this.get_data();
    },
    methods: {
        // Submit the form data
        async from_submit() {
            let form = new FormData();
            for (let key in this.form) {
                form.append(key, this.form[key]);
            }
            // Add the file if it's selected
            const file = this.$refs.image.files[0];
            if (file) {
                form.append("image", file);
            }
            // Add selected video thumbnail if available
            if (this.$refs.video_thumbnail_image?.files[0]) {
                form.append("video_thumbnail_image", this.$refs.video_thumbnail_image.files[0]);
            }
            

            try {
                await axios.post('/api/v1/about/update', form);
                alert("Team updated successfully!");
            } catch (error) {
                console.error("Error updating about:", error);
                alert("Error updating the about.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/about/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.image;
            } catch (error) {
                console.error('Error fetching about data:', error);
                alert('Failed to load about data.');
            }
        },
        // Handle file upload preview
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.previewImage = URL.createObjectURL(file);
                this.form.image = file;
            }
        },
        handleVideoThumbnailUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.previewVideoThumbnail = URL.createObjectURL(file);
                this.form.video_thumbnail_image = file;
            }
        },
    }
};
</script>
