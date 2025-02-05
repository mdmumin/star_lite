<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit Tag Blog</h6>
                        <router-link :to="{ name: 'blogTagAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input v-model="form.id" class="form-control" type="text" name="id" readonly/>
                                <label for="title">Title</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.title" class="form-control" type="text" name="title" />
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
    data: () => ({
        config,
        form: {},
        previewImage: null, 

    }),
    created() {
        this.get_data();
    },
    methods: {
        async from_submit() {
            let formData = new FormData();
            for (let key in this.form) {
                formData.append(key, this.form[key]);
            }
            try {
                await axios.post('/api/v1/blog/tag/update', formData);
                alert("Blog tag updated successfully!");
            } catch (error) {
                console.error("Error updating blogTag:", error);
                alert("Error updating the blog tag.");
            }
        },

        async get_data() {
            try {
                let res = await axios.get('/api/v1/blog/tag/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.image;
            } catch (error) {
                console.error('Error fetching blog tag data:', error);
                alert('Failed to load blog tag data.');
            }
        },
    }
};
</script>












