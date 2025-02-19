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
                                <input v-model="form.id" class="form-control" type="text" name="id" readonly/>
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
                                <label for="full_description">Full Description</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.full_description" class="form-control" type="text" name="full_description"/>
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
                                <label for="property_categories_id">Property Category ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control" multiple name="property_category_id[]">
                                        <option value="">Selet-- Property Category</option>
                                        <option v-for="item in category?.data" 
                                        :key="item.id" :value="item.id"
                                        :selected="form.property_category.some(property_category => property_category.id === item.id)">
                                            {{ item.title }}
                                        </option>    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="property_tags_id">Property Tag ID</label>
                                <div class="mt-1 mb-3">
                                    <!-- <select class="form-control" multiple name="property_tags_id[]">
                                        <option value="">Selet-- Property Tag</option>
                                        <option v-for="item in tag?.data" :key="item.id" :value="item.id 
                                        :selected="form.property_tag[0].id == item.id"">
                                            {{ item.title }}
                                        </option>    
                                    </select> -->
                                    <select class="form-control" multiple name="property_tags_id[]">
                                        <option value="">Selet-- Property Category</option>
                                        <option v-for="item in category?.data" 
                                        :key="item.id" :value="item.id"
                                        :selected="form.property_tag.some(property_tag => property_tag.id === item.id)" >
                                            {{ item.title }}
                                        </option>    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="property_labels_id">Property Label ID</label>
                                <div class="">
                                    <select class="form-control" multiple name="property_labels_id[]">
                                        <option value="">Selet-- Property Label</option>
                                        <option v-for="item in label?.data" 
                                        :key="item.id" :value="item.id"
                                        :selected="form.property_label.some(property_label => property_label.id === item.id)">
                                            {{ item.title }}
                                        </option>    
                                    </select>
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

export default {
    components: {
        PageTitle,
    },
    data: () => ({
        config,
        form: {},
        previewImage: null, // Image preview URL
        category: [],
        tag: [],
        label: [],

    }),
    created() {
        this.get_data();
        this.get_data_category();
        this.get_data_tag();
        this.get_data_label();
    },
    methods: {
        // Submit the form data
        async from_submit() {
            let formData = new FormData();
            for (let key in this.form) {
                formData.append(key, this.form[key]);
            }

            // Add the file if it's selected
            const file = this.$refs.cover_image.files[0];
            if (file) {
                formData.append("cover_image", file);
            }

            try {
                await axios.post('/api/v1/properties/update', formData);
                alert("Properties updated  successfully!");
            } catch (error) {
                console.error("Error updating properties:", error);
                alert("Error updating the properties.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/properties/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.cover_image;
                console.log(this.form.property_category);
                
                
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
        get_data_category: async function(){
            let res = await axios.get('/api/v1/property/category/all');
            this.category = res.data.data;
            console.log("created", this.category.id);
            
        },
        get_data_tag: async function(){
            let res = await axios.get('/api/v1/property/tag/all');
            this.tag = res.data.data;
            // console.log("created", this.tag);
            
        },
        get_data_label: async function(){
            let res = await axios.get('/api/v1/property/tag/all');
            this.label = res.data.data;
            // console.log("created", this.label);
            
        },
    }
};
</script>










