<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Mission Vission Details</h6>
                <router-link :to="{ name: 'missionVissionAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="missionVission">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Type</th>
                                <td>{{ missionVission.type }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img v-if="missionVission.image" :src="missionVission.image" alt="Cover Image" class="img-thumbnail" style="max-width: 150px;">
                                    <span v-else>No image uploaded</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ missionVission.description }}</td>
                            </tr>
                            <tr>
                                <th>Creator</th>
                                <td>{{ missionVission.user_creator?.name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="missionVission.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading missionVission details...</p>
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
        missionVission: null,
    }),
    created() {
        this.getBlogDetails();
    },
    methods: {
        getBlogDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/mission/vission/${this.$route.params.id}`);
                this.missionVission = response.data.data;
            } catch (error) {
                console.error("Error fetching missionVission details:", error);
                alert("Failed to load missionVission details.");
            }
        },
    },
};
</script>
