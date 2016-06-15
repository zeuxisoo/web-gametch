import api from '../../api'
import ResponseHelper from '../../helpers/response'
import * as types from '../mutation-types'

export default class GameAction {

    fetchGames({ dispatch, router }, page) {
        api.game.all({
            page: page || 1
        }).then(
            response => {
                let body       = response.data
                let games      = body.data
                let pagination = body.meta.pagination

                dispatch(types.GAME_FETCH_GAMES_SUCCESS, games, pagination)
            },
            response => ResponseHelper.error(response)
        )
    }

}
