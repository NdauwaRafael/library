<script>
    import VuetableMixin from '../../vuetable/vuetable_mixin'
    export default {
        name: "users",
        mixins: [VuetableMixin],
        data: () => ({
            fields: [
                {
                    name: 'book',
                    title: 'Book'
                },
                {
                    name: 'issue_date',
                    title: 'Issue Date',
                },
                {
                    name: 'return_date',
                    title: 'Return Date',
                },
                {
                    name: 'user',
                    title: 'Borrower',
                },
                {
                    name: 'status',
                    title: 'Status',
                },
                {
                    name: '__slot:actions',
                    title: 'View Request',
                    titleClass: 'text-center',
                    dataClass: 'text-center'
                },
            ]

        }),
        methods:{}
    }
</script>

<template>
    <div class="lib_page">
        <div class="lib_table">
            <div class="lib_table__head">
                <div class="action">
                    <!--<a  href="/users/create">Add User</a>-->
                </div>
                <div class="filters">
                    <!--<filter-bar></filter-bar>-->
                </div>
            </div>

            <div class="lib_table__body">
                <search-bar></search-bar>
                <vuetable ref="vuetable"
                          api-url="/api/approved"
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
                            <a :href="'/requests/show/'+props.rowData.id" >
                                <i class="material-icons">visibility</i>
                            </a>
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

