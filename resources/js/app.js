/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('soal', require('./components/Soal/Soal.vue').default);
Vue.component('soal-create', require('./components/Soal/SoalCreate.vue').default);
Vue.component('soal-show', require('./components/Soal/SoalShow.vue').default);
Vue.component('ujian', require('./components/Ujian/Ujian.vue').default);
Vue.component('ujian-create', require('./components/Ujian/UjianCreate.vue').default);
Vue.component('ujian-show', require('./components/Ujian/UjianShow.vue').default);
Vue.component('soal-ujian', require('./components/Ujian/SoalUjian.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
