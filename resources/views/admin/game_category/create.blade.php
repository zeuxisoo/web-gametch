@extends('layout.backend.dashboard')

@section('container_dashboard')
    <h3 class="page-header">Add Game Category</h3>
    <div class="panel panel-default">
        <div class="panel-heading">Form</div>
        <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="chinese-name" class="col-sm-2 control-label">Chinese name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="chinese-name" name="chinese_name" placeholder="Chinese name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="english-name" class="col-sm-2 control-label">English name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="english-name" name="english_name" placeholder="English name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cover-photo" class="col-sm-2 control-label">Cover Photo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="cover-photo" name="cover_photo">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
