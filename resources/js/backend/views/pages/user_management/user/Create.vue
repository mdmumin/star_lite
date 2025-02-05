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
                        <router-link :to="{ name: 'userAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name"> name </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="name"/>
                                    <!-- <textarea
                                        class="form-control"
                                        type="text"
                                        name="name"
                                    ></textarea> -->
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="status">Blog ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control"  name="role_serial">
                                        <option value="">Selet-- Blog</option>
                                        <option v-for="item in userRoleData?.data" :key="item.id" :value=" item.role_serial ">
                                            {{ item.title }}
                                        </option>    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"> Email  </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="email" name="email"/>
                                </div>
                            </div> 
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
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control"  type="number" name="phone_number"/>
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
            userRoleData: [],   // ✅ Initialize userRoleData
        };
    },
    async created() {
        await this.get_data_category();
    },
    methods: {
        async from_submit(event) {
            let target = event.target;
            let form_data = new FormData(target);
            console.log("inserted data");
            try {
                await axios.post('/api/v1/user/store', form_data);
                console.log("inserted data");
                
                target.reset();
            } catch (error) {
                console.error("Error submitting form:", error);
            }
        },
        // ✅ Image Preview Function
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.previewImage = URL.createObjectURL(file);
            }
        },
        async get_data_category() {
            try {
                let res = await axios.get('/api/v1/user/role/all');
                this.userRoleData = res.data.data;  // ✅ Assign data properly
            } catch (error) {
                console.error("Error fetching user roles:", error);
            }
        },
    }
};
</script>

<style lang=""></style>
