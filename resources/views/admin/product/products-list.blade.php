@extends('admin.layouts.app')

@section('title')
<title>
    Products List
</title>
@endsection


@section('content')
        <main>
          <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div
              class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
            >
              <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Products List
              </h2>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Table Section Start -->
              <!-- ====== Table Two Start -->
            @livewire('admin.products-table')
              <!-- ====== Table Two End -->
</main>

@endsection

@section('scripts')

<script>
  $(document).on('click', '#delete_btn', function(e){
 e.preventDefault();
 console.log('delete');
 var product_id = $(this).attr('product_id');
 $.ajax({
     type: "POST",
     url: "{{route('admin.products.delete')}}",
     data: {
         product_id: product_id,
         _token: "{{csrf_token()}}"
     },
     success: function (response) {
         if(response.status == true){
             alert(response.message);
             $('.row'+product_id).remove();
         }else{
             alert(response.message);
         }
     }
 });
});
</script>

@endsection