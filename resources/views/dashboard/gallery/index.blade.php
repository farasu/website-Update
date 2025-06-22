@extends('dashboard')

@section('content')
    <div class="col-md-12 mt-2">
        <h1>List of News</h1>
        <div class="float-end btn-create">
            <a href="{{ route('create_gallery') }}" class="btn btn-primary float-end my-2">
                <i class="bi bi-plus-circle-dotted"></i> Upload New Image
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-responsive-md table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Caption</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    @foreach($data as $info)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $info->caption }}</td>
                        <td>
                            <form action="{{ route('delete_gallery', $info->id )}}" method="post">
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