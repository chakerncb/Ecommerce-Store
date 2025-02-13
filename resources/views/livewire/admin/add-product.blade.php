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
        <form id="Pform" enctype="multipart/form-data">
          @csrf
          <div class="p-6.5">
            <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
              
              <div class="w-full md:w-1/2">
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
              <div class="w-full md:w-1/2">
                <label
                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                >
                  Product Barcode
                </label>
                <input
                  type="number"
                  name="code"
                  placeholder="Enter product barcode"
                  class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                />
              </div>
              
           
            </div>

            <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">

              <div class="w-full md:w-1/2">
                <label
                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                >
                  Buying Price
                </label>
                <input
                  type="number"
                  name="main_price"
                  placeholder="Enter Buying price"
                  class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                />
              </div>
              <div class="w-full md:w-1/2">
                <label
                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                >
                  Selling Price
                </label>
                <input
                  type="number"
                  name="price"
                  placeholder="Enter Selling price"
                  class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                />
              </div>

            </div>

              <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
              
                <div class="w-full md:w-1/2">
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
              <div class="w-full md:w-1/2">
                <label
                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                >
                  Brand
                </label>
                <select
                  name="brand_id"
                  class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                >
                  <option value="">Select Brand</option>
                  @foreach($brands as $brand)
                  <option value="{{$brand->brand_id}}">{{$brand->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="w-full md:w-1/2">
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

            <div class="mb-6">
              <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Product Features
              </label>
              <table class="w-full mb-5-4">
                <tr class="flex flex-row gap-4 md:flex-row md:items-center">
                  <td class="w-full md:w-1/3">
                    <input
                      type="text"
                      name="feature_name"
                      placeholder="Example: Weight"
                      class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                    />
                  </td>
                  <td class="hidden md:block">:</td>
                  <td class="w-full md:w-1/3">
                    <input
                      type="text"
                      name="feature_descr"
                      placeholder="Example: 1.5kg"
                      class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                    />
                  </td>
                  <td class="w-full md:w-auto">
                    <button type="button" id="add_feature" class="flex items-center justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                      Add
                    </button>
                  </td>
                </tr>
              </table>
              <br>
              <table id="features_table">
              </table>
            </div>
            <div>
              <label
                class="mb-3 block text-sm font-medium text-black dark:text-white"
              >
                Attach file
              </label>
              <input
                type="file"
                name="images[]"
                multiple
                class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
              />
            </div>
            <br>
            <button
              {{-- type="submit" --}}
              class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
              id="save_product"
            >
              Save Product
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="flex flex-col gap-9">
    </div>
  </div>
