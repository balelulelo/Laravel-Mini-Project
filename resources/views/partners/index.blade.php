<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Partner Lists</title>
    <style>
        body { font-family: sans-serif; line-height: 1.5; }
        .partner-card { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .empty { color: #777; }
    </style>
</head>
<body>
    <h1>All Available Study Partners</h1>

    @forelse ($partners as $partner)
            <div class="partner-card">
                <h3>{{ $partner['name'] }}</h3>
                <p>
                    <strong>Major:</strong> {{ $partner['major'] }}
                </p>
                <a href="{{ route('partners.show', ['id' => $partner['id']]) }}">
                    View Details &rarr; 
                </a>
            </div>
        @empty
            <p class="empty">No study partners available right now.</p>
    @endforelse

</body>
</html>