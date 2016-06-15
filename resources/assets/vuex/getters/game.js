export default class GameGetter {

    games(state) {
        return state.game.games
    }

    pagination(state) {
        return state.game.pagination
    }

}
