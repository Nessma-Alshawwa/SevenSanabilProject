@extends('Website.layouts.main')
@section('MainContent')
<!-- ----------------------------------------------------------------------------------------- -->
<div class="container-fluid">
    <div class="row mb-4">
        <h3 class="text-center color1 mb-4 mt-4">
            تبرعات للاستفادة 
        </h3>
        <h2 class="text-center color1">
            -----------------------
          </h2>
    </div>
    <div class="container my-5">
        <div class="row d-flex justify-content-evenly mb-4">
            @foreach ($DonationRequests as $DonationRequest)
                <div class="col-md-3 col-sm-12">
                    <div class="card bgColor5 p-4 shadow"
                        style="hieght: 800px">
                        <img src="{{ asset($DonationRequest->image) }}"
                            class="align-self-center rounded"
                            alt="..."
                            style="width: 80%;height: 50%;">
                        <div class="card-body"
                            style="z-index: 1;">
                        <h5 class="card-title text-center color2 p-4">{{ $DonationRequest->title }}</h5>
                        <p class="text-white" >
                            {{ $DonationRequest->description }}
                        </p>
                        <a href="{{ URL('benefitNow/'. $DonationRequest->id) }}"
                            class="btn bgColor2 text-white text-center rounded-pill shadow py-3 my-3"
                            style="position: absolute; 
                                z-index: 2;right: 25%;font-weight: bold">تقديم طلب استفادة
                        </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      {!! $DonationRequests->links() !!}

    </div>
</div>
<!-- ----------------------------------------------------------------------------------------- -->
@stop