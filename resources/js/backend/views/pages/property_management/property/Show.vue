<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.show_page_title"/>
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                <h6>Property Details</h6>
                <router-link :to="{ name: 'propertyAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
            </div>
            <div class="card-body">
                <div v-if="form">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Title</th>
                                <td>{{ form.title }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ form.short_description }}</td>
                            </tr>
                            <tr>
                                <th>Full Description</th>
                                <td>{{ form.full_description }}</td>
                            </tr>
                            <tr>
                                <th>Cover Image</th>
                                <td>
                                    <img v-if="form.cover_image" :src="form.cover_image" alt="Cover Image" class="img-thumbnail" style="max-width: 150px;">
                                    <span v-else>No image uploaded</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Published</th>
                                <td>
                                    <span v-if="form.is_published === 1" class="badge bg-success">Yes</span>
                                    <span v-else class="badge bg-danger">No</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Publish Date</th>
                                <td>{{ form.publish_date }}</td>
                            </tr>
                            <tr>
                                <th>SEO Title</th>
                                <td>{{ form.seo_title }}</td>
                            </tr>
                            <tr>
                                <th>SEO Keywords</th>
                                <td>{{ form.seo_keyword }}</td>
                            </tr>
                            <tr>
                                <th>SEO Description</th>
                                <td>{{ form.seo_description }}</td>
                            </tr>
                            <tr>
                                <th>Is closed</th>
                                <td>{{ form.is_closed }}</td>
                            </tr>
                            <tr>
                                <th>Total plot</th>
                                <td>{{ form.total_plot }}</td>
                            </tr>
                            <tr>
                                <th>Total Flat</th>
                                <td>{{ form.total_flat }}</td>
                            </tr>
                            <tr>
                                <th>Total plot sold</th>
                                <td>{{ form.total_plot_sold }}</td>
                            </tr>
                            <tr>
                                <th>Total Flat sold</th>
                                <td>{{ form.total_flat_sold }}</td>
                            </tr>
                            <tr>
                                <th>Available text</th>
                                <td>{{ form.available_text }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px;">Creator</th>
                                <td>{{ form.user_creator?.name }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px;">Category</th>
                                <td>
                                    <span v-if="selectedCategories.length">
                                        <span v-for="(category, index) in selectedCategories" :key="index">
                                            {{ category.name }}<span v-if="index !== selectedCategories.length - 1">, </span>
                                        </span>
                                    </span>
                                    <span v-else>No category assigned</span>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 200px;">Tag</th>
                                <td>
                                    <span v-if="selectedTags.length">
                                        <span v-for="(tag, index) in selectedTags" :key="index">
                                            {{ tag.name }}<span v-if="index !== selectedTags.length - 1">, </span>
                                        </span>
                                    </span>
                                    <span v-else>No tags assigned</span>
                                </td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    <span v-if="form.status === 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p>Loading form details...</p>
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
        form: null,

        selectedCategories: [],
        selectedTags: [],
        selectedLabels: [],
    }),
    created() {
        this.getPropertyDetails();
    },
    methods: {
        getPropertyDetails: async function() {
            try {
                let res = await axios.get('/api/v1/properties/' + this.$route.params.id);
                this.form = res.data.data;
                // this.previewImage = this.form.cover_image;
                
                this.selectedCategories = res.data.data.property_category_ids || [];
                this.selectedTags = res.data.data.property_tag_ids || [];
                this.selectedLabels = res.data.data.property_label_ids;
                
            } catch (error) {
                console.error('Error fetching properties data:', error);
                alert('Failed to load properties data.');
            }
        },
    },
};
</script>
