<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Find a Study Partner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h3 class="text-lg font-medium mb-4">All Available Partners:</h3>

                    <div class="space-y-4">
                        @forelse ($partners as $partner)
                            <x-partner-card :partner="$partner" />
                        @empty
                            <p>No study partners are available at this time.</p>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $partners->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>