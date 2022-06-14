@extends('Website.layouts.main')
@section('MainContent')
<!-- ----------------------------------------------------------------------------------------- -->
<div class="container-fluid">
    <div class="row mb-4">
        <h3 class="text-center color1 mb-4 mt-4">
            تبرع بالأثاث
        </h3>
    </div>
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" style="font-size: 22px" id="donate-tab" data-toggle="tab" href="#donate" role="tab" aria-controls="donate" aria-selected="true">طلبات التبرع</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="font-size: 22px" id="benefit-tab" data-toggle="tab" href="#benefit" role="tab" aria-controls="benefit" aria-selected="false">طلبات الاستفادة</a>
            </li>
        </ul>
    </div>
    
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="donate" role="tabpanel" aria-labelledby="donate-tab">...</div>
        <div class="tab-pane fade" id="benefit" role="tabpanel" aria-labelledby="benefit-tab">
            <div class="container my-5">
                <div class="row d-flex justify-content-evenly mb-4">
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f1.jpg') }}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">ستائر غرفة نوم</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                            طلب استفادة
                            </a>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title color1" id="exampleModalLabel">
                                 طلب استفادة
                               </h5>
                             </div>
                             <div class="modal-body">
                               <form>
                                 <div class="mb-3">
                                   <label class="form-label color1">اسم المستفيد</label>
                                   <input type="text" class="form-control bgColor5">
                                 </div>
                                 <div class="mb-3">
                                   <label class="form-label color1">رقم الهوية</label>
                                   <input type="phone" class="form-control bgColor5">
                                 </div>
                                 <div class="mb-3">
                                   <label class="form-label color1">نوع الهاتف</label>
                                   <input type="text" class="form-control bgColor5">
                                 </div>
                                 <div class="mb-3">
                                  <label class="form-label color1">عنوان المستفيد</label>
                                  <input type="text" class="form-control bgColor5">
                                </div>
                                 <div class="row justify-content-center">
                                   <button type="submit"
                                           class="btn bgColor2 col-6 text-white rounded-pill">
                                           تقديم طلب استفادة
                                   </button>
                                 </div>
                               </form>
                             </div>
                             <div class="modal-footer">
                               <button type="button" class="btn bgColor2 text-white">تأكيد</button>
                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                             </div>
                           </div>
                         </div>
                       </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f2.jpg') }}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">أريكة غرفة معيشة</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold">
                            طلب استفادة
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f4.jpg') }}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">سرير اطفال</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold">
                            طلب استفادة
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="row d-flex justify-content-evenly mb-4">
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f1.jpg') }}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">ستائر غرفة نوم</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold">
                            طلب استفادة
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f2.jpg') }}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">أريكة غرفة معيشة</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold">
                            طلب استفادة
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f4.jpg') }}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">سرير اطفال</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold">
                            طلب استفادة
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="row d-flex justify-content-evenly mb-4 pb-5">
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f1.jpg') }}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">ستائر غرفة نوم</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold">
                            طلب استفادة
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f2.jpg')}}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">أريكة غرفة معيشة</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold">
                            طلب استفادة
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bgColor5 p-4 shadow"
                            style="width: 18rem;">
                            <img src="{{ asset('dist/img/f4.jpg') }}"
                                class="align-self-center rounded"
                                alt="..."
                                style="width: 80%;height: 50%;">
                            <div class="card-body"
                                style="z-index: 1;">
                            <h5 class="card-title text-center color2 p-4">سرير اطفال</h5>
                            <p class="text-white">
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                            </p>
                            <a href="#"
                                class="btn bgColor2 text-white text-center rounded-pill shadow"
                                style="width: 50%;height:50px;position: absolute;
                                       z-index: 2;right: 25%;font-weight: bold">
                            طلب استفادة
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
      </div>
    
</div>
<!-- ----------------------------------------------------------------------------------------- -->
@stop