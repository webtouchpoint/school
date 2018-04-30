
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('subject-form-view', require('./views/settings/SubjectFormView.vue'));
Vue.component('fees-structure-form-view', require('./views/settings/FeesStructureFormView.vue'));
Vue.component('admission-form-view', require('./views/students/AdmissionFormView.vue'));
Vue.component('fees-payment-form-view', require('./views/accounts/fees_collection/PaymentFormView.vue'));

import destroy from './mixins/destroy';

const app = new Vue({
    el: '#app',
    mixins: [destroy]
});
