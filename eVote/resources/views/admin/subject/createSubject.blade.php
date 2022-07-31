@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Shto <strong>Subjekt Politike</strong> 

                                                       <a href="{{url('subjects')}}" class="btn btn-info btn-sm pull-right">Listo te gjitha</a>
                                                    </div>
                                                    <div class="card-body card-block">
                                                    @if(Session::has('message'))
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Sukses! </strong> {{Session::get('message')}}
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @endif
                                                        <form action="{{url('subjects')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                         @csrf

                                                                 <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="number_id" class=" form-control-label">Zgjidhni Numrin <span class="text-danger">*</span></label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="number_id" id="number_id" class="form-control">
                                                                        @foreach($numbers as $number)
                                                                            <option value="{{$number->id}}">{{$number->number}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('number_id')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            <div class="row form-group">  
                                                            <div class="col col-md-3"><label for="name" class=" form-control-label">Subjekti <span class="text-danger">*</span></label></div> 
                                                             <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="" class="form-control">
                                                                @error('name')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            </div>

                                                            <div class="row form-group">  
                                                            <div class="col col-md-3"><label for="abbreviation" class=" form-control-label">Shkurtesa <span class="text-danger">*</span></label></div> 
                                                             <div class="col-12 col-md-9"><input type="text" id="abbreviation" name="abbreviation" placeholder="" class="form-control">
                                                                @error('abbreviation')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                 @enderror
                                                            </div>
                                                            </div>

                                                            <div class="row form-group">  
                                                            <div class="col col-md-3"><label for="slogan" class=" form-control-label">Sllogani <span class="text-danger">*</span></label></div> 
                                                             <div class="col-12 col-md-9"><input type="text" id="slogan" name="slogan" placeholder="" class="form-control">
                                                                @error('slogan')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                  @enderror
                                                            </div>
                                                            </div>

                                                            <div class="row form-group">  
                                                            <div class="col col-md-3"><label for="description" class=" form-control-label">Pershkrimi <span class="text-danger">*</span></label></div> 
                                                             <div class="col-12 col-md-9"><textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                                                 @error('description')
                                                                      <p class="text-danger">{{$message}}</p>
                                                                 @enderror
                                                            </div>
                                                            </div>

                                                            <div class="row form-group">  
                                                            <div class="col col-md-3"><label for="logo" class=" form-control-label">LLogo <span class="text-danger">*</span></label></div> 
                                                             <div class="col-12 col-md-9"><input type="file" name="logo" id="logo">
                                                           
                                                                 @error('logo')
                                                                      <p class="text-danger">{{$message}}</p>
                                                                 @enderror
                                                            </div>
                                                            </div>
                                                                    <button type="submit" class="btn btn-dark btn-sm pull-right">
                                                                        Shto
                                                                    </button>
                                                  
                                                           
                                                        </form>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                      </div>
                </div>
          </div>
    @endsection