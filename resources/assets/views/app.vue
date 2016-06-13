<template>
    <div id="app">
        <div class="navbar navbar-default navbar-fixed-top navbar-app" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Brand</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a class="nav-link" v-link="{ name: 'home' }">
                                <i class="fa fa-home fa-lg" aria-hidden="true"></i> Home
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li v-if="authenticated">
                            <a class="nav-link">Sign out</a>
                        </li>
                        <li v-if="!authenticated" v-link="{ name: 'signin' }">
                            <a class="nav-link">Sign in</a>
                        </li>
                        <li v-if="!authenticated" v-link="{ name: 'signup' }">
                            <a class="nav-link">Sign up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<style>
body {
    padding-top: 70px;
}
</style>

<script>
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min'
import 'font-awesome/css/font-awesome.min.css'
import 'toastr/build/toastr.min.css'
import '../css/app.css'
import store from '../vuex/store'

export default {

    store: store,

    data() {
        return {
            authenticated: false
        }
    },

    ready() {

    }

}
</script>
