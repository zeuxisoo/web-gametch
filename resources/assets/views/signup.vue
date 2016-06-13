<template>
    <div id="signup">
        <div class="panel panel-default">
            <div class="panel-heading">Sign up</div>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Username" v-model="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" v-model="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="Password" v-model="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" v-on:click="doSignup">Sign up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
</style>

<script>
import { authAction } from '../vuex/actions'

export default {

    data() {
        return {
            username: "",
            email   : "",
            password: "",
        }
    },

    vuex: {
        actions: {
            signup: authAction.signup
        }
    },

    methods: {
        doSignup() {
            this.signup(this.username, this.email, this.password);
        }
    }

}
</script>
