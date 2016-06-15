<template>
    <div id="game-create">
        <h3>{{ game.english_name }}</h3>
        <hr>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                </div>
                <button type="button" class="btn btn-default">Save</button>
            </div>
        </div>
    </div>
</template>

<style>
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
