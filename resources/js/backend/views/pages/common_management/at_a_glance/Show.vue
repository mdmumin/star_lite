<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>At A Glance Details</h6>
                <router-link :to="{ name: 'glanceAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="glance">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Title</th>
                                <td>{{ glance.title }}</td>
                            </tr>
                            <tr>
                                <th>Icon</th>
                                <td>{{ glance.icon }}</td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td>{{ glance.amount }}</td>
                            </tr>
                            <tr>
                                <th>Creator</th>
                                <td>{{ glance.user_creator?.name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="glance.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading glance details...</p>
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
        glance: null,
    }),
    created() {
        this.getBlogDetails();
    },
    methods: {
        getBlogDetails: async function() {
            try {
                let response = await axios.get(`/api/v1/glance/${this.$route.params.id}`);
                this.glance = response.data.data;
            } catch (error) {
                console.error("Error fetching glance details:", error);
                alert("Failed to load glance details.");
            }
        },
    },
};
</script>
