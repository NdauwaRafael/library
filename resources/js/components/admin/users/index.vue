<script>
    import VuetableMixin from '../../vuetable/vuetable_mixin'
    export default {
        name: "users",
        mixins: [VuetableMixin],
        data: () => ({
            fields: [
                {
                    name: 'name',
                    title: 'Name'
                },
                {
                    name: 'email',
                    title: 'Email',
                },
                {
                    name: 'phone',
                    title: 'Phone',
                },
                {
                    name: 'role',
                    title: 'Role',
                },
            ]

        })
    }
</script>

<template>
    <div>
        <a href="/users/create">Add User</a>
        <filter-bar></filter-bar>
        <vuetable ref="vuetable"
                  api-url="/api/users"
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

