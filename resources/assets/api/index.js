import Vue from 'vue'
import VueResource from 'vue-resource'
import Auth from './auth'

Vue.use(VueResource)

export default {

    auth: new Auth(Vue)

}
