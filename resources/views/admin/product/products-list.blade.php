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

            <!-- New Product Form Start -->
            <div class="hidden mt-6 product-form"  id="myForm" >
              <div class="mt-4">
                @livewire('admin.add-product')
              </div>
            </div>
            <!-- New Product Form End -->
</main>

@endsection

@section('scripts')

<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }

</script>
@endsection