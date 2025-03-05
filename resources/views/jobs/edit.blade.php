<x-layout>
    <x-slot name="heading">Edit Job: {{ $job->title }}</x-slot>
    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 pr-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                <input type="text" name="title" id="title"
                                    class="block min-w-0 grow py-1.5 px-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="Laravel Developer" value="{{ $job->title }}" required>


                            </div>
                            @error('title')
                                <p class="mt-1 text-sm/6 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 pr-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                <input type="text" name="salary" id="salary"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="$60,000" value="{{ $job->salary }}" required>
                                <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">/year
                                </div>

                            </div>
                            @error('salary')
                                <p class="mt-1 text-sm/6 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="3"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                required>{{ $job->description }}</textarea>
                        </div>
                        <p class="mt-1 text-sm/6 text-gray-600">Write a few sentences about the job.</p>
                        @error('description')
                            <p class="text-sm/6 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="type" class="block text-sm/6 font-medium text-gray-900">Type</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="type" name="type"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                required>
                                <option label="Please Select a Type" value=""></option>
                                <option {{ $job->type === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option {{ $job->type === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option>Full-time</option>
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        @error('type')
                            <p class="mt-1 text-sm/6 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="location" class="block text-sm/6 font-medium text-gray-900">Location</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 pr-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                <input type="text" name="location" id="location"
                                    class="block min-w-0 grow py-1.5 px-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="San Francisco, Seattle, New York, Remote"
                                    value="{{ implode(',', json_decode($job->locations)) }}" required>
                            </div>

                        </div>
                        <p class="mt-1 text-sm/6 text-gray-600">You can add multiple locations with (,)comma seperator
                        </p>
                        @error('location')
                            <p class="text-sm/6 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

        </div>


        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <div>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </div>

        </div>
    </form>

    <form action="/jobs/{{ $job->id }}" id="delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
