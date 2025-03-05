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
                            Create At A Glance
                        </h6>
                        <router-link :to="{ name: 'glanceAll' }" class="router-link-active btn btn-info btn-sm">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="title"> Title </label>
                                <div class="mt-1 mb-3">
                                    <input class="form-control" type="text" name="title" required />
                                </div>
                            </div>

                            <!-- Designation -->
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <div class="mt-1 mb-3">
                                    <input  class="form-control" type="text" name="icon" required />
                                </div>
                            </div>

                            <!-- Contact Number -->
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <div class="mt-1 mb-3">
                                    <input  class="form-control" type="number" name="amount" required />
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
                await axios.post('/api/v1/glance/store', from_data);
                alert("Team created successfully!");
                target.reset();
            } catch (error) {
                console.error("Error creating glance:", error);
                alert("Error creating the Team. Please try again.");
            }
        },
    }
};
</script>
<style lang=""></style>
