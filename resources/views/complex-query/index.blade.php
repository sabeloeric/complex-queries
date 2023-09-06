<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <h1>Complex Query Page</h1>

    <h2>Execute Queries:</h2>
    <form action="{{ route('animal-lovers-with-documents') }}" method="post">
        @csrf
        <button class="btn btn-primary mb-2" type="submit">Animal Lovers with 1 Document</button>
    </form>

    <form action="{{ route('children-sport-lovers') }}" method="post">
        @csrf
        <button class="btn btn-primary mb-2" type="submit">Children & Sport Lovers</button>
    </form>

    <form action="{{ route('unique-interests-no-documents') }}" method="post">
        @csrf
        <button class="btn btn-primary mb-2" type="submit">Unique Interests (No Documents)</button>
    </form>

    <form action="{{ route('people-with-multiple-documents') }}" method="post">
        @csrf
        <button class="btn btn-primary mb-2" type="submit">People with Multiple Documents</button>
    </form>

    <!-- Display results -->
    @if(isset($results))
    <div class="mt-4">
        <h3>Results:</h3>
        <ul>
            @foreach($results as $result)
            <li>{{ $result->name }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>

</body>
</html>
