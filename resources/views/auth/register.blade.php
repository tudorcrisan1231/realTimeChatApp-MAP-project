@extends('layouts.auth')

@section('content')

<section class="bg-white h-screen">
    <div class="grid grid-cols-1 lg:grid-cols-2 h-full">
        <div class="flex items-center justify-center px-4 py-10 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24">
            <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl">Create a free account</h2>
                <p class="mt-2 text-base text-gray-600">Already have an account? <a href="{{route('login')}}" title="" class="font-medium text-amber-600 transition-all duration-200 hover:text-amber-700 hover:underline focus:text-amber-700">Login</a></p>

                <form action="{{route('register.custom')}}" method="POST" class="mt-8">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Username </label>
                            <div class="mt-2.5">
                                <input
                                    type="text"
                                    name="username"
                                    id=""
                                    placeholder="Enter username"
                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-amber-600 focus:bg-white caret-amber-600"
                                />
                            </div>
                            @if ($errors->has('username'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $errors->first('username') }}</p>
                            @endif
                        </div>

                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Email address </label>
                            <div class="mt-2.5">
                                <input
                                    type="email"
                                    name="email"
                                    id=""
                                    placeholder="Enter email"
                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-amber-600 focus:bg-white caret-amber-600"
                                />
                            </div>
                            @if ($errors->has('email'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="" class="text-base font-medium text-gray-900"> Password </label>
                            </div>
                            <div class="mt-2.5">
                                <input
                                    type="password"
                                    name="password"
                                    id=""
                                    placeholder="Enter your password"
                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-amber-600 focus:bg-white caret-amber-600"
                                />
                            </div>
                            @if ($errors->has('password'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="" class="text-base font-medium text-gray-900"> Confirm Password </label>
                            </div>
                            <div class="mt-2.5">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id=""
                                    placeholder="Confirm password"
                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-amber-600 focus:bg-white caret-amber-600"
                                />
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>

                        <div>
                            <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-amber-600 border border-transparent rounded-md focus:outline-none hover:bg-amber-700 focus:bg-amber-700">Register</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="flex items-center justify-center px-4 py-10 sm:py-16 lg:py-24 bg-gray-50 sm:px-6 lg:px-8">
            <div>
                <img class="w-full mx-auto" src="{{asset('src/register.svg')}}" alt="" />

                <div class="w-full max-w-md mx-auto xl:max-w-xl">
                    <h3 class="text-2xl font-bold text-center text-black">Real time chat app. MAP project</h3>
                    
                    {{-- <h3 class="text-lg font-bold text-center text-black mt-3">-Admin-</h3>
                    <p class="leading-relaxed text-center text-gray-500 mt-1.5">admin@admin.com - password</p>

                    <h3 class="text-lg font-bold text-center text-black mt-3">-Normal user-</h3>
                    <p class="leading-relaxed text-center text-gray-500 mt-1.5">tudor@tudor.com - tudor</p> --}}

                    <div class="flex items-center justify-center mt-10 space-x-3">
                        <div class="bg-orange-500 rounded-full w-20 h-1.5"></div>

                        <div class="bg-gray-200 rounded-full w-12 h-1.5"></div>

                        <div class="bg-gray-200 rounded-full w-12 h-1.5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection