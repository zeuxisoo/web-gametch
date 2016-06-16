import api from '../../api'
import ResponseHelper from '../../helpers/response'
import MessageHelper from '../../helpers/message'
import Storagehelper from '../../helpers/storage'
import * as types from '../mutation-types'
import * as constraints from '../../constraint'

export default class AuthAction {

    signup({ dispatch, router }, username, email, password) {
        api.auth.signup({
            username: username,
            email   : email,
            password: password
        }).then(
            response => {
                let body = response.data
                let user = body.data

                dispatch(types.AUTH_USER_SUCCESS, user)

                MessageHelper.success('Your account has been created successfully')

                router.go({
                    name: 'signin'
                })
            },
            response => ResponseHelper.error(response)
        )
    }

    signin({ dispatch, router }, account, password) {
        api.auth.signin({
            account : account,
            password: password
        }).then(
            response => {
                let body  = response.data
                let user  = body.user
                let token = body.token

                // Setup authorization header
                api.headers.setAuthorizationToken(token)

                dispatch(types.AUTH_SIGNIN_SUCCESS, user, token)

                router.go({
                    name: 'home'
                })
            },
            response => ResponseHelper.error(response)
        )
    }

    signout({ dispatch, router }) {
        api.auth.signout().then(
            response => {
                let body  = response.data
                let state = body.state

                dispatch(types.AUTH_SIGNOUT_SUCCESS)

                router.go({
                    name: 'home'
                })
            },
            response => ResponseHelper.error(response)
        )
    }

    signinByToken({ dispatch, router }, token) {
        api.headers.setAuthorizationToken(token)

        api.user.me().then(
            response => {
                let body = response.data
                let user = body.data

                dispatch(types.AUTH_SIGNIN_SUCCESS, user, token)
            },
            response => {
                api.headers.setAuthorizationToken("")

                Storagehelper.remove(constraints.TOKEN_NAME)
                ResponseHelper.error(response)
            }
        )
    }

}
