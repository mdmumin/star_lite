<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.edit_page_title"/>
        <form @submit.prevent="from_submit">
            <div class="card">
                <div>
                    <div
                        class="card-header py-3 position-sticky d-flex justify-content-between align-items-center"
                    >
                        <h6>
                            Edit Blog
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
                                <input :value="data.id" class="form-control" type="text" name="id"/>
                                <label for="title"> Title </label>
                                <div class="mt-1 mb-3">
                                    <input :value="data.title" class="form-control" type="text" name="title"/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea rows="2" cols="2" :value="data.short_description" class="form-control"  type="text"name="full_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="full_description">Full Description</label>
                                <div class="mt-1 mb-3">
                                    <textarea rows="3" cols="2" :value="data.full_description" class="form-control"  type="text"name="full_description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header py-2 position-sticky d-flex justify-content-start">
                    <button type="submit" class="btn btn-info btn-sm">
                        Update
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
        data: {},
    }),
    created: function() {
        this.get_data();
    },
    methods:{
        from_submit: async function(){
            let target = event.target;
            let from_data = new FormData(target);
            await axios.post('/api/v1/blog/update', from_data);
            target.reset();
        },
        get_data: async function(){
            let res = await axios.get('/api/v1/blog/' + this.$route.params.id);
            this.data = res.data.data;
        }
    }
};
</script>
<style lang=""></style>
