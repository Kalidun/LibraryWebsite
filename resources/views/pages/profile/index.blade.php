@extends('layout.dashboard')

@section('section')
    @include('pages.profile.modal.modal-edit')
    @include('pages.profile.modal.modal-edit-photo')
    @include('pages.profile.modal.modal-delete-photo')
    <div class="w-full p-8">
        <div id="title">
            <p class="text-center font-bold text-3xl">Profile</p>
        </div>
        <div id="body" class="mt-5 w-full p-5">
            <div class="flex flex-col sm:flex-row gap-10 select-none">
                <div class="flex flex-col w-full sm:w-2/3 gap-2 order-last sm:order-first" id="info">
                    <div class="flex flex-col gap-1">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="{{ Auth::user()->username }}" disabled
                            class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                        @error('username')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="username">Email</label>
                        <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" disabled
                            class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                        @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $userData->name }}" disabled
                            class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex w-full gap-2">
                        <div class="flex flex-col gap-1 w-1/2">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="{{ $userData->phone }}" disabled
                                class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                            @error('phone')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                            </div>
                        <div class="flex flex-col gap-1 w-1/2">
                            <label for="birthday">Date of Birth</label>
                            <input type="date" name="birthday" id="birthday" value="{{ $userData->birthday }}" disabled
                                class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                            @error('birthday')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender"
                            class="rounded-xl p-2 hover:bg-teal-100 transition duration-75" disabled>
                            @if ($userData->gender_id == null)
                                <option value="" selected>Select Gender</option>
                            @endif
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}"
                                    {{ $userData->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->gender }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="{{ $userData->address }}" disabled
                            class="p-2 hover:bg-teal-100 transition duration-75 rounded-xl">
                        @error('address')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 w-1/5">
                        <button type="button" data-modal-target="edit-profil-modal" data-modal-toggle="edit-profil-modal"
                            class="bg-teal-400 p-1 rounded-xl text-white hover:bg-teal-600 transition duration-100">Edit</button>
                    </div>
                </div>
                <div id="photo" class="w-full sm:w-1/3">
                    <div class="w-full flex justify-center gap-2">
                        @if ($userData->image)
                            <img src="{{ asset('storage/images/users/' . $userData->image) }}"
                                class="w-full rounded-full sm:rounded-3xl">
                        @else
                            <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-full rounded-full sm:rounded-3xl">
                        @endif
                    </div>
                    <button class="bg-teal-400 p-1 rounded-xl text-white w-1/3 mt-2" type="button"
                        data-modal-target="change-photo-modal" data-modal-toggle="change-photo-modal">
                        Change Photo
                    </button>
                    @if ($userData->image)
                        <button class="bg-red-400 p-1 rounded-xl text-white w-1/3 mt-2" type="button"
                            data-modal-target="delete-photo-modal" data-modal-toggle="delete-photo-modal">
                            Delete Photo
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
