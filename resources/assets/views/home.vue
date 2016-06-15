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

        <pagination v-bind:pagination="pagination" route-name="home"></pagination>
    </div>
</template>

<style>
</style>

<script>
import pagination from '../components/pagination.vue'
import { gameGetter } from '../vuex/getters'
import { gameAction } from '../vuex/actions'

export default {

    vuex: {
        getters: {
            games     : gameGetter.games,
            pagination: gameGetter.pagination
        },
        actions: {
            fetchGames: gameAction.fetchGames
        }
    },

    route: {
        data() {
            let page = 'page' in this.$route.query ? this.$route.query.page : 1;

            this.fetchGames(page)
        }
    },

    components: {
        pagination: pagination
    }

}
</script>
