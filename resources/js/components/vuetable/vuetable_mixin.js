/**
 * Created by Raphael Karanja on 08/09/2018.
 */
import accounting from 'accounting'
import moment from 'moment';
import VueEvents from 'vue-events'
import Vue from 'vue';
Vue.use(VueEvents);
export default {
    data() {
        return {
            tableId: 'lib_table',
            itemsPerPage: this.itemsPerPageOptionsInit[0],
            itemsPerPageOptions: this.itemsPerPageOptionsInit,
            css: {
                table: {
                    tableClass: 'table table-bordered table-striped table-hover',
                    ascendingIcon: 'glyphicon glyphicon-chevron-up',
                    descendingIcon: 'glyphicon glyphicon-chevron-down'
                },
                pagination: {
                    wrapperClass: 'pagination',
                    activeClass: 'active',
                    disabledClass: 'disabled',
                    pageClass: 'page',
                    linkClass: 'link',
                    icons: {
                        first: '',
                        prev: '',
                        next: '',
                        last: '',
                    },
                },
                icons: {
                    first: 'glyphicon glyphicon-step-backward',
                    prev: 'glyphicon glyphicon-chevron-left',
                    next: 'glyphicon glyphicon-chevron-right',
                    last: 'glyphicon glyphicon-step-forward',
                },
            },
            sortOrder: [
                { field: 'email', sortField: 'email', direction: 'asc'}
            ],
            moreParams: {}
        }
    },
    props: {
        itemsPerPageOptionsInit: {default: function () {
            return [5,10, 25, 50, 100];
        }},
    },
    methods: {
        allcap (value) {
            return value.toUpperCase()
        },
        genderLabel (value) {
            return value === 'M'
                ? '<span class="label label-success"><i class="glyphicon glyphicon-star"></i> Male</span>'
                : '<span class="label label-danger"><i class="glyphicon glyphicon-heart"></i> Female</span>'
        },
        formatNumber (value) {
            return accounting.formatNumber(value, 2)
        },
        formatDate (value, fmt = 'D MMM YYYY') {
            return (value == null)
                ? ''
                : moment(value, 'YYYY-MM-DD').format(fmt)
        },
        onPaginationData (paginationData) {
            this.$refs.pagination.setPaginationData(paginationData)
            this.$refs.paginationInfo.setPaginationData(paginationData)
        },
        onChangePage (page) {
            this.$refs.vuetable.changePage(page)
        },
        onCellClicked (data, field, event) {
            console.log('cellClicked: ', field.name)
            this.$refs.vuetable.toggleDetailRow(data.id)
        },
    },

    events: {
        'filter-set' (filterText) {
            this.moreParams = {
                filter: filterText
            }
            Vue.nextTick( () => this.$refs.vuetable.refresh() )
        },
        'filter-reset' () {
            this.moreParams = {}
            Vue.nextTick( () => this.$refs.vuetable.refresh() )
        }
    }
};

