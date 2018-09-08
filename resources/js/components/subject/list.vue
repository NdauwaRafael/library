<script>
    import VuetableMixin from '../vuetable/vuetable_mixin'

    export default {
        name: "subject",
        mixins: [VuetableMixin],
        data: () => ({
            fields: [
                {
                    name: 'name',
                    title: 'Name'
                },
                {
                    name: 'created_at',
                    title: 'Added On',
                    titleClass: 'text-center',
                    dataClass: 'text-center',
                    callback: 'formatDate|DD-MM-YYYY'
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
                    <a  href="/subject/create">Add Subject</a>
                </div>
                <div class="filters">
                    <filter-bar></filter-bar>
                </div>
            </div>
            <div class="lib_table__body">
                <vuetable ref="vuetable"
                          api-url="/api/subjects"
                          :fields="fields"
                          pagination-path=""
                          :css="css.table"
                          :multi-sort="true"
                          :append-params="moreParams"
                          @vuetable:cell-clicked="onCellClicked"
                          @vuetable:pagination-data="onPaginationData"
                ></vuetable>
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
