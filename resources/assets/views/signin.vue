<template>
    <div id="signin">
        <div class="panel panel-default">
            <div class="panel-heading">Sign in</div>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="account" class="col-sm-2 control-label">Account</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="account" placeholder="Account" v-model="account">
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
                            <button type="button" class="btn btn-default" v-on:click="doSignin">Sign in</button>
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
            account : "",
            password: "",
        }
    },

    vuex: {
        actions: {
            signin: authAction.signin
        }
    },

    methods: {
        doSignin() {
            this.signin(this.account, this.password);
        }
    }

}
</script>
