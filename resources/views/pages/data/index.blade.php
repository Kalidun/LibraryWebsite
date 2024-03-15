@extends('layout.dashboard')

@section('section')
<style>
    tr:hover{
        background-color: #9ffaff;
    }
    tr, th, td{
        border: 1px solid black;
    }
</style>
    <div class="w-full">
        <div id="title">
            <p class="text-center font-bold text-3xl">Website Data</p>
        </div>
        <div id="body" class="mt-10 w-full mb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 w-full select-none">
                <div class="w-full bg-blue-200 p-4 rounded-xl flex justify-between items-center border-2 border-blue-300 shadow shadow-blue-300"> 
                    <div id="icon">
                        <i class="fa-solid fa-book p-4 bg-blue-300 rounded-full"></i>
                    </div>
                    <div id="info" class="flex flex-col">
                        <span class="text-lg font-bold text-right">{{ $dataBooks->count() }}</span>
                        <span class="text-sm">Total Book</span>
                    </div>
                    
                </div>
                <div class="w-full bg-green-200 p-4 rounded-xl flex justify-between items-center border-2 border-green-300 shadow shadow-green-300"> 
                    <div id="icon">
                        <i class="fa-solid fa-layer-group p-4 bg-green-300 rounded-full"></i>
                    </div>
                    <div id="info" class="flex flex-col">
                        <span class="text-lg font-bold text-right">{{ $dataCategory->count() }}</span>
                        <span class="text-sm">Total Category</span>
                    </div>
                </div>
                <div class="w-full bg-red-200 p-4 rounded-xl flex justify-between items-center border-2 border-red-300 shadow shadow-red-300"> 
                    <div id="icon">
                        <i class="fa-solid fa-chart-pie p-4 bg-red-300 rounded-full"></i>
                    </div>
                    <div id="info" class="flex flex-col">
                        <span class="text-lg font-bold text-right">{{ $dataStatus->count() }}</span>
                        <span class="text-sm">Total Status</span>
                    </div>
                </div>
                <div class="w-full bg-yellow-200 p-4 rounded-xl flex justify-between items-center border-2 border-yellow-300 shadow shadow-yellow-300">
                    <div id="icon">
                        <i class="fa-solid fa-user-group p-4 bg-yellow-300 rounded-full"></i>
                    </div>
                    <div id="info" class="flex flex-col">
                        <span class="text-lg font-bold text-right">{{ $dataUser->count() }}</span>
                        <span class="text-sm">Total User</span>
                    </div>
                </div>
            </div>
            <div class="mt-5 w-full">
                @yield('data')
            </div>
        </div>
    </div>
@endsection
