@include('backends.nav')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Feature</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $feature->title) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Current Image</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $feature->image) }}" alt="{{ $feature->title }}" width="200">
                            </div>
                            <label for="image">Change Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <small class="text-muted">Leave empty to keep current image. Max size: 2MB. Allowed types: JPG, JPEG, PNG.</small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Feature</button>
                            <a href="{{ route('features') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backends.footer')
