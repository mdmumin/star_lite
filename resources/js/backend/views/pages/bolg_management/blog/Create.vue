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
                            Create User
                        </h6>
                        <router-link :to="{ name: 'blogAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title"> Title </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="title"/>
                                    <!-- <textarea
                                        class="form-control"
                                        type="text"
                                        name="title"
                                    ></textarea> -->
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="short_description"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="full_description">Full Description</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control"  type="text"name="full_description"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cover_image">Cover Image</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" name="cover_image" type="file" @change="handleFileUpload"/>
                                </div>
                                <!-- Image Preview -->
                                <div v-if="previewImage" class="mb-3">
                                    <img :src="previewImage" alt="Selected Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_published">Published</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control" name="is_published">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="publish_date">Publish Date</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="date" name="publish_date"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seo_title">SEO Title</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control"  type="text" name="seo_title"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="seo_keyword">SEO Keywords</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control"  type="text" name="seo_keyword"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="seo_description">SEO Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea class="form-control"  name="seo_description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control"  name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
import axios from 'axios';
export default {
    components: {
        PageTitle,
    },
    data() {
        return {
            config,
            previewImage: null, // ✅ Added previewImage variable
        };
    },
    methods:{
        from_submit: async function(){
            let target = event.target;
            let from_data = new FormData(target);
            await axios.post('/api/v1/blog/store', from_data);
            target.reset();
        },
        // ✅ Image Preview Function
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.previewImage = URL.createObjectURL(file);
            }
        },
    }
};
</script>
<style lang=""></style>
