
@extends('layouts.backendLayout')

@section('backend')
{{-- @dd($editecategory->id); --}}


<div class="container">
    <div class="row">
        <div class="col-8">
            <table class="table border">
                <tr>
                    <th>#</th>
                    <th>Sub Category</th>
                    <th>Perent</th>
                </tr>
                @foreach ($substorecategory as $subcategory)
                <tr>
                    <th>#</th>
                    <th>{{$subcategory->title}}</th>
                   <th>{{$subcategory->category->title}}</th>  
                   <th>
                  
                   </th>
                </tr>
               

                    
                @endforeach

               {{-- <th>
                @foreach($storecategory->subcategores  as $category)
                <th>{{$category->title}}</th> 

             
             @endforeach
               </th> --}}
               
               
               

                  
            </table>
          

        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-title"><h3>Sub Category</h3></div>
                <div class="card-header">
                    <form action="{{Route('subcategory.store')}}" method="post" >
                        @csrf
                        @method('POST')
                        <input value="" class="form-control my-2" type="text" name="title" id="" placeholder="category name">
                        @error('title')
                        <span class="text-danger"> {{$message}} </span> <br>
                            
                        @enderror   

                        <select name="forain_id" id="" class="form-control">
                            @forelse ($categores as $key=>$category)
                            <option class="form-control  " value="{{$category->id}}">{{$category->title}}</option>
                                
                            @empty
                                
                            @endforelse

                        </select><br>


                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</div>


@endsection
