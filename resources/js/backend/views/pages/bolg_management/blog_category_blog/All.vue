<template lang="">
    <div class="container-fluid">
        <PageTitle :page_title="config.all_page_title"/>
    <div>
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                <div><h4 class="bn" style="font-size: 22px !important;">Blog category Blog</h4></div>
                <div class="d-flex justify-content-between">
                    <div class="ps-3 d-flex gap-2"><a href="#/admin/class/create" class="btn btn-sm btn-info"> Create </a></div>
                </div>
            </div>
            <div class="card-body px-4 py-2 form_area custom_scroll">
                <div class="custom_table nowrap table-responsive w-100 h-100 custom_scroll">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-start" style="width: 5px;"><input type="checkbox" /></th>
                                <th class="text-start" style="width: 50px;">Sl</th>
                                <th class="" style="width: 400px;">Blog title</th>
                                <th class="" style="width: 200px;">Blog Category</th>
                                <th style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in data?.data" ::key="item.id">
                                <td class="text-start"><input type="checkbox" name="" id="" /></td>
                                <td class="text-start">{{ item.id }}</td>
                                <td class="">{{ item.blog.title }}</td>
                                <td class="">{{ item.blog_category.title }}</td>
                                <td><p class="badge badge-success">active</p></td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <router-link :to="{ name: 'blogCategoryBlogEdit', params: { id: item.id } }" class="btn btn-sm btn-outline-info">
                                         Edit 
                                         </router-link>
                                         <router-link :to="{ name: 'blogCategoryBlogShow', params: { id: item.id } }" class="btn btn-sm btn-outline-success">
                                         Show
                                         </router-link>
                                       
                                        <a href="#" @click.prevent="delet_data(item.id)" class="btn btn-sm btn-outline-danger">
                                             delete 
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-2">
                <nav aria-label="Page navigation example" class="">
                    <ul class="pagination pagination-warning">
                        <li class="page-item">
                            <a class="page-link"><span>« Previous</span></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="http://127.0.0.1:8000/api/v1/navbar-menu-details/all?orderByType=DESC&amp;sub_menu_slug=vrti-notis-82634719&amp;page=1"><span>1</span></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"><span>Next »</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
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
        data: [],
    }),
    methods: {
        delet_data: async function(id){
            let con =window.confirm('Are you sure?');
            if(con){
                await axios.post('/api/v1/blog/category/blog/destroy', {id: id});
                alert('Deleted');
                this.get_all_data();
            }
        },
        get_all_data: async function(){
            let res = await axios.get('/api/v1/blog/category/blog/all');
            this.data = res.data.data;
            console.log('get data', this.data);            
        },
       
    },
    beforeCreate: function(){
        console.log('beforeCreate');
        
        
    },
    created: async function(){
        console.log('created');
        this.get_all_data();
        
    },
    beforeMount: function(){
        console.log('beforeMount');
        
    },
    mounted: function(){
        console.log('mounted');
        
    },
    beforeUpdate: function(){
        console.log('beforeUpdate');
        
    },
    updated: function(){
        console.log('updated');
        
    },
    beforeUnmount: function(){
        console.log('beforeUnmount');
        
    },
    unmounted: function(){
        console.log('unmounted');
        
    }
    
}
</script>
<style lang="">
    
</style>