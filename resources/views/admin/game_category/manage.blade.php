@extends('layout.backend.dashboard')

@section('container_dashboard')
    <div id="admin-dashboard-game-category-manage" class="admin admin-dashboard admin-dashboard-game-category admin-dashboard-game-category-manage">
        <h3 class="page-header">Manage game category</h3>

        @include('shared.flash_message')

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Chinse name</th>
                        <th>English name</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gameCategories as $gameCategory)
                        <tr>
                            <td>{{ $gameCategory->chinese_name }}</td>
                            <td>{{ $gameCategory->english_name }}</td>
                            <td>
                                <a href="{{ route('web.admin.game_category.edit', ['id' => $gameCategory->id]) }}" class="btn btn-xs btn-default">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {!! $gameCategories->render() !!}
    </div>
@stop
