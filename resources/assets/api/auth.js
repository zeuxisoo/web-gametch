import Base from './base'

export default class Auth extends Base {

    constructor(vue) {
        super();

        this.vue = vue
    }

    signup(data) {
        return this.vue.http.post(this.apiUrl('/auth/signup'), data)
    }

}
