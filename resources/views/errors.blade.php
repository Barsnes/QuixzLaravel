@if ($errors->any())
    @foreach ($errors->all() as $error)

        <div class="alert alert-danger" style="list-style: none">{{ $error }}</div>

    @endforeach
@endif
