@extends('dashboard.layout.main')
@section('MainContent')

<div class="w3l-contact-10 py-5" id="contact">
    <div class="form-41-mian pt-lg-4 pt-md-3 pb-md-4">
        <div class="container">
            <div class="row">
                <div class="col-8 form-inner-cont">
                    @if (session()->has('edit_status'))
                        @if (session('edit_status'))
                            <div class="alert alert-success">SECCESS</div>
                        @else
                            <div class="alert alert-danger">FAILD</div>
                        @endif
                    @endif
                    <form action="{{URL('dashboard/role/update/'. $role->id)}}" method="post" class="signin-form" enctype="multipart/form-data" id="Add-New-Book">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- <input type="hidden" name="_method" value="PUT"> --}}
                        <div class="form-group form-input">
                            <input type="text" name="name" id="w3lName" value=" {{ $role->name }} " class="form-control" placeholder="Enter role name "
                                required="">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-style btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
