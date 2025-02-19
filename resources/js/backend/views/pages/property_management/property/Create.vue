<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.create_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div
                        class="card-header py-3 position-sticky d-flex justify-content-between align-items-center"
                    >
                        <h6>
                            Create Property 
                        </h6>
                        <router-link :to="{ name: 'propertyAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row border border-white padding-bottom-top">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <div class="mt-1 mb-3">    
                                    <input class="form-control" type="text" name="title"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">    
                                    <textarea class="form-control" name="short_description"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="full_description">Full Description</label>
                                <div class="mt-1 mb-3">  
                                    <!-- <SummernoteEditor v-model="fullDescription" />   -->
                                    <textarea class="form-control" name="full_description"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="cover_image">Cover Image</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" name="cover_image" type="file" @change="handleFileUpload"/>
                                </div>
                                <!-- Image Preview -->
                                <div v-if="previewImage" class="mb-3">
                                    <img :src="previewImage" alt="Selected Image" class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="is_published">Published</label>
                                <div class="mt-1 mb-3">    
                                    <select class="form-control" name="is_published">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="publish_date">Publish Date</label>
                                <div class="mt-1 mb-3">    
                                    <input class="form-control" type="date" name="publish_date"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="is_closed">Closed</label>
                                <div class="mt-1 mb-3">    
                                    <select class="form-control" name="is_closed">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="total_plot">Total Plots</label>
                                <div class="mt-1 mb-3">    
                                    <input class="form-control" type="number" name="total_plot"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="total_flat">Total Flats</label>
                                <div class="mt-1 mb-3">    
                                    <input class="form-control" type="number" name="total_flat"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="total_plot_sold">Total Plots Sold</label>
                                <div class="mt-1 mb-3">    
                                    <input class="form-control" type="number" name="total_plot_sold"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="total_flat_sold">Total Flats Sold</label>
                                <div class="mt-1 mb-3">    
                                    <input class="form-control" type="number" name="total_flat_sold"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="available_text">Available Text</label>
                                <div class="mt-1 mb-3">    
                                    <textarea class="form-control" name="available_text"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="seo_title">SEO Title</label>
                                <div class="mt-1 mb-3">    
                                    <input class="form-control" type="text" name="seo_title"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="seo_keyword">SEO Keywords</label>
                                <div class="mt-1 mb-3">    
                                    <input class="form-control" type="text" name="seo_keyword"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="seo_description">SEO Description</label>
                                <div class="mt-1 mb-3">    
                                    <textarea class="form-control" name="seo_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- property Category tag an label -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="property_categories_id">Property Category ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control" multiple  name="property_categories_id[]">
                                    <option value="">Selet-- Property Category</option>
                                    <option v-for="item in category?.data" :key="item.id" :value=" item.id ">
                                        {{ item.title }}
                                    </option>    
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="property_tags_id">Property Tag ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control" multiple name="property_tags_id[]">
                                    <option value="">Selet-- Property Tag</option>
                                    <option v-for="item in tag?.data" :key="item.id" :value=" item.id ">
                                        {{ item.title }}
                                    </option>    
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="property_labels_id">Property Label ID</label>
                                <div class="mt-1 mb-3">
                                    <select class="form-control" multiple name="property_labels_id[]">
                                    <option value="">Selet-- Property Label</option>
                                    <option v-for="item in label?.data" :key="item.id" :value=" item.id ">
                                        {{ item.title }}
                                    </option>    
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header py-2 position-sticky d-flex justify-content-start">
                    <button type="submit" class="btn btn-info btn-sm">
                        Create
                    </button>
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
export default {
    components: {
        PageTitle,
        SummernoteEditor,
    },
    data() {
        return {
            config,
            previewImage: null, // ✅ Added previewImage variable
            category: [],
            tag: [],
            label: [],
        };
    },
    created: async function(){
        await this.get_data_category();
        await this.get_data_tag();
        await this.get_data_label();
    },
    methods:{
        from_submit: async function(){
            let target = event.target;
            let from_data = new FormData(target);
            try {
                await axios.post('/api/v1/properties/store', from_data);
                alert("Property Created successfully!");
                target.reset();
            } catch (error) {
                console.error("Error updating properties:", error);
                alert("Error Created the properties.");
            }
        },
        // ✅ Image Preview Function
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.previewImage = URL.createObjectURL(file);
            }
        },
        get_data_category: async function(){
            let res = await axios.get('/api/v1/property/category/all');
            this.category = res.data.data;
            // console.log("created", this.category);
            
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
<style lang=""></style>
