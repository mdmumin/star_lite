<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Property Details</h6>
                <router-link :to="{ name: 'propertyAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="blog">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Title</th>
                                <td>{{ blog.title }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ blog.short_description }}</td>
                            </tr>
                            <tr>
                                <th>Full Description</th>
                                <td>{{ blog.full_description }}</td>
                            </tr>
                            <tr>
                                <th>Cover Image</th>
                                <td>
                                    <img v-if="blog.cover_image" :src="blog.cover_image" alt="Cover Image" class="img-thumbnail" style="max-width: 150px;">
                                    <span v-else>No image uploaded</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Published</th>
                                <td>
                                    <span v-if="blog.is_published === 1" class="badge bg-success">Yes</span>
                                    <span v-else class="badge bg-danger">No</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Publish Date</th>
                                <td>{{ blog.publish_date }}</td>
                            </tr>
                            <tr>
                                <th>SEO Title</th>
                                <td>{{ blog.seo_title }}</td>
                            </tr>
                            <tr>
                                <th>SEO Keywords</th>
                                <td>{{ blog.seo_keyword }}</td>
                            </tr>
                            <tr>
                                <th>SEO Description</th>
                                <td>{{ blog.seo_description }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="blog.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading blog details...</p>
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
        blog: null,
    }),
    created() {
        this.getBlogDetails();
    },
    methods: {
        getBlogDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/blog/${this.$route.params.id}`);
                this.blog = response.data.data;
            } catch (error) {
                console.error("Error fetching blog details:", error);
                alert("Failed to load blog details.");
            }
        },
    },
};
</script>
