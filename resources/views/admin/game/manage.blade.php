@extends('layout.backend.dashboard')

@section('container_dashboard')
    <div id="admin-dashboard-game-manage" class="admin admin-dashboard admin-dashboard-game admin-dashboard-game-manage">
        <h3 class="page-header">Manage game</h3>

        @include('shared.flash_message')

        <div class="row">
            @foreach($games as $game)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="{{ route('web.admin.game.edit', ['id' => $game->id]) }}">
                            <img src="{{ Storage::disk('game')->url('upload/game/'.$game->cover_photo) }}">
                        </a>
                        <div class="caption">
                            {{ $game->english_name }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {!! $games->render() !!}
    </div>
@stop
