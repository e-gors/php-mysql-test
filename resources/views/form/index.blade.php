<!DOCTYPE html>
<html>

<head>
    <title>Submit Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Submit Form</h3>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="text_data">Text (Minimum 100 characters)</label>
                <textarea class="form-control" id="text_data" name="text_data" rows="4" required>{{ old('text_data') }}</textarea>
                @error('text_data')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Radio Choice</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio_choice" id="radio_choice1" value="Hi" {{ old('radio_choice') === 'Hi' ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio_choice1">Hi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio_choice" id="radio_choice2" value="Hello" {{ old('radio_choice') === 'Hello' ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio_choice2">Hello</label>
                </div>
                @error('radio_choice')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Checkbox Choices (Select one)</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="checkbox_choice" id="checkbox_choice1" value="World!" {{ old('checkbox_choice') === 'World!' ? 'checked' : '' }}>
                    <label class="form-check-label" for="checkbox_choice1">World!</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="checkbox_choice" id="checkbox_choice2" value="Web!" {{ old('checkbox_choice') === 'Web!' ? 'checked' : '' }}>
                    <label class="form-check-label" for="checkbox_choice2">Web!</label>
                </div>
                @error('checkbox_choice')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('form.view') }}" class="btn btn-secondary">View Database</a>
        </form>
    </div>
</body>

</html>