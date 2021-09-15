// require('./bootstrap');

// require('alpinejs');
// window.Vue = require('vue');
// Vue.component('notification', require('./Notification.vue'));


require('./bootstrap');
require('alpinejs');

import Vue from 'vue'

Vue.component('post-component', require('./Notification.vue').default);

const app = new Vue({
    el: '#app',
    created() {
        Echo.private('alarm.createed')
            .listen('alarmEvent', (e) => {
                alert(e.post.title + 'Has been published now');
                console.log(e.post.title)
                console.log("Loaded")
            });
    }
});