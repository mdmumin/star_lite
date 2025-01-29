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
                            Create User
                        </h6>
                        <a
                            href="#/admin/class"
                            class="router-link-active btn btn-info btn-sm"
                            >Back</a
                        >
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title"> Title </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="title"/>
                                    <!-- <textarea
                                        class="form-control"
                                        type="text"
                                        name="title"
                                    ></textarea> -->
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="short_description"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="full_description">Full Description</label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control"  type="text"name="full_description"/>
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
    data: () => ({
        config,
    }),
    methods:{
        from_submit: async function(){
            let target = event.target;
            let from_data = new FormData(target);
            await axios.post('/api/v1/blog/store', from_data);
            target.reset();
        }
    }
};
</script>
<style lang=""></style>
