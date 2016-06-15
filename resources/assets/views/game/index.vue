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
                <a v-link="{ name: 'game-create', params: { id: game.id } }" class="btn btn-default btn-md">Create</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="media">
                    <div class="media-body topic-body">
                        <h4 class="media-heading topic-heading">This is a subject</h4>
                        <div class="topic-status">
                            <i class="fa fa-user" aria-hidden="true"></i> username
                            <i class="fa fa-clock-o" aria-hidden="true"></i> 2 hours ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
import { gameGetter } from '../../vuex/getters'
import { gameAction } from '../../vuex/actions'

export default {

    vuex: {
        getters: {
            game: gameGetter.game
        },
        actions: {
            fetchGame: gameAction.fetchGame
        }
    },

    route: {
        data() {
            let id = this.$route.params.id

            this.fetchGame(id)
        }
    }

}
</script>
