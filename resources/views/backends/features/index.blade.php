@include('backends.nav')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title">Features List</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($features as $feature)
                                <tr>
                                    <td>{{ $feature->id }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $feature->image) }}" alt="{{ $feature->title }}" width="150" height="100">
                                    </td>
                                    <td>{{ $feature->title }}</td>
                                    <td>
                                        <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ route('features.delete', $feature->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this feature?')">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No features found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backends.footer')
