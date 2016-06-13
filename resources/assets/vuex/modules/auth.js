import { AUTH_SIGNUP_SUCCESS } from '../mutation-types'

const state = {
    user: null,
}

const mutations = {
    [AUTH_SIGNUP_SUCCESS] (state, user) {
        state.user = user
    }
}

export default {
    state    : state,
    mutations: mutations,
}
