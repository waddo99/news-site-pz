@extends('layout.main')

@section('title', 'Articles')

@section('content')

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container-fluid my-5">
            <!-- Email Address -->
            <div class="row fs-4 fw-bold my-3 ">
                    <label for="email" class="col-4 col-form-label text-end">Email:</label>
                <div class="col-5">
                    <input id="email" class="form-control form-control-md" type="text" name="email" required autofocus />
                </div>
            </div>

            <!-- Password -->
            <div class="row fs-4 fw-bold my-3">
                <label for="password" class="col-4 text-end">Password:</label>
                <div class="col-5">
                    <input id="password" class="form-control form-control-md col-5"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"/>
                </div>
            </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark btn-md  fs-4">
                        Log in
                    </button>
                </div>
            </div>
        </form>
@endsection
