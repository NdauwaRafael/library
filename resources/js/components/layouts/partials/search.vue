<script>
    export default {
        data: () => ({
            masabaPageSelected: null,
            pageList: [],
            pages: [],
            search: '',
            searchList: [],
            showResult: false

        }),
        watch: {
            search: {
                handler: function () {
                    if(this.search != ''){
                        this.showResult = true;
                    }else {
                        this.showResult = false;
                    }
                }
            }
        },
        created() {
            this.$router.options.routes.forEach(route => {
                this.pageList.push({
                    name: route.name
                    , path: route.path,
                    label: route.label
                })
            });
        },
        methods: {
        filterFunction() {
        var  i;

        let filter = this.search.toUpperCase();
        let a = this.pageList;

        for (i = 0; i < a.length; i++) {
            let page = a[i];
            if(page.label) {
                let label = page.label.toUpperCase();

                if (label.includes(filter)) {
                    if(this.searchList.indexOf(page) == -1){
                        this.searchList.push(page);
                    }
                }
                else {
                    if(this.searchList.indexOf(page) != -1){
                        this.searchList.splice(page);
                    }

                }
            }

        }

    }
        }
    }
</script>
<template>
    <div class="myDropdown dropdown-content">
        <input type="text" placeholder="Search.." v-model="search" @keyup="filterFunction" class="myInput">
        <span v-for="page in searchList" class="searchMenu" :class="{'showResult': showResult}">
                <a :href="page.path">{{page.label}}</a>
            </span>

    </div>
</template>

<style>



</style>