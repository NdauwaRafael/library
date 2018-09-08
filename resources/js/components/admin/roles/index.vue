<script>
    import VuetableMixin from '../../vuetable/vuetable_mixin'
    export default {
        name: "role",
        mixins: [VuetableMixin],
        data: () => ({
            fields: [
                {
                    name: 'name',
                    title: 'Name'
                },
                {
                    name: 'create_at',
                    title: 'Since',
                    titleClass: 'text-center',
                    dataClass: 'text-center',
                    callback: 'formatDate|DD-MM-YYYY'
                },

            ]

        })
    }
</script>

<template>
<div>
    <a href="/roles/create">Create Role</a>
    <filter-bar></filter-bar>
    <vuetable ref="vuetable"
              api-url="/api/roles"
              :fields="fields"
              pagination-path=""
              :css="css.table"
              :multi-sort="true"
              :append-params="moreParams"
              @vuetable:cell-clicked="onCellClicked"
              @vuetable:pagination-data="onPaginationData"
    ></vuetable>
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
</template>


<style scoped>

</style>
