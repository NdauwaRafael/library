require('./vuetable/index');
Vue.component('create-user', require('./admin/users/create.vue'));
Vue.component('users', require('./admin/users/index.vue'));
Vue.component('view-user', require('./admin/users/view.vue'));
Vue.component('roles', require('./admin/roles/index.vue'));

//books
Vue.component('add-book', require('./books/add.vue'));
Vue.component('list-book', require('./books/list.vue'));
Vue.component('view-book', require('./books/view.vue'));

//subject
Vue.component('add-subject', require('./subject/add.vue'));
Vue.component('list-subject', require('./subject/list.vue'));


//department
Vue.component('add-department', require('./department/add.vue'));
Vue.component('list-department', require('./department/list.vue'));

Vue.component('search-bar', require('./vuetable/searchbar.vue'));

//requests
Vue.component('all-request', require('./admin/requests/list.vue'));
Vue.component('view-request', require('./admin/requests/show.vue'));

//dashboard
Vue.component('dashboard-cards', require('./dashboard/dashboard.vue'));
Vue.component('side-bar', require('./sideBar.vue'));



