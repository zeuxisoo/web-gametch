import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './vuex/store'

Vue.use(VueRouter);

var Router = new VueRouter({
    hashbang: false,
    history: true,
    saveScrollPosition: true
});

Router.map({
    '/': {
        name     : 'home',
        component: require('./views/home.vue')
    },

    '/signup': {
        name     : 'signup',
        component: require('./views/signup.vue')
    },

    '/signin': {
        name     : 'signin',
        component: require('./views/signin.vue')
    },
});

Router.start(Vue.extend(require('./views/app.vue')), '#app');
