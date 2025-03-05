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
                            Create Testimonial
                        </h6>
                        <router-link :to="{ name: 'testimonialAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name"> Name </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="name" required />
                                </div>
                            </div>
                            <!-- Designation -->
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <div class="mt-1 mb-3">
                                    <input  class="form-control" type="text" name="designation" required />
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
                            <!-- Full Description -->
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <div class="mt-1 mb-3">
                                    <SummernoteEditor name="comment"/>  
                                </div>
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
        };
    },
    methods:{
        from_submit: async function(){
            try {
                let target = event.target;
                let from_data = new FormData(target);
                await axios.post('/api/v1/testimonial/store', from_data);
                alert("Team created successfully!");
                target.reset();
            } catch (error) {
                console.error("Error creating testimonial:", error);
                alert("Error creating the Team. Please try again.");
            }
        },
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
