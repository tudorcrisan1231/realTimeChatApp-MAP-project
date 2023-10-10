<section class="py-6 bg-white sm:py-16 lg:py-20 h-auto sm:h-screen">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl h-full">
        <div class="flex items-center gap-4 justify-between">
            <p class="text-2xl font-bold text-gray-900">Users</p>
        </div>

        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10 mb-20">

            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 d ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total messages
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-right">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="bg-white border-b  hover:bg-gray-50 ">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                @if($user->avatar)
                                    <img class="w-10 h-10 rounded-full object-cover" src="{{asset('storage/'.$user->avatar)}}" alt="avatar">
                                @else
                                    <span class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center uppercase">
                                        {{$user->username[0]}}
                                    </span>
                                @endif
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{$user->username}}</div>
                                    <div class="font-normal text-gray-500">{{$user->email}}</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">
                                {{$user->getTotalMessages->count()}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($user->banned == 1)
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Banned
                                    @else
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Active
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if($user->banned == 1)
                                    <div class="font-medium text-green-600  hover:underline cursor-pointer" wire:click="unblockUser({{$user->id}})">Unban user</div>
                                @else
                                    <div class="font-medium text-red-600  hover:underline cursor-pointer" wire:click="blockUser({{$user->id}})">Ban user</div>
                                @endif
                               
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No users found</td>
                        </tr>
                    @endforelse
                
                </tbody>
            </table>
        </div>

        <div class="flex items-center gap-4 justify-between">
            <p class="text-2xl font-bold text-gray-900">Reports</p>
        </div>

        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">

            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 d ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Sent by
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Reported message
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Message author
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-right">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                        <tr class="bg-white border-b  hover:bg-gray-50 ">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                @if($report->getSender->avatar)
                                    <img class="w-10 h-10 rounded-full object-cover" src="{{asset('storage/'.$report->getSender->avatar)}}" alt="avatar">
                                @else
                                    <span class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center uppercase">
                                        {{$report->getSender->username[0]}}
                                    </span>
                                @endif
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{$report->getSender->username}}</div>
                                    <div class="font-normal text-gray-500">{{$report->getSender->email}}</div>
                                </div>  
                            </th>
                            <td scope="row" class="px-6 py-4">
                                {{$report->getMessage->message}}
                            </td>
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                @if($report->getMessage->getSender->avatar)
                                    <img class="w-10 h-10 rounded-full object-cover" src="{{asset('storage/'.$report->getMessage->getSender->avatar)}}" alt="avatar">
                                @else
                                    <span class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center uppercase">
                                        {{$report->getMessage->getSender->username[0]}}
                                    </span>
                                @endif
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{$report->getMessage->getSender->username}}</div>
                                    <div class="font-normal text-gray-500">{{$report->getMessage->getSender->email}}</div>
                                </div>  
                            </th>
                            <td scope="row" class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($report->status == 0)
                                        <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-2"></div> In pending
                                    @elseif($report->status == 1)
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Solved
                                    @endif
                                </div>
                            </td>
                            <td scope="row" class="px-6 py-4 text-right">
                               <div class="flex items-end flex-col gap-3 justify-end">
                                    @if($report->status == 0)
                                        <div class="font-medium text-red-600  hover:underline cursor-pointer" wire:click="blockUser({{$report->getMessage->getSender->id}}, {{$report->id}})">Ban user</div>
                                        <div class="font-medium text-yellow-500  hover:underline cursor-pointer" wire:click="markAsSolved({{$report->id}})">Mark as solved</div>
                                    @elseif($report->status == 1)
                                        <div class="font-medium text-yellow-500  hover:underline cursor-pointer" wire:click="markAsPending({{$report->id}})">Mark as pending</div>
                                    @endif
                                   
                               </div>
                               
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No reports found</td>
                        </tr>
                    @endforelse
                
                </tbody>
            </table>
        </div>
    </div>
</section>