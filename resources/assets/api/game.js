import Base from './base'

export default class Game extends Base {

    constructor(vue) {
        super();

        this.vue = vue
    }

    all(params) {
        return this.vue.http.get(this.apiUrl('/game/all'), params)
    }

    show(id) {
        return this.vue.http.get(this.apiUrl('/game/show/' + id))
    }

}
