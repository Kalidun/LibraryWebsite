<div id="return-book-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full pt-[3.25rem]">
        {{-- Modal Content --}}
        <div class="relative bg-white rounded-lg shadow">
            {{-- Header --}}
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                {{-- back button --}}
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="return-book-modal">X</button>
                <p class="text-xl font-bold">Return Book</p>
            </div>
            <div id="Qr" class="w-full flex justify-center">

            </div>
            {{-- Content --}}
            <form action="#" class="w-full" method="POST" id="return-book-form"> 
                @csrf
                <div class="p-2 w-full">
                    <label for="book_id">Borrowed Id</label>
                    <input type="number" name="borrowed_id" id="borrowed_id" class="rounded-xl p-1" required value="{{ $bookData->id }}" readonly>
                </div>                                                      
                <div class="p-2 w-full flex justify-center" id="buttonSubmit">
                    <button type="submit" class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">
                        <p class="text-xl font-bold">Get QR</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#return-book-form').submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();

            $.ajax({
                url: "{{ route('library.return') }}",
                type: 'POST',
                data: data,
                success: function (response) {
                    $('#status').attr('disabled', true)
                    $('#buttonSubmit').html(response)
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseJSON.error);
                    toastr.error(xhr.responseJSON.error);
                }
            })
        })
    })
</script>
