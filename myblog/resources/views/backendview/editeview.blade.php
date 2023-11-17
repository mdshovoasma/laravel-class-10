@extends('layouts.backendLayout')

@section('backend')
{{-- @dd($editecategory->id); --}}


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

                       {{-- <a href=""> <button class="btn btn-primary">Delete</button></a> --}}
                        {{-- <form action="" method="post">
                            @csrf 
                            @method('delete')

                        </form> --}}


                    </td>
                </tr>
                    
                @endforeach
              
               
               

                  
            </table>
            <div id="hello">
                {{ $category ->links() }}
            </div>

        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-title"><h3>Edite Category</h3></div>
                <div class="card-header">
                    <form action="{{ route('category.Update',$editecategory->id)}}" method="post" >
                        @csrf
                        @method('PUT')
                        <input value="{{$editecategory->title}}" class="form-control" type="text" name="title" id="" placeholder="category name">
                        @error('title')
                        <span class="text-danger"> {{$message}} </span> <br>
                            
                        @enderror   
                        <button class="btn btn-primary my-2">Update</button>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</div>


@endsection
