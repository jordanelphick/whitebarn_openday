<x-slot name="header">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div class="flex">
                    <a href="{{ route('dashboard', $project->number) }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __($project->number)}} {{ __($project->name) }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('requests-for-information', $project->number) }}#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Requests For Information') }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('request-for-information', ['projectNumber'=>$project->number,'rfiNumber'=>$rfi->number]) }}#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __($rfi->number) }}</a>
                </div>
            </li>
        </ol>
    </nav>
</x-slot>

<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="lg:flex mx-10 lg:items-center lg:justify-between">
                <div class="min-w-0 flex-1">
                    <h2 class="mt-2 text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-2xl sm:tracking-tight">
                        {{$rfi->number}} - {{$rfi->name}}

                    </h2>
                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">

                            @if($rfi->status=='open')
                                <x-flat-pill-with-leading-icon>{{$rfi->status}}</x-flat-pill-with-leading-icon>
                            @elseif($rfi->status=='closed')
                                <span class="inline-flex items-center rounded-full bg-green-200 px-2 py-1 text-xs font-medium text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{$rfi->status}}
                                </span>
                            @endif
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500">


                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>

                            Created By {{$rfi->user->name}}
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500">

                            Priority: {{ucwords($rfi->priority)}}
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                            </svg>
                            Date Created {{Carbon\Carbon::parse($rfi->created_at)->format('d M Y')}}
                        </div>
                    </div>
                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>

                            Originator: {{$rfi->sender_organisation->name}}
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>

                            Receiver: {{$rfi->receiver_organisation->name}}
                        </div>

                    </div>
                </div>

                <div class="mt-5 flex lg:ml-4 lg:mt-0">
                    <span class="hidden sm:block">
                      <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                        </svg>
                        Edit
                      </button>
                    </span>

                    <span class="ml-3 hidden sm:block">
                      <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                          <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                        </svg>
                        View
                      </button>
                    </span>

                    <span class="sm:ml-3">
                      <button type="button" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Publish
                      </button>
                    </span>

                    <!-- Dropdown -->
                    <div class="relative ml-3 sm:hidden">
                        <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:ring-gray-400" id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                            More
                            <svg class="-mr-1 ml-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>


                        <div class="absolute right-0 z-10 -mr-1 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="mobile-menu-item-0">Edit</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="mobile-menu-item-1">View</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flow-root m-10 bg-white p-10">
                <ul role="list" class="-mb-8">
                    @php($messagesCount = count($rfi->messages))
                    @php($loopCount = 0)
                    @foreach($rfi->messages as $message)
                        @php($loopCount +=1)
                        <li>
                            <div class="relative pb-8">
                                @if($loopCount<>$messagesCount)
                                    <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                @else
                                    <span class="absolute -bottom-0.5 -right-1 rounded-tl bg-white px-0.5 py-px"></span>
                                @endif
                                <div class="relative flex items-start space-x-3">
                                    <div class="relative">
                                        <img class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-400 ring-8 ring-white" src="https://images.unsplash.com/photo-1520785643438-5bf77931f493?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">

                                        <span class="absolute -bottom-0.5 -right-1 rounded-tl bg-white px-0.5 py-px">
                                            <!-- TO DO: Can probably use a different icon depending on ->visiblity public or internal -->
                                          <svg class="h-5 w-5 {{($message->visibility=='public'?'text-blue-400':'text-red-400')}}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                          </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div>
                                            <div class="text-sm">
                                                <a href="#" class="font-medium text-gray-900">{{$message->user->name}}</a><br>

                                                    @if($message->visibility=='internal')
                                                        <x-pill-with-border-and-dot colour="red">Internal</x-pill-with-border-and-dot>
                                                    @else
                                                        <x-pill-with-border-and-dot colour="blue">Public</x-pill-with-border-and-dot>
                                                    @endif

                                            </div>
                                            <p class="mt-0.5 text-sm text-gray-500">{{Carbon\Carbon::parse($message->created_at)->format('d/m/Y')}} -  {{Carbon\Carbon::parse($message->created_at)->diffForHumans()}} </p>

                                        </div>
                                        <div class="mt-2 text-sm text-gray-700">
                                            <p>{{$message->body}}</p>
                                        </div>
                                        @if($message->attachments->count())
                                            <div class="mt-4 mb-6 text-sm text-gray-700">
                                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                    <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                                        @foreach($message->attachments as $attachment)
                                                            <li class="flex items-center justify-between py-2 pl-4 pr-5 text-sm leading-6">
                                                                <div class="flex w-0 flex-1 items-center">
                                                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                                        <span class="truncate font-small">{{$attachment->filename}}</span>
                                                                        <span class="flex-shrink-0 text-gray-400">2.4mb</span>
                                                                    </div>

                                                                </div>
                                                                <div class="ml-4 flex-shrink-0">
                                                                    <a href="{{ route('download', $attachment) }}" class="font-small text-sm text-indigo-600 hover:text-indigo-500">Download</a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </dd>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-3 text-left sm:mt-5">
                    <div class="col-span-full">
                        <label for="quickEditRfi-name" class="block text-sm font-medium leading-6 text-gray-900">Add a Response</label>
                        <div class="mt-2">
                            <textarea wire:model="messageBody" rows="7" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-12">
                    <button wire:click="btnSaveMessage" type="button" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>

        </div>



        <!-- MODALS -->

    </div>
</div>
