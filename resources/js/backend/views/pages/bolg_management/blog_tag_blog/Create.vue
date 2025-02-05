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
                            Create Blog tag blog
                        </h6>
                        <router-link :to="{ name: 'blogCategoryAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="status">Blog ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control"  name="blog_id">
                                    <option value="">Selet-- Blog</option>
                                    <option v-for="item in data" :key="item.id" :value=" item.id ">
                                        {{ item.title }}
                                    </option>    
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Blog Category ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control"  name="blog_tag_id">
                                    <option value="">Selet-- Blog tag</option>
                                    <option v-for="item in tag" :key="item.id" :value=" item.id ">
                                        {{ item.title }}
                                    </option>    
                                </select>
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
            data: [],
            tag: [],

        };
    },
    created: async function(){
        await this.get_data_blog();
        await this.get_data_category();
    },
    methods:{
        from_submit: async function(){
            try {
                let target = event.target;
                let from_data = new FormData(target);
                await axios.post('/api/v1/blog/tag/blog/store', from_data);
                alert("Data Created successfully!");
                target.reset();
            } catch (error) {
                console.error("Error created data:", error);
                alert("Error creating the data.");
            }
        },
        get_data_blog: async function(){
            let res = await axios.get('/api/v1/blog/all');
            this.data = res.data.data.data;
            // console.log("created", this.data);
            
        },
        get_data_category: async function(){
            let res = await axios.get('/api/v1/blog/tag/all');
            this.tag = res.data.data.data;
            // console.log("created", this.tag);
            
        },
        
    }
};
</script>
<style lang=""></style>
