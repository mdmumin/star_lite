<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Blog Tag Details</h6>

                <router-link :to="{ name: 'blogTagAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="blogTag">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Title</th>
                                <td>{{ blogTag.title }}</td>
                            </tr>     
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="blogTag.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading blogTag details...</p>
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
        blogTag: null,
    }),
    created() {
        this.getBlogCategoryDetails();
    },
    methods: {
        getBlogCategoryDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/blog/tag/${this.$route.params.id}`);
                this.blogTag = response.data.data;
            } catch (error) {
                console.error("Error fetching blogTag details:", error);
                alert("Failed to load blogTag details.");
            }
        },
    },
};
</script>
