@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Shto <strong>Kandidate</strong> 

                                                       <a href="{{url('candidates')}}" class="btn btn-info btn-sm pull-right">Listo te gjitha</a>
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
                                                        <form action="{{url('candidates/candidate/'.$voter->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                         @csrf

                                                         <div class="row form-group">
                                                                <div class="col col-md-3"><label for="voter_id" class=" form-control-label">Kandidati <span class="text-danger">*</span></label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <input type="hidden" name="voter_id" id="voter_id" value="{{$voter->id}}" class="form-control">
                                                                    <input type="text" id="fullname" name="fullname" placeholder="" class="form-control" disabled value="{{$voter->fullname}}">
                                                                @error('voter_id')
                                                                 <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                            </div>
                                                                
                                                            </div>

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
                                                                    <div class="col col-md-3"><label for="subject_id" class=" form-control-label">Zgjidhni Subjektin <span class="text-danger">*</span></label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="subject_id" id="subject_id" class="form-control">
                                                                        @foreach($subjects as $subject)
                                                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('subject_id')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="position_id" class=" form-control-label">Zgjidhni Poziten <span class="text-danger">*</span></label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="position_id" id="position_id" class="form-control">
                                                                        @foreach($positions as $position)
                                                                            <option value="{{$position->id}}">{{$position->position}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('position_id')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row form-group">  
                                                                    <div class="col col-md-3"><label for="image" class=" form-control-label">Foto <span class="text-danger">*</span></label></div> 
                                                                    <div class="col-12 col-md-9"><input type="file" name="image" id="image"><br><br>
                                                        
                                                                        @error('image')
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