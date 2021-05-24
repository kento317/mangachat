@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="row-cols-md-4 ">
            <a href="{{ route('rooms.index') }}">
                <h1>ルーム一覧</h1>
            </a>
            <div class="input-group">
                <form action="{{ route('rooms.search') }}" method="GET">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" placeholder="ルーム検索" name="search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                    </span>
                    @isset($search_result)
                        <span>{{$search_result}}</span>
                    @endisset
                </form>
            </div>
            <a class="btn btn-primary" href="{{ route('rooms.create') }}" role="button">ルームを作る</a>
            @foreach ($rooms as $room)
            <a href="{{ route('rooms.show', $room->id) }}">
                <div class="p-1">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $room->title }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            {{ $rooms->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection