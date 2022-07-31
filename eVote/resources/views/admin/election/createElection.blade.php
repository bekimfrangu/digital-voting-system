@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Shto <strong>Zgjedhje</strong> 

                                                       <a href="{{url('elections')}}" class="btn btn-info btn-sm pull-right">Listo te gjitha</a>
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
                                                        <form action="{{url('elections')}}" method="post" class="form-horizontal">
                                                         @csrf
                                                         <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="electiontype_id" class=" form-control-label">Zgjidhni llojin e zgjedhjeve <span class="text-danger">*</span></label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="electiontype_id" id="electiontype_id" class="form-control">
                                                                        @foreach($electiontypes as $type)
                                                                            <option value="{{$type->id}}">{{$type->type}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('electiontype_id')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>


                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="municipality_id" class=" form-control-label">Zgjidhni Komunen <span class="text-danger">*</span></label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="municipality_id" id="municipality_id" class="form-control">
                                                                        @foreach($municipalities as $municipality)
                                                                            <option value="{{$municipality->id}}">{{$municipality->name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('municipality_id')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                             </div>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="date" class=" form-control-label">Data <span class="text-danger">*</span></label></div>
                                                                <div class="col-12 col-md-9"><input type="date" id="date" name="date" placeholder="" class="form-control">
                                                                @error('date')
                                                                 <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                            </div>
                                                                
                                                            </div>
                                                          

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="start_time" class=" form-control-label">Koha e fillimit <span class="text-danger">*</span></label></div>
                                                                <div class="col-12 col-md-9"><input type="time" id="start_time" name="start_time" placeholder="" class="form-control">
                                                                @error('start_time')
                                                                 <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                            </div>
                                                                
                                                            </div>
                                                          

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="end_time" class=" form-control-label">Koha e mbarimit <span class="text-danger">*</span></label></div>
                                                                <div class="col-12 col-md-9"><input type="time" id="end_time" name="end_time" placeholder="" class="form-control">
                                                                @error('end_time')
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