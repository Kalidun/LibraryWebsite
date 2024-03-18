@extends('pages.data.index')

@section('data')
    @include('pages.data.modal.modal-add-status')
    @include('pages.data.modal.modal-delete-status')
    @include('pages.data.modal.modal-edit-status')
    <div>
        <div id="title">
            <p class="font-bold text-xl">Status Data</p>
        </div>
        <div id="body">
            <div class="w-full flex justify-end">
                <button
                    class="p-2 bg-teal-200 rounded-xl hover:bg-teal-300 active:bg-teal-400 transition duration-100 active:scale-105" data-modal-target="add-status-modal" data-modal-toggle="add-status-modal">
                    Add Status
                </button>
            </div>
            <div class="w-full mt-5">
                <table class="w-full">
                    <tr class="bg-teal-200 w-full">
                        <th>No</th>
                        <th class="w-11/12">Name</th>
                        <th class="w-1/12">Action</th>
                    </tr>
                    @forelse($dataStatus as $status)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $status->name }}</td>
                            <td class="text-center">
                                <button data-modal-target="edit-status-modal" data-modal-toggle="edit-status-modal" onclick="insertEditInput('{{ $status->id }}', '{{ $status->name }}')"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button data-modal-target="delete-status-modal" data-modal-toggle="delete-status-modal" onclick="insertToInput({{ $status->id }})"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        @empty
                            <td colspan="7" class="text-center"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No Data</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <script>
        const inputStatusId = document.getElementById('status_id');
        function insertToInput(id) {
            inputStatusId.value = id
        }
        function insertEditInput(id, name) {
            document.getElementById('edit_status_id').value = id
            document.getElementById('status_name').value = name
        }
    </script>
@endsection
