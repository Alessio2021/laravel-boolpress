/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import App from './views/App';
import Home from './pages/Home';
import Post from './pages/Post';
import Posts from './pages/Posts';
import Contacts from './pages/Contacts';
import About from './pages/About';

import VueRouter from 'vue-router';
import Vue from 'vue';
Vue.use(VueRouter);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/posts',
            name: 'posts',
            component: Posts
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: Contacts
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/posts/:id',
            name: 'post',
            props: true,
            component: Post
        }
    ]
})

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
