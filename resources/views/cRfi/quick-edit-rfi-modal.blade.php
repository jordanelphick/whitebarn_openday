

<!-- quick Edit Rfi Modal -->
<div x-data="{ open: @entangle('showQuickEditRFIModal').defer }">
    <template x-if="open">
        <div id="quickEditRfiModal" class="{{($selectedRfi?'':'hidden')}} relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class=" fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    @if($selectedRfi)
                        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl sm:p-6">
                            <div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">{{ ($selectedRfi->id?'Edit':'Create a new') }} RFI</h3>
                                </div>
                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="mt-2">
                                        <label for="quickEditRfi-number" class="block text-sm font-medium leading-6 text-gray-900">{{ (!$selectedRfi->id?'Proposed':'') }} RFI Number</label>
                                        <label class="block text-xs font-medium leading-6 text-gray-500">Subject to confirmation once form is submitted</label>
                                        <div class="mt-2">
                                            <input wire:model="rfiNumber" disabled type="text" name="quickEditRfi-number" id="quickEditRfi-number" autocomplete="quickEditWorkarea-number" value="{{ $project->acronym .'-'. auth()->user()->organisations->first()->acronym . '-RFI-' . str_pad(App\Models\Rfi::where('sender_organisation_id', 1)->first()->id +1, 4, '0', STR_PAD_LEFT) }}" class="cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('rfiNumber') <span class="text-red-500">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="col-span-full">
                                        <label for="quickEditRfi-name" class="block text-sm font-medium leading-6 text-gray-900">RFI Name</label>
                                        <div class="mt-2">
                                            <input wire:model="rfiName" type="text" name="quickEditRfi-name" id="quickEditRfi-name" autocomplete="quickEditRfi-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('rfiName') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 mt-3 text-left sm:mt-5">
                                    <div>
                                        <label for="quickEditRfi-projectName" class="block text-sm font-medium leading-6 text-gray-900">Project</label>
                                        <div class="mt-2">
                                            <input disabled type="text" name="quickEditRfi-id" id="quickEditRfi-projectName" autocomplete="quickEditRfi-projectName" value="{{$project->name}}" class="cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="selectWorkpackage-name" class="block text-sm font-medium leading-6 text-gray-900">Work Package</label>
                                        <div class="mt-2">
                                            <select wire:model="selectOptionWorkpackageId" id="selectWorkpackage-name" autocomplete="selectWorkpackage-name" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                @foreach($workareas as $workarea)
                                                    <option value="">---</option>
                                                    <optgroup label="{{$workarea->name}}">
                                                        @foreach($workarea->workpackages as $workpackage)
                                                            <option value="{{ $workpackage->id }}">{{ $workpackage->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            @error('selectOptionWorkpackageId') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-3 mt-3 text-left sm:mt-5">
                                    <div>
                                        <label for="selectOrganisationSender-name" class="block text-sm font-medium leading-6 text-gray-900">Sender</label>
                                        <div class="mt-2">
                                            <select wire:model="selectOptionSenderOrganisationId" id="selectOrganisationSender-name" autocomplete="selectOrganisationReceiver-name" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                <option value="">---</option>
                                                @foreach(auth()->user()->organisations as $organisation)
                                                    <option value="{{ $organisation->id }}">{{ $organisation->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectOptionSenderOrganisationId') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="selectReceiverOrganisation-name" class="block text-sm font-medium leading-6 text-gray-900">For Action</label>
                                        <div class="mt-2">
                                            <select wire:model="selectOptionReceiverOrganisationId" id="selectReceiverOrganisation-name" autocomplete="selectReceiverOrganisation-name" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                <option value="">---</option>
                                                @foreach($organisations as $organisation)
                                                    <option value="{{ $organisation->id }}">{{ $organisation->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectOptionReceiverOrganisationId') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 mt-3 text-left sm:mt-5">
                                    <div>
                                        <label for="selectCategory-name" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                                        <div class="mt-2">
                                            <select wire:model="selectOptionCategoryId" id="selectCategory-name" autocomplete="selectCategory-name" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                <option value="">---</option>
                                                @foreach(App\Models\Category::all() as $category)
                                                    <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectOptionCategoryId') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="col-span-full">
                                        <label for="quickEditRfi-created_by" class="block text-sm font-medium leading-6 text-gray-900">Created By</label>
                                        <div class="mt-3">
                                            <select wire:model="selectOptionCreatedById" id="selectCreatedBy" autocomplete="createdBy-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                <option value="">---</option>
                                                @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectOptionCreatedById') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="col-span-full">
                                        <label for="rfiBody" class="block text-sm font-medium leading-6 text-gray-900">RFI Body</label>
                                        <div class="mt-2">
                                            <textarea wire:model="rfiBody" rows="7" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                            @error('rfiBody') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="col-span-full">
                                        <label for="attachments" class="block text-sm font-medium leading-6 text-gray-900">Attachments</label>


                                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-4">
                                            <div class="text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                                </svg>
                                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                        <span>Upload files</span>
                                                        <input wire:model="fileUploads" id="file-upload" name="file-upload" type="file" multiple  class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                    @error('fileUploads')
                                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF, PDF, DOC, PPT, XLS (up to 10MB)</p>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                                <button wire:click="btnSaveQuickEditRfiModal" type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Save</button>
                                <button wire:click="btnCancelModal" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </template>
</div>
<!-- END quick Edit Rfi Modal -->
