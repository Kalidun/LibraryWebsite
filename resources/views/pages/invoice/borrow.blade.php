@extends('layout.dashboard')

@section('section')
    <style>
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            /* margin: 10% auto; */
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none
            }

            50% {
                transform: scale3d(1.1, 1.1, 1)
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142
            }
        }
    </style>
    <div class="w-full pt-8 sm:p-8">
        <div id="title">
            <p class="font-bold text-3xl">Invoice</p>
        </div>
        <div id="body" class="mt-5 flex justify-center h-[90vh] sm:h-fit">
            <div class="w-full md:w-1/2 bg-white shadow">
                <div class="w-full text-center p-2 mb-5">
                    <div class="text-center text-xl text-green-500 font-bold mb-2">Success</div>
                    <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                    </div>
                </div>
                <div id="data" class="py-5 px-16 font-bold flex flex-col gap-2">
                    <div class="mb-2 flex justify-center">
                        @if ($borrowedData->book->image == null)
                            <img src="{{ asset('images/defaultPhoto.avif') }}" class="w-2/3">
                        @else
                            <img src="{{ asset('storage/images/books/' . $borrowedData->book->image) }}"
                                class="w-2/3">
                        @endif
                    </div>
                    <div class="flex justify-between w-full border-b pb-2">
                        <p>Borrowed Id</p>
                        <p>{{ $borrowedData->id }}</p>
                    </div>
                    <div class="flex justify-between w-full border-b pb-2">
                        <p>Book Title</p>
                        <p>{{ $borrowedData->book->title }}</p>
                    </div>
                    <div class="flex justify-between w-full border-b pb-2">
                        <p>Stock ID</p>
                        <p>{{ $borrowedData->stock_id }}</p>
                    </div>
                    <div class="flex justify-between w-full border-b pb-2">
                        <p>Username</p>
                        <p>{{ $borrowedData->user->username }}</p>
                    </div>
                    <div class="flex justify-between w-full border-b pb-2">
                        <p>Borrow Date</p>
                        <p>{{ $borrowedData->updated_at->format('d-m-Y') }}</p>
                    </div>
                    <div class="flex justify-between w-full border-b pb-2">
                        <p>Borrow Time</p>
                        <p>{{ $borrowedData->updated_at->addHours(8)->format('H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
