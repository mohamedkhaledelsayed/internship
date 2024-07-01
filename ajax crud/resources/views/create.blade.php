<!-- resources/views/categories/create.blade.php -->

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    @foreach (config('translatable.locales') as $locale)
        <div>
            <label for="name_{{ $locale }}">{{ __('Name') }} ({{ $locale }})</label>
            <input type="text" id="name_{{ $locale }}" name="name[{{ $locale }}]" required>
        </div>
    @endforeach
    <button type="submit">{{ __('Save') }}</button>
</form>
