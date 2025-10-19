<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-M">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner Details</title>
</head>
<body>
    <h1>Partner Details</h1>

    <p>
        <strong>ID:</strong> {{ $partner['id'] }}
    </p>
    <p>
        <strong>Name:</strong> {{ $partner['name'] }}
    </p>
    <p>
        <strong>City of Origin:</strong> {{ $partner['city'] }}
    </p>
    <p>
        <strong>Major:</strong> {{ $partner['major'] }}
    </p>
    <p>
        <strong>Study Interest:</strong> {{ $partner['interest'] }}
    </p>

    <br>
    <a href="{{ route('partners') }}">&larr; Back to Lists</a>
</body>
</html>