import { COMMENT_SAVE_SUCCESS, COMMENT_FETCH_COMMENTS_SUCCESS } from '../mutation-types'

const state = {
    comment   : {},
    comments  : [],
    pagination: {},
}

const mutations = {
    [COMMENT_SAVE_SUCCESS] (state, comment) {
        state.comment  = comment
        state.comments = [...state.comments, comment]
    },

    [COMMENT_FETCH_COMMENTS_SUCCESS] (state, comments, pagination) {
        state.comments   = comments
        state.pagination = pagination
    },
}

export default {
    state    : state,
    mutations: mutations,
}
