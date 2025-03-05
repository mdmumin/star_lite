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
                            Create Team
                        </h6>
                        <router-link :to="{ name: 'teamAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
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

                            <!-- Contact Number -->
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <div class="mt-1 mb-3">
                                    <input  class="form-control" type="text" name="contact_number" required />
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="mt-1 mb-3">
                                    <input  class="form-control" type="email" name="email" required />
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea  class="form-control" name="short_description"></textarea>
                                </div>
                            </div>

                            <!-- Full Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea  class="form-control" name="description"></textarea>
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

                            <!-- Social Links -->
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input class="form-control" type="text" name="facebook" />
                            </div>
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input  class="form-control" type="text" name="linkedin" />
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input  class="form-control" type="text" name="instagram" />
                            </div>
                            <div class="form-group">
                                <label for="whatsapp">WhatsApp</label>
                                <input  class="form-control" type="text" name="whatsapp" />
                            </div>
                            <div class="form-group">
                                <label for="telegram">Telegram</label>
                                <input  class="form-control" type="text" name="telegram" />
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
            try {
                let target = event.target;
                let from_data = new FormData(target);
                await axios.post('/api/v1/team/store', from_data);
                alert("Team created successfully!");
                target.reset();
            } catch (error) {
                console.error("Error creating team:", error);
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
