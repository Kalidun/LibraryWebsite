<div>
    <div id="menu" class="mb-5 w-full flex justify-between">
        <p class="text-xl font-bold">Statuses</p>
        <button class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">
            <i class="fa-solid fa-plus"></i>
            <span>Add</span>
        </button>
    </div>
    <div id="body">
        <table class="w-full text-center">
            <tr class="bg-teal-200">
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @forelse ($statuses as $status)
                <tr class="border">
                    <td class="w-1/12">{{ $loop->iteration }}</td>
                    <td class="capitalize w-10/12">{{ $status->name }}</td>
                    <td class="w-1/12">
                        <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @empty
            <tr class="border">
                <td colspan="7"><i class="fa-solid fa-triangle-exclamation mx-1"></i>No Data</td>
            </tr>
            @endforelse
        </table>
    </div>
</div>
