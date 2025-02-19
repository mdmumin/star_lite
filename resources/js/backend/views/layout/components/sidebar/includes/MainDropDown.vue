<template lang="">
    <li :class="{ active: isActive }" class="toggle">
        <a href="javascript:void(0)" class="sidebar-title"  @click="toggleDropdown">
            {{ group_heading }}
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
        // icon: {
        //     type: String,
        //     default: "icon-desktop",
        // },
        // dropdown_title: {
        //     type: String,
        //     default: "Group title",
        // },
    },
    data() {
        return {
            isActive: false, 
        };
    },
    methods: {
        toggleDropdown(event) {
            // console.log("test",event.target);
            this.isActive = !this.isActive; 
        },
    },
};
</script>
<style lang=""></style>
