<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit Blog category blog</h6>
                        <router-link :to="{ name: 'blogCategoryAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <input v-model="form.id" type="hidden" name="id" />
                            <div class="form-group">
                                <label for="status">Blog ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control"  name="blog_id">
                                    <option value="">Selet-- Blog</option>
                                    <option v-for="item in data" :key="item.id" 
                                        :value=" item.id " 
                                        :selected="form.blog_id == item.id">
                                            {{ item.title }}
                                    </option>    
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Blog Category ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control"  name="blog_category_id">
                                    <option value="">Selet-- Blog</option>
                                    <option v-for="item in category" :key="item.id" 
                                        :value=" item.id " 
                                        :selected="form.blog_category_id == item.id">
                                            {{ item.title }}
                                    </option>    
                                </select>
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
        data: [],
        category: [],

    }),
    
    created: async function(){
        await this.get_data();
        await this.get_data_blog();
        await this.get_data_category();
    },
    methods: {
        // Submit the form data
        from_submit: async function(){
            try {
                let target = event.target;
                let from_data = new FormData(target);
                await axios.post('/api/v1/blog/category/blog/update', from_data);
                alert("Blog updated successfully!");

            } catch (error) {
                console.error("Error updating blog:", error);
                alert("Error updating the blog.");
            }
        },

        get_data: async function () {
            try {
                let res = await axios.get('/api/v1/blog/category/blog/' + this.$route.params.id);
                this.form = res.data.data;
            } catch (error) {
                console.error('Error fetching blog data:', error);
                alert('Failed to load blog data.');
            }
        },
        get_data_blog: async function(){
            let res = await axios.get('/api/v1/blog/all');
            this.data = res.data.data.data;
            // console.log("created", this.data);           
        },
        get_data_category: async function(){
            let res = await axios.get('/api/v1/blog/category/all');
            this.category = res.data.data.data;
            // console.log("created", this.category);
            
        },
    }
};
</script>












