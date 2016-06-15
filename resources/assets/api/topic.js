import Base from './base'

export default class Topic extends Base {

    constructor(vue) {
        super();

        this.vue = vue
    }

    save(data) {
        return this.vue.http.post(this.apiUrl('/game-topic/store'), data)
    }

}
