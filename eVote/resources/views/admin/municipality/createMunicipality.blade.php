@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Shto <strong>Komune</strong> 

                                                       <a href="{{url('municipalities')}}" class="btn btn-info btn-sm pull-right">Listo te gjitha</a>
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
                                                        <form action="{{url('municipalities')}}" method="post" class="form-horizontal">
                                                         @csrf
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="name" class=" form-control-label">Komuna <span class="text-danger">*</span></label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="" class="form-control">
                                                                @error('name')
                                                                 <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                            </div>
                                                                
                                                            </div>
                                                          
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="region_id" class=" form-control-label">Zgjedh Rajonin<span class="text-danger">*</span></label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="region_id" id="region_id" class="form-control">
                                                                        @foreach($regions as $region)
                                                                            <option value="{{$region->id}}">{{$region->region}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('region_id')
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