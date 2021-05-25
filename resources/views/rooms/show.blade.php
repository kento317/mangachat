@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1>{{ $room->title }}</h1>

                @foreach ($chats as $chat)
                    <div class="p-1">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">{{ $chat->comment }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        @if ($chat->is_liked_by_auth_user())
                            <a href="{{ route('chat.unlike', ['id' => $chat->id]) }}"
                                class="btn btn-success btn-sm">いいね
                                    <span class="badge">{{ $chat->likes->count() }}</span></a>
                        @else
                            <a href="{{ route('chat.like', ['id' => $chat->id]) }}"
                                class="btn btn-secondary btn-sm">いいね
                                <span class="badge">{{ $chat->likes->count() }}</span></a>
                        @endif
                    </div>
                @endforeach


                <form action="{{ route('chats.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <div class="form-group">
                        <textarea name="comment" class="form-control" placeholder="コメント"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-info mb-2">コメントする</button>
                </form>

            </div>
        </div>
    </div>
@endsection
