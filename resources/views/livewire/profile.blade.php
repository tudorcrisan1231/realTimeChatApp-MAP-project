<main class="px-4 mx-auto sm:px-6 lg:px-8 sm:mt-10 max-w-7xl">
    <div class="py-10 pb-28">
        <div class="mx-auto">
            <h1 class="text-2xl font-bold text-gray-900">Account settings</h1>
        </div>

        <div class=" mx-auto">

            <div class="mt-6">
                <p class="mt-1 text-sm font-medium text-gray-500">
                    Edit your account details and settings.
                </p>
            </div>

            <div class="max-w-3xl mt-12">
                <div class="space-y-8">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                        <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Profile Photo </label>
                        <div class="mt-2 sm:mt-0 sm:col-span-2">
                            <div class="flex flex-col gap-3">
                                <div class="flex items-center space-x-6">
                                    @if($avatar)
                                        <img class="flex-shrink-0 object-cover w-12 h-12 rounded-md" src="{{asset('storage/'.$avatar)}}" alt="" />
                                        <button type="button" wire:click="removeAvatar" class="text-sm font-semibold text-gray-400 transition-all duration-200 bg-white rounded-md hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600">Remove</button>
                                    @else
                                        <span class="flex-shrink-0 inline-flex items-center justify-center w-12 h-12 rounded-md bg-gray-200">
                                            <span class="text-lg font-medium text-gray-500 leading-none uppercase">
                                                {{ $user->username[0] }}
                                            </span>
                                        </span>
                                    @endif
                                    
                                </div>
                                <div>
                                    <input type="file" name="" id="avatar" wire:model="new_avatar" placeholder="" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg outline-px focus:outline-amber-500" />

                                    @error('new_avatar')
                                        <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                        <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Username </label>
                        <div class="mt-2 sm:mt-0 sm:col-span-2">
                            <div>
                                <input type="text" name="" id="username" placeholder="Username" wire:model="username" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg outline-px focus:outline-amber-500" />
                                @error('username')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                        <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Email Address </label>
                        <div class="mt-2 sm:mt-0 sm:col-span-2">
                            <input type="email" name="" id="email" placeholder="Email addres" wire:model="email" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg outline-px focus:outline-amber-500" />
                            @error('email')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                        <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Write Your Bio </label>
                        <div class="mt-2 sm:mt-0 sm:col-span-2">
                            <textarea
                                name=""
                                id=""
                                placeholder="Write about you"
                                value=""
                                rows="4"
                                class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg resize-y outline-px focus:outline-amber-500"
                                spellcheck="false"
                            ></textarea>
                        </div>
                    </div> --}}

                    
                    <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                        <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Current password </label>
                        <div class="mt-2 sm:mt-0 sm:col-span-2">
                            <div>
                                <input type="password" name="" id="current_password" wire:model="current_password" placeholder="********" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg outline-px focus:outline-amber-500 0 sm:text-sm " />
                                @error('password')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                        <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> New password </label>
                        <div class="mt-2 sm:mt-0 sm:col-span-2">
                            <div>
                                <input type="password" name="" id="new_password" wire:model="new_password" placeholder="********" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg outline-px focus:outline-amber-500" />
                                @error('new_password')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                        <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Confirm new password </label>
                        <div class="mt-2 sm:mt-0 sm:col-span-2">
                            <div>
                                <input type="password" name="" id="new_password_confirmation" wire:model="new_password_confirmation" placeholder="********" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg outline-px focus:outline-amber-500" />
                                @error('new_password_confirmation')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:mt-12">
                    <button
                        wire:click="updateProfile"
                        class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-amber-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 hover:bg-amber-500"
                    >
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>