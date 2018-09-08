/**
 * Created by Raphael Karanja on 08/09/2018.
 */
import Vuetable from 'vuetable-2/src/components/Vuetable';
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination';
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo';
import FilterBar from './filter.vue'
const Components = {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo,
    FilterBar
};

Object.keys(Components).forEach(name => {
    Vue.component(name, Components[name]);
});

export default Components;