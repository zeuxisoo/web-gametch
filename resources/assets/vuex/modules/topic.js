import { TOPIC_SAVE_SUCCESS } from '../mutation-types'

const state = {
    topic: {},
}

const mutations = {
    [TOPIC_SAVE_SUCCESS] (state, topic) {
        state.topic = topic
    },
}

export default {
    state    : state,
    mutations: mutations,
}
