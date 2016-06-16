import api from '../../api'
import ResponseHelper from '../../helpers/response'
import MessageHelper from '../../helpers/message'
import * as types from '../mutation-types'

export default class CommentAction {

    save({ dispatch, router }, gameTopicId, content) {
        api.comment.save({
            game_topic_id: gameTopicId,
            content      : content,
        }).then(
            response => {
                let body    = response.data
                let comment = body.data

                dispatch(types.COMMENT_SAVE_SUCCESS, comment)

                MessageHelper.success('Your game topic comment has been created successfully')
            },
            response => ResponseHelper.error(response)
        )
    }

    fetchGameTopicComments({ dispatch, router }, gameTopicId, page) {
        api.comment.all({
            id  : gameTopicId,
            page: page || 1
        }).then(
            response => {
                let body       = response.data
                let comments   = body.data
                let pagination = body.meta.pagination

                dispatch(types.COMMENT_FETCH_COMMENTS_SUCCESS, comments, pagination)
            },
            response => ResponseHelper.error(error)
        )
    }

}
