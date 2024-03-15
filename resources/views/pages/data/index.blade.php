@extends('layout.dashboard')

@section('section')
    @include('pages.data.modal.modal-add-book')
    {{-- @include('pages.data.modal.modal-add-category') --}}
    <style>
        .tab {
            box-shadow: 1px 1px 1px 1px gray;
            transition: all 0.2s ease;
        }
        td{
            border: 1px solid gray;
        }
        tr:hover{
            background-color: rgb(204 251 241);
        }
    </style>
    <div class="w-full">
        <div id="title">
            <p class="text-center font-bold text-3xl">Website Data</p>
        </div>
        <div id="body" class="mt-10 w-full mb-10">
            <div class="w-full border border-gray-200 shadow rounded text-black">
                <ul class="flex flex-wrap text-sm font-medium text-center gap-2" id="dataTab" role="tablist"
                    data-tabs-toggle="#dataTabContent">
                    <li>
                        <button id="book-tab" data-tabs-target="#book" type="button" role="tab" aria-controls="book"
                            aria-selected="true"
                            class="tab inline-block p-3 px-5 hover:text-white hover:bg-teal-300 bg-teal-200 rounded font-bold">Books</button>
                    </li>
                    <li>
                        <button id="categories-tab" data-tabs-target="#categories" type="button" role="tab"
                            aria-controls="categories" aria-selected="false"
                            class="tab inline-block p-3 px-5 hover:text-white hover:bg-teal-300 bg-teal-200 rounded font-bold">Category</button>
                    </li>
                    <li>
                        <button id="status-tab" data-tabs-target="#status" type="button" role="tab"
                            aria-controls="status" aria-selected="false"
                            class="tab inline-block p-3 px-5 hover:text-white hover:bg-teal-300 bg-teal-200 rounded font-bold">Status</button>
                    </li>
                    <li>
                        <button id="user-tab" data-tabs-target="#user" type="button" role="tab" aria-controls="user"
                            aria-selected="false"
                            class="tab inline-block p-3 px-5 hover:text-white hover:bg-teal-300 bg-teal-200 rounded font-bold">Users</button>
                    </li>
                </ul>
                <div id="dataTabContent" class="mt-4 bg-teal-100">
                    <div id="book" role="tabpanel" aria-labelledby="book-tab"
                        class="p-2 hidden p-4 bg-white rounded-lg ">
                        @livewire('data.data-show-books')
                    </div>
                    <div id="categories" role="tabpanel" aria-labelledby="categories-tab"
                        class="p-2 hidden p-4 bg-white rounded-lg">
                        @livewire('data.data-show-categories')
                    </div>
                    <div id="status" role="tabpanel" aria-labelledby="status-tab"
                        class="p-2 hidden p-4 bg-white rounded-lg">
                        @livewire('data.data-show-statuses')
                    </div>
                    <div id="user" role="tabpanel" aria-labelledby="user-tab"
                        class="p-2 hidden p-4 bg-white rounded-lg">
                        @livewire('data.data-show-users')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
