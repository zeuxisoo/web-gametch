import Base from './base'

export default class Comment extends Base {

    constructor(vue) {
        super();

        this.vue = vue
    }

    all(params) {
        return this.vue.http.get(this.apiUrl('/game-topic-comment/all'), params)
    }

    save(data) {
        return this.vue.http.post(this.apiUrl('/game-topic-comment/store'), data)
    }

}
