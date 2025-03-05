<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Banner Details</h6>
                <router-link :to="{ name: 'bannerAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="banner">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Title</th>
                                <td>{{ banner.title }}</td>
                            </tr>
                            <tr>
                                <th>Sub Title</th>
                                <td>{{ banner.sub_title }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ banner.short_descripton }}</td>
                            </tr>
                            <!-- <tr>
                                <th>Cover Image</th>
                                <td>
                                    <img v-if="banner.cover_image" :src="banner.cover_image" alt="Cover Image" class="img-thumbnail" style="max-width: 150px;">
                                    <span v-else>No image uploaded</span>
                                </td>
                            </tr> -->
                            <tr>
                                <th>Button text</th>
                                <td>{{ banner.button_text }}</td>
                            </tr>
                            <tr>
                                <th>Button url</th>
                                <td>{{ banner.button_url }}</td>
                            </tr>
                            <tr>
                                <th>Creator</th>
                                <td>{{ banner.user_creator?.name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="banner.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading banner details...</p>
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
        banner: null,
    }),
    created() {
        this.getBlogDetails();
    },
    methods: {
        getBlogDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/banner/${this.$route.params.id}`);
                this.banner = response.data.data;
            } catch (error) {
                console.error("Error fetching banner details:", error);
                alert("Failed to load banner details.");
            }
        },
    },
};
</script>
