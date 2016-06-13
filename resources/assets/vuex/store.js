import Vue from 'vue'
import Vuex from 'vuex'
import middlewares from './middlewares'

Vue.use(Vuex)

const state = {

}

const mutations = {

}

export default new Vuex.Store({
    state      : state,
    mutations  : mutations,
    middlewares: middlewares
})
