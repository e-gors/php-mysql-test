<!DOCTYPE html>
<html>

<head>
    <title>View Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            width: 90%;
            margin: 0 auto;
            overflow: hidden;
        }

        .img {
            max-width: 50%;
            min-width: 250px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3>View Database</h3>
        @if(!$formData)
        <p>No data submitted yet.</p>
        @else
        <div class="card">
            @if($formData->image_path)
            <img class="img" src="{{ asset($formData->image_path) }}" alt="Uploaded Image">
            @else
            No image
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $formData->radio_choice }} {{ $formData->checkbox_choice }}</h5>
                <p class="card-text">{{ $formData->text_data }}</p>
                <a href="{{ route('form.index') }}" class="btn btn-secondary mb-3">Back to Form</a>
            </div>
        </div>
    </div>
    @endif
    </div>
</body>

</html>