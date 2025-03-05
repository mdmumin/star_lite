<template lang="">
    <div>
        Dashboard

        <select2
            :data="categories"
            :value="value"
            @update="update($event)"
            :multiple="true"
        >
        </select2>
        {{selected}}
    </div>
</template>
<script>
import { Select2 } from "select2-vue-component";
export default {
    components: {
        Select2,
    },
    data: () => ({
        value: [],
        categories: [],
        selected: [],
    }),
    created: function () {
        this.get_data();
    },
    methods: {
        update: function (value) {
            console.log(value);
            this.selected = value;
        },
        get_data: async function () {
            await axios
                .get('/api/blog-cats')
                .then((res) => {
                    this.categories = res.data;
                });
                
            this.selected = this.value = [1,2];
        },
    },
};
</script>
<style lang=""></style>
