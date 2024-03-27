<div id="borrow-book-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full pt-[3.25rem]">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                {{-- back button --}}
                <button id="close" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="borrow-book-modal">X</button>
                <p class="text-xl font-bold">Borrow Book</p>
            </div>
            {{-- Content --}}
            <div class="p-4">
                <div class="text-center">Scan the QR code to ensure that you have taken the book</div>
                <div id="qr" class="flex justify-center">
                    
                </div>
            </div>
        </div>
    </div>
</div>
