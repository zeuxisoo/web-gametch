import { GAME_FETCH_GAMES_SUCCESS } from '../mutation-types'

const state = {
    games: [],
}

const mutations = {
    [GAME_FETCH_GAMES_SUCCESS] (state, games) {
        state.games = games
    },
}

export default {
    state    : state,
    mutations: mutations,
}
