import AuthGetter from './getters/auth'
import GameGetter from './getters/game'
import TopicGetter from './getters/topic'
import CommentGetter from './getters/comment'

export const authGetter    = new AuthGetter()
export const gameGetter    = new GameGetter()
export const topicGetter   = new TopicGetter()
export const commentGetter = new CommentGetter()
