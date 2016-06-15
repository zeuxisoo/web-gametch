import { TOPIC_SAVE_SUCCESS, TOPIC_FETCH_TOPICS_SUCCESS } from '../mutation-types'

const state = {
    topic     : {},
    topics    : [],
    pagination: {},
}

const mutations = {
    [TOPIC_SAVE_SUCCESS] (state, topic) {
        state.topic = topic
    },

    [TOPIC_FETCH_TOPICS_SUCCESS] (state, topics, pagination) {
        state.topics     = topics,
        state.pagination = pagination
    },
}

export default {
    state    : state,
    mutations: mutations,
}
