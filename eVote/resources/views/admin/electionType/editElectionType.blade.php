@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Modifiko <strong> llojin {{$electiontype->type}}</strong> 

                                                       <a href="{{url('election-types')}}" class="btn btn-info btn-sm pull-right">Listo te gjitha</a>
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
                                                        <form action="{{url('election-types/'.$electiontype->id)}}" method="post" class="form-horizontal">
                                                         @csrf
                                                         @method('put')
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="type" class=" form-control-label">Lloji i zgjedhjeve <span class="text-danger">*</span></label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="type" name="type" placeholder="" value="{{$electiontype->type}}" class="form-control">
                                                                @error('type')
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