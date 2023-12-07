@extends('layouts.backend_master')
@section('main_part')

<div class="row mt-4 mx-auto ">
<div class="col-lg-8 ">
    <div class="card-style mb-30 ">
        <h6 class="mb-10">All Categories</h6>

        <div class="table-wrapper table-responsive">
          <table class="table striped-table">
            <thead>
                <tr>
                    <th>Sl.No.</th>
                    <th>
                      <h6> Name</h6>
                    </th>
                    <th>
                      <h6>Slug</h6>
                    </th>
                    <th>
                      <h6>Status</h6>
                    </th>
                    <th>
                        <h6>Action</h6>
                      </th>
                  </tr>
              <!-- end table row-->
            </thead>
            <tbody>
@forelse ( $categories as $key=> $category )
<tr>
    <td>
      <h6 class="text-sm">#{{ $categories->firstItem()+$key }}</h6>
    </td>
    <td>
      <p>{{ $category->name }}</p>
    </td>
    <td>
      <p>{{ $category->slug }}</p>
    </td>
    <td>
     <div class="form-check form-switch toggle-switch">
        <input class="form-check-input" type="checkbox" id="toggleSwitch2"{{ $category->status ?'checked':'' }}>

      </div>
    </td>
    <td class="d-flex" >
        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning btn-hover"><i class="fas fa-edit"></i></a>

       <button class="btn  btn-sm btn-danger btn-hover delete_btn">
        <i class="fas fa-trash"></i>
    </button>
 <form  action="{{ route('category.delete', $category->id)}}"method="POST">
        @csrf
        @method('DELETE')

       </form>
    </td>
  </tr>
@empty
<tr>
    <td colspan="5"class="text-center text-danger"><strong>No Data Found</strong></td>
</tr>
@endforelse
              <!-- end table row -->

              <!-- end table row -->
            </tbody>
          </table>
          <!-- end table -->
        </div>
<div>
{{ $categories->links() }}
</div>
      </div>
</div>
<div class="col-lg-4">
    <div class="card-style mb-30">
        <h6 class="mb-25">{{ isset($editData)? 'Update' :'Create new' }} Category</h6>
       <form action=" {{ isset($editData)? route('category.update',$editData->id) : route('category.store') }}" method="POST">
        @isset($editData)
@method('PUT')
        @endisset

        @csrf
        <div class="input-style-1">
            <label>Category Name</label>
            <input type="text" placeholder="Category Name"name="name"value="{{ isset($editData)? $editData->name :'' }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
                        @enderror
          </div>
          <div class="input-style-1">
              <button type="submit"class="main-btn primary-btn btn-hover w-100">{{ isset($editData)? 'Update' :'Create new' }} Category</button>
                        </div>
       </form>

      </div>
</div>
</div>
@endsection
@push('additional.css')
<style>
body{
    background-color:rgb(215, 171, 193);
}
</style>
@endpush
@push('additional.js')
<script src="{{ asset('backend/assets/js/sweetalert2@11.js')}}"></script>
<script>
    $('.delete_btn').on('click' , function(){
        Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
$(this).next('form').submit();
      }
    });
    })
    </script>
@endpush
