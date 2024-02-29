@extends('layout.app')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-col bg-gray-200 p-4 rounded w-96 m-2 shadow">
            <div class="w-full flex flex-col justify-center items-center">
                <p class="text-xl font-bold mb-4 text-start">Login</p>
                <form action="#" class="flex flex-col gap-4 w-4/5">
                    <div class="flex flex-col">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="border border-black p-1 rounded" autofocus>
                    </div>
                    <div class="flex flex-col">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="border border-black p-1 rounded">
                    </div>
                    <button class="bg-blue-500 p-2 rounded text-white w-1/3">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
