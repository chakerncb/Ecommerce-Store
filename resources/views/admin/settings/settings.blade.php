@extends('admin.layouts.app')

@section('content')
        <main>
          <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
              <!-- Breadcrumb Start -->
              <div
                class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
              >
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                  Account Settings 
                </h2>
              </div>
              <!-- Breadcrumb End -->

              <!-- ====== Settings Section Start -->
               @livewire('admin.settings-page')
          
          </div>
        </main>
@endsection

@section('scripts')

<script>

var open = document.getElementById('reset-pass');
var passForm = document.getElementById('passForm');

open.addEventListener('click', () => {
  if (passForm.style.display === 'block') {
    passForm.style.display = 'none';
  } else {
    passForm.style.display = 'block';
  }
});

</script>
@endsection