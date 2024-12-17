<div class="flex flex-col gap-10">

    {{-- <div
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
  </div> --}}
  
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
      <h4 class="text-xl font-bold text-black dark:text-white">All Categories</h4>
      {{-- <select wire:model="status" wire:change="filterByStatus" name="selectStatus" id="filter">
        <option  value="all">All</option>
        <option  value="pending">Pending</option>
        <option  value="completed">Completed</option>
        <option  value="cancelled">Cancelled</option> --}}
      </select>
      <div>
          <button wire:click="loadLess"><b>&leftarrow;</b></button>
          <span class="text-black dark:text-white">{{ $page }}</span>
          <button wire:click="loadMore"><b>&rightarrow;</b></button>
      </div>
      <a id="open-form-btn" class="flex items-center justify-center rounded bg-primary p-2 font-medium text-gray hover:bg-opacity-90">
        new category
      </a>
    </div>
  
    <div
      class="grid grid-cols-7 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5"
    >
      <div class="col-span-1 flex items-center">
        <p class="font-medium">id</p>
      </div>
      <div class="col-span-2 flex items-center">
        <p class="font-medium">Category Name</p>
      </div>
      <div class="col-span-4 hidden items-center sm:flex">
        <p class="font-medium">description</p>
      </div>
      <div class="col-span-1 flex items-center">
        <p class="font-medium">Action</p>
      </div>
    </div>
  
    @foreach ($categories as $Category)
        <form
        id="UpdateCategoryForm{{$Category->category_id}}"
      class="grid row{{$Category->category_id}} grid-cols-6 border-t border-stroke px-5 py-5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5"
    >
    @csrf
      <div class="col-span-1 flex items-center">
          <p class="text-sm font-medium text-black dark:text-white">{{$Category->category_id}}</p>
      </div>
      <div class="col-span-2 flex items-center">
          <input name="id" type="text" value="{{$Category->category_id}}" style="display: none;">
          <input id="ctg-name{{$Category->category_id}}" name="name" value="{{$Category->name}}" class="text-sm font-medium text-black dark:text-white" readonly>
      </div>
      <div class="col-span-4 flex items-center">
        <input id="ctg-desc{{$Category->category_id}}" name="description" value="{{$Category->description}}" class="text-sm font-medium text-black dark:text-white" readonly>
      </div>
      <div class="col-span-1 flex items-center">
        <div class="flex gap-2">
          <a wire:click.prevent="updateCategory" id="update-btn{{$Category->category_id}}" class="flex items-center justify-center rounded bg-success p-2 font-medium text-gray hover:bg-opacity-90" style="display: none;">
             update
          </a>

{{-- #FIXME : fix the edit method disabled after i click the update button --}}

          <a id="edit-ctg{{$Category->category_id}}" class="text-primary hover:text-primary-dark">
            <i class="bi bi-pencil-square"></i>
          </a>
          <a wire:click.prevent="delete({{$Category->category_id}})" class="text-red-500 hover:text-red-700">
            <i class="bi bi-trash3"></i>
          </a>
        </div>
    </form>
    </div>
    @endforeach
  </div>


  <div id="popup-form" class="popup-form">
    <div class="form-content">
      <span class="close-btn" id="close-form-btn">&times;</span>
      <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <form id="CategoryForm">
          @csrf
          <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
            <h3 class="font-medium text-black dark:text-white">
              New Category :
            </h3>
          </div>
          <div class="flex flex-col gap-5.5 p-6.5">
            <div>
              <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Category Name
              </label>
              <input name="name" type="text" placeholder="Enter your first name" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary @error('name') border-red-500 @enderror" id="name" />
              @error('name')
              <span class="text-red-500">{{ $message }}</span>
              @enderror
                
            </div>
            <div>
              <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Description
              </label>
              <input name="description" type="text" placeholder="Enter your last name" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary @error('description') border-red-500 @enderror" id="description" />
              @error('description')
              <span class="text-red-500">{{ $message }}</span>
              @enderror
                
            </div>
          </div>
          <div class="flex justify-end p-6.5">
            <button id="save" class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  </div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[id^="edit-ctg"]').forEach(function(editBtn) {
      editBtn.addEventListener('click', function() {
        var row = this.closest('.grid');
        var categoryId = row.querySelector('input[name="id"]').value;
        var nameInput = row.querySelector('#ctg-name' + categoryId);
        var descInput = row.querySelector('#ctg-desc' + categoryId);
        var updateBtn = row.querySelector('#update-btn' + categoryId);

        nameInput.removeAttribute('readonly');
        descInput.removeAttribute('readonly');
        updateBtn.style.display = 'block';
      });
    });

    document.querySelectorAll('[id^="update-btn"]').forEach(function(updateBtn) {
      updateBtn.addEventListener('click', function(e) {
        e.preventDefault();
        var categoryId = this.id.replace('update-btn', '');
        var formData = new FormData(document.getElementById('UpdateCategoryForm' + categoryId));

        $.ajax({
          type: "POST",
          url: "{{ route('admin.categories.update') }}",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            if(response.message){
              document.getElementById('UpdateCategoryForm' + categoryId).reset();
              alert(response.message);
            }
          },
          error: function (response) {
            var errors = response.responseJSON.errors;
            if(errors && errors.name){
              $('#ctg-name' + categoryId).addClass('border-red-500');
              $('#ctg-name' + categoryId).siblings('.text-red-500').text(errors.name[0]);
            }
            if(errors && errors.description){
              $('#ctg-desc' + categoryId).addClass('border-red-500');
              $('#ctg-desc' + categoryId).siblings('.text-red-500').text(errors.description[0]);
            }
          }
        });

        updateBtn.style.display = 'none';
      });
    });
  });
</script>