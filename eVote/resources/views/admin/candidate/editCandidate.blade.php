@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Modifiko <strong>{{$candidate->voter->fullname}}</strong> 

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
                                                        <form action="{{url('candidates/'.$candidate->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                         @csrf
                                                         @method('put')
                                                          
                                                             <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="number_id" class=" form-control-label">Zgjidhni numrin</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="number_id" id="number_id" class="form-control">
                                                                        @foreach($numbers as $number)
                                                                            <option   @if($candidate->number_id == $number->id) selected @endif 
                                                                                value="{{$number->id}}">{{$number->number}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('number_id')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="subject_id" class=" form-control-label">Zgjidhni Subjektin</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="subject_id" id="subject_id" class="form-control">
                                                                        @foreach($subjects as $subject)
                                                                            <option   @if($candidate->subject_id == $subject->id) selected @endif 
                                                                                value="{{$subject->id}}">{{$subject->name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('subject_id')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="position_id" class=" form-control-label">Zgjidhni Poziten</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="position_id" id="position_id" class="form-control">
                                                                        @foreach($positions as $position)
                                                                            <option   @if($candidate->position_id == $position->id) selected @endif 
                                                                                value="{{$position->id}}">{{$position->position}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('position_id')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row form-group">
                                                                        <div class="col col-md-3"><label for="logo" class=" form-control-label">Foto </label></div>
                                                                        <div class="col-12 col-md-9"><input type="file" id="logo" name="logo" ><br>
                                                                        @if($candidate->voter->image)
                                                                    
                                                                            <img src="{{asset('admin/images/voters')}}/{{$candidate->voter->image}}" width="80" alt="">
                                                                        
                                                                        @endif
                                                                        @error('logo')
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