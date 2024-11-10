@extends('admin.layouts.app')

@section('title')
<title>
    edit Product
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
                edit Product
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
                      edit Product
                    </h3>
                    <br>
                    @if (Session::has('success'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                      <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                          <p class="font-bold">Success</p>
                          <p class="text-sm">{{Session::get('success')}}</p>
                        </div>
                      </div>
                    </div>
                            @endif
                  </div>
                  <form method="POST" action="{{route('admin.products.update' , $product->product_id)}}" enctype="multipart/form-data" >
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
                            value="{{$product->name}}"
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
                            @foreach ($categories as $category)
                            <option value="{{$category->category_id}}" {{$category->category_id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
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
                            value="{{$product->price}}"
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
                              value="{{$product->stock}}"
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
                        >{{$product->description}}</textarea>
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
                        value="{{$product->image}}"
                        class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
                      />
                    </div>
                    <br>

                    <button
                    class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
                    type="submit"
                  >
                    Save Product
                    </button>
                  </form>
                </div>
              </div>

              <div class="flex flex-col gap-9">
               
              </div>
            </div>
          </div>
        </main>

@endsection