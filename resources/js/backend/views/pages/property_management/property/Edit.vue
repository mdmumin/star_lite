<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit Property</h6>
                        <router-link :to="{ name: 'propertyAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <input v-model="form.id" class="form-control" type="hidden" name="id" readonly/>
                                <label for="title">Title</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.title" class="form-control" type="text" name="title" />
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.short_description" class="form-control" type="text" name="short_description"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="full_description">Description</label>
                                <div class="mt-1 mb-3">
                                    <SummernoteEditor name="description" v-model="form.full_description"/>  
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cover_image">Cover Image</label>
                                <div class="mt-1 mb-3">
                                    <input ref="cover_image" class="form-control" name="cover_image" type="file" @change="handleFileUpload"/>
                                </div>
                                <!-- Image Preview -->
                                <div v-if="previewImage" class="mb-3">
                                    <img :src="previewImage" alt="Selected Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                                <!-- Existing Image Preview -->
                                <div v-else-if="form.cover_image" class="mb-3">
                                    <img :src="form.cover_image" alt="Existing Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="is_published">Published</label>
                                <div class="mt-1 mb-3">
                                    <select v-model="form.is_published" class="form-control" name="is_published">
                                        <option value="1">True</option>
                                        <option value="0">False</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="publish_date">Publish Date</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.publish_date" class="form-control" type="date" name="publish_date"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is_closed">Closed</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control" name="is_closed" v-model="form.is_closed">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total_plot">Total Plots</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="number" name="total_plot" v-model="form.total_plot" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total_flat">Total Flats</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="number" name="total_flat" v-model="form.total_flat" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total_plot_sold">Total Plots Sold</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="number" name="total_plot_sold" v-model="form.total_plot_sold" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total_flat_sold">Total Flats Sold</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="number" name="total_flat_sold" v-model="form.total_flat_sold" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="available_text">Available Text</label>
                                <div class="mt-1 mb-3">
                                    <textarea class="form-control" name="available_text" v-model="form.available_text"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seo_title">SEO Title</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.seo_title" class="form-control" type="text" name="seo_title"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seo_keyword">SEO Keywords</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.seo_keyword" class="form-control" type="text" name="seo_keyword"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seo_description">SEO Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea v-model="form.seo_description" class="form-control" name="seo_description"></textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="property_category">Property Category ID</label>
                                <div class="mt-1 mb-3">
                                    <select2
                                        :data="categories"
                                        :value="selectedCategories"
                                        @update="updateCategories"
                                        :multiple="true"
                                    ></select2>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="property_tags_id">Property Tag ID</label>
                                <div class="mt-1 mb-3">
                                    <!-- <select class="form-control" multiple name="property_tags_id[]">
                                        <option value="">Selet-- Property Category</option>
                                        <option v-for="item in category?.data" 
                                        :key="item.id" :value="item.id"
                                        :selected="form.property_tag.some(property_tag => property_tag.id === item.id)" >
                                            {{ item.title }}
                                        </option>    
                                    </select> -->

                                    <select2
                                        :data="tag"
                                        :value="selectedTags"
                                        @update="updateTags"
                                        :multiple="true"
                                    ></select2>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="property_labels_id">Property Label ID</label>
                                <div class="">
                                    <select2
                                        :data="label"
                                        :value="selectedLabels"
                                        @update="updateLabels"
                                        :multiple="true"
                                    ></select2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header py-2 position-sticky d-flex justify-content-start">
                    <button type="submit" class="btn btn-info btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import config from './config/index.js';
import PageTitle from './components/PageTitle.vue';
import axios from 'axios';
import SummernoteEditor from '../../../layout/components/SummernoteEditor.vue';
import { Select2 } from "select2-vue-component";


export default {
    components: {
        PageTitle,
        SummernoteEditor,

        Select2,
    },
    data: () => ({
        config,
        form: {
            
        },
        previewImage: null, // Image preview URL
        categories: [],
        tag: [],
        label: [],
        
        selectedCategories: [],
        selectedTags: [],
        selectedLabels: [],
    }),
    created: async function() {
        await this.get_data_category();
        await this.get_data_tag();
        await this.get_data_label();
        this.get_data();
    },
    methods: {
        // Submit the form data
        async from_submit() {
            let form = new FormData();
            for (let key in this.form) {
                if (Array.isArray(this.form[key])) {
                    this.form[key].forEach((item) => form.append(`${key}[]`, item));
                } else {
                    form.append(key, this.form[key]);
                }
            }

            // Add the file if it's selected
            const file = this.$refs.cover_image.files[0];
            if (file) {
                form.append("cover_image", file);
            }
            form.append('property_categories_id', this.selectedCategories.join(','));
            form.append('property_tags_id', this.selectedTags.join(','));
            form.append('property_labels_id', this.selectedLabels.join(','));

            try {
                await axios.post('/api/v1/properties/update',form);
                alert("Properties updated successfully!");
            } catch (error) {
                console.error("Error updating properties:",error);
                alert("Error updating the properties.");
            }
        },

        // Fetch the data for editing
        get_data: async function() {
            try {
                let res = await axios.get('/api/v1/properties/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.cover_image;
                
                this.selectedCategories = res.data.data.property_category_ids;
                this.selectedTags = res.data.data.property_tag_ids;
                this.selectedLabels = res.data.data.property_label_ids || [];
                
            } catch (error) {
                console.error('Error fetching properties data:', error);
                alert('Failed to load properties data.');
            }
        },

        // Handle file upload preview
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.cover_image = file;
                this.previewImage = URL.createObjectURL(file);
            }
        },

        updateCategories(value) {
            this.selectedCategories = value;
        },
        updateTags(value) {
            this.selectedTags = value;
        },
        updateLabels(value) {
            this.selectedLabels = value;
        },
        get_data_category: async function(){
            let res = await axios.get('/api/v1/property/category/alldata?get_all=true');
            this.categories = res.data;
            console.log("category",this.categories );
            
        },
        get_data_tag: async function(){
            let res = await axios.get('/api/v1/property/tag/all?get_all=true');
            this.tag = res.data.data;
        },
        get_data_label: async function(){
            let res = await axios.get('/api/v1/property/label/all?get_all=true');
            this.label = res.data.data;
        },
    }
};
</script>