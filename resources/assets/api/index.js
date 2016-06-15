import Vue from 'vue'
import VueResource from 'vue-resource'
import Auth from './auth'
import User from './user'
import Game from './game'
import Topic from './topic'

Vue.use(VueResource)

export default {

    auth : new Auth(Vue),
    user : new User(Vue),
    game : new Game(Vue),
    topic: new Topic(Vue),

    headers: {
        setAuthorizationToken(token) {
            Vue.http.headers.common['Authorization'] = "bearer " + token
        }
    }

}
