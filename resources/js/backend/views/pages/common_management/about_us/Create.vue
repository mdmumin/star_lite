<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.create_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div
                        class="card-header py-3 position-sticky d-flex justify-content-between align-items-center"
                    >
                        <h6>
                            Create About Us
                        </h6>
                        <router-link :to="{ name: 'aboutAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="title"> Title </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="title" />
                                </div>
                            </div>

                            <!-- Designation -->
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <div class="mt-1 mb-3">
                                    <input  class="form-control" type="text" name="sub_title" />
                                </div>
                            </div>
                            <!-- Short Description -->
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea  class="form-control" name="short_description"></textarea>
                                </div>
                            </div>
                            <!--Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div class="mt-1 mb-3">
                                    <!-- <textarea  class="form-control" name="description"></textarea> -->
                                    <SummernoteEditor name="description"/>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" name="image" type="file" @change="handleFileUpload"/>
                                </div>
                                <!-- Image Preview -->
                                <div v-if="previewImage" class="mb-3">
                                    <img :src="previewImage" alt="Selected Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            </div>
                            <!-- Video Thumbnail -->
                            <div class="form-group">
                                <label for="video_thumbnail_image">video thumbnailv image</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" name="video_thumbnail_image" type="file" @change="handleVideoThumbnailUpload"/>
                                </div>
                                <!-- Image Preview -->
                                <div v-if="previewVideoThumbnail" class="mb-3">
                                    <img :src="previewVideoThumbnail" alt="Selected Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            </div>

                            <!-- Social Links -->
                             <!-- Video URL -->
                             <div class="form-group">
                                <label for="video_url">Video URL</label>
                                <input class="form-control" type="url" name="video_url" />
                            </div>
                             <!-- Quote -->
                             <div class="form-group">
                                <label for="quote_text">Quote</label>
                                <input class="form-control" type="text" name="quote_text" />
                            </div>

                            <!-- Button Text & URL -->
                            <div class="form-group">
                                <label for="button_text">Button Text</label>
                                <input class="form-control" type="text" name="button_text" />
                            </div>
                            <div class="form-group">
                                <label for="button_url">Button URL</label>
                                <input class="form-control" type="url" name="button_url" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header py-2 position-sticky d-flex justify-content-start">
                    <button type="submit" class="btn btn-info btn-sm">
                        Create
                    </button>
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
    data() {
        return {
            config,
            previewImage: null, // ✅ Added previewImage variable
            previewVideoThumbnail: null,
        };
    },
    methods:{
        from_submit: async function(){
            try {
                let target = event.target;
                let from_data = new FormData(target);
                await axios.post('/api/v1/about/store', from_data);
                alert("About created successfully!");
                target.reset();
            } catch (error) {
                console.error("Error creating about:", error);
                alert("Error creating the About. Please try again.");
            }
        },
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.previewImage = URL.createObjectURL(file);
            }
        },
        handleVideoThumbnailUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.previewVideoThumbnail = URL.createObjectURL(file);
                // this.form.video_thumbnail_image = file;
            }
        },
    }
};
</script>
<style lang=""></style>
