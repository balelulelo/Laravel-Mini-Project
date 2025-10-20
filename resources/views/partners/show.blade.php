<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Partner Detail: ') }} {{ $partner->user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-2">
                            <h4 class="font-semibold text-gray-500 dark:text-gray-400">Bio</h4>
                            <p class="text-lg">{{ $partner->bio }}</p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-500 dark:text-gray-400">City</h4>
                            <p class="text-lg">{{ $partner->city }}</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-500 dark:text-gray-400">Major</h4>
                            <p class="text-lg">{{ $partner->major }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <h4 class="font-semibold text-gray-500 dark:text-gray-400">Interests</h4>
                            @if($partner->subjects->isNotEmpty())
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach($partner->subjects as $subject)
                                        <span class="inline-block bg-primary-100 dark:bg-primary-900 text-primary-800 dark:text-primary-200 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                            {{ $subject->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-lg text-gray-500 dark:text-gray-400">No specific subjects listed.</p>
                            @endif
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 border-t dark:border-gray-700 pt-6">
                        <a href="{{ route('partners.index') }}" class="text-primary-600 dark:text-primary-400 hover:underline">
                            &larr; Back to all partners
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>