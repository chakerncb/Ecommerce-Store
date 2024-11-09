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
            <div class="flex flex-col gap-10">
              <!-- ====== Table Two Start -->
              <div
  class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
>
  <div class="px-4 py-6 md:px-6 xl:px-7.5">
    <h4 class="text-xl font-bold text-black dark:text-white">Top Products</h4>
  </div>

  <div
    class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5"
  >
    <div class="col-span-3 flex items-center">
      <p class="font-medium">Product Name</p>
    </div>
    <div class="col-span-2 hidden items-center sm:flex">
      <p class="font-medium">Category</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="font-medium">Price</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="font-medium">Stock</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="font-medium">Profit</p>
    </div>
  </div>


  @foreach ($products as $product )
      <div
    class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5"
  >
    <div class="col-span-3 flex items-center">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
        <div class="h-12.5 w-15 rounded-md">
          <img src="{{URL::asset('assets/src/images/product/'.$product->image)}}" alt="Product" />
        </div>
        <p class="text-sm font-medium text-black dark:text-white">
          {{ $product->name }}
        </p>
      </div>
    </div>
    <div class="col-span-2 hidden items-center sm:flex">
      <p class="text-sm font-medium text-black dark:text-white">Electronics</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="text-sm font-medium text-black dark:text-white">{{ $product->price}} DZ</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="text-sm font-medium text-black dark:text-white">{{ $product->stock}}</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="text-sm font-medium text-meta-3">$45</p>
    </div>
  </div>
  @endforeach
  
  </div>
</div>


              <!-- ====== Table Two End -->

          </div>
        </main>

@endsection