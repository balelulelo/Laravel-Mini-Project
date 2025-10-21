<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Find a Study Partner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg-light dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-100">

                    <form method="GET" action="{{ route('partners.index') }}" class="mb-6 pb-6 border-b border-gray-300 dark:border-gray-700">
                        <h3 class="text-lg font-medium mb-4 text-gray-800 dark:text-gray-100">Search & Filter Partners</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                            {{-- search - name --}}
                            <div>
                                <x-input-label for="name" :value="__('Search by Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700" :value="request('name')" placeholder="Enter name..." />
                            </div>

                            {{-- filter - major --}}
                            <div>
                                <x-input-label for="major" :value="__('Filter by Major')" />
                                <x-text-input id="major" name="major" type="text" class="mt-1 block w-full bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700" :value="request('major')" placeholder="Enter major..." />
                            </div>

                            {{-- filter - subject --}}
                            <div>
                                <x-input-label for="subject" :value="__('Filter by Subject')" />
                                <select id="subject" name="subject" class="mt-1 block w-full border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm">
                                    <option value="">-- All Subjects --</option>
                                    @foreach($allSubjects ?? [] as $subject)
                                        <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center space-x-2">
                             <x-primary-button type="submit">
                                {{ __('Search / Filter') }}
                            </x-primary-button>
                             <a href="{{ route('partners.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary hover:underline">
                                {{ __('Clear All') }}
                            </a>
                        </div>
                    </form>
                    <h3 class="text-lg font-medium mb-4 text-gray-800">Available Partners:</h3>

                    <div class="space-y-4">
                        @forelse ($partners as $partner)
                            <x-partner-card :partner="$partner" />
                        @empty
                            <p class="text-gray-500 italic">No partners found matching your criteria.</p>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        {{ $partners->appends(request()->query())->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>