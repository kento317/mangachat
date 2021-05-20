@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>ルーム一覧</h1>
            <a class="btn btn-primary" href="{{ route('rooms.create') }}" role="button">ルームを作る</a>
            @foreach ($rooms as $room)
            <a href="{{ route('rooms.show', $room->id) }}">
                <div class="card" style="width: 18rem;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                        <title>Placeholder</title>
                        <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text">{{ $room->title }}</p>
                    </div>
                </div>
            </a>
            @endforeach
            
        </div>
    </div>
</div>
@endsection