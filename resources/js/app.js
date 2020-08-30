
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

let axios = require('axios');
window.Vue = require('vue');
Vue.use(require('vue-moment'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.component('profile-component', require('./components/PeofileComponent.vue'));
Vue.component('buttons-component',   require('./components/profile/ButtonsComponent.vue'));
Vue.component('add-friend-notification', require('./components/notifications/friend/AddFriendNotification.vue'));
Vue.component('following-component', require('./components/profile/FollowingComponent.vue'));
const app = new Vue({
    el: '#app',
    // mounted() {
    //   console.log('Component mounted from app.')
    // },
    components: {
      // 'buttons-component': 'ButtonsComponent',
    }
});
