@empty(!session('roleError'))
    <div class="alert alert-danger">{{ session('roleError') }}</div>
@endempty