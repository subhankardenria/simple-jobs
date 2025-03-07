<x-layout>
    <x-slot:heading>Listings Page</x-slot:heading>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($jobs as $job)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <img class="size-12 flex-none rounded-full bg-gray-50"
                            src="https://img.icons8.com/?size=100&id=S4PrpPPYz9yh&format=png&color=000000" alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-bold text-blue-500">{{ $job->employer->name }}</p>
                            <a href="/jobs/{{ $job['id'] }}">
                                <p class="text-sm/5 font-semibold title">{{ $job['title'] }}</p>
                            </a>
                            {{-- <p class="mt-1 truncate text-xs/5 text-gray-500">
                                @foreach (json_decode($job['locations']) as $location)
                                    {{ $location }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </p> --}}
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm/6 text-gray-900">{{ $job['type'] }}</p>
                        <p class="mt-1 text-xs/5 text-gray-500">{{ $job['salary'] }}/year</time></p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>


</x-layout>
