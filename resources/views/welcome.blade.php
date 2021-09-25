@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Payments') }}</div>

                    <div class="card-body">
                        <div class="row" style="margin-top: 5rem;">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Laravel 8 CRUD Example from scratch - laravelcode.com</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('payments') }}"> Create New Post</a>
                                </div>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $value->code }}</td>
                                    <td>{{ \Str::limit($value->name, 100) }}</td>
                                    <td>
                                        <form action="{{ route('payments', $value->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('payments', $value->id) }}">Show</a>
                                            <a class="btn btn-primary"
                                                href="{{ route('payments', $value->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
