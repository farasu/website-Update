
@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header pb-1 bg-light">
            <h6>Upload New Image in ANMC's Webiste</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('store_gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <label for="caption" class="mt-3 ml-2 text-primary">Caption</label>
                        <input type="text" name="caption" id="caption" class="form-control my-2"
                        placeholder="Enter the image caption...">
                    </div>
                    <div class="form-group ">
                        <label for="image" class="mt-3 ml-2 text-primary">تصویر مورد نظر را انتخاب کنید</label>
                        <input type="file" name="image" id="image" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary my-2 float-start">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()