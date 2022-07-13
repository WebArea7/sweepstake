@extends('layout.admin')

@section('title', 'Customers')

@section('page-title', 'Customers')

@section('content')
    @if($customers->count())
        @if(session('status'))
            <div id="popup-modal" tabindex="-1" data-modal-show="true" class="hidden bg-gray-900 bg-opacity-75 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow">
                        <div class="p-6 text-center">
                            <h3 class="mb-5 text-lg font-normal text-gray-500">{{ session('status') }}</h3>
                            <button type="button" class="rounded bg-violet-500 hover:bg-violet-700 py-2 px-4 text-white" data-modal-toggle="popup-modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="flex">
            <form action="{{ route('admin.customers.choose') }}" method="post">
                @csrf
                <button type="submit" class="rounded bg-green-500 hover:bg-green-600 py-2 px-4 text-white mb-6 inline-block">Choose winner</button>
            </form>

            <form action="{{ route('admin.customers.reset_winner') }}" method="post" class="ml-2">
                @csrf
                <button type="submit" class="rounded bg-amber-400 hover:bg-amber-500 py-2 px-4 text-white mb-6 inline-block">Reset winner</button>
            </form>

            <form action="{{ route('admin.customers.reset_customers') }}" method="post" class="ml-2">
                @csrf
                <button type="submit" class="rounded bg-red-500 hover:bg-red-600 py-2 px-4 text-white mb-6 inline-block">Reset customers</button>
            </form>
        </div>

        <table class="min-w-full leading-normal rounded overflow-hidden">
            <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Customer
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900">{{ $customer->email }}</p>
                            <p class="text-gray-600">{{ $customer->name }} {{ $customer->l_name }} </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a href="{{ route('admin.customers.show', $customer) }}" class="rounded bg-violet-500 hover:bg-violet-700 py-2 px-4 text-white float-right">Show</a>
                            @if($winner && $winner->customer_id == $customer->id)
                                <p class="rounded bg-green-500 py-2 px-4 text-white float-right mr-2">Winner</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No customers</p>
    @endif
@endsection
