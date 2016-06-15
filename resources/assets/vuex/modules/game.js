import { GAME_FETCH_GAMES_SUCCESS } from '../mutation-types'

const state = {
    games     : [],
    pagination: {},
}

const mutations = {
    [GAME_FETCH_GAMES_SUCCESS] (state, games, pagination) {
        state.games      = games
        state.pagination = pagination
    },
}

export default {
    state    : state,
    mutations: mutations,
}
