
<x-slot name="header">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div class="flex">
                    <a href="{{ route('projects') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Projects') }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('project', $project->number) }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __($project->number)}} {{ __($project->name) }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('workarea', ['projectNumber'=>$project->number,'workareaName'=>str_replace(" ", "_", $workarea->name),'workpackageName'=>str_replace(" ", "_", $workpackage->name)]) }}" aria-current="page" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$workarea->number . ". " . $workarea->name}}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" aria-current="page" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$workpackage->number . ". " . $workpackage->name}}</a>
                </div>
            </li>
        </ol>
    </nav>
</x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="w-2/3">
            <div class="relative right-0">
                <ul
                    class="relative flex list-none flex-wrap rounded-xl bg-blue-gray-50/60 p-1"
                    data-tabs="tabs"
                    role="list"
                >
                    <li class="z-30 flex-auto text-center">
                        <a
                            class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                            data-tab-target=""
                            active=""
                            role="tab"
                            aria-selected="true"
                            aria-controls="app"
                        >
                            <span class="ml-1">App</span>
                        </a>
                    </li>
                    <li class="z-30 flex-auto text-center">
                        <a
                            class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                            data-tab-target=""
                            role="tab"
                            aria-selected="false"
                            aria-controls="message"
                        >
                            <span class="ml-1">Messages</span>
                        </a>
                    </li>
                    <li class="z-30 flex-auto text-center">
                        <a
                            class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                            data-tab-target=""
                            role="tab"
                            aria-selected="false"
                            aria-controls="settings"
                        >
                            <span class="ml-1">Settings</span>
                        </a>
                    </li>
                </ul>
                <div data-tab-content="" class="p-5">
                    <div class="block opacity-100" id="app" role="tabpanel">
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit text-blue-gray-500 antialiased">
                            Because it's about motivating the doers. Because I'm here to follow
                            my dreams and inspire other people to follow their dreams, too.
                        </p>
                    </div>
                    <div class="hidden opacity-0" id="message" role="tabpanel">
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit text-blue-gray-500 antialiased">
                            The reading of all good books is like a conversation with the finest
                            minds of past centuries.
                        </p>
                    </div>
                    <div class="hidden opacity-0" id="settings" role="tabpanel">
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit text-blue-gray-500 antialiased">
                            Comparing yourself to others is the thief of joy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
