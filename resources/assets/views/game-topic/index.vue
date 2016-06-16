<template>
    <div id="game-topic-index">
        <div class="panel panel-default">
            <div class="media">
                <div class="media-body topic-body">
                    <h4 class="media-heading topic-heading">{{ topic.subject }}</h4>
                    <div class="topic-status">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="column">{{ topic.user.data.username }}</span>

                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span class="column">{{ topic.created_at }}</span>

                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="column">{{ topic.category.data.english_name }}</span>
                    </div>
                </div>
            </div>
            <div class="topic-content">
                {{ topic.content }}
            </div>
        </div>
    </div>
</template>

<style>
#game-topic-index .topic-body {
    background: #e4dfdf;
    padding: 10px;
}

#game-topic-index .topic-body .topic-heading {
    color: #928080;
}

#game-topic-index .topic-body .topic-status {
    color: #9c9797;
    font-size: 12px;
    padding-top: 3px;
}

#game-topic-index .topic-content {
    padding: 10px;
}
</style>

<script>
import { topicGetter } from '../../vuex/getters'
import { topicAction } from '../../vuex/actions'

export default {

    vuex: {
        getters: {
            topic: topicGetter.topic,
        },
        actions: {
            fetchGameTopic: topicAction.fetchTopic,
        }
    },

    route: {
        data() {
            let id = this.$route.params.id

            this.fetchGameTopic(id)
        }
    }

}
</script>
