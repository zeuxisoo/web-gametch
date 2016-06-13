import { AUTH_SIGNUP_SUCCESS, AUTH_SIGNIN_SUCCESS } from '../mutation-types'

const state = {
    user : null,
    token: "",
}

const mutations = {
    [AUTH_SIGNUP_SUCCESS] (state, user) {
        state.user = user
    },

    [AUTH_SIGNIN_SUCCESS] (state, user, token) {
        state.user  = user
        state.token = token
    }
}

export default {
    state    : state,
    mutations: mutations,
}
