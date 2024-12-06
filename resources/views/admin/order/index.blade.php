@extends('admin.layouts.app')

@section('title')
<title>
    Orders List
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
                Orders List
              </h2>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Table Section Start -->
            <div class="flex flex-col gap-10">
              <!-- ====== Table Two Start -->

              @livewire('admin.orders-table')
  </div>
</main>

@endsection