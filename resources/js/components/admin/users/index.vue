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
                {
                    name: '__slot:actions',
                    title: 'View User',
                    titleClass: 'text-center',
                    dataClass: 'text-center'
                },
            ]

        }),
    }
</script>

<template>
    <div class="lib_page">
   <div class="lib_table">
       <div class="lib_table__head">
           <div class="action">
               <a  href="/users/create">Add User</a>
           </div>
           <div class="filters">
               <filter-bar></filter-bar>
           </div>
       </div>

       <div class="lib_table__body">
           <vuetable ref="vuetable"
                     api-url="/api/users"
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
                       <a :href="'/users/'+props.rowData.id" >
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

