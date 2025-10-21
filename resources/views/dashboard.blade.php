<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-2">Your Study Profile</h3>
                    @if ($user->studyprofile)
                        <div class="space-y-2 text-sm mb-4">
                            <p><strong>Bio:</strong> {{ $user->studyprofile->bio ?? 'Not set' }}</p>
                            <p><strong>City:</strong> {{ $user->studyprofile->city ?? 'Not set' }}</p>
                            <p><strong>Major:</strong> {{ $user->studyprofile->major ?? 'Not set' }}</p>
                            <div>
                                <strong>Subjects:</strong>
                                @if ($user->studyprofile->subjects->isNotEmpty())
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        @foreach ($user->studyprofile->subjects as $subject)
                                            <span class="inline-block bg-primary-100 dark:bg-primary-900 text-primary-800 dark:text-primary-200 text-xs font-medium px-2 py-0.5 rounded-full">
                                                {{ $subject->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-gray-500 italic"> No subjects selected.</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('profile.study.edit') }}" class="text-primary-600 dark:text-primary-400 hover:underline text-sm">
                            Edit Your Study Profile
                        </a>
                    @else
                        <p class="text-gray-500">You haven't set up your study profile yet.</p>
                         <a href="{{ route('profile.study.edit') }}" class="text-primary-600 dark:text-primary-400 hover:underline text-sm mt-2 inline-block">
                            Create Study Profile
                        </a>
                    @endif
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Your Connections</h3>

                    @if ($connections->isNotEmpty())
                        <div class="space-y-3">
                            @foreach ($connections as $connectedUser)
                                <div class="flex items-center justify-between p-3 border dark:border-gray-700 rounded-md">
                                    <div>
                                        <p class="font-semibold">{{ $connectedUser->name }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $connectedUser->studyprofile?->major ?? 'Major not set' }}
                                        </p>
                                    </div>
                                    <div>
                                        @if ($connectedUser->studyprofile)
                                            <a href="{{ route('partners.show', ['studyProfile' => $connectedUser->studyprofile->id]) }}" class="text-sm text-primary-600 dark:text-primary-400 hover:underline mr-4">
                                                View Profile
                                            </a>
                                        @endif
                                        <form method="POST" action="{{ route('connections.destroy', ['user' => $connectedUser->id]) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:underline">
                                                Disconnect
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">You haven't connected with any partners yet.</p>
                        <a href="{{ route('partners.index') }}" class="text-primary-600 dark:text-primary-400 hover:underline text-sm mt-2 inline-block">
                            Find Partners
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>