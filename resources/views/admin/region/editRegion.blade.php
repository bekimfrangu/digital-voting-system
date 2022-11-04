@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Modifiko <strong>{{$region->region}}</strong> 

                                                       <a href="{{url('regions')}}" class="btn btn-info btn-sm pull-right">Listo te gjitha</a>
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
                                                        <form action="{{url('regions/'.$region->id)}}" method="post" class="form-horizontal">
                                                         @csrf
                                                         @method('put')
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="region" class=" form-control-label">Rajoni <span class="text-danger">*</span></label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="region" name="region" placeholder="" value="{{$region->region}}" class="form-control">
                                                                @error('region')
                                                                 <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                                
                                                            </div>
                                                                    <button type="submit" class="btn btn-dark btn-sm pull-right">
                                                                        Modifiko
                                                                    </button>
                                                  
                                                           
                                                        </form>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                      </div>
                </div>
          </div>
    @endsection