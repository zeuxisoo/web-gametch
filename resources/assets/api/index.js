import Vue from 'vue'
import VueResource from 'vue-resource'
import Auth from './auth'
import User from './user'

Vue.use(VueResource)

export default {

    auth: new Auth(Vue),
    user: new User(Vue),

    headers: {
        setAuthorizationToken(token) {
            Vue.http.headers.common['Authorization'] = "bearer " + token
        }
    }

}
