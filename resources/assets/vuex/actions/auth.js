import api from '../../api'
import ResponseHelper from '../../helpers/response'
import * as types from '../mutation-types'

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

                dispatch(types.AUTH_SIGNUP_SUCCESS, user)

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

}
