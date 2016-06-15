<template>
    <div id="home">
        <div class="row">
            <div class="col-md-3" v-for="game in games">
                <div class="thumbnail">
                    <img v-bind:src="game.cover_photo">
                    <div class="caption">
                        <h5>{{ game.english_name }}</h5>
                        <span class="label label-primary">{{ game.category.data.english_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
</style>

<script>
import { gameGetter } from '../vuex/getters'
import { gameAction } from '../vuex/actions'

export default {

    vuex: {
        getters: {
            games: gameGetter.games
        },
        actions: {
            fetchGames: gameAction.fetchGames
        }
    },

    route: {
        data() {
            this.fetchGames()
        }
    }

}
</script>
