<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Blog category blog Details</h6>

                <router-link :to="{ name: 'blogCategoryAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="blogCategory">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Blog Title</th>
                                <td>{{ blogCategory?.blog?.title }}</td>
                            </tr>  
                            <tr>
                                <th style="width: 200px;">Blog Category Title</th>
                                <td>{{ blogCategory?.blog_category?.title }}</td>
                            </tr>                        
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="blogCategory.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading blogCategory details...</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import config from "./config/index.js";
import PageTitle from "./components/PageTitle.vue";
import axios from "axios";

export default {
    components: {
        PageTitle,
    },
    data: () => ({
        config,
        blogCategory: null,
    }),
    created() {
         this.getBlogCategoryDetails();
    },
    methods: {
        getBlogCategoryDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/blog/category/blog/${this.$route.params.id}`);
                this.blogCategory = response.data.data;
                // console.log('blogdata', this.blogCategory);
                
            } catch (error) {
                console.error("Error fetching blogCategory details:", error);
                alert("Failed to load blogCategory details.");
            }
        },
    },
};
</script>
