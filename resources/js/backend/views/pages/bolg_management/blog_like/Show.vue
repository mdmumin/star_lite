<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Blog Comment Details</h6>

                <router-link :to="{ name: 'blogCommentAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="blogComment">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">User Id</th>
                                <td>{{ blogComment.user_id }}</td>
                            </tr>  
                            <tr>
                                <th style="width: 200px;">Blog Id-title</th>
                                <td>{{ blogComment?.blog?.title }}</td>
                            </tr> 
                            <tr>
                                <th style="width: 200px;">Blog Comment</th>
                                <td>{{ blogComment?.comment }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px;">Parent Id</th>
                                <td>{{ blogComment?.parent_id }}</td>
                            </tr>                        
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="blogComment.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading blog Comment details...</p>
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
        blogComment: null,
    }),
    created() {
         this.getBlogCategoryDetails();
    },
    methods: {
        getBlogCategoryDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/blog/comment/${this.$route.params.id}`);
                this.blogComment = response.data.data;
                // console.log('blogdata', this.blogComment);
                
            } catch (error) {
                console.error("Error fetching blogComment details:", error);
                alert("Failed to load blogComment details.");
            }
        },
    },
};
</script>
