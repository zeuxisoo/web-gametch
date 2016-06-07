@extends('layout.backend.dashboard')

@section('container_dashboard')
    <div id="admin-dashboard-game-category-manage" class="admin admin-dashboard admin-dashboard-game-category admin-dashboard-game-category-manage">
        <h3 class="page-header">Manage game category</h3>

        @include('shared.flash_message')

        <div class="row">
            @foreach($gameCategories as $gameCategory)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="{{ route('web.admin.game_category.edit', ['id' => $gameCategory->id]) }}">
                            <img src="{{ Storage::disk('game-category')->url('upload/game-category/'.$gameCategory->cover_photo) }}">
                        </a>
                        <div class="caption">
                            {{ $gameCategory->english_name }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {!! $gameCategories->render() !!}
    </div>
@stop
