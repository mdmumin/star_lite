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
                            Create Banner
                        </h6>
                        <router-link :to="{ name: 'bannerAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
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
                                <label for="sub_title"> Sub Title </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="sub_title"/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="short_descripton">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="short_descripton"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="button_text">Button Ttext</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control"  type="text" name="button_text"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="button_url">Button Url</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control"  type="text" name="button_url"/>
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
export default {
    components: {
        PageTitle,
    },
    data() {
        return {
            config,
        };
    },
    methods:{
        from_submit: async function(){
            try {
                let target = event.target;
                let from_data = new FormData(target);
                await axios.post('/api/v1/banner/store', from_data);
                alert("Banner created successfully!");
                target.reset();
            } catch (error) {
                console.error("Error creating banner:", error);
                alert("Error creating the Banner. Please try again.");
            }
        }
    }
};
</script>
<style lang=""></style>
