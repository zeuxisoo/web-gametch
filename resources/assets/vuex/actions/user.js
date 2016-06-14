import api from '../../api'
import ResponseHelper from '../../helpers/response'
import * as types from '../mutation-types'

export default class UserAction {

    fetchMe({ dispatch, router }, successCallback) {
        api.user.me().then(
            response => {
                let body = response.data
                let user = body.data

                dispatch(types.USER_FETCH_ME_SUCCESS, user)

                if (typeof successCallback === "function") {
                    successCallback(user)
                }
            },
            response => ResponseHelper.error(response)
        )
    }

}
