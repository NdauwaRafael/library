<script>
    import VuetableMixin from '../vuetable/vuetable_mixin'

    export default {
        name: "books",
        mixins: [VuetableMixin],
        data: () => ({
            fields: [
                {
                    name: 'title',
                    title: 'Title'
                },
                {
                    name: 'author',
                    title: 'Author'
                },
                {
                    name: 'subject',
                    title: 'Subject'
                },
                {
                    name: 'created_at',
                    title: 'Added On',
                    titleClass: 'text-center',
                    dataClass: 'text-center',
                    callback: 'formatDate|DD-MM-YYYY'
                },
                {
                    name: 'status',
                    title: 'Status'
                },
                {
                    name: '__slot:actions',
                    title: 'View User',
                    titleClass: 'text-center',
                    dataClass: 'text-center'
                },

            ]

        })
    }
</script>

<template>
    <div class="lib_page">
        <div class="lib_table">
            <div class="lib_table__head">
                <div class="action">
                    <a  href="/addbook">Add a Book</a>
                </div>
                <div class="filters">
                    <filter-bar></filter-bar>
                </div>
            </div>

            <div class="lib_table__body">
                <vuetable ref="vuetable"
                          api-url="/api/books"
                          :fields="fields"
                          pagination-path=""
                          :css="css.table"
                          :multi-sort="true"
                          :append-params="moreParams"
                          @vuetable:cell-clicked="onCellClicked"
                          @vuetable:pagination-data="onPaginationData"
                >
                    <template slot="actions"  slot-scope="props">
                        <div class="custom-actions">
                            <router-link :to="{name: 'book.show', params: {id: props.rowData.id}}" >
                                <i class="material-icons">visibility</i>
                            </router-link>
                        </div>
                    </template>
                </vuetable>
            </div>
            <div class="lib_table__foot">
                <div class="vuetable-pagination">
                    <vuetable-pagination-info ref="paginationInfo"
                                              info-class="pagination-info"
                    ></vuetable-pagination-info>
                    <vuetable-pagination ref="pagination"
                                         :css="css.pagination"
                                         @vuetable-pagination:change-page="onChangePage"
                    ></vuetable-pagination>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>

</style>
