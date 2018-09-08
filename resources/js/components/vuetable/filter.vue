<template>
    <div class="filter-bar">
        <form class="form-inline">
            <div class="form-group">
                <label>Search for:</label>
                <input type="text" v-model="filterText" class="form-control" @keyup.enter="doFilter" placeholder="Search anything here...">
                <el-button class="filter_button" type="primary" plain @click.prevent="doFilter">Go</el-button>
                <el-button class="filter_button" type="info" plain @click.prevent="resetFilter" >Reset</el-button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                filterText: ''
            }
        },
        methods: {
            doFilter () {
                this.$events.fire('filter-set', this.filterText)
            },
            resetFilter () {
                this.filterText = '';
                this.$events.fire('filter-reset')
            }
        }
    }
</script>
<style>
    .filter-bar {
        padding: 10px;
    }
</style>