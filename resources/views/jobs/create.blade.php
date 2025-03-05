<x-layout>
    <x-slot name="heading">Create Job</x-slot>
    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="title" id="title" placeholder="Laravel Developer"
                                required />
                            <x-form-error for="title" />
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 pr-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                <input type="text" name="salary" id="salary"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="$60,000" required>
                                <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">/year
                                </div>

                            </div>
                            <x-form-error for="salary" />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2">
                            <x-form-input-textarea name="description" id="description" rows="3" required />
                        </div>
                        <p class="mt-1 text-sm/6 text-gray-600">Write a few sentences about the job.</p>
                        <x-form-error for="description" />
                    </div>

                    <div class="sm:col-span-3">
                        <x-form-label for="type">Type</x-form-label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="type" name="type"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                required>
                                <option label="Please Select a Type" value=""></option>
                                <option>Part-time</option>
                                <option>Full-time</option>
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <x-form-error for="type" />
                    </div>

                    <div class="sm:col-span-3">
                        <x-form-label for="location">Location</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="location" id="location"
                                placeholder="San Francisco, Seattle, New York, Remote" required />
                        </div>
                        <p class="mt-1 text-sm/6 text-gray-600">You can add multiple locations with (,)comma seperator
                        </p>
                        <x-form-error for="location" />
                    </div>

                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
