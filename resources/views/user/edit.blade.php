@extends('layout.main')

@section('content')

    <h2>Edit a User</h2>

    @include('layout._back', ['route' => 'user.index'])
    @include('layout._errors')

    <form method="POST" action="{{ route('user.update', [ 'user' => $user->id]) }}">
        @method('PUT')
        @include('user._form')
    </form>

@endsection
