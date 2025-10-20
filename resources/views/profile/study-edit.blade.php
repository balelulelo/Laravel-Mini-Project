<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Your Study Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
{{-- 
            card form --}}
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
                    <form method="post" action="{{ route('profile.study.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        
                        {{-- bio --}}
                        <div>
                            <x-input-label for="bio" :value="__('Bio')" />
                            <textarea id="bio" name="bio" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary-500 dark:focus:border-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 rounded-md shadow-sm" rows="3">{{ old('bio', $studyProfile->bio) }}</textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>

                        {{-- city --}}
                        <div>
                            <x-input-label for="city" :value="__('City (Optional)')" />
                            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $studyProfile->city)" />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        {{-- major --}}
                        <div>
                            <x-input-label for="major" :value="__('Major (Optional)')" />
                            <x-text-input id="major" name="major" type="text" class="mt-1 block w-full" :value="old('major', $studyProfile->major)" />
                            <x-input-error :messages="$errors->get('major')" class="mt-2" />
                        </div>

                        {{-- chcekbox subject --}}
                        <div>
                            @isset($allSubjects)
                                <x-input-label :value="__('Study Interests / Subjects')" />
                                <div class="mt-2 space-y-2 max-h-60 overflow-y-auto border dark:border-gray-700 rounded-md p-4">
                                    @forelse ($allSubjects as $subject)
                                        <label class="flex items-center">
                                            <input type="checkbox"
                                                   name="subjects[]"
                                                   value="{{ $subject->id }}"
                                                   class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary-600 shadow-sm focus:ring-primary-500 dark:focus:ring-primary-600 dark:focus:ring-offset-gray-800"
                                                   @if(in_array($subject->id, old('subjects', $userSubjectIds ?? []))) checked @endif
                                            >
                                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ $subject->name }}</span>
                                        </label>
                                    @empty
                                        <p class="text-sm text-gray-500 dark:text-gray-400">No subjects available to select.</p>
                                    @endforelse
                                </div>
                                <x-input-error :messages="$errors->get('subjects')" class="mt-2" />
                                <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">
                                    {{ __("Select the subjects you are interested in studying.") }}
                                </p>
                            @else
                                <p class="text-sm text-red-600 dark:text-red-400">Error: Subject list could not be loaded.</p>
                            @endisset
                        </div>


                        {{-- save --}}
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            @if (session('status') === 'study-profile-updated')
                                <p
                                    x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-green-600 dark:text-green-400"
                                >{{ __('Saved successfully.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            {{-- card delete --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                             <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Delete Study Profile') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Once your study profile is deleted, all of its resources and data will be permanently deleted. Before deleting your profile, please download any data or information that you wish to retain.') }}
                            </p>
                        </header>

                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-study-profile-deletion')"
                        >{{ __('Delete Study Profile') }}</x-danger-button>
                        
                        <x-modal name="confirm-study-profile-deletion" :show="false" focusable>
                            <form method="post" action="{{ route('profile.study.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Are you sure you want to delete your study profile?') }}
                                </h2>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once your study profile is deleted, all of its resources and data will be permanently deleted.') }}
                                </p>
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                    <x-danger-button class="ms-3">
                                        {{ __('Delete Study Profile') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>