<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Partner Details: ') }} {{ $partner['name'] }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    
                    <p>
                        <strong>ID:</strong> {{ $partner['id'] }}
                    </p>
                    <p>
                        <strong>Name:</strong> {{ $partner['name'] }}
                    </p>
                    <p>
                        <strong>City:</strong> {{ $partner['city'] }}
                    </p>
                    <p>
                        <strong>Major:</strong> {{ $partner['major'] }}
                    </p>
                    <p>
                        <strong>Interests:</strong> {{ $partner['interest'] }}
                    </p>

                    <div class="mt-6">
                        <a href="{{ route('partners') }}" class="text-blue-500 hover:underline">
                            &larr; Back to all partners
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>