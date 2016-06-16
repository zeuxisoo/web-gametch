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

                router.go({
                    name  : 'game-topic',
                    params: {
                        id: gameTopicId
                    }
                })
            },
            response => ResponseHelper.error(response)
        )
    }

}
