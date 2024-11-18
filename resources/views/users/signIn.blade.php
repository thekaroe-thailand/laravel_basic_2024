@extends('layout')

@section('content')
    <div class="container">
        <h3>Sign In</h3>

        @if (isset($errors))
            @if ($errors->has('search'))
                <div class="alert alert-danger">*** {{ $errors->first('search') }}</div>
            @endif
        @endif

        <form method="post" action="/user/signInProcess">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" />

                @if (isset($errors))
                    @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" />

                @if (isset($errors))
                    @if ($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Sign In</button>
        </form>
    </div>
@endsection

