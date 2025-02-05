<template lang="">
    <li :class="{ active: isActive }" class="toggle">
        <div class="sidebar-title" v-if="group_heading">
            {{ group_heading }}
        </div>
        <a href="javascript:void(0)" :class="`sidebar-header ${custom_class}`" @click="toggleDropdown">
            <i :class="icon"></i>
            <span>
                {{ dropdown_title }}
            </span>
            <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="sidebar-submenu menu-open">
            <slot/>
        </ul>
    </li>
</template>
<script>
export default {
    props:{
        group_heading: {
            type: String,
            default:"",
        },
        custom_class: {
            type: String,
            default: "",
        },
        icon: {
            type: String,
            default: "icon-desktop",
        },
        dropdown_title: {
            type: String,
            default: "Group title",
        },
    },
    data() {
        return {
            isActive: false, 
        };
    },
    methods: {
        toggleDropdown(event) {
            console.log("test",event.target);
            this.isActive = !this.isActive; 
        },
    },
};
</script>
<style lang=""></style>
