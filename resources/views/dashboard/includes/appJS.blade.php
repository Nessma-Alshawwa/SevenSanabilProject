
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ URL('plugins/jquery/jquery.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ URL('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script src="{{ URL('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ URL('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ URL('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ URL('plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ URL('plugins/moment/moment.min.js') }}"></script>
<script src="{{ URL('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ URL('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL('dist/js/demo.js') }}"></script>

<!-- DataTables -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

{{-- Sweetalert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@stack('js')


<Script type="text/javascript">
    
  function Deletebutton(url='',id = ''){
      swal({
      title: "هل أنت متأكد؟",
      text: "عند الحذف، لا يمكنك استرجاع البيانات!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  type: "DELETE",
                  url: url+"/"+id,
                  data:  { id: id, _token: '{{csrf_token()}}' },
                  dataType: "json",
                  success: function (response) {
                      swal("تم الحذف بنجاح!", {
                          icon: "success",
                      });
                    //   $('#dataTable').dataTable().api().ajax.reload();
                  }
              })
          } else {
              swal("بياناتك في أمان ولم تحذف!");
          }
      })
  };
  function Restorebutton(url='',id = ''){
      swal({
      title: "هل أنت متأكد من استرجاع البيانات؟",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  type: "GET",
                  url: url+"/"+id,
                  data:  { id: id, _token: '{{csrf_token()}}' },
                  dataType: "json",
                  success: function (response) {
                      swal("تم الاسترجاع بنجاح!", {
                          icon: "success",
                      });
                    //   $('#dataTable').dataTable().api().ajax.reload();
                  }
              })
          } else {
              swal("بياناتك في أمان ولم تحذف!");
          }
      })
  };
  
  function Approvebutton(url='',id = ''){
      swal({
      title: "هل أنت متأكد من الموافقة؟",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  type: "POST",
                  url: url+"/"+id,
                  data:  { id: id, _token: '{{csrf_token()}}' },
                  dataType: "json",
                  success: function (response) {
                      swal("تمت الموافقة بنجاح!", {
                          icon: "success",
                      });

                  }
              })
          }
      })
  };
  function Rejectbutton(url='',id = ''){
      swal({
      title: "هل أنت متأكد من الرفض؟",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  type: "DELETE",
                  url: url+"/"+id,
                  data:  { id: id, _token: '{{csrf_token()}}' },
                  dataType: "json",
                  success: function (response) {
                      swal("تم الرفض !", {
                          icon: "success",
                      });

                  }
              })
          }
      })
  };
</Script>
