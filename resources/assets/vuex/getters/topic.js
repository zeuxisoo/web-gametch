export default class TopicGetter {

    topics(state) {
        return state.topic.topics
    }

    pagination(state) {
        return state.topic.pagination
    }

    topic(state) {
        return state.topic.topic
    }

}
