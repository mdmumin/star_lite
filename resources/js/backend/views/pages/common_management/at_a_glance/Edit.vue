<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                        <h6>Edit Testimonial</h6>
                        <router-link :to="{ name: 'glanceAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title"> Title </label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.title" class="form-control" type="text" />
                                </div>
                            </div>

                            <!-- Designation -->
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.icon" class="form-control" type="text"/>
                                </div>
                            </div>
                            <!-- Contact Number -->
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <div class="mt-1 mb-3">
                                    <input v-model="form.amount" class="form-control" type="number"/>
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
            let formData = new FormData();
            for (let key in this.form) {
                formData.append(key, this.form[key]);
            }
        
            try {
                await axios.post('/api/v1/glance/update', formData);
                alert("Team updated successfully!");
            } catch (error) {
                console.error("Error updating glance:", error);
                alert("Error updating the glance.");
            }
        },

        // Fetch the data for editing
        async get_data() {
            try {
                let res = await axios.get('/api/v1/glance/' + this.$route.params.id);
                this.form = res.data.data;
                this.previewImage = this.form.image;
            } catch (error) {
                console.error('Error fetching glance data:', error);
                alert('Failed to load glance data.');
            }
        },
    }
};
</script>












