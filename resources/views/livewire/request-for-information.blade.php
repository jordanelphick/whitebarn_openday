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
                                            <a href="#" class="font-medium text-gray-900">{{$message->user->name}}</a>
                                            @if($message->visibility=='internal')
                                                <x-pill-with-border-and-dot colour="red">Internal</x-pill-with-border-and-dot>
                                            @else
                                                <x-pill-with-border-and-dot colour="blue">Public</x-pill-with-border-and-dot>
                                            @endif
                                        </div>
                                        <p class="mt-0.5 text-sm text-gray-500">Commented {{Carbon\Carbon::parse($message->created_at)->diffForHumans()}} </p>

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
                                                                <a href="#" class="font-small text-sm text-indigo-600 hover:text-indigo-500">Download</a>
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
                <!--
                <li>
                    <div class="relative pb-8">
                        <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                        <div class="relative flex items-start space-x-3">
                            <div>
                                <div class="relative px-1">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white">
                                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="min-w-0 flex-1 py-1.5">
                                <div class="text-sm text-gray-500">
                                    <a href="#" class="font-medium text-gray-900">Hilary Mahy</a>
                                    assigned
                                    <a href="#" class="font-medium text-gray-900">Kristin Watson</a>
                                    <span class="whitespace-nowrap">2d ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="relative pb-8">
                        <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                        <div class="relative flex items-start space-x-3">
                            <div>
                                <div class="relative px-1">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white">
                                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.5 3A2.5 2.5 0 003 5.5v2.879a2.5 2.5 0 00.732 1.767l6.5 6.5a2.5 2.5 0 003.536 0l2.878-2.878a2.5 2.5 0 000-3.536l-6.5-6.5A2.5 2.5 0 008.38 3H5.5zM6 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="min-w-0 flex-1 py-0">
                                <div class="text-sm leading-8 text-gray-500">
                                  <span class="mr-0.5">
                                    <a href="#" class="font-medium text-gray-900">Hilary Mahy</a>
                                    added tags
                                  </span>
                                                        <span class="mr-0.5">
                                    <a href="#" class="inline-flex items-center gap-x-1.5 rounded-full px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                                      <svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                                        <circle cx="3" cy="3" r="3" />
                                      </svg>
                                      Bug
                                    </a>
                                    <a href="#" class="inline-flex items-center gap-x-1.5 rounded-full px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                                      <svg class="h-1.5 w-1.5 fill-indigo-500" viewBox="0 0 6 6" aria-hidden="true">
                                        <circle cx="3" cy="3" r="3" />
                                      </svg>
                                      Accessibility
                                    </a>
                                  </span>
                                    <span class="whitespace-nowrap">6h ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="relative pb-8">
                        <div class="relative flex items-start space-x-3">
                            <div class="relative">
                                <img class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-400 ring-8 ring-white" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">

                                <span class="absolute -bottom-0.5 -right-1 rounded-tl bg-white px-0.5 py-px">
                                  <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                  </svg>
                                </span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div>
                                    <div class="text-sm">
                                        <a href="#" class="font-medium text-gray-900">Jason Meyers</a>
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">Commented 2h ago</p>
                                </div>
                                <div class="mt-2 text-sm text-gray-700">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt nunc ipsum tempor purus vitae id. Morbi in vestibulum nec varius. Et diam cursus quis sed purus nam. Scelerisque amet elit non sit ut tincidunt condimentum. Nisl ultrices eu venenatis diam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                -->
            </ul>
        </div>

    </div>



    <!-- MODALS -->

</div>
