<x-layout>
    <x-slot:heading>Job Page</x-slot:heading>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold">{{ $job->title }}</h1>
        <p class="mt-2 text-sm/6 text-gray-500">{{ $job->description }}</p>
        <ul class="mt-4 list-disc list-inside">
            <li class="text-gray-500">Job Type: {{ $job->type }}</li>
            <li class="text-gray-500">Salary: {{ $job->salary }}/year</li>
            <li class="text-gray-500">Locations:
                @foreach (json_decode($job->locations) as $location)
                    {{ $location }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </li>
        </ul>

    </div>
    @can('edit', $job)
        <x-button href="/jobs/{{ $job->id }}/edit" class="mt-4">Edit Job</x-button>
        <x-button href="#" class="mt-4">Delete</x-button>
    @endcan



</x-layout>
