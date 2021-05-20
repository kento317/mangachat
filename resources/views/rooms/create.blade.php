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
            <form action="{{ route('rooms.store') }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label>ルーム名</label>
                    <input type="text" class="form-control" placeholder="20文字以内でルーム名を入力してね" name="title">
                </div>

                
                <button type="submit" class="btn btn-primary">作成する</button>
            </form>
        </div>
    </div>
</div>
@endsection