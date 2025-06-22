
@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header pb-1 bg-light">
            <h6>Add a New Advertisement in ANMC's Webiste</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('store_advertisement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <label for="title_en" class="mt-3 ml-2 text-primary">Title in English</label>
                        <input type="text" name="title_en" id="title_en" class="form-control my-2"
                        placeholder="Enter the advertisement title...">
                    </div>
                    <div class="form-group ">
                        <label for="detail_en" class="mt-3 ml-2 text-primary">Detail in English</label>
                        <textarea name="detail_en" id="detail_en" rows="3" class="form-control"
                        placeholder="Enter the detail in English here!"
                        ></textarea>
                    </div>
                    <div class="form-group " dir="rtl">
                        <label for="title_fa" class="mt-3 ml-2 text-primary">موضوع به فارسی</label>
                        <input type="text" name="title_fa" id="title_fa" class="form-control my-2"
                        placeholder="تایتل موضوع را به فارسی وارید کنید">
                    </div>
                    <div class="form-group" dir="rtl">
                        <label for="detail_fa" class="mt-3 mr-2 text-primary">معلومات به فارسی</label>
                        <textarea name="detail_fa" id="detail_fa" rows="3" class="form-control"
                        placeholder="معلومات خویش را اینجا وارید کنید!"
                        ></textarea>
                    </div>
                    <div class="form-group " dir="rtl">
                        <label for="title_ps" class="mt-3 ml-2 text-primary">موضوع به پشتو</label>
                        <input type="text" name="title_ps" id="title_ps" class="form-control my-2"
                        placeholder="تایتل موضوع را به پشتو وارید کنید">
                    </div>
                    <div class="form-group" dir="rtl">
                        <label for="detail_ps" class="mt-3 mr-2 text-primary">معلومات به پشتو</label>
                        <textarea name="detail_ps" id="detail_ps" rows="3" class="form-control"
                        placeholder="معلومات خویش را به پشتو وارید کنید!"
                        ></textarea>
                    </div>
                    <div class="form-group " dir="rtl">
                        <label for="img" class="mt-3 ml-2 text-primary">تصویر مورد نظر را انتخاب کنید</label>
                        <input type="file" name="img" id="img" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary my-2 float-end">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()