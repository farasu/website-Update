@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header pb-1 bg-light">
            <h6>ANMC Introduction Form</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('update-info', $data_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group ">
                        <label for="detail_en" class="mt-3 ml-2 text-primary">Detail in English</label>
                        <textarea name="detail_en" id="detail_en" rows="3" class="form-control" 
                         >{{ $english['detail'] }}</textarea>
                    </div>
                    <div class="form-group" dir="rtl">
                        <label for="detail_fa" class="mt-3 mr-2 text-primary">معلومات به فارسی</label>
                        <textarea name="detail_fa" id="detail_fa" rows="3" class="form-control"
                        >{{ $persian['detail'] }}</textarea>
                    </div>
                    <div class="form-group" dir="rtl">
                        <label for="detail_ps" class="mt-3 mr-2 text-primary">معلومات به پشتو</label>
                        <textarea name="detail_ps" id="detail_ps" rows="3" class="form-control"
                        > {{ $pashto['detail'] }} </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary my-2 float-end">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()