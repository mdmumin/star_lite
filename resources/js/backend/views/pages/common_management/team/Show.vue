<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Team Details</h6>
                <router-link :to="{ name: 'teamAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="team">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Name</th>
                                <td>{{ team.name }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px;">Designation</th>
                                <td>{{ team.designation }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img v-if="team.image" :src="team.image" alt="Image" class="img-thumbnail" style="max-width: 150px;">
                                    <span v-else>No image uploaded</span>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 200px;">Contact number</th>
                                <td>{{ team.contact_number }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px;">email </th>
                                <td>{{ team.email  }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ team.short_description }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ team.description }}</td>
                            </tr>
                            <tr>
                                <th>facebook </th>
                                <td>{{ team.facebook }}</td>
                            </tr>
                            <tr>
                                <th>Linkedin</th>
                                <td>{{ team.linkedin }}</td>
                            </tr>
                            <tr>
                                <th>Instagram</th>
                                <td>{{ team.instagram }}</td>
                            </tr>
                            <tr>
                                <th>Telegram</th>
                                <td>{{ team.telegram }}</td>
                            </tr>
                            <tr>
                                <th>Whatsapp</th>
                                <td>{{ team.whatsapp }}</td>
                            </tr>
                            <tr>
                                <th>Creator</th>
                                <td>{{ team.user_creator?.name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="team.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading team details...</p>
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
        team: null,
    }),
    created() {
        this.getBlogDetails();
    },
    methods: {
        getBlogDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/team/${this.$route.params.id}`);
                this.team = response.data.data;
            } catch (error) {
                console.error("Error fetching team details:", error);
                alert("Failed to load team details.");
            }
        },
    },
};
</script>
