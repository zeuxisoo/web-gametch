import Vue from 'vue'
import VueRouter from 'vue-router'
import { sync } from 'vuex-router-sync'
import store from './vuex/store'
import * as constraints from './constraint'
import StorageHelper from './helpers/storage'
import Api from './api'

Vue.use(VueRouter)

var Router = new VueRouter({
    hashbang: false,
    history: true,
    saveScrollPosition: true
})

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

    '/game/:id': {
        name     : 'game',
        component: require('./views/game/index.vue')
    },

    '/game/:id/create': {
        auth     : true,
        name     : 'game-create',
        component: require('./views/game/create.vue')
    },
})

Router.beforeEach((transition) => {
    let token = StorageHelper.get(constraints.TOKEN_NAME);

    if (transition.to.auth) {
        if (!token) {
            transition.redirect('/');
        }
    }

    if (transition.to.guest) {
        if (token) {
            transition.redirect('/');
        }
    }

    transition.next();
});

sync(store, Router)

Router.start(Vue.extend(require('./views/app.vue')), '#app')
