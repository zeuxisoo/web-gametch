import Base from './base'

export default class User extends Base {

    constructor(vue) {
        super();

        this.vue = vue
    }

    me() {
        return this.vue.http.get(this.apiUrl('/user/me'))
    }

}
