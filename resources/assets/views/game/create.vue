<template>
    <div id="game-create">
        <h3>{{ game.english_name }}</h3>
        <hr>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" v-model="subject">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" v-model="content"></textarea>
                </div>
                <button type="button" class="btn btn-default" v-on:click="save">Save</button>
            </div>
        </div>
    </div>
</template>

<style>
</style>

<script>
import { gameGetter } from '../../vuex/getters'
import { gameAction, topicAction } from '../../vuex/actions'

export default {

    vuex: {
        getters: {
            game: gameGetter.game
        },
        actions: {
            fetchGame: gameAction.fetchGame,
            saveTopic: topicAction.save
        }
    },

    route: {
        data() {
            let id = this.$route.params.id

            this.fetchGame(id)
        }
    },

    data() {
        return {
            subject: "",
            content: "",
        }
    },

    methods: {
        save() {
            this.saveTopic(this.$route.params.id, this.subject, this.content)
        }
    }

}
</script>
