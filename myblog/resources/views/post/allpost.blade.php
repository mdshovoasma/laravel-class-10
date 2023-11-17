@extends('layouts.backendLayout')

@section('backend')
{{-- @dd($editecategory->id); --}}


<div class="container">
    <div class="row">
    
<table class="table">
    <thead >
        <tr>
            <th>#</th>
            <th>Post title</th>
            <th>img</th>
            <th>contant</th>
            <th>valu</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($posts as $post)
             <tr>
            <td>#</td>
            <td>{{$post->title}}</td>
            <td>
                <img width="100px" src="{{asset('storage/'.$post->future_img)}}" alt="post img">
            </td>
            <td>{{$post->contant}}</td>
            <td><input class="value"  value="{{$post->is_populer}}" type="text"></td>
            
            <td><i class=" activepost {{$post->is_populer==1?'fa-solid ':'fa-regular'}} fa-star  text-primary"> 
                 
                <div class="d-none">
                    {{$post->is_populer}} 
                </div>
            
            
            </i>
              
            </td>
           
        </tr>
      
        @endforeach 

       
    </tbody>
</table>
       

       
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

        
       
    //     function handleClick(e){
    //     console.log(e);
    //    return 'hello';
     

    //     }
    //     console.log(a);


     


        // ajax
        //ajax ar modda sb gulo (:)colon dea likta hoi

     
       
        

        $(document).ready(function () {
      $(".activepost").click(function(){
       
       $.ajax({
        url:`{{Route('post.active')}}`,
        methode:'GET',
        data:{
            number: $(this).text()
        },
        
        success:function(data){
           
        //  data.forEach(element => {
            
        // console.log(element.is_populer);

            
        //  });

        console.log(data);
          



        }
    
       })
        
        });
     
        
    });
       
</script>





    
@endpush
