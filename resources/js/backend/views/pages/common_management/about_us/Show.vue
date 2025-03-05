<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>About Details</h6>
                <router-link :to="{ name: 'aboutAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="about">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Title</th>
                                <td>{{ about.title }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px;">Sub Title</th>
                                <td>{{ about.sub_title }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ about.short_description }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ about.description }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img v-if="about.image" :src="about.image" alt="Cover Image" class="img-thumbnail" style="max-width: 150px;">
                                    <span v-else>No image uploaded</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Video thumbnail Image</th>
                                <td>
                                    <img v-if="about.video_thumbnail_image" :src="about.video_thumbnail_image" alt="Cover Image" class="img-thumbnail" style="max-width: 150px;">
                                    <span v-else>No video_thumbnail_image uploaded</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Publish Date</th>
                                <td>{{ about.publish_date }}</td>
                            </tr>
                            <tr>
                                <th>Video url</th>
                                <td>{{ about.video_url }}</td>
                            </tr>
                            <tr>
                                <th>Quote text</th>
                                <td>{{ about.quote_text }}</td>
                            </tr>
                            <tr>
                                <th>Button text</th>
                                <td>{{ about.button_text }}</td>
                            </tr>
                            <tr>
                                <th>Button url</th>
                                <td>{{ about.button_url }}</td>
                            </tr>
                            <tr>
                                <th>Creator</th>
                                <td>{{ about.user_creator?.name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="about.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading about details...</p>
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
        about: null,
    }),
    created() {
        this.getBlogDetails();
    },
    methods: {
        getBlogDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/about/${this.$route.params.id}`);
                this.about = response.data.data;
            } catch (error) {
                console.error("Error fetching about details:", error);
                alert("Failed to load about details.");
            }
        },
    },
};
</script>
