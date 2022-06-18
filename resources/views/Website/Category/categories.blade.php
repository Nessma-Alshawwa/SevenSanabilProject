@extends('Website.layouts.main')
@section('MainContent')
<!-- ----------------------------------------------------------------------------------------- -->
<div class="container">
    <div class="row py-3">
      <h2 class="text-center color1">فئات التبرع</h2>
      <h2 class="text-center color1">
        -----------------------
      </h2>
    </div>
    <div class="row justify-content-evenly py-3">
        @foreach ($categories as $category)
            <div class="col-4 rounded-pill my-5">
                <h5 class="text-center shadow rounded-pill py-3 color1">{{$category->name}}</h5>
                <div style="height:400px" class="py-2">
                    <img 
                    src="{{ asset('app/'.$category->image) }}"
                    alt=""
                    class=""
                    width="100%"
                    height="100%"
                    style="border-bottom-left-radius: 8%;
                        border-top-right-radius: 8%"
                    >
                    <div class="d-flex justify-content-evenly pt-2">
                        <a href="{{ URL('/categories/show/'.$category->id) }}"
                        class="btn btn-style btn-primary"
                            >
                            تصفح
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center pt-5 mt-5">
            {!! $categories->links() !!}
        </div>
    </div>
    
</div>
<!-- ----------------------------------------------------------------------------------------- -->
@stop