@extends('layout.backend.dashboard')

@inject('carbon', 'Carbon\Carbon')

@section('container_dashboard')
    <h3 class="page-header">Dashboard</h3>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Welcome back !</h1>
            <p>{{ $carbon->now() }}</p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Shortcut</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">Game Category</div>
                <div class="col-md-9">
                    <a href="{{ route('web.admin.game_category.create') }}" class="btn btn-xs btn-default">Add Game Category</a>
                    <a href="{{ route('web.admin.game_category.manage') }}" class="btn btn-xs btn-default">Edit Game Category</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">Game</div>
                <div class="col-md-9">
                    <a href="{{ route('web.admin.game.create') }}" class="btn btn-xs btn-default">Add Game</a>
                    <a href="{{ route('web.admin.game.manage') }}" class="btn btn-xs btn-default">Edit Game</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">Other</div>
                <div class="col-md-9">
                    <a href="{{ route('web.admin.home.signout') }}" class="btn btn-xs btn-info">Logout</a>
                </div>
            </div>
        </div>
    </div>
@stop
