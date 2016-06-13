import { AUTH_SIGNUP_SUCCESS, AUTH_SIGNIN_SUCCESS } from '../mutation-types'

const state = {
    user         : null,
    token        : "",
    authenticated: false,
}

const mutations = {
    [AUTH_SIGNUP_SUCCESS] (state, user) {
        state.user = user
    },

    [AUTH_SIGNIN_SUCCESS] (state, user, token) {
        state.user          = user
        state.token         = token
        state.authenticated = true
    }
}

export default {
    state    : state,
    mutations: mutations,
}
