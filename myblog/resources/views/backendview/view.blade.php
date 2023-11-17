@extends('layouts.backendLayout')

@section('backend')
{{-- @dd($editecategory); --}}


<div class="container">
    <div class="row">
        <div class="col-8">
            <table class="table border">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>

               @foreach ($category as $key=>$categoryitem)
               <tr>
                    <td>{{$category->firstItem()+$key}} </td>
                    <td>{{$categoryitem->title}}</td>
                    <td>
                        <a href="{{Route('category.edite',$categoryitem->id)}}"><button class="btn btn-primary">Edite</button> </a>

                        <a href="#" class="btn btn-danger dltbtn">Delete</a>
                        <form action="{{ Route('category.delete',$categoryitem->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>

                </tr>
                    
                @endforeach
              
               
               

                  
            </table>
            <div>
                {{-- {{ $category ->links() }} --}}
            </div>

        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-title"><h3> Ctegory</h3></div>
                <div class="card-header">
                    <form action="{{ Route('category.store')}}" method="post" >
                        @csrf
                        @method('post')
                        <input value="" class="form-control" type="text" name="title" id="" placeholder="category name">
                        @error('title')
                        <span class="text-danger"> {{$message}} </span> <br>
                            
                        @enderror   
                        <button class="btn btn-primary my-2">Add</button>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</div>





@endsection


@push('sweetalert')
{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function(){
        $('.dltbtn').click(function(){
            
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

    $(this).next('form').submit()
    
  }
});

        })
    })

</script>

   

    
@endpush

{{-- Swal.fire({
    title: "Deleted!",
    text: "Your file has been deleted.",
    icon: "success"
  }); --}}