<template lang="">
    <div class="page-sidebar custom-scrollbar">
        <TopProfile></TopProfile>
        <ul class="sidebar-menu">
            <!-- UserManagement -->
            <MainDropDown
                :group_heading="`User Management`"
            >
                <DropDownMenu
                    :group_heading="``"
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
            </MainDropDown>
            <!-- Blog Management -->
            <MainDropDown
                :group_heading="`Blog Management`"
            >
                <DropDownMenu
                    :group_heading="``"
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
                <DropDownMenu
                    :group_heading="``"
                    :dropdown_title="`Blog Category`"
                >
                    <SingleMenu
                        :url="{ name: 'blogCategoryAll' }"
                        :title="`All Blog`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                    <SingleMenu
                        :url="{ name: 'blogCategoryCreate' }"
                        :title="`Create Blog`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                </DropDownMenu>

                <DropDownMenu
                    :group_heading="``"
                    :dropdown_title="`Blog Category blog`"
                >
                    <SingleMenu
                        :url="{ name: 'blogCategoryBlogAll' }"
                        :title="`All Blog category blog`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                    <SingleMenu
                        :url="{ name: 'blogCategoryBlogCreate' }"
                        :title="`Create Blog tegory blog`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                </DropDownMenu>

                <DropDownMenu
                    :group_heading="``"
                    :dropdown_title="`Blog Tag`"
                >
                    <SingleMenu
                        :url="{ name: 'blogTagAll' }"
                        :title="`All Blog tag`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                    <SingleMenu
                        :url="{ name: 'blogTagCreate' }"
                        :title="`Create Blog tag`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                </DropDownMenu>

                <DropDownMenu
                    :group_heading="``"
                    :dropdown_title="`Blog Tag Blog`"
                >
                    <SingleMenu
                        :url="{ name: 'blogTagBlogAll' }"
                        :title="`All Blog tag blog`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                    <SingleMenu
                        :url="{ name: 'blogTagBlogCreate' }"
                        :title="`Create Blog tag blog`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                </DropDownMenu>

                <DropDownMenu
                    :group_heading="``"
                    :dropdown_title="`Blog Comments`"
                >
                    <SingleMenu
                        :url="{ name: 'blogCommentAll' }"
                        :title="`All Blog Comment`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                    <SingleMenu
                        :url="{ name: 'blogCommentCreate' }"
                        :title="`Create Blog Comment`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                </DropDownMenu>
                <DropDownMenu
                    :group_heading="``"
                    :dropdown_title="`Blog Likes`"
                >
                    <SingleMenu
                        :url="{ name: 'blogLikeAll' }"
                        :title="`All Blog Like`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                    <SingleMenu
                        :url="{ name: 'blogLikeCreate' }"
                        :title="`Create Blog Like`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                </DropDownMenu>
            </MainDropDown>

            <!-- common_management -->
            <MainDropDown
                :group_heading="`Common Management`"
            >
                <DropDownMenu
                    :group_heading="``"
                    :dropdown_title="`Banner`"
                >
                    <SingleMenu
                        :url="{ name: 'bannerAll' }"
                        :title="`All Banner`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                    <SingleMenu
                        :url="{ name: 'bannerCreate' }"
                        :title="`Create Banner`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                </DropDownMenu>
                <DropDownMenu
                    :group_heading="``"
                    :dropdown_title="`Team`"
                >
                    <SingleMenu
                        :url="{ name: 'teamAll' }"
                        :title="`All Team`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                    <SingleMenu
                        :url="{ name: 'teamCreate' }"
                        :title="`Create Team`"
                        :icon="`fa fa-angle-right`"
                        :custom_class="``"
                    />
                </DropDownMenu>
            </MainDropDown>           

            <DropDownMenu
                :group_heading="`Property Management`"
                :dropdown_title="`Property`"
            >
                <SingleMenu
                    :url="{ name: 'propertyAll' }"
                    :title="`All Property`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
                <SingleMenu
                    :url="{ name: 'propertyCreate' }"
                    :title="`Create Property`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
            </DropDownMenu>

            <DropDownMenu
                :group_heading="``"
                :dropdown_title="`Property Category`"
            >
                <SingleMenu
                    :url="{ name: 'propertyCategoryAll' }"
                    :title="`All Property Category`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
                <SingleMenu
                    :url="{ name: 'propertyCategoryCreate' }"
                    :title="`Create Property Category`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
            </DropDownMenu>

            <DropDownMenu
                :group_heading="``"
                :dropdown_title="`Property Tag`"
            >
                <SingleMenu
                    :url="{ name: 'propertyTagAll' }"
                    :title="`All Property Tag`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
                <SingleMenu
                    :url="{ name: 'propertyTagCreate' }"
                    :title="`Create Property Tag`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
            </DropDownMenu>

            <DropDownMenu
                :group_heading="``"
                :dropdown_title="`Property Label`"
            >
                <SingleMenu
                    :url="{ name: 'propertyLabelAll' }"
                    :title="`All Property Label`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
                <SingleMenu
                    :url="{ name: 'propertyLabelCreate' }"
                    :title="`Create Property Label`"
                    :icon="`fa fa-angle-right`"
                    :custom_class="``"
                />
            </DropDownMenu>




            <!-- <SingleMenu
                :url="{ name: 'blogAll' }"
                :title="`All Blog`"
                :icon="`fa fa-list`"
                :custom_class="`single-class`"
            /> -->
            <!-- <SingleMenu
                :url="{ name: 'blogCreate' }"
                :title="`Create Blog`"
                :icon="`fa fa-plus`"
                :custom_class="`single-class`"
            /> -->
        </ul>
    </div>
</template>
<script>
import TopProfile from "./includes/TopProfile.vue";
import DropDownMenu from "./includes/DropDownMenu.vue";
import MainDropDown from "./includes/MainDropDown.vue";
import SingleMenu from "./includes/SingleMenu.vue";
export default {
    components: {
        TopProfile,
        DropDownMenu,
        SingleMenu,
        MainDropDown,
    },

    methods: {
        test(event) {
            console.log("test",event.target);
            
        },
    },
};
</script>
<style >
</style>
