/**
 * Created by Raphael Karanja on 07/09/2018.
 */
import Vue from 'vue';
import Router from 'vue-router'
Vue.use(Router);

import AddBook from './components/books/add.vue';
import ViewBook from './components/books/view.vue';
import ListBooks from './components/books/list.vue';
import ResetPassword from './components/admin/users/resetPassword.vue';
import showUser from './components/admin/users/view.vue';


export default new Router({
    routes: [
        {
            path: '/addbook',
            name: 'add.book',
            component: AddBook
        },
        {
            path: '/book/show:id',
            name: 'book.show',
            component: ViewBook
        },
        {
            path: '/listbooks',
            name: 'list.book',
            component: ListBooks
        },
        {
            path: '/reset/password/:id',
            name: 'reset.password',
            component: ResetPassword
        },
        {
            path: '/user/show/:id',
            name: 'user.show',
            component: showUser
        },
    ],
    mode: 'history',
    hashbang: false,
    history: true,
    linkActiveClass: 'active'
})
