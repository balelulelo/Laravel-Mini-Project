@props(['partner'])
<div {{ $attributes->merge([
    'class' => 'bg-bg-light p-6
                rounded-2xl shadow-md
                transition-all duration-300 ease-in-out
                hover:scale-[1.03] hover:shadow-xl
                hover:shadow-primary/40'
]) }}>
    <h4 class="text-xl font-semibold text-gray-800">
        {{ $partner->user->name }}
    </h4>
    <p class="text-gray-600">
        <strong>Major:</strong> {{ $partner->major }}
    </p>
    <a href="{{ route('partners.show', ['studyProfile' => $partner]) }}" class="text-primary hover:text-primary-700 font-medium hover:underline mt-4 inline-block">
        View Details &rarr;
    </a>
</div>