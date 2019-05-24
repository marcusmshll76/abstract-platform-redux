/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const iView = require("iview");
require('./bootstrap');
require('../sass/vue/styles/iview.css');
// require('dotenv').config();

window.Vue = require('vue');
Vue.use(iView);

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const app = new Vue({
    el: '#app',
});
