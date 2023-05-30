<x-slot name="header">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div class="flex">
                    <a href="{{ route('dashboard', $project->number) }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __($project->number)}} {{ __($project->name) }}</a>
                </div>
            </li>

        </ol>
    </nav>
</x-slot>
<div class="py-4">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <ul role="list" class="mt-20 grid grid-cols-1 gap-6 border-b py-6 sm:grid-cols-2">
            <li class="flow-root">
                <div class="relative -m-2 flex items-center space-x-4 rounded-xl p-2 focus-within:ring-2 focus-within:ring-indigo-500 hover:bg-gray-50">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 4.5l15 15m0 0V8.25m0 11.25H8.25" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <span>Design Inputs</span>
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Capture and manage requirements for your design projects.</p>
                    </div>
                </div>
            </li>
            <li class="flow-root">
                <div class="relative -m-2 flex items-center space-x-4 rounded-xl p-2 focus-within:ring-2 focus-within:ring-indigo-500 hover:bg-gray-50">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125z" />
                        </svg>


                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <span>Kaban Dashboards</span>
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Visualize and track your project progress using Kanban boards.</p>
                    </div>
                </div>
            </li>
            <li class="flow-root">
                <div class="relative -m-2 flex items-center space-x-4 rounded-xl p-2 focus-within:ring-2 focus-within:ring-indigo-500 hover:bg-gray-50">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>

                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <span>Requests for Information</span>
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Submit and track requests for information during the design process.</p>
                    </div>
                </div>
            </li>
            <li class="flow-root">
                <div class="relative -m-2 flex items-center space-x-4 rounded-xl p-2 focus-within:ring-2 focus-within:ring-indigo-500 hover:bg-gray-50">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>

                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <span>Design Review Records</span>
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Manage and document design review meetings and outcomes.</p>
                    </div>
                </div>
            </li>

            <li class="flow-root">
                <div class="relative -m-2 flex items-center space-x-4 rounded-xl p-2 focus-within:ring-2 focus-within:ring-indigo-500 hover:bg-gray-50">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                        </svg>



                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="{{ route('design-itp', $project->number) }}" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <span>Design ITP</span>
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Create and organize inspection and testing plans for your designs.</p>
                    </div>
                </div>
            </li>

            <li class="flow-root">
                <div class="relative -m-2 flex items-center space-x-4 rounded-xl p-2 focus-within:ring-2 focus-within:ring-indigo-500 hover:bg-gray-50">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-indigo-500">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>

                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <span>Approved Drawings</span>
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Access and manage the collection of approved design drawings.</p>
                    </div>
                </div>
            </li>
            <li class="flow-root">
                <div class="relative -m-2 flex items-center space-x-4 rounded-xl p-2 focus-within:ring-2 focus-within:ring-indigo-500 hover:bg-gray-50">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-teal-500">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18V8.25m-18 0V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6zM7.5 6h.008v.008H7.5V6zm2.25 0h.008v.008H9.75V6z" />
                        </svg>



                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <span>Document Register</span>
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Track and manage important documents related to your designs.</p>
                    </div>
                </div>
            </li>
            <li class="flow-root">
                <div class="relative -m-2 flex items-center space-x-4 rounded-xl p-2 focus-within:ring-2 focus-within:ring-indigo-500 hover:bg-gray-50">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                        </svg>

                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <span>Transmittals</span>
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Manage the distribution and tracking of design-related transmittals.</p>
                    </div>
                </div>
            </li>
        </ul>
        <div class="mt-4 flex">
            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                Or start from an empty project
                <span aria-hidden="true"> &rarr;</span>
            </a>
        </div>
    </div>

</div>
