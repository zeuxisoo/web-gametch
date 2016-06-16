import { COMMENT_SAVE_SUCCESS } from '../mutation-types'

const state = {
    comment: {},
}

const mutations = {
    [COMMENT_SAVE_SUCCESS] (state, comment) {
        state.comment = comment
    },
}

export default {
    state    : state,
    mutations: mutations,
}
