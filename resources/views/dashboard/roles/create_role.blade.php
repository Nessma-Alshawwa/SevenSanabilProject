@extends('dashboard.layout.main')
@section('MainContent')

<!-- contacts-5-grid -->
<div class="w3l-contact-10 py-5" id="contact">
    <div class="form-41-mian pt-lg-4 pt-md-3 pb-md-4">
        <div class="container">
            <div class="row">
                <div class="col-12 form-inner-cont">
                    @if (session()->has('add_status'))
                        @if (session('add_status'))
                            <div class="alert alert-success">SECCESS</div>
                        @else
                            <div class="alert alert-danger">FAILD</div>
                        @endif
                    @endif
                    <form action="{{URL('/dashboard/roles/store')}}" method="POST" class="signin-form" enctype="multipart/form-data" id="Add-New-Role">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group form-input">
                            <input type="text" name="name" id="w3lName" class="form-control" placeholder="اسم الرول*"
                                required="" />
                        </div>
                        <div class="form-group form-input">
                            <input type="text" name="permission" id="w3lName" class="form-control" placeholder="permission*"
                                required="" />
                        </div>
                        <div class="form-group form-input">
                            <input type="text" name="user_level_id" id="w3lName" class="form-control" placeholder="user_level_id *"
                                required="" />
                        </div>
                        <div class="form-group form-input">
                            <input type="text" name="committee_id" id="w3lName" class="form-control" placeholder="committee_id*"
                                 />
                        </div>
                        <div class="form-group form-input">
                            <input type="text" name="donor_id" id="w3lName" class="form-control" placeholder="donor_id*"
                                 />
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" id="save-button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop