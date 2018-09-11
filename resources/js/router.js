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
import EditBook from './components/books/edit.vue';
import AddDepartment from './components/department/add.vue';
import listDepartments from './components/department/list.vue';
import AddSubject from './components/subject/add.vue';
import listSubjects from './components/subject/list.vue';
import listIssued from './components/admin/requests/approved.vue';


export default new Router({
    routes: [
        {
            path: '/addbook',
            name: 'add.book',
            component: AddBook
        },
        {
            path: '/book/show/:id',
            name: 'book.show',
            component: ViewBook
        },
        {
            path: '/book/edit/:id',
            name: 'book.edit',
            component: EditBook
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
        // {
        //     path: '/user/show/:id',
        //     name: 'user.show',
        //     component: showUser
        // },
        {
            path: '/createDepartment',
            name: 'add.department',
            component: AddDepartment
        },
        {
            path: '/departments',
            name: 'departments',
            component: listDepartments
        },

        {
            path: '/createSubject',
            name: 'add.subject',
            component: AddSubject
        },
        {
            path: '/subjects',
            name: 'subjects',
            component: listSubjects
        },
        {
            path: '/issued',
            name: 'issued',
            component: listIssued
        },
    ],
    mode: 'history',
    hashbang: false,
    history: true,
    linkActiveClass: 'active'
})
