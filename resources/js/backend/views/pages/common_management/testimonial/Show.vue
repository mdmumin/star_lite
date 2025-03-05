<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Testimonial Details</h6>
                <router-link :to="{ name: 'testimonialAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="testimonial">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Name</th>
                                <td>{{ testimonial.name }}</td>
                            </tr>
                            <tr>
                                <th>Designation</th>
                                <td>{{ testimonial.designation }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img v-if="testimonial.image" :src="testimonial.image" alt="Cover Image" class="img-thumbnail" style="max-width: 150px;">
                                    <span v-else>No image uploaded</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Comment</th>
                                <td>{{ testimonial.comment }}</td>
                            </tr>
                            <tr>
                                <th>Creator</th>
                                <td>{{ testimonial.user_creator?.name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="testimonial.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading testimonial details...</p>
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
        testimonial: null,
    }),
    created() {
        this.getBlogDetails();
    },
    methods: {
        getBlogDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/testimonial/${this.$route.params.id}`);
                this.testimonial = response.data.data;
            } catch (error) {
                console.error("Error fetching testimonial details:", error);
                alert("Failed to load testimonial details.");
            }
        },
    },
};
</script>
