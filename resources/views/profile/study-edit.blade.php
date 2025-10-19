<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Study Profile Information') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your study related information.") }}
                        </p>
                    </header>

                    <div class="mt-6 space-y-6">

                    <form method="post" action="{{ route('profile.study.update') }}" class="mt-6 space-y-6">
                        @csrf 
                        @method('patch')

                        <div>
                            <x-input-label for="bio" :value="__('Bio')" />
                            <textarea id="bio" name="bio" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary-500 dark:focus:border-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 rounded-md shadow-sm" rows="3">{{ old('bio', $studyProfile->bio) }}</textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="city" :value="__('City (Optional)')" />
                            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $studyProfile->city)" />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="major" :value="__('Major (Optional)')" />
                            <x-text-input id="major" name="major" type="text" class="mt-1 block w-full" :value="old('major', $studyProfile->major)" />
                            <x-input-error :messages="$errors->get('major')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="study_interests" :value="__('Study Interests')" />
                            <textarea id="study_interests" name="study_interests" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary-500 dark:focus:border-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 rounded-md shadow-sm" rows="3">{{ old('study_interests', $studyProfile->study_interests) }}</textarea>
                            <x-input-error :messages="$errors->get('study_interest')" class="mt-2" />
                            <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">
                                {{ __("Separate different interests with a comma.") }}
                            </p>
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            {{-- save message indicatro --}}
                            @if (session('status') === 'study-profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-green-600 dark:text-green-400"
                                >{{ __('Saved successfully.') }}</p> 
                            @endif
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>