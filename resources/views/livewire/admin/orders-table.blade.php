<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">

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
    <div class="col-span-1 flex items-center">
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
        <p class="text-sm font-medium text-black dark:text-white">{{ $order->ord_id }}</p>
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
    <div class="col-span-1 flex items-center">
      <p class="text-sm font-medium text-black dark:text-white">{{ $order->created_at}}</p>
    </div>
    <div class="col-span-1 flex items-center">
      <div class="flex gap-2">
        <a href="" class="text-primary hover:text-primary-dark">
          <i class="bi bi-pencil-square"></i>
        </a>
        <a order_id="{{$order->order_id}}" id="delete_btn" class="text-red-500 hover:text-red-700">
          <i class="bi bi-trash3"></i>
        </a>
      </div>
  </div>
  </div>
  @endforeach
</div>
