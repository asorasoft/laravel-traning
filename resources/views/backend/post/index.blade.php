@extends('backend.layouts.app')

@section('after-stylesheets')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css') }}"></script>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if(flash()->message)
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ flash()->message }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post Listing</h3>
                    <div class="card-tools">
                        <a href="{{ route('post.create') }}" class="btn btn-primary btn-md">
                            New Post
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="post-table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($post->description, 100) }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y h:i:s') }}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-info btn-xs">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <button class="btn btn-danger btn-xs btn-trash" id="{{ $post->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <script>
        $(function () {
            $('#post-table').DataTable({
                order: [
                    [3, 'desc']
                ]
            });

            $(document).on('click', '.btn-trash', function () {
                let id = $(this).attr('id')
                let self = $(this)
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                       $.ajax({
                           url: '{{ route('post.delete') }}',
                           method: "Post",
                           data: {
                               id: id,
                               _token: '{{ csrf_token() }}'
                           },
                           success: function () {
                               Swal.fire(
                                   'Deleted!',
                                   'Your file has been deleted.',
                                   'success'
                               )
                               self.parent().parent().remove()
                           },
                       })
                    }
                })
            })
        })
    </script>
@endsection

