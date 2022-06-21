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
            <div class="col-md-4 col-sm-12 mb-5">
                <div class="card bgColor5 p-4 shadow"
                    style="width: 18rem;">
                    <img src="{{ asset('app/'.$DonationRequest->image) }}"
                        class="align-self-center rounded w-80"
                        alt="..."
                        height="300" width="250">
                    <div class="card-body"
                        style="z-index: 1;">
                    <h5 class="card-title text-center color2 p-4">{{ $DonationRequest->title }}</h5>
                    <a href="{{ URL('benefitNow/'. $DonationRequest->id) }}"
                        class="btn bgColor2 text-white text-center rounded-pill shadow"
                        style="width: 50%;height:50px;position: absolute;
                               z-index: 2;right: 25%;font-weight: bold">
                    طلب استفادة
                    </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center py-3">
            {!! $DonationRequests->links() !!}
          </div>

    </div>
</div>
<!-- ----------------------------------------------------------------------------------------- -->
@stop