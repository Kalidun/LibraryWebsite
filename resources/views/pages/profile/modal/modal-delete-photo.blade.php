<div id="delete-photo-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full pt-[3.25rem]">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-center items-start p-4 rounded-t border-b">
                <p class="text-lg font-bold text-center text-red-500">Are you sure want to delete your photo ?</p>
            </div>
            {{-- Content --}}
            <div class="p-2 w-full flex justify-between gap-5">
                <button type="button" data-modal-hide="delete-photo-modal" class="w-1/2 bg-gray-500 text-white px-2 py-1 rounded hover:bg-gray-400 active:bg-gray-600 transition duration-200">No</button>
                <form class="w-1/2" method="POST" action="{{ route('profile.delete-photo') }}" enctype="multipart/form-data"">
                    @csrf
                    <button class="w-full bg-red-500 text-white px-2 py-1 rounded hover:bg-red-400 active:bg-red-600 transition duration-200">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
