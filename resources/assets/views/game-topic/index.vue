<template>
    <div id="game-topic-index">
        <div class="panel panel-default">
            <div class="media">
                <div class="media-body topic-body">
                    <h4 class="media-heading topic-heading">{{ topic.subject }}</h4>
                    <div class="topic-status">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="column">{{ topic.user.data.username }}</span>

                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span class="column">{{ topic.created_at }}</span>

                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="column">{{ topic.game.data.category.data.english_name }}</span>
                    </div>
                </div>
            </div>
            <div class="topic-content">
                {{ topic.content }}
            </div>
        </div>

        <div id="comments">
            <div class="panel panel-default" v-if="comments.length <= 0">
                <div class="panel-body">
                    <div class="alert alert-warning alert-no-margin-bottom" role="alert">No any comments</div>
                </div>
            </div>

            <div class="panel panel-default" v-for="comment in comments">
                <div class="panel-body">
                    <div class="comment">
                        <div class="comment-status">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="column">{{ comment.user.data.username }}</span>

                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span class="column">{{ comment.created_at }}</span>
                        </div>
                        <hr class="comment-line">
                        <div class="comment-content">
                            {{ comment.content }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default" v-if="!authenticated">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning alert-no-margin-bottom" role="alert">Leave comment? Please <a v-link="{ name: 'signin' }">sign in</a> first</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default" v-if="authenticated">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="comment" rows="5" class="form-control" v-model="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default" v-on:click="save">Save</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<style>
#game-topic-index .topic-body {
    background: #e4dfdf;
    padding: 10px;
}

#game-topic-index .topic-body .topic-heading {
    color: #928080;
}

#game-topic-index .topic-body .topic-status {
    color: #9c9797;
    font-size: 12px;
    padding-top: 3px;
}

#game-topic-index .topic-content {
    padding: 10px;
}

#game-topic-index .alert-no-margin-bottom {
    margin-bottom: 0px;
}

#game-topic-index #comments .comment-status {
    color: #928080;
    font-size: 12px;
}

#game-topic-index #comments .comment-line {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>

<script>
import { authGetter, topicGetter, commentGetter } from '../../vuex/getters'
import { topicAction, commentAction } from '../../vuex/actions'

export default {

    vuex: {
        getters: {
            authenticated: authGetter.isAuthenticated,
            topic        : topicGetter.topic,
            comments     : commentGetter.comments,
        },
        actions: {
            fetchGameTopic        : topicAction.fetchTopic,
            fetchGameTopicComments: commentAction.fetchGameTopicComments,
            saveComment           : commentAction.save,
        }
    },

    data() {
        return {
            comment: "",
        }
    },

    route: {
        data() {
            let id = this.$route.params.id

            this.fetchGameTopic(id)
            this.fetchGameTopicComments(id)
        }
    },

    methods: {
        save() {
            this.saveComment(this.$route.params.id, this.comment)
            this.comment = ""
        }
    }

}
</script>
