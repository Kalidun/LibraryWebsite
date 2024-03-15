@extends('pages.data.index')

@section('data')
    @include('pages.data.modal.modal-add-category')
    <div>
        <div id="title">
            <p class="font-bold text-xl">Category Data</p>
        </div>
        <div id="body">
            <div class="w-full flex justify-end">
                <button
                    class="p-2 bg-teal-200 rounded-xl hover:bg-teal-300 active:bg-teal-400 transition duration-100 active:scale-105" data-modal-target="add-category-modal" data-modal-toggle="add-category-modal">
                    Add Category
                </button>
            </div>
            <div class="w-full mt-5">
                <table class="w-full">
                    <tr class="bg-teal-200 w-full">
                        <th>No</th>
                        <th class="w-10/12">Name</th>
                        <th class="w-1/12">Total Book</th>
                        <th class="w-1/12">Action</th>
                    </tr>
                    @forelse($dataCategory as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">{{ $dataBooks->where('category_id', $category->id)->count() }}</td>
                            <td class="text-center">
                                <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#"><i class="fa-solid fa-trash"></i></a>
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
