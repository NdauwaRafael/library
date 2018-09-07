/**
 * Created by Raphael Karanja on 07/09/2018.
 */
var Vue = require('vue');

//Vue resource
var VueResource = require('vue-resource');
Vue.use(VueResource);

//Element UI
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

//VUE Table
function install(Vue){
    Vue.component("vuetable", Vuetable);
    Vue.component("vuetable-pagination", VueTablePagination);
    Vue.component("vuetable-pagination-dropdown", VueTablePaginationDropDown);
    Vue.component("vuetable-pagination-info", VueTablePaginationInfo);
}