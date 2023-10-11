<section class="py-6 bg-white sm:py-16 lg:py-20 h-auto sm:h-screen">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl h-full">
        <div class="flex flex-col sm:grid grid-cols-1 gap-y-8 lg:grid-cols-7 lg:gap-x-12 h-full ">
            <div class="lg:col-span-3 flex flex-col gap-2 overflow-auto h-[80vh] sm:h-auto px-2">
                <div class="flex items-center gap-4 justify-between">
                    <p class="text-xl font-bold text-gray-900">Your chats</p>
                </div>

                <div class="sticky top-2 mt-6 z-50">
                    <div class="flex flex-col sm:flex-row items-center gap-2 ">
                        <button wire:click="openAddNewGroup('group')" type="button" class="px-5 py-2.5 text-sm font-medium w-full text-white inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-500 rounded-lg text-center @if($newGroupType == 'group') bg-amber-700 @endif">
                            <svg class="w-3.5 h-3.5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z"></path>
                            </svg>
                            Start a new group chat
                        </button>
                        <button wire:click="openAddNewGroup('individual')" type="button" class="px-5 py-2.5 text-sm font-medium w-full text-white inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-500 rounded-lg text-center @if($newGroupType == 'single') bg-amber-700 @endif">
                            <svg class="w-3.5 h-3.5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"></path>
                              </svg>
                            Start a new chat
                        </button>
                    </div>

                    @if($addNewGroup)
                        <div wire:transition class="bg-white">
                            <button wire:click="closeAddNewGroup" type="button" class="mt-4 px-2 py-1.5 text-sm font-sm text-white inline-flex items-center justify-center bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-500 rounded text-center ">
                                <svg class="w-3.5 h-3.5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"></path>
                                </svg>
                                Cancel
                            </button>
                            @if($newGroupType == 'group')
                                <div class="mt-2">
                                    <input type="text" name="" id="group_name" placeholder="Group name" wire:model="group_name" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg outline-px focus:outline-amber-500" />
                                    @error('group_new')
                                        <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <ul class="grid w-full gap-2 md:grid-cols-2 mt-2 max-h-60 overflow-auto">
                                @forelse ($users as $user)
                                    <li>
                                        <input @if($newGroupType == 'group') type="checkbox" @else type="radio" @endif id="select_user{{$user->id}}" class="hidden peer" value="{{$user->id}}" wire:model="selected_users">
                                        <label for="select_user{{$user->id}}" class="inline-flex items-center gap-2 w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-amber-600 hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50 ">          
                                            @if($user->avatar)
                                                <img class="object-cover w-10 h-10 rounded-full shrink-0" src="{{ asset('storage/'.$user->avatar) }}" alt="" />
                                            @else
                                                <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-gray-200">
                                                    <span class="text-sm font-medium text-gray-500 leading-none uppercase">{{ $user->username[0] }}</span>
                                                </span>
                                            @endif                
                                            <div class="block">
                                                <div class="w-full text-md font-semibold">{{$user->username}}</div>
                                                {{-- <div class="w-full text-sm">A JavaScript library for building user interfaces.</div> --}}
                                            </div>
                                        </label>
                                    </li>
                                @empty
                                    <p class="text-center p-2">
                                        No users found
                                    </p>
                                @endforelse
                            </ul>
                            @error('selected_users')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, no!</span> {{ $message }}</div>
                            @enderror
                            
                            <button wire:click="createGroup" type="button" class="mt-4 px-2 py-1.5 w-full text-sm font-sm text-white flex items-center justify-center bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-500 rounded text-center">
                                <svg class="w-3.5 h-3.5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"></path>
                                </svg>
                                Create chat

                                <svg wire:loading wire:target="createGroup" class="w-6 h-6 text-white ml-2"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>
                            </button>
                          
                        </div>
                    @endif

                    <div class="flex items-center justify-center">
                        <svg wire:loading wire:target="openAddNewGroup" class="w-10 h-10 text-gray-400 mt-6"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>
                    </div>
                    <div class="flex items-center justify-center">
                        <svg wire:loading wire:target="closeAddNewGroup" class="w-10 h-10 text-gray-400 mt-6"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>
                    </div>
                </div>

                <div>    
                    @forelse ($groups as $group_member)
                        <div class="mt-6 space-y-5">
                            <div wire:click="openChat({{$group_member->group_id}})" class="relative overflow-hidden transition-all duration-200 bg-white border border-gray-200 rounded-lg hover:shadow-lg hover:bg-gray-50 hover:-translate-y-1 @if($activeChat && $activeChat->id == $group_member->group_id) shadow-lg bg-gray-100 @endif">
                                <div class="p-2 sm:p-4">
                                    <div class="flex items-start">
                                        <div class="grid @if($group_member->getGroup->getMembers->count() > 1) grid-cols-2 @endif gap-2 w-24 h-20">
                                            @foreach ($group_member->getGroup->getMembers->take(3) as $value)
                                                @php
                                                    $member = $value->getUser;
                                                @endphp
                                                @if($member->avatar)
                                                    <img class="object-cover w-full h-full rounded-lg shrink-0" src="{{ asset('storage/'.$member->avatar) }}" alt="" title="{{$member->username}}"/>
                                                @else
                                                    <div class="w-full h-full rounded-lg bg-gray-200 text-gray-900 flex items-center justify-center" title="{{$member->username}}">
                                                        <span class="uppercase">{{ $member->username[0] }}</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                            
                                            @if($group_member->getGroup->getMembers->count() > 3)
                                                <div class="w-full h-full rounded-lg bg-gray-200 text-gray-900 flex items-center justify-center">
                                                    +{{ $group_member->getGroup->getMembers->count() - 3 }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-5 w-full flex flex-col gap-2">
                                            <div class="flex items-start sm:items-center justify-between gap-0 sm:gap-4 w-full flex-col sm:flex-row">
                                                <p class="text-md leading-7 font-bold text-gray-900">
                                                    <a href="#" title="" class=" leading-3">
                                                        @if($group_member->getGroup->name)
                                                            {{$group_member->getGroup->name}}
                                                        @else
                                                            @foreach ($group_member->getGroup->getMembers as $value)
                                                                {{$value->getUser->username}}
                                                            @endforeach
                                                        @endif
                                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                                    </a>
                                                </p>
                                                <p class="text-sm font-medium text-gray-900 flex items-center gap-3">{{timePassed($group_member->getGroup->getLastChat->created_at ?? null)}}</p>
                                            </div>

                                            <p class="text-sm font-medium text-gray-500 line-clamp-2">
                                                {{$group_member->getGroup->getLastChat->message ?? 'No messages yet. Click to start a conversation'}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center p-2">
                            No chats found
                        </p>
                    @endforelse        
           


                </div>
            </div>

            <div class="bg-gray-100 lg:col-span-4 rounded-xl p-2 sm:p-6 sm:pb-4 relative flex flex-col justify-between overflow-auto order-first sm:order-last h-[80vh] sm:h-auto">
                <ul class="space-y-5">
                    @if($activeChat)
                        {{-- <div> --}}
                            @forelse ($chats as $chat)
                                @if($chat->sender_id == auth()->user()->id)
                                    <li class="max-w-2xl ml-auto flex justify-end gap-x-2 sm:gap-x-4">
                                        <div class="grow text-end space-y-3">
                                            <div class="inline-block bg-amber-600 rounded-lg p-2 sm:px-4 shadow-sm">
                                                <p class="text-xs sm:text-sm text-white">
                                                    {{$chat->message}}
                                                </p>
                                            </div>
                                        </div>
                                        @if($chat->getSender->avatar)
                                            <img class="object-cover h-[2rem] w-[2rem] sm:h-[2.375rem] sm:w-[2.375rem] rounded-full shrink-0" src="{{ asset('storage/'.$chat->getSender->avatar) }}" alt="" />
                                        @else
                                            <span class="flex-shrink-0 inline-flex items-center justify-center h-[2rem] w-[2rem] sm:h-[2.375rem] sm:w-[2.375rem] rounded-full bg-gray-200">
                                                <span class="text-sm font-medium text-gray-500 leading-none uppercase">
                                                    {{ $chat->getSender->username[0] }}
                                                </span>
                                            </span>
                                        @endif
                                    </li>
                                @else
                                    <li class="flex gap-x-2 sm:gap-x-4">
                                        @if($chat->getSender->avatar)
                                            <img class="object-cover h-[2rem] w-[2rem] sm:h-[2.375rem] sm:w-[2.375rem] rounded-full shrink-0" src="{{ asset('storage/'.$chat->getSender->avatar) }}" alt="" />
                                        @else
                                            <span class="flex-shrink-0 inline-flex items-center justify-center h-[2rem] w-[2rem] sm:h-[2.375rem] sm:w-[2.375rem] rounded-full bg-gray-200">
                                                <span class="text-sm font-medium text-gray-500 leading-none uppercase">
                                                    {{ $chat->getSender->username[0] }}
                                                </span>
                                            </span>
                                        @endif            
                                        <div class="flex flex-col gap-1">
                                            <div class=" flex gap-1 items-center">
                                                <span class="font-bold text-sm">{{ $chat->getSender->username }}</span>

                                                <span class="text-xs">({{timePassed($chat->created_at)}})</span>
                                            </div>
                                            <div class="group/chat bg-white border border-gray-200 rounded-lg p-2 sm:px-4 space-y-3 text-xs sm:text-sm relative">
                                                {{$chat->message}}
    
                                                <div wire:click="sendReport({{$chat->id}})" class="hidden absolute -top-2 -right-2 group-hover/chat:flex items-center justify-center rounded-full bg-gray-200 cursor-pointer" title="Report this message">
                                                    <svg class=" text-red-600 w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM19 14.9L14.9 19H9.1L5 14.9V9.1L9.1 5h5.8L19 9.1v5.8z"/><circle cx="12" cy="16" r="1" fill="currentColor"/><path fill="currentColor" d="M11 7h2v7h-2z"/></svg>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        

                                       
                                    </li>
                                @endif

                                
                            
                            @empty
                                <li class="text-center text-sm text-gray-400"> 
                                    No messages yet. Type a message to start a conversation.
                                </li>
                            @endforelse
                        {{-- </div> --}}
                    @else

                        <li class="text-center text-sm text-gray-400"> 
                            No chat selected. Click on a chat to start or continue a conversation.
                        </li>

                    @endif
  
                    <div  class="flex items-center justify-center">
                        <svg wire:loading wire:target="openChat" class="w-20 h-20 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>
                    </div>
                </ul>

                @if($activeChat)
                <footer class="max-w-4xl mx-auto w-full mt-8 sticky bottom-0 border-2 border-gray-200 rounded-lg">
                    <div class="relative">
                        <textarea wire:model="chat_message" wire:keydown.enter="sendMessage" class="p-2 sm:p-4 pb-8 sm:pb-12 block w-full bg-white rounded-lg text-sm outline-0 focus:outline-1 focus:outline-amber-500 focus:ring-amber-500" placeholder="Write a new message..."></textarea>
                        <div class="absolute bottom-px m-2 right-0 rounded-b-lg bg-white w-max">
                            <div class="flex justify-between items-center">
                                <div>

                                </div>

                                <div class="flex items-center gap-x-1">

        
                                    <button type="button" wire:click="sendMessage" class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-white bg-amber-600 hover:bg-amber-500 focus:z-10 focus:outline-none focus:ring-2 focus:ring-amber-500 transition-all">
                                        <svg wire:loading class="h-3.5 w-3.5" wire:target="sendMessage" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>

                                        <svg wire:loading.remove wire:target="sendMessage" class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                        </svg>
                                    </button>
                        
                                </div>

                            </div>
                        </div>
                    </div>
                </footer>
                @endif
            </div>
        </div>
    </div>
</section>