@extends('pages.data.index')

@section('data')
    <div>
        <div id="title">
            <p class="font-bold text-xl">User Data</p>
        </div>
        <div id="body">
            {{-- <div class="w-full flex justify-end">
                <button
                    class="p-2 bg-teal-200 rounded-xl hover:bg-teal-300 active:bg-teal-400 transition duration-100 active:scale-105" data-modal-target="add-status-modal" data-modal-toggle="add-status-modal">
                    Add Status
                </button>
            </div> --}}
            <div class="w-full mt-5 max-w-full overflow-x-auto">
                <table class="w-full">
                    <tr class="bg-teal-200 w-full">
                        <th>No</th>
                        <th class="w-3/12">Name</th>
                        <th class="w-4/12">Email</th>
                        <th class="2/12">Created Since</th>
                        <th class="w-1/12">Total Borrowed</th>
                        <th class="w-1/12">Action</th>
                    </tr>
                    @forelse($dataUser as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $user->borrowedBooks()->count() }}</td>
                            <td class="text-center">
                                <a href="{{ route('chat.index') }}"><i class="fa-solid fa-comments"></i></a>
                            </td>
                        @empty
                            <td colspan="7" class="text-center"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No Data</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
