@extends('backend.layouts.app')

@section('after-stylesheets')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       id="inputEmail3"
                                       placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                            <textarea class="form-control"
                                      name="description"
                                      rows="2"
                                      placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-primary btn-md">New Post</button>
                                <button class="btn btn-default btn-md">
                                    Back
                                </button>
                            </div>
                        </div>
                    </form>
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

    <script>
        $(function () {
            $('#post-table').DataTable();
        })
    </script>
@endsection

