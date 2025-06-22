@extends('dashboard')

@section('content')
    <div class="col-md-12 mt-2">
        <h1>Main Services Records</h1>
        <div class="float-end btn-create">
            <a href="{{ route('create-main-service') }}" class="btn btn-primary float-end my-2">
                <i class="bi bi-plus-circle-dotted"></i> Create New Main Service
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-responsive-md table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Detail</th>
                            <th>eidt</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    @foreach($data as $info)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $info->detail }}</td>
                        <td><a href="{{ route('edit-main-service', $info->id )}}"><i class="bi bi-pencil-square"></i></a></td>
                        <td>
                            <form action="{{ route('delete-main-service', $info->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link"><i class="bi bi-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection