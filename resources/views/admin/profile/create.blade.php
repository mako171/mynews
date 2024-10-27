{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.prfile')


{{-- profile.blade.phpの@yield('title')に'Myプロフィールの新規作成'を埋め込む --}}
@section('title', 'Myプロフィールの新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
            </div>
        </div>
    </div>
@endsection