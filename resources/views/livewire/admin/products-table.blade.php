
<div class="flex flex-col gap-10">

    <div
    class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1"
  >
    <h4 class="mb-3 text-xl font-bold text-black dark:text-white">
      Search :
    </h4>
  
    <div class="search-add-new max-w-full overflow-x-auto">
      <form wire:submit="search">
        <div class="gap-2 flex justify-between items-center">
          <input
            id="search"
            type="text"
            wire:model="searchContent"
            wire:keydown.debounce.300ms="search"
            placeholder="Search by product name ...."
            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
          />
          <br>
          <button style="background-color: green;" wire:click="search" class="flex justify-center rounded px-6 py-2 font-medium text-gray hover:bg-opacity-90" type="submit">
            Search
        </button>
        </div>
      </form>
      </div>
      <br>
  </div>

    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="px-4 py-6 md:px-6 xl:px-7.5 flex justify-between items-center">
        <select wire:model="filter" wire:change="filterByCtg" name="selectStatus" id="filter">
            <option  value="all">All</option>
            @foreach ($categories as $categorie )
                <option  value="{{$categorie->category_id}}">{{$categorie->name}}</option>
            @endforeach
          </select>
      <a onclick="openForm()" class="flex items-center justify-center rounded bg-primary p-2 font-medium text-gray hover:bg-opacity-90">
        new product
      </a>
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
        <p class="font-medium">Action</p>
      </div>
    </div>
  
  
    @foreach ($products as $product )
    <div class="grid row{{$product->product_id}} grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
      <div class="col-span-3 flex items-center">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
          <div class="h-12.5 w-15 rounded-md">
                @foreach ($product->images as $image)   
                <img src="{{URL::asset('assets/src/images/product/'.$image->path)}}" alt="Product" />
                @break
                @endforeach
          </div>
                <p class="text-sm font-medium text-black dark:text-white">
                    {{ $product->name }}
                </p>
        </div>
      </div>
        <div class="col-span-2 hidden items-center sm:flex">
            <p class="text-sm font-medium text-black dark:text-white">
            {{ $product->category_name }}
            </p>
        </div>
      <div class="col-span-1 flex items-center">
        <p class="text-sm font-medium text-black dark:text-white">{{ $product->price}} DA</p>
      </div>
      <div class="col-span-1 flex items-center">
        <p class="text-sm font-medium text-black dark:text-white">{{ $product->stock}}</p>
      </div>
      <div class="col-span-1 flex items-center">
        <div class="flex gap-2">
          <a href="{{route('admin.products.edit' , $product->product_id)}}" class="text-primary hover:text-primary-dark">
            <i class="bi bi-pencil-square"></i>
          </a>
          <a product_id="{{$product->product_id}}" id="delete_btn" class="text-red-500 hover:text-red-700">
            <i class="bi bi-trash3"></i>
          </a>
        </div>
         
    </div>
    </div>

    @endforeach

    <nav class="isolate inline-flex -space-x-px rounded-md shadow-xs" aria-label="Pagination">

    <div class="flex justify-between items-center mt-4">
      <div>
        <p class="text-sm text-gray-700 dark:text-gray-300">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }}</p>
      </div>
      <div>
        <nav class="flex justify-end">
          {{ $products->links() }}
        </nav>
      </div>
    </div>
  </nav>
    <br>
    <br>
  </div>

</div>