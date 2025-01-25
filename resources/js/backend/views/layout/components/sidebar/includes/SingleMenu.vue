<template lang="">
    <li>
        <router-link
            :to="url"
            :class="`sidebar-header ${custom_class}`"
        >
            <i :class="icon"></i>
            <span>
                 {{ title }} 
            </span>
        </router-link>
    </li>
</template>
<script>
export default {
    props: {
        url: {
            type: Object,
            default: {
                name: "Deshboard",
                param: {},
            },
        },
        custom_class: {
            type: String,
            default: "",
        },
        icon: {
            type: String,
            default: "icon-anchor",
        },
        title: {
            type: String,
            default: "nav link",
        },
    },
};
</script>
<style lang=""></style>
