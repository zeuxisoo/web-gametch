import Vue from 'vue'
import Vuex from 'vuex'
import middlewares from './middlewares'
import auth from './modules/auth'
import game from './modules/game'
import topic from './modules/topic'

const debug = process.env.NODE_ENV !== 'production'

Vue.use(Vuex)
Vue.config.debug = debug
Vue.config.warnExpressionErrors = false

export default new Vuex.Store({
    modules    : {
        auth : auth,
        game : game,
        topic: topic,
    },
    strict     : debug,
    middlewares: middlewares
})
