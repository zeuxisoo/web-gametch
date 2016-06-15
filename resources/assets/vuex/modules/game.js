import { GAME_FETCH_GAMES_SUCCESS, GAME_FETCH_GAME_SUCCESS } from '../mutation-types'

const state = {
    games     : [],
    pagination: {},
    game      : {},
}

const mutations = {
    [GAME_FETCH_GAMES_SUCCESS] (state, games, pagination) {
        state.games      = games
        state.pagination = pagination
    },

    [GAME_FETCH_GAME_SUCCESS] (state, game) {
        state.game = game
    }
}

export default {
    state    : state,
    mutations: mutations,
}
