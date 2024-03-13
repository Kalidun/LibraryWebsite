<div>
    <div id="menu" class="mb-5 w-full flex justify-between">
        <p class="text-xl font-bold">Users</p>
        <button class="bg-teal-500 text-white px-2 py-1 rounded hover:bg-teal-400 active:bg-teal-600 transition duration-200">
            <i class="fa-solid fa-plus"></i>
            <span>Add</span>
        </button>
    </div>
    <div id="body">
        <div id="search-bar" class="w-full mb-5">
            <input type="text" name="search" id="search" class="border border-black p-1 rounded-xl w-1/3"
            placeholder="Search" wire:model="search" wire:input="updateSearch">
        </div>
        <table class="w-full text-center">
            <tr class="bg-teal-200">
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Last Borrowed Date</th>
                <th>Total Borrowed Book</th>
                <th>Created since</th>
                <th>Action</th>
            </tr>
            @forelse ($users as $user)
                <tr class="border">
                    <td>{{ $loop->iteration }}</td>
                    <td class="w-2/12">{{ $user->username }}</td>
                    <td class="w-4/12">{{ $user->email }}</td>
                    <td class="w-2/12">{{ $user->last_borrowed_date ? $user->last_borrowed_date : '-' }}</td>
                    <td class="w-2/12">{{ $user->borrowedBooks()->count()  }}</td>
                    <td class="w-2/12">{{ $user->created_at->diffForHumans() }}</td>
                    <td class="w-1/12">
                        <a href="#"><i class="fa-solid fa-eye"></i></a>
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
