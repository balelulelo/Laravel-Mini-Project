@props(['partner'])


<div {{ $attributes->merge([
    'class' => 'bg-white dark:bg-gray-800 p-6 
                rounded-2xl shadow-md 
                transition-all duration-300 ease-in-out 
                hover:scale-[1.03] hover:shadow-xl 
                hover:shadow-primary-300/50 dark:hover:shadow-primary-700/50'
]) }}>
    <h4 class="text-xl font-semibold text-secondary-900 dark:text-secondary-200">
        {{ $partner->user->name }}
    </h4>
    <p class="text-gray-600 dark:text-gray-400">
        <strong>Major:</strong> {{ $partner->major }}
    </p>
    <a href="{{ route('partners.show', ['studyProfile' => $partner]) }}" class="text-primary-600 dark:text-primary-400 font-medium hover:underline mt-4 inline-block">
        View Details &rarr;
    </a>
</div>