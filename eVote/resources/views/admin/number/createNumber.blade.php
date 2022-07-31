@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Shto <strong>Numer</strong> 

                                                       <a href="{{url('numbers')}}" class="btn btn-info btn-sm pull-right">Listo te gjitha</a>
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
                                                        <form action="{{url('numbers')}}" method="post" class="form-horizontal">
                                                         @csrf
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="number" class=" form-control-label">Numri <span class="text-danger">*</span></label></div>
                                                                <div class="col-12 col-md-9"><input type="number" id="number" name="number" placeholder="" class="form-control">
                                                                @error('number')
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