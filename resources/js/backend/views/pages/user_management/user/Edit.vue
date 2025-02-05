<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit User</h6>
                        <router-link :to="{ name: 'userAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input v-model="form.id" type="hidden" name="id" />
                                <label for="name">Name</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.name" class="form-control" type="text" name="name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role_serial">Role Serial</label>
                                <div class="mt-1 mb-3">
                                    <select v-model="form.role_serial" class="form-control" name="role_serial">
                                        <option value="">Select-- Role Serial</option>
                                        <option v-for="item in userRoleData?.data" :key="item.id" :value="item.role_serial">
                                            {{ item.title }}
                                        </option>    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.email" class="form-control" type="email" name="email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.phone_number" class="form-control" type="number" name="phone_number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Cover Image</label>
                                <div class="mt-1 mb-3">
                                    <input ref="image" class="form-control" name="image" type="file" @change="handleFileUpload" />
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
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select v-model="form.status" class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
    data() {
        return {
            config,
            form: {},
            previewImage: null, // Image preview URL
            userRoleData: [],
        };
    },
    async created() {
        await this.get_data();
        await this.get_data_role_serial();
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
                await axios.post('/api/v1/user/update', formData);
                alert("User updated successfully!");
            } catch (error) {
                console.error("Error updating user:", error);
                alert("Error updating the user.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/user/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.image;
            } catch (error) {
                console.error('Error fetching user data:', error);
                alert('Failed to load user data.');
            }
        },

        // Fetch user roles for the dropdown
        async get_data_role_serial() {
            try {
                let res = await axios.get("/api/v1/user/role/all");
                this.userRoleData = res.data.data;
            } catch (error) {
                console.error("Error fetching user roles:", error);
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
