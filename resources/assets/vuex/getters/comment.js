export default class CommentGetter {

    comments(state) {
        return state.comment.comments
    }

    pagination(state) {
        return state.comment.pagination
    }

}
