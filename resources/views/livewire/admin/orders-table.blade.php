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
          placeholder="Search ...."
          class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
        />
        <br>
        <button style="background-color: green;" class="flex justify-center rounded px-6 py-2 font-medium text-gray hover:bg-opacity-90" type="submit">
          Search
      </button>
      </div>
    </form>
    </div>
    <br>
</div>

<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">

  @if (session('success'))
<div class="success alert-message">
    {{ session('success') }}
</div>
 @elseif(session('error'))
    <div class="danger alert-message">
        {{ session('error') }}
    </div>
@endif

  <div class="px-4 py-6 md:px-6 xl:px-7.5 flex justify-between items-center">
    {{-- <h4 class="text-xl font-bold text-black dark:text-white">All Orders</h4> --}}
    <select wire:model="status" wire:change="filterByStatus" name="selectStatus" id="filter">
      <option  value="all">All</option>
      <option  value="pending">Pending</option>
      <option  value="completed">Completed</option>
      <option  value="cancelled">Cancelled</option>
    </select>
    <div>
        <button wire:click="loadLess"><b>&leftarrow;</b></button>
        <span class="text-black dark:text-white">{{ $page }}</span>
        <button wire:click="loadMore"><b>&rightarrow;</b></button>
    </div>
    <a href="#" class="flex items-center justify-center rounded bg-primary p-2 font-medium text-gray hover:bg-opacity-90">
      new order
    </a>
  </div>

  <div
    class="grid grid-cols-7 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5"
  >
    <div class="col-span-1 flex items-center">
      <p class="font-medium">id</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="font-medium">Buyer Name</p>
    </div>
    <div class="col-span-1 hidden items-center sm:flex">
      <p class="font-medium">status</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="font-medium">Total</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="font-medium">payment method</p>
    </div>
    <div class="col-span-2 flex items-center">
      <p class="font-medium">Date</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="font-medium">Action</p>
    </div>
  </div>


  @foreach ($subsetOrders as $order)
      <div
    class="grid row{{$order->ord_id}} grid-cols-6 border-t border-stroke px-5 py-5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5"
  >
    <div class="col-span-1 flex items-center">
        <p class="text-sm font-medium text-black dark:text-white">{{ $start++ }}</p>
    </div>
    <div class="col-span-1 flex items-center">
        <p class="text-sm font-medium text-black dark:text-white">{{ $order->shipping_fullname }}</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="text-sm font-medium text-black dark:text-white">{{ $order->status }}</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="text-sm font-medium text-black dark:text-white">{{ $order->total}} DZ</p>
    </div>
    <div class="col-span-1 flex items-center">
      <p class="text-sm font-medium text-black dark:text-white">{{ $order->payment_method}}</p>
    </div>
    <div class="col-span-2 flex items-center">
      <p class="text-sm font-medium text-black dark:text-white">{{ $order->created_at}}</p>
    </div>
    <div class="col-span-1 flex items-center">
      <div class="flex gap-2">
        <a wire:click="streamPdf('{{ $order->ord_id }}')" class="text-primary hover:text-primary-dark">
          <i class="bi bi-eye"></i>
        </a>
        <a href="javascript:window.print();" class="text-primary hover:text-primary-dark">
          <i class="bi bi-printer"></i>
        </a>
        <a href="" class="text-primary hover:text-primary-dark">
          <i class="bi bi-pencil-square"></i>
        </a>
        {{-- <link rel=alternate media=print href="storage\app\invoices\invoice_20241209_137.pdf"> --}}
        <a order_id="{{$order->order_id}}" id="delete_btn" class="text-red-500 hover:text-red-700">
          <i class="bi bi-trash3"></i>
        </a>
      </div>
  </div>
  </div>
  @endforeach
</div>
</div>