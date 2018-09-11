<template>
    <div class="table_top_bar">
        <div class="top_bar_details">
            <slot name="table_title"></slot>
            <slot name="table_sub_title"></slot>
        </div>
        <div class="top_bar_search">
            <div class="table_search">
                    <el-button type="primary" @click="toggleSearch = !toggleSearch">
                        <i class="material-icons">search</i>
                    </el-button>
            </div>
            <transition name="slide-fade">
                <div class="search_form" v-show="toggleSearch">
                    <div class="masaba__form__item">
                        <input type="text" v-model="searchText" @keyup="doSearch" :placeholder="searchLabel">
                    </div>
                </div>
            </transition>
        </div>


    </div>
</template>

<script type="text/babel">
    export default {
        data () {
            return {
                searchText: '',
                toggleSearch: false
            }
        },
        methods: {
            doSearch () {
                this.$events.fire('search-set', {'id': this.tableId, 'data': this.searchText})
            }
        },
        props: {
            tableId:{default: 'masaba_table'},
            searchLabel:{default: 'Search ...'}
        },
    }
</script>
