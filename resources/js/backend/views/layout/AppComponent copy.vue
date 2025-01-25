<template lang="">
    <div id="root_app_component">
        <header style="padding: 10px; background-color: green">
            Header Part 
        </header>

        <div style="display: grid; grid-template-columns: 250px 1fr; height: 70vh;">
            <div style="padding: 10px; background-color: #55d9d4">
                <router-link to="/user">User Management</router-link> &nbsp; &nbsp;
            <br>
                <router-link to="/blog-all"> Blog All</router-link><br>
                <router-link to="/blog-create">Blog create</router-link><br>
                
            </div>
            <div style="padding: 10px; background-color: #f06ceb">
                <router-view></router-view>
            </div>
        </div>
        <!-- <h1>Hellow world</h1> -->
    </div> 
</template>
<script>
export default {};
</script>
<style lang="">
</style>
