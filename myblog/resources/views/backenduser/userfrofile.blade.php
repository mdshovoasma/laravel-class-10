@extends('layouts.backendlayout')

@section('backend')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h1>profile</h1>
                </div>
                <div class="card-body">
                    <form action="{{Route('profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input value="{{auth()->user()->name}}" name="name" class="form-control my-2" type="text"placeholder="user name">
                        @error('name')
                        <span class="text-danger">{{ $message}}</span>
                            
                        @enderror
                    <input  value="{{auth()->user()->email}}" name="email" class="form-control my-2" type="email" placeholder="Your Email">
                    @error('email')
                    <span class="text-danger">{{ $message}}</span>
                        
                    @enderror
                    <label for="" class="d-block my-2" >
                        Yor profile img
                        <input name="profile-img" class="d-block my-2"  type="file">
                        
                    
                    </label>
                    @error('profile-img')
                        <span class="text-danger">{{$message}}</span> <br>
                            
                        @enderror
                    <button class="btn btn-primary">updated password</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1>Password</h1>
                </div>
                <form action="{{ route("password.update")}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input name="old" class="form-control my-2"  type="password" placeholder="Old password">
                      @error('old')
                      <span class="text-danger">{{ $message }} </span>
                           
                      @enderror



                        <input name="password" class=" form-control my-2" type="password" placeholder="new password">
                        @error('password')
                        <span class="text-danger">{{ $message }} </span>
                             
                        @enderror
                        <input name="password_confirmation" class=" form-control my-2" type="password" placeholder="Conform password">
                        {{-- password_confarmation dela new password ar conform password akrokom kina ta daka --}}
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }} </span>
                             
                        @enderror
                        <button class="btn btn-primary my-2">updated password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection