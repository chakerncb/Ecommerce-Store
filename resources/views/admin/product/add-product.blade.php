@extends('admin.layouts.app')

@section('title')
<title>
    Add Product
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
                Add Product
              </h2>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Form Layout Section Start -->
            <div class="grid ">
              <div class="p-5">

                <!-- new product Form -->
                <div
                  class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
                >
                  <div
                    class="border-b border-stroke px-6.5 py-4 dark:border-strokedark"
                  >
                    <h3 class="font-medium text-black dark:text-white">
                      New Product
                    </h3>
                  </div>
                  <form id="Pform">
                    @csrf
                    <div class="p-6.5">
                      <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                          <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                          >
                            Product Name
                          </label>
                          <input
                            type="text"
                            name="name"
                            placeholder="Enter product name"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                          />
                        </div>
                      </div>

                      <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                          <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                          >
                            Category
                          </label>
                          <select
                            name="category_id"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                          >
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->category_id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        </div>

                      <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                          <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                          >
                            Product Price
                          </label>
                          <input
                            type="number"
                            name="price"
                            placeholder="Enter product price"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                          />
                        </div>

                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                          <div class="w-full xl:w-1/2">
                            <label
                              class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                              Quantity
                            </label>
                            <input
                              type="number"
                              name="stock"
                              placeholder="Enter product quantity"
                              class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            />
                          </div>
                      
                    <div class="mb-6">
                      <label
                        class="mb-3 block text-sm font-medium text-black dark:text-white"
                      >
                        Product Description
                      </label>
                      <textarea
                        rows="6"
                        name="description"
                        placeholder="Enter product description"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                      ></textarea>
                    </div>
                  </div>

                    <div>
                      <label
                        class="mb-3 block text-sm font-medium text-black dark:text-white"
                      >
                        Attach file
                      </label>
                      <input
                        type="file"
                        name="image"
                        class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
                      />
                    </div>
                    <br>

                    <a
                    class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
                    id="save_product"
                  >
                    Save Product
                  </a>
                  </form>
                </div>
              </div>

              <div class="flex flex-col gap-9">
               
              </div>
            </div>
          </div>
        </main>

@endsection


@section('scripts')

<script>
  $(document).on('click', '#save_product', function(e){
      e.preventDefault();
      var formData = new FormData($('#Pform')[0]);

      $.ajax({
          type: "POST",
          enctype: 'multipart/form-data',
          url: "{{route('admin.products.store')}}",
          data: formData,
          processData: false,
          contentType: false,
          cache: false,
          success: function (response) {
              if(response.status == true){
                  $('#Pform').trigger('reset');
                  alert(response.message);
              }else{
                  alert(response.message);
              }
          },
      });
  });
</script>

@endsection