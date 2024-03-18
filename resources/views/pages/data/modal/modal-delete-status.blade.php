<style>
    .animation {
        -webkit-animation: animation 1.2s ease-in-out 0.2s both;
    }

    @-webkit-keyframes animation {

        0%,
        100% {
            transform: translateX(0%);
            transform-origin: 50% 50%;
        }

        15% {
            transform: translateX(-30px) rotate(-6deg);
        }

        30% {
            transform: translateX(15px) rotate(6deg);
        }

        45% {
            transform: translateX(-15px) rotate(-3.6deg);
        }

        60% {
            transform: translateX(9px) rotate(2.4deg);
        }

        75% {
            transform: translateX(-6px) rotate(-1.2deg);
        }
    }

    @keyframes animation {

        0%,
        100% {
            transform: translateX(0%);
            transform-origin: 50% 50%;
        }

        15% {
            transform: translateX(-30px) rotate(-6deg);
        }

        30% {
            transform: translateX(15px) rotate(6deg);
        }

        45% {
            transform: translateX(-15px) rotate(-3.6deg);
        }

        60% {
            transform: translateX(9px) rotate(2.4deg);
        }

        75% {
            transform: translateX(-6px) rotate(-1.2deg);
        }
    }
</style>
<div id="delete-status-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full pt-[3.25rem]">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                {{-- back button --}}
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="delete-status-modal""" id="close-delete-status-modal">X</button>
                <p class="text-xl font-bold">Are you sure you want to delete this status ?</p>
            </div>
            {{-- Content --}}
            <div class="w-full">
                <div class=" w-full flex justify-center p-4">
                    <div class="p-8 rounded-full bg-red-100">
                        <i class="animation fa-solid fa-triangle-exclamation text-5xl text-red-500"></i>
                    </div>
                </div>
                <div class="text-red-800 font-bold text-2xl w-full flex justify-center mt-2 mb-2">
                    Delete ?
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div class="p-2 w-1/3 flex justify-center">
                    <button
                        class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200 w-full"
                        data-modal-hide="delete-status-modal" id="close-delete-status-modal">No</button>
                </div>
                <form class="p-2 w-1/3 flex justify-center" action="{{ route('data.delete.status') }}" enctype="multipart/form-data"
                    id="kt_modal_delete_status_form" method="POST">
                    @csrf
                    <input type="text" name="status_id" id="status_id" hidden>
                    <button type="submit"
                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-400 active:bg-red-600 transition duration-200 w-full">
                        <p class="text-xl font-bold">Yes</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
