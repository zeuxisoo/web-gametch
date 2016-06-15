import api from '../../api'
import ResponseHelper from '../../helpers/response'
import MessageHelper from '../../helpers/message'
import * as types from '../mutation-types'

export default class TopicAction {

    save({ dispatch, router }, gameId, subject, content) {
        api.topic.save({
            game_id: gameId,
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
                        id: gameId
                    }
                })
            },
            response => ResponseHelper.error(response)
        )
    }

    fetchTopics({ dispatch, router }, gameId, page) {
        api.topic.all({
            page: page || 1,
            id  : gameId
        }).then(
            response => {
                let body       = response.data
                let topics     = body.data
                let pagination = body.meta.pagination

                dispatch(types.TOPIC_FETCH_TOPICS_SUCCESS, topics, pagination)
            },
            response => ResponseHelper.error(response)
        )
    }

}
