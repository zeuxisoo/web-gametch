@extends('layout.backend.dashboard')

@section('container_dashboard')
    <div id="admin-dashboard-game-edit" class="admin admin-dashboard admin-dashboard-game admin-dashboard-game-edit">
        <h3 class="page-header">Edit game</h3>

        @include('shared.flash_message')

        <div class="panel panel-default">
            <div class="panel-heading">Form</div>
            <div class="panel-body">
                <form action="{{ route('web.admin.game.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $game->id }}">

                    <div class="form-group">
                        <label for="chinese-name" class="col-sm-2 control-label">Game Category</label>
                        <div class="col-sm-10">
                            <select name="game_category_id" class="form-control">
                                @foreach($gameCategories as $gameCategory)
                                    @if ($gameCategory->id == $game->game_category_id)
                                        <option value="{{ $gameCategory->id }}" selected="selected">{{ $gameCategory->english_name }}</option>
                                    @else
                                        <option value="{{ $gameCategory->id }}">{{ $gameCategory->english_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="chinese-name" class="col-sm-2 control-label">Chinese name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="chinese-name" name="chinese_name" value="{{ old('chinese_name') ?: $game->chinese_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="english-name" class="col-sm-2 control-label">Englihs name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="english-name" name="english_name" value="{{ old('english_name') ?: $game->english_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cover-photo" class="col-sm-2 control-label">Cover Photo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="cover-photo" name="cover_photo">
                            <br>
                            <div>
                                <img src="{{ Storage::disk('game')->url('upload/game/'.$game->cover_photo) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
