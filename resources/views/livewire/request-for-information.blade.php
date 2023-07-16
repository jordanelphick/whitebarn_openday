<x-slot name="header">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

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
            <div class="flow-root m-10 bg-white p-10">
                <main class="flex-1">
                    <div class="py-8 xl:py-10">
                        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8 xl:grid xl:max-w-5xl xl:grid-cols-3">
                            <div class="xl:col-span-2 xl:border-r xl:border-gray-200 xl:pr-8">

                                <div>
                                    <div class="md:flex md:items-center md:justify-between md:space-x-4 xl:border-b xl:pb-6">
                                        <div>
                                            <h1 class="text-3xl font-bold pb-1 text-gray-900">Request For Information</h1>
                                            <h1 class="text-2xl font-bold text-gray-900">{{$rfi->name}}</h1>
                                            <p class="mt-2 text-lg font-bold text-gray-900">
                                                {{$rfi->number}}
                                            </p>
                                            <p class="mt-2 text-sm text-gray-500">opened by
                                                <a href="#" class="font-medium text-gray-900">{{$rfi->created_by->name}}</a>
                                                {{Carbon\Carbon::parse($rfi->created_at)->diffForHumans()}}
                                            </p>
                                        </div>


                                    </div>
                                    <aside class="mt-8 xl:hidden">

                                        <h2 class="sr-only">Details</h2>
                                        <div class="space-y-5">
                                            <div class="flex items-center space-x-2">
                                                <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M14.5 1A4.5 4.5 0 0010 5.5V9H3a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-1.5V5.5a3 3 0 116 0v2.75a.75.75 0 001.5 0V5.5A4.5 4.5 0 0014.5 1z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm font-medium text-green-700">Open Issue</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm font-medium text-gray-900">{{count($rfi->messages)}} responses</span>
                                            </div>
                                            <div class="flex items-center space-x-2">

                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm font-medium text-gray-900">Created on <time datetime="2020-12-02">Dec 2, 2020</time></span>
                                            </div>
                                            <div class="flex items-center space-x-2">

                                                <h2 class="text-sm font-medium text-gray-500">Category</h2>
                                                <ul role="list" class="mt-2 leading-8">
                                                    <li class="inline">
                                                        <a href="#" class="relative inline-flex items-center rounded-full px-2.5 py-1 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                                            <div class="absolute flex flex-shrink-0 items-center justify-center">
                                                                <span class="h-1.5 w-1.5 rounded-full " style="background-color: {{$rfi->category->colour_hex}}" aria-hidden="true"></span>
                                                            </div>
                                                            <div class="ml-3 text-xs font-semibold text-gray-900">{{ucwords($rfi->category->name)}}</div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                        <div class="mt-6 space-y-8 border-b border-t border-gray-200 py-6">
                                            <div>
                                                <h2 class="text-sm font-medium text-gray-500">Created By</h2>
                                                <ul role="list" class="mt-3 space-y-3">
                                                    <li class="flex justify-start">
                                                        <a href="#" class="flex items-center space-x-3">
                                                            <div class="flex-shrink-0">
                                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $rfi->created_by->profile_photo_url }}" alt="{{ $rfi->created_by->name }}" />
                                                                    </button>
                                                                @else
                                                                    <span class="inline-flex rounded-md">
                                                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                                            </svg>
                                                                        </button>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="text-sm font-medium text-gray-900">{{$rfi->created_by->name}}</div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h2 class="text-sm font-medium text-gray-500">Tags</h2>
                                                <ul role="list" class="mt-2 leading-8">
                                                    <li class="inline">
                                                        <a href="#" class="relative inline-flex items-center rounded-full px-2.5 py-1 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                                            <div class="absolute flex flex-shrink-0 items-center justify-center">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-rose-500" aria-hidden="true"></span>
                                                            </div>
                                                            <div class="ml-3 text-xs font-semibold text-gray-900">Bug</div>
                                                        </a>
                                                    </li>
                                                    <li class="inline">
                                                        <a href="#" class="relative inline-flex items-center rounded-full px-2.5 py-1 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                                            <div class="absolute flex flex-shrink-0 items-center justify-center">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-indigo-500" aria-hidden="true"></span>
                                                            </div>
                                                            <div class="ml-3 text-xs font-semibold text-gray-900">Accessibility</div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </aside>


                                    <div class="py-3 xl:pb-0 xl:pt-6">
                                        <h2 class="sr-only">Description</h2>
                                        <div class="prose max-w-none">
                                            <p>{{$rfi->comment}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    {{$rfi->body}}
                                </div>
                                <section aria-labelledby="activity-title" class="mt-8 xl:mt-10">
                                    <div>

                                        <div class="divide-y divide-gray-200">
                                            <div class="pb-4">
                                                <h2 id="activity-title" class="text-lg font-medium text-gray-900">Responses</h2>
                                            </div>
                                            <div class="pt-6">
                                                <!-- Activity feed-->

                                                <div class="flow-root">
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
                                                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $message->user->profile_photo_url }}" alt="{{ $message->user->name }}" />
                                                                                </button>
                                                                            @else
                                                                                <span class="inline-flex rounded-md">
                                                                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                                                        </svg>
                                                                                    </button>
                                                                                </span>
                                                                            @endif

                                                                        </div>
                                                                        <div class="min-w-0 flex-1">
                                                                            <div>
                                                                                <div class="text-sm">
                                                                                    <a href="#" class="font-medium text-gray-900">{{$message->user->name}}<x-pill-with-border colour="gray">{{$rfi->sender_organisation->name}}</x-pill-with-border></a><br>
                                                                                </div>
                                                                                <p class="mt-0.5 text-sm text-gray-500">Responded {{Carbon\Carbon::parse($message->created_at)->diffForHumans()}} </p>

                                                                            </div>
                                                                            <div class="mt-2 text-sm text-gray-700">
                                                                                <p>{{$message->body}}</p>
                                                                            </div>
                                                                            @if($message->attachments->count())
                                                                                <div class="mt-4 mb-6 text-sm text-gray-700">
                                                                                    <p class="mt-0.5 text-sm text-gray-500 mb-2 mt-2">Attachments ({{count($message->attachments)}})</p>
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
                                                                                                        <a href="{{ route('download', $attachment) }}" class="font-small text-sm text-blue-600 hover:text-blue-500">Download</a>
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




                                            <!-- MODALS -->

                                        </div>


                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <aside class="hidden xl:block xl:pl-8">

                                <h2 class="sr-only">Details</h2>

                                <div class="space-y-5">
                                    <div class="mt-4 flex space-x-3 md:mt-0">
                                        <div class="relative inline-block text-left">
                                            <div>
                                                <button wire:click="btnOptionsToggle"  type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                    Options
                                                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="{{ $showOptions ? '' : 'hidden' }} absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical"  aria-labelledby="menu-button" tabindex="-1">
                                                <div class="py-1" role="none">
                                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Edit</a>
                                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Duplicate</a>
                                                </div>
                                                <div class="py-1" role="none">
                                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Archive</a>
                                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Move</a>
                                                </div>
                                                <div class="py-1" role="none">
                                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-4">Share</a>
                                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-5">Add to favorites</a>
                                                </div>
                                                <div class="py-1" role="none">
                                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-6">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        @if($rfi->status=='open')
                                            <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M14.5 1A4.5 4.5 0 0010 5.5V9H3a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-1.5V5.5a3 3 0 116 0v2.75a.75.75 0 001.5 0V5.5A4.5 4.5 0 0014.5 1z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-medium text-green-700">Open RFI</span>
                                        @else
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-medium text-gray-700">RFI Closed</span>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900"><span class="text-sm font-medium text-gray-900">{{count($rfi->messages)}} responses</span></span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">Created on <time datetime="2020-12-02">{{Carbon\Carbon::parse($rfi->created_at)->format('M d, Y')}}</time></span>
                                    </div>

                                </div>

                                <div class="mt-6 space-y-8 border-t border-gray-200 py-6">
                                    <div>
                                        <h2 class="text-sm font-medium text-gray-500">Category</h2>
                                        <ul role="list" class="leading-8">
                                            <li class="inline">
                                                <a href="#" class="relative inline-flex items-center rounded-full px-2.5 py-1 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                                    <div class="absolute flex flex-shrink-0 items-center justify-center">
                                                        <span class="h-1.5 w-1.5 rounded-full " style="background-color: {{$rfi->category->colour_hex}}" aria-hidden="true"></span>
                                                    </div>
                                                    <div class="ml-3 text-xs font-semibold text-gray-900">{{ucwords($rfi->category->name)}}</div>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div>
                                        <h2 class="text-sm font-medium text-gray-500">Sender</h2>
                                        <ul role="list" class="mt-1 space-y-3">
                                            <li class="flex justify-start">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$rfi->sender_organisation->name}}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h2 class="text-sm font-medium text-gray-500">Receiver</h2>
                                        <ul role="list" class="mt-1 space-y-3">
                                            <li class="flex justify-start">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$rfi->receiver_organisation->name}}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h2 class="text-sm font-medium text-gray-500">Created By</h2>
                                        <ul role="list" class="mt-3 space-y-3">
                                            <li class="flex justify-start">
                                                <a href="#" class="flex items-center space-x-3">
                                                    <div class="flex-shrink-0">

                                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ $rfi->created_by->profile_photo_url }}" alt="{{ $rfi->created_by->name }}" />
                                                            </button>
                                                        @else
                                                            <span class="inline-flex rounded-md">
                                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                                    </svg>
                                                                </button>
                                                            </span>
                                                        @endif


                                                    </div>
                                                    <div class="text-sm font-medium text-gray-900">{{$rfi->created_by->name}}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h2 class="text-sm font-medium text-gray-500">Recipients</h2>
                                        <div class="relative text-left pt-2 pb-2">
                                            <div class="">
                                                <input wire:model.debounce.300ms="search" wire:input="searchUsers" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Type to Search">
                                                <div class="{{ $showUserSearchResults ? '' : 'hidden' }} absolute left-0 z-10 mt-2 w-full origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical"  aria-labelledby="menu-button" tabindex="-1">
                                                    @foreach($usersList as $user)
                                                        <div class="py-1  hover:bg-gray-50" role="none">
                                                            <a wire:click="addUser('{{ $user['id'] }}')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">{{ $user['name'] }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap">
                                            @foreach($rfi->users as $user)
                                                <span class="inline-flex items-center rounded-full bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 my-1 mr-2">
                                                    {{ $user->name }}
                                                    <button wire:click="removeUser('{{ $user->id }}')" type="button" class="ml-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>






</div>

<script>
    new TomSelect('#select-recipient-users', {
        maxItems: 30,
    });

</script>
