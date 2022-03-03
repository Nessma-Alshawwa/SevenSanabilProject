<div class="row justify-content-center">
    @if(Auth::user()->id !== $user->id)
        <a href="{{ URL('/dashboard/user/edit/'. $user->id ) }}" type="button" data-value="{{ $user->id }}" class="btn btn-primary btn-sm text-white m-2">
            <i class="fas fa-folder"></i>  تعديل
        </a>
        @if($user->deleted_at == null)
            <a href="javascript:void(0)" type="button" data-value="{{ $user->id }}" class="deletebutton btn btn-danger btn-sm text-white m-2">
                <i class="fas fa-trash"></i>  حذف
            </a>
        @else
            <a href="javascript:void(0)" type="button" data-value="{{ $user->id }}" class="restorebutton btn btn-warning btn-sm text-white m-2">
                <i class="fa-solid fa-trash-undo"></i>  استرجاع
            </a>
        @endif
           
    @else
        <a>لا يوجد أي اجراءات</a>
    @endif
</div>