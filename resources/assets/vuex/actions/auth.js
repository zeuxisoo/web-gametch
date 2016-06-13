import api from '../../api'
import MessageHelper from '../../helpers/message'
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
            response => {
                let reason = response.data
                let errors = reason.errors

                if (errors) {
                    MessageHelper.errors(errors)
                }else{
                    MessageHelper.error(reason.message)
                }
            }
        )
    }

}
