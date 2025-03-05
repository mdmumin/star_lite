<template>
    <div class="container-fluid">
        <PageTitle :page_title="config.all_page_title" />
        <div>
            <div class="card rounded-none">
                <div
                    class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center"
                >
                    <div>
                        <h4 class="bn" style="font-size: 22px !important">
                            All Bolg
                        </h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="ps-3 d-flex gap-2">
                            <router-link :to="{ name: 'blogCreate' }" class="router-link-active btn btn-info btn-sm">
                                Create  
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 py-2 form_area custom_scroll">
                    <div
                        class="custom_table nowrap table-responsive w-100 h-100 custom_scroll"
                    >
                        <table
                            class="table table-bordered table-hover text-center"
                        >
                            <thead>
                                <tr>
                                    <th class="text-start" style="width: 5px">
                                        <input type="checkbox" />
                                    </th>
                                    <th class="text-start" style="width: 50px">
                                        Sl
                                    </th>
                                    <th class="" style="width: 300px">Title</th>
                                    <th class="" style="width: 200px">
                                        Cover Image
                                    </th>
                                    <th class="" style="width: 300px">Creator</th>
                                    <th style="width: 100px">Status</th>
                                    <th
                                        class="text-center"
                                        style="width: 150px"
                                    >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in data?.data" :key="item.id">
                                    <td class="text-start">
                                        <input type="checkbox" name="" id="" />
                                    </td>
                                    <td class="text-start">{{ item.id }}</td>
                                    <td class="">
                                        {{ getShortTitle(item.title) }}
                                    </td>
                                    <td>
                                        <img
                                            :src="getImageUrl(item.cover_image)"
                                            alt="Cover Image"
                                            class="img-thumbnail"
                                            style="max-width: 100px"
                                        />
                                    </td>
                                    <!-- <td class="">
                                        {{ getShortTitle(item.data.name) }}
                                    </td> -->
                                    <td>
                                        <p class="badge badge-success">
                                            active
                                        </p>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-1" >
                                            <router-link
                                                :to="{
                                                    name: 'blogEdit',
                                                    params: { id: item.id },
                                                }"
                                                class="btn btn-sm btn-outline-info"
                                            >
                                                Edit
                                            </router-link>
                                            <router-link
                                                :to="{
                                                    name: 'blogShow',
                                                    params: { id: item.id },
                                                }"
                                                class="btn btn-sm btn-outline-success"
                                            >
                                                Show
                                            </router-link>

                                            <a
                                                href="#"
                                                @click.prevent="
                                                    delet_data(item.id)
                                                "
                                                class="btn btn-sm btn-outline-danger"
                                            >
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
                        <ul class="pagination my-2">
                            <template
                                v-for="(link, index) in data.links"
                                :key="index"
                            >
                                <li
                                    class="page-item"
                                    :class="{ active: link.active }"
                                >
                                    <a
                                        class="page-link"
                                        :class="
                                            data.current_page ==
                                                data.last_page &&
                                            data.links.length - 1 == index
                                                ? 'disabled'
                                                : ''
                                        "
                                        @click.prevent="get_all_data(link.url)"
                                        :href="link.url"
                                        v-html="`<span>${link.label}</span>`"
                                    >
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import config from "./config/index.js";
import PageTitle from "./components/PageTitle.vue";
import axios from "axios";
export default {
    components: {
        PageTitle,
    },
    data: () => ({
        config,
        data: {},
        creator: {},
    }),
    methods: {
        delet_data: async function (id) {
            let con = window.confirm("Are you sure?");
            if (con) {
                await axios.post("/api/v1/blog/destroy", { id: id });
                alert("Deleted");
                this.get_all_data();
            }
        },
        get_all_data: async function (url = null) {
            let res; // Declare res once
            try {
                if (url) {
                    res = await axios.get(url);
                } else {
                    res = await axios.get("/api/v1/blog/all");
                }
                this.data = res.data.data; // Ensure res is assigned before accessing
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        },

        get_creator_data: async function(){
            let res = await axios.get('/api/v1/user/all');
            this.creator = res.data.data;
            console.log('get data', this.creator);            
        },
        getImageUrl(cover_image) {
            return cover_image ? `/${cover_image}` : "/default-image.jpg"; // Adjust path based on your actual image storage
        },
        getShortTitle(title) {
            return title ? title.split(" ").slice(0, 3).join(" ") : "";
        },
    },
    beforeCreate: function () {
        console.log("beforeCreate");
    },
    created: async function () {
        console.log("created");
        this.get_all_data();
        this.get_creator_data();
    },
    beforeMount: function () {
        console.log("beforeMount");
    },
    mounted: function () {
        console.log("mounted");
    },
    beforeUpdate: function () {
        console.log("beforeUpdate");
    },
    updated: function () {
        console.log("updated");
    },
    beforeUnmount: function () {
        console.log("beforeUnmount");
    },
    unmounted: function () {
        console.log("unmounted");
    },
};
</script>
<style lang=""></style>
