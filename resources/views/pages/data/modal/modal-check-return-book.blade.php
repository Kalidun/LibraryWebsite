<div id="modal-check-book"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                {{-- back button --}}
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="modal-check-book">X</button>
                <p class="text-xl font-bold">Insert Book Status</p>
            </div>
            {{-- Content --}}
            <form action="{{ route('library.confirmed') }}" class="w-full" method="POST"> 
                @csrf
                <input type="text" name="borrowed_id" id="borrowed_id" class="hidden">
                <div class="p-2 w-full flex flex-col">
                    <select name="status_id" id="status_id" class="w-full rounded-xl">
                        @foreach ($dataStatus as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2 w-full">
                    <button type="submit" class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">
                        <p class="text-xl font-bold">Save</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
