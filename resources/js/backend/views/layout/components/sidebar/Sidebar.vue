<template lang="">
    <div class="page-sidebar custom-scrollbar">
        <TopProfile></TopProfile>
        <ul class="sidebar-menu">
            <DropDownMenu
                :group_heading="`User Management`"
                :dropdown_title="`User`"
            >
                <SingleMenu
                    :url="{ name: 'userAll' }"
                    :title="`All User`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
                <SingleMenu
                    :url="{ name: 'userCreate' }"
                    :title="`Create User`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
            </DropDownMenu>
            <DropDownMenu
                :group_heading="`Blog Management`"
                :dropdown_title="`Blog`"
            >
                <SingleMenu
                    :url="{ name: 'blogAll' }"
                    :title="`All Blog`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
                <SingleMenu
                    :url="{ name: 'blogCreate' }"
                    :title="`Create Blog`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
            </DropDownMenu>

            <SingleMenu
                :url="{ name: 'blogAll' }"
                :title="`All Blog`"
                :icon="`fa fa-list`"
                :custom_class="`single-class`"
            />
            <SingleMenu
                :url="{ name: 'blogCreate' }"
                :title="`Create Blog`"
                :icon="`fa fa-plus`"
                :custom_class="`single-class`"
            />
        </ul>
    </div>
</template>
<script>
import TopProfile from "./includes/TopProfile.vue";
import DropDownMenu from "./includes/DropDownMenu.vue";
import SingleMenu from "./includes/SingleMenu.vue";
export default {
    components: {
        TopProfile,
        DropDownMenu,
        SingleMenu,
    },
};
</script>
<style lang=""></style>
