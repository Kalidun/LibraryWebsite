@extends('layout.auth')

@section('section')
    <div class="flex flex-col w-72 mt-10 md:w-1/2 lg:w-1/3 justify-center items-center mb-10">
        <div class="flex flex-col bg-gray-200 p-4 rounded-xl w-full md:w-5/6 m-2 shadow-lg">
            <div class="w-full flex flex-col justify-center items-center">
                <p class="text-xl font-bold mb-4 text-start">Register</p>
                <form action="{{ route('register.post') }}" class="flex flex-col gap-4 w-4/5 mb-4" method="POST">
                    @csrf
                    <div class="flex flex-col">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="border border-black p-1 rounded-xl"
                        autofocus required value="{{ old('username') }}" placeholder="username">                 
                        @error('username')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="border border-black p-1 rounded-xl"
                        autofocus required value="{{ old('email') }}" placeholder="Email">                 
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="password">Password</label>
                        <div class="flex items-center gap-2">
                            <input type="password" name="password" id="password"
                                class="border border-black p-1 rounded-xl w-[90%]" required placeholder="Password">
                                <div id="eye-icon" class="w-[10%]">
                                    <i id="eye" class="fas fa-eye hover:cursor-pointer" style="display: none"></i>
                                    <i id="eye-slash" class="fas fa-eye-slash hover:cursor-pointer" ></i>
                                </div>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="bg-teal-400 p-1 rounded-xl text-white w-1/3">Register</button>
                </form>
                <div>
                    <a href="{{ route('login') }}" class="text-teal-700">Already have an account?</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const eyeIcon = document.getElementById('eye-icon');
        const eye = document.getElementById('eye');
        const eyeSlash = document.getElementById('eye-slash');
        const passwordForm = document.getElementById('password');

        eyeIcon.addEventListener('click', () => {
            if (passwordForm.type === 'password') {
                passwordForm.type = 'text';
                eye.style.display = 'block';
                eyeSlash.style.display = 'none';
            }else{
                passwordForm.type = 'password';
                eye.style.display = 'none';
                eyeSlash.style.display = 'block';
            }
        })

    </script>
@endsection
