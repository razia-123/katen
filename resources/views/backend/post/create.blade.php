@extends('layouts.backend_master')
@section('main_part')
<div class="row mt-4">
    <div class="col-12">
        <div class="Container-fluid ml-5 mr-5">
            <h2 class="text-center text-dark" >Add New Post </h2>

            <form class="row  mx-auto" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="col-lg-12">
                    <div class="input-style-1">
                    <label for=""> Title</label>
                    <input name="title" placeholder="title" value="{{ old('title') }}" class="form-control mb-4" type="text">
                    @error('title')
                    <p class="text-danger">{{ $message}}</p>
                              @enderror
                </div>
                </div>


                <div class="col-lg-6">
                    <div class="select-style-1">
                        <label>Category</label>
                        <div class="select-position">

                          <select name="category"id="category">
                            <option selected disabled>Select category</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                          </select>
                        </div>
                        @error('category')
            <p class="text-danger">{{ $message}}</p>
                      @enderror
                      </div>
            </div>

            <div class="col-lg-6">
                <div class="select-style-1">
                    <label>SubCategory</label>
                    <div class="select-position">
                      <select name="subcategory"id="subcategory">
                        <option selected disabled>No subcategory found!</option>


                      </select>
                    </div>
                    @error('subcategory')
            <p class="text-danger">{{ $message}}</p>
                      @enderror
                  </div>
        </div>

                <div class="col-lg-12">
                    <div class="input-style-1">
                    <label for=""> Featured_image </label>
                    <input name="featured_image"class="form-control mb-4" type="file">
                    @error('featured_image')
                    <p class="text-danger">{{ $message}}</p>
                              @enderror
                </div>

                </div>
                <div class="col-lg-12">
                    <div class="input-style-1">
                    <label for=""> Short_Description</label>
                    <textarea rows="5" name="short_description" value="{{ old('short_description') }}" placeholder="Short_Description" class="form-control mb-4"></textarea>
                    @error('short_description')
                    <p class="text-danger">{{ $message}}</p>
                              @enderror
                </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-style-1">
                    <label for=""> Description</label>
                    <textarea  id="description_editor" value="{{ old('description') }}" placeholder="Description" name="description"class="form-control mb-4"></textarea>
                    @error('description')
                    <p class="text-danger">{{ $message}}</p>
                              @enderror
                </div>
                </div>


                <div class="col-lg-12  ">
                    <div class="input-style-1">
                        <button type="submit"class="main-btn primary-btn btn-hover w-100"> Add new Post</button>
                                  </div>
                 </form>
                </div>

            </form>

        </div>



    </div>

</div>





@endsection
@push('additional.css')
<style>
.ck-editor__editable[role="textbox"] {

                min-height: 200px;}
</style>
@endpush
@push('additional.js')

<script src="{{ asset('backend/assets/js/ckeditor.js') }}"> </script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description_editor' ) )
        .catch( error => {
            console.error( error );
        } );

$('#category').on('change',function(){

    $.ajax({
        url:`{{ route('subcategory.getSubcategory') }}`,
        method: 'GET',
        data: {
             category: $(this).val()
     },
     success: function(res){



        if (res.length >0){
            let options=[`<option value="" selected disabled> Select Sub Category </option>`];
        res.forEach(function(subcategory){
   let option =`<option value="${subcategory.id}">${subcategory.name}</option>`;

      options.push(option);
            });
            $('#subcategory').html(options)
        }else{
            $('#subcategory').html(`<option selected disabled>No subcategory found!</option>`)
        }


     }
    })
   })




</script>
@endpush
@push('additional.css')
<style>
body{
    background-color:rgb(203, 239, 73);
}
</style>
@endpush

