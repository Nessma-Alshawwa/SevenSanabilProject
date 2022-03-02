<div class="row justify-content-center">
    @if(Auth::user()->id !== $user->id)
        <a href="javascript:void(0)" type="button" data-value="{{ $user->id }}" class="btn btn-primary btn-sm text-white m-2">
            <i class="fas fa-folder"></i>  تعديل
        </a>
        <a href="javascript:void(0)" type="button" data-value="{{ $user->id }}" class="btn btn-danger btn-sm text-white m-2">
            <i class="fas fa-trash"></i>  حذف
        </a>    
    @else
        <a>لا يوجد أي اجراءات</a>
    @endif
    
</div>