import createLogger from 'vuex/logger'
import StorageHelper from '../helpers/storage'
import * as types from './mutation-types'
import * as constraints from '../constraint'

const jwtTokenStoreMiddleware = {
    onMutation (mutation, state) {
        if (mutation.type === types.AUTH_SIGNIN_SUCCESS) {
            StorageHelper.set(constraints.TOKEN_NAME, state.auth.token)
        }

        if (mutation.type === types.AUTH_SIGNOUT_SUCCESS) {
            StorageHelper.remove(constraints.TOKEN_NAME)
        }
    }
}

export default process.env.NODE_ENV !== 'production'
    ? [createLogger(), jwtTokenStoreMiddleware]
    : [jwtTokenStoreMiddleware]
