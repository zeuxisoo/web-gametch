import { USER_FETCH_ME_SUCCESS } from '../mutation-types'

const state = {
    me: null,
}

const mutations = {
    [USER_FETCH_ME_SUCCESS] (state, me) {
        state.me = me
    },
}

export default {
    state    : state,
    mutations: mutations,
}
