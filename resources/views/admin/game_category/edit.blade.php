@extends('layout.backend.dashboard')

@section('container_dashboard')
    <div id="admin-dashboard-game-category-edit" class="admin admin-dashboard admin-dashboard-game-category admin-dashboard-game-category-edit">
        <h3 class="page-header">Edit game category</h3>

        @include('shared.flash_message')

        <div class="panel panel-default">
            <div class="panel-heading">Form</div>
            <div class="panel-body">
                <form action="{{ route('web.admin.game_category.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $gameCategory->id }}">

                    <div class="form-group">
                        <label for="chinese-name" class="col-sm-2 control-label">Chinese name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="chinese-name" name="chinese_name" value="{{ old('chinese_name') ?: $gameCategory->chinese_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="english-name" class="col-sm-2 control-label">Englihs name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="english-name" name="english_name" value="{{ old('english_name') ?: $gameCategory->english_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cover-photo" class="col-sm-2 control-label">Cover Photo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="cover-photo" name="cover_photo">
                            <br>
                            <div>
                                <img src="{{ Storage::disk('game-category')->url('upload/game-category/'.$gameCategory->cover_photo) }}">
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
