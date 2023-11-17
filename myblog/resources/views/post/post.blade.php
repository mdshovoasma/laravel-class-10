@extends('layouts.backendLayout')

@section('backend')
{{-- @dd($editecategory->id); --}}


<div class="container">
    <div class="row">
        <div class="col-8">
           <form action="{{route('post.store')}}" class="form-control my-3" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div>
                <input name="title" class="form-control my-3" type="text" placeholder="Enter your title">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div>
                <input name="postimg" class="form-control my-3" type="file">
                @error('postimg')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <select class="form-control my-3 select" name="category" id="" >
                      <option disabled selected>Seletc Category</option>

                        @foreach ($categores as $category)
                        <option class="form-control my-3" value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                        
                    </select>
                    @error('category')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-lg-6">
                    <select class="form-control subcategoryselect my-3" name="subcategory" id="">


                        {{-- @foreach ($subcategoris as $subcategory)
                        <option class="form-control my-3" value=""> {{$subcategory->title}}</option>
                        @endforeach --}}
                      
                    </select>
                    @error('subcategory')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>
            
            <textarea  class="form-control my-3"  name="contant" id="editor" >

            </textarea>
            @error('contant')
                    <span class="text-danger">{{$message}}</span> <br>
                  @enderror



            <button class="btn btn-primary my-3">submit</button>
           </form>
            

        </div>
       
    </div>
</div>


@endsection
@push('sweetalert')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    // cdk editor
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );




        // ajax
        //ajax ar modda sb gulo (:)colon dea likta hoi
        $(document).ready(function () {
      $(".select").change(function () {
    
       $.ajax({
        url:`{{Route('subcategory.get')}}`,
        methode:'GET',
        data:{
            categoryid:$(this).val()
        },
        
        success:function($subcategory){
            let array=[];
            if($subcategory.length==0){
                let option =` <option disabled selected>no Category found</option>`
                $('.subcategoryselect').html(option);
                return false;

            }



            $subcategory.forEach(element => {
                let option =` <option value="${element.id}">${element.title}</option>`
              array.push(option);
            //   console.log(array);
                
            });

            // console.log(array);
            $('.subcategoryselect').html(array);

        }
        
        

       })
        
        
          
          
        });
     
        
    });
       
</script>



    
@endpush
