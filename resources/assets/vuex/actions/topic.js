import api from '../../api'
import ResponseHelper from '../../helpers/response'
import MessageHelper from '../../helpers/message'
import * as types from '../mutation-types'

export default class TopicAction {

    save({ dispatch, router }, game_id, subject, content) {
        api.topic.save({
            game_id: game_id,
            subject: subject,
            content: content,
        }).then(
            response => {
                let body = response.data
                let topic = body.data

                dispatch(types.TOPIC_SAVE_SUCCESS, topic)

                MessageHelper.success('Your game topic has been created successfully')

                router.go({
                    name  : 'game',
                    params: {
                        id: game_id
                    }
                })
            },
            response => ResponseHelper.error(response)
        )
    }

}
