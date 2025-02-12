<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit property label</h6>
                        <router-link :to="{ name: 'property/labelAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input v-model="form.id" class="form-control" type="text" name="id" readonly/>
                                <label for="title">Title</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.title" class="form-control" type="text" name="title" />
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
    }),
    created() {
        this.get_data();
    },
    methods: {
        // Submit the form data
        async from_submit() {
            try {
                let target = event.target;
                let from_data = new FormData(target);
                await axios.post('/api/v1/property/label/update', from_data);
                alert("Property tag updated successfully!");
            } catch (error) {
                console.error("Error updating property tag:", error);
                alert("Error updating the tag.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/property/label/' + this.$route.params.id);
                this.form = res.data.data;
            } catch (error) {
                console.error('Error fetching property tag data:', error);
                alert('Failed to load property tag data.');
            }
        },

        // Handle file upload preview
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.image = file;
                this.previewImage = URL.createObjectURL(file);
            }
        }
    }
};
</script>












