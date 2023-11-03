@extends('layouts.backendLayout')

@section('backend')

<div class="container">
    <div class="row">
        <div class="col-8">
            <table class="table border">
                <tr>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
               

                  
            </table>

        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-title"><h3>Add Ctegory</h3></div>
                <div class="card-header">
                    <form action="{{Route('category.store') }}" method="post" >
                        @csrf
                        <input class="form-control" type="text" name="title" id="" placeholder="category name">
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