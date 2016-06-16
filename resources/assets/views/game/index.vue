<template>
    <div id="game-index">
        <div class="row">
            <div class="col-md-10 page-info">
                <div class="page-title">{{ game.english_name }}</div>
                <div class="page-status">
                    Category: {{ game.category.data.english_name }}
                </div>
            </div>
            <div class="col-md-2 page-action text-right">
                <a v-link="{ name: 'game-create', params: { id: game.id } }" class="btn btn-default btn-md" v-if="authenticated">Create</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="media" v-for="topic in topics">
                    <div class="media-body topic-body">
                        <a v-link="{ name: 'game-topic', params: { id: topic.id } }">
                            <h4 class="media-heading topic-heading">{{ topic.subject }}</h4>
                        </a>
                        <div class="topic-status">
                            <i class="fa fa-user" aria-hidden="true"></i> {{ topic.user.data.username }}
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{ topic.created_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <pagination v-bind:pagination="pagination" route-name="game" route-params="{ id: game.id }"></pagination>
    </div>
</template>

<style>
#game-index .page-info .page-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}

#game-index .page-info .page-status {
    font-size: 12px;
}

#game-index .page-action {
    margin-top: 10px;
}

#game-index .topic-body {
    padding: 10px;
    background: #F7F7F7;
}

#game-index .topic-body .topic-heading {
    margin-top: 5px;
    margin-bottom: 10px;
    color: #555555;
}

#game-index .topic-body .topic-status {
    font-size: 12px;
    color: #868686;
}
</style>

<script>
import pagination from '../../components/pagination.vue'
import { authGetter, gameGetter, topicGetter } from '../../vuex/getters'
import { gameAction, topicAction } from '../../vuex/actions'

export default {

    vuex: {
        getters: {
            authenticated: authGetter.isAuthenticated,
            game         : gameGetter.game,
            topics       : topicGetter.topics,
            pagination   : topicGetter.pagination
        },
        actions: {
            fetchGame  : gameAction.fetchGame,
            fetchTopics: topicAction.fetchTopics,
        }
    },

    route: {
        data() {
            let id   = this.$route.params.id
            let page = 'page' in this.$route.query ? this.$route.query.page : 1;

            this.fetchGame(id)
            this.fetchTopics(id, page)
        }
    },

    components: {
        pagination: pagination
    }

}
</script>
