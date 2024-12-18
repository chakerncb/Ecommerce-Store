@extends('admin.layouts.app')

@section('title')
<title>
    Brands List
</title>
@endsection

@section('content')
<main>
  <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <!-- Breadcrumb Start -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
      <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Brands List
      </h2>
    </div>
    <!-- Breadcrumb End -->

    <!-- ====== Table Section Start -->
    <div class="flex flex-col gap-10">
      <!-- ====== Table Two Start -->
      @livewire('admin.BrandsTable')
    </div>
    <!-- ====== Table Section End -->

  </div>
</main>
@endsection

@section('scripts')
<script>

$(document).on('click', '#save', function(e){
      e.preventDefault();
      var formData = new FormData($('#brandForm')[0]);

    $.ajax({
      type: "POST",
      url: "{{ route('admin.brands.create') }}",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if(response.message){
          $('#brandForm')[0].reset();
          alert(response.message);
        }
      },
      error: function (response) {
        var errors = response.responseJSON.errors;
        if(errors && errors.name){
          $('#name').addClass('border-red-500');
          $('#name').siblings('.text-red-500').text(errors.name[0]);
        }
        if(errors && errors.description){
          $('#description').addClass('border-red-500');
          $('#description').siblings('.text-red-500').text(errors.description[0]);
        }
      }
    });
  });


  // $(document).on('click', '#update-btn', function(e){
  //     e.preventDefault();
  //     var formData = new FormData($('#UpdateCategoryForm')[0]);
  //     var categoryId = $(this).attr('categoryId');

  //   $.ajax({
  //     type: "POST",
  //     url: "{{ route('admin.categories.update') }}",
  //     data: formData,
  //     processData: false,
  //     contentType: false,
  //     success: function (response) {
  //       if(response.message){
  //         $('#UpdateCategoryForm')[0].reset();
  //         alert(response.message);
  //       }
  //     }//,
  //     // error: function (response) {
  //     //   var errors = response.responseJSON.errors;
  //     //   if(errors && errors.name){
  //     //     $('#name').addClass('border-red-500');
  //     //     $('#name').siblings('.text-red-500').text(errors.name[0]);
  //     //   }
  //     //   if(errors && errors.description){
  //     //     $('#description').addClass('border-red-500');
  //     //     $('#description').siblings('.text-red-500').text(errors.description[0]);
  //     //   }
  //     // }
  //   });
  // });


  document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
      var alertMessages = document.querySelectorAll('.alert-message');
      alertMessages.forEach(function(alert) {
        alert.style.display = 'none';
      });
    }, 3000);
  });

  var openFormBtn = document.getElementById("open-form-btn");
  openFormBtn.onclick = function () {
    var popupForm = document.getElementById("popup-form");
    popupForm.style.display = "block";
  };

  var closeFormBtn = document.getElementById("close-form-btn");
  closeFormBtn.onclick = function () {
    var popupForm = document.getElementById("popup-form");
    popupForm.style.display = "none";
  };

</script>
@endsection