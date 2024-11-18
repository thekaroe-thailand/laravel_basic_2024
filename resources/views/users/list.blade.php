@extends('layout')

@section('content')
    <h1>User List</h1>

    <a href="/users/form" class="btn btn-success">
        <i class="fa-solid fa-plus me-2"></i>
        Create User
    </a>

    @if (isset($users))
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="110px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <form method="post" action="/users/remove/{{ $user->id }}">
                                @csrf
                                @method('delete')

                                <a href="/users/{{ $user->id }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
