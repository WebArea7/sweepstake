@extends('layout.admin')

@section('title', 'Customer')

@section('page-title')
    Show customer - {{ $customer->name }}
@endsection

@section('content')
    <a href="{{ route('admin.customers') }}" class="rounded bg-violet-500 hover:bg-violet-700 py-2 px-4 text-white mb-6 inline-block">All customers</a>

    <table class="min-w-full leading-normal rounded overflow-hidden">
        <tbody>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900">E-mail</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p>{{ $customer->email }}</p>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900">Name</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p>{{ $customer->name }}</p>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900">Last name</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p>{{ $customer->l_name }}</p>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900">Question 3</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p>{{ $customer->q3 }}</p>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900">Question 4</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p>{{ $customer->q4 }}</p>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900">Question 5</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p>{{ $customer->q5 }}</p>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900">Question 6</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p>{{ $customer->q6 }}</p>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
