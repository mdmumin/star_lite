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
                            Create Tag Blog
                        </h6>
                        <router-link :to="{ name: 'blogTagAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title"> Title </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="title"/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control"  name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
export default {
    components: {
        PageTitle,
    },
    data: () => ({
        config,

    }),
    methods:{
        from_submit: async function(event) {
            let target = event.target;
            let form_data = new FormData(target);
            try {
                await axios.post('/api/v1/blog/tag/store', form_data);
                 alert("Blog Tag created successfully!");
                 target.reset();
            } catch (error) {
                console.error("Error creating blogTag:", error);
                alert("Error creating the Blog Tag. Please try again.");
            }
        }
    }
};
</script>
<style lang=""></style>
