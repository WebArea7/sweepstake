@extends('layout.admin')

@section('title', 'Users')

@section('page-title', 'Users')

@section('content')
    @if($users->count())
        <table class="min-w-full leading-normal rounded overflow-hidden">
            <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    User
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900">{{ $user->email }}</p>
                        <p class="text-gray-600">{{ $user->name }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('admin.users.show', $user) }}" class="rounded bg-violet-500 hover:bg-violet-700 py-2 px-4 text-white float-right">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No users</p>
    @endif
@endsection
