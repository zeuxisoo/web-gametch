import { AUTH_USER_SUCCESS, AUTH_SIGNIN_SUCCESS, AUTH_SIGNOUT_SUCCESS } from '../mutation-types'

const state = {
    user         : null,
    token        : "",
    authenticated: false,
}

const mutations = {
    [AUTH_USER_SUCCESS] (state, user) {
        state.user = user
    },

    [AUTH_SIGNIN_SUCCESS] (state, user, token) {
        state.user          = user
        state.token         = token
        state.authenticated = true
    },

    [AUTH_SIGNOUT_SUCCESS] (state) {
        state.user          = null
        state.token         = ""
        state.authenticated = false
    }
}

export default {
    state    : state,
    mutations: mutations,
}
