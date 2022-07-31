@extends('layouts.base')
@section('content')

    @if(Session::has('message'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Sukses! </strong> {{Session::get('message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
         </div>
     @endif

<!-- If it has elections -->
@if($elections->count() > 0)
<!-- If it has votes -->
@if($votedV > 0)
    <div class="card">
        <div class="card-header bg-success text-white">
            Votuat
        </div>
        <div class="card-body text-center">
            <h5 class="card-title">Vota juaj eshte regjistruar ne sistem</h5>
            <p class="card-text">Ju lutem pritni rezultatet</p>
        </div>
    </div>
@else
<!-- If time is not right-->
    @php
        $time = date('H:i:s', time() + 7200);
        $date = date("Y-m-d");
    @endphp
 @if($date != $timeElection->date)
        <div class="card">
            <div class="card-header bg-info text-white">
                Nuk eshte koha e Zgjedhjeve
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">Data e Zgjedhjeve nuk ka arritur ende ose Zgjedhjet kane perfunduar</h5>
                <p class="card-text">Ju lutem prisni per Zgjedhjet</p>
            </div>
        </div>

  @elseif(($time < $timeElection->start_time) || ($time > $timeElection->end_time) )
     <div class="card">
            <div class="card-header bg-info text-white">
                Nuk eshte koha e Zgjedhjeve
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">>Koha e Zgjedhjeve nuk ka arritur ende ose Zgjedhjet kane perfunduar</h5>
                <p class="card-text">Ju lutem prisni per Zgjedhjet</p>
            </div>
        </div>
  @else
<!-- IF everything is OK -->
        <div class="container" @if($electionF->electionType->type == 'Kuvendin e Republikes se Kosoves') style="width: auto;border: 10px solid red;margin:10px;background-color:rgba(255, 255, 255, 0.211);"
            @else style="width: auto;border: 10px solid yellow;margin:10px;background-color:rgba(255, 255, 255, 0.211);"
            @endif>

        <div class="row p-2" style="border: 1px solid black; background-color:white"">

                <div class="col-md-2">
                <img src="admin/images/user/ks.png" width="100">
                </div>

                <div class="col-md-2">
                <p style="font-size: small;">
                    Republika e Kosovës
                    Komisioni Qendror i Zgjedhjeve
                </p>
                </div>

                <div class="col-md-2">
                    <img src="admin/images/user/ks.png" width="100">
                </div>

                <div class="col-md-6">
                    @if($elections->count() > 0)
                        @foreach($elections as $election)
                        @if($election->electionType->type == 'Kuvendin e Republikes se Kosoves')
                          <h4>Zgjedhjet per {{$election->electionType->type}}</h4>
                        @else
                        @if($user->municipality->name == $election->municipality->name)
                            <h4 class="text-center">Zgjedhjet Komunale 2022</h4>
                            <h3 class="text-center mt-3">{{$election->municipality->name}}</h5>
                        @endif
                        @endif
                        @endforeach
                    @else
                    <h4>Republika e Kosoves</h4>
                    @endif
                </div>
        </div>

        <!-- Election = kuvend -->
        @if($election->electionType->type === 'Kuvendin e Republikes se Kosoves')
        <form action="{{url('/vote-convention')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="voter_id" id="voter_id" value="{{$user->id}}">
        <div class="row p-2">

            <!-- subjects -->
            <div class="col-md-8">

                <div class="row mr-1" style="border: 1px solid black;background-color:white">
                <p class="mt-1 ml-1">Shenoni vetem nje subjekt politik</p>
                </div> 

                @foreach($subjects as $subject)
                <div class="row mr-1 p-4" style="border-left: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;background-color:white"">
                        
                        <div class="col-md-1">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="subject_id" id="subject_id" value="{{$subject->id}}" required>
                            </div>
                        </div>

                        <div class="col-md-1 mr-2">
                            <div class="form-check">
                            <h6>{{$subject->number->number}}.</h6>
                            </div>
                        </div>

                    <div class="col-md-1">
                        <img src="{{asset('admin/images/subjects')}}/{{$subject->logo}}" width="60" alt="{{$subject->name}}">
                    </div>
                    <div class="col-md-4">
                        <h5>{{$subject->name}}</h5>
                    </div>
                    
                </div>
                @endforeach
            </div>

            <!-- candidates -->
            <div class="col-md-4">
            
                    <div class="row" style="border: 1px solid black;background-color:white"">    
                    <p class="mt-1 ml-1">Shenoni me se shumti pese kandidate</p>
           
                </div>
                <div class="row" style="border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;background-color:white"">
                @foreach($candidates as $candidate)
                    <div class="col-md-2 ml-4 p-4">
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox" name="candidate_id[]" id="candidate_id[]" value="{{$candidate->id}}">
                                <label class="form-check-label" for="candidate_id">{{$candidate->number->number}}</label>
                            </div>
                    </div>
                @endforeach
                </div>
            </div> 

            <button type="submit" class="btn btn-sm btn-dark float-right mt-3">Voto</button>
        </div>

        </form>
        <!-- Election = komuna -->
        @else
        <form action="{{url('/vote')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="voter_id" id="voter_id" value="{{$user->id}}">
        <div class="row p-2">

            <!-- subjects -->
            <div class="col-md-8">

                <div class="row mr-1" style="border: 1px solid black;background-color:white">
                <p class="mt-1 ml-1">Shenoni vetem nje subjekt politik</p>
                </div> 

                @foreach($subjects as $subject)
                <div class="row mr-1 p-4" style="border-left: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;background-color:white"">
                        
                        <div class="col-md-1">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="subject_id" id="subject_id" value="{{$subject->id}}" required>
                            </div>
                        </div>

                        <div class="col-md-1 mr-2">
                            <div class="form-check">
                            <h6>{{$subject->number->number}}.</h6>
                            </div>
                        </div>

                    <div class="col-md-1">
                        <img src="{{asset('admin/images/subjects')}}/{{$subject->logo}}" width="60" alt="{{$subject->name}}">
                    </div>
                    <div class="col-md-4">
                        <h5>{{$subject->name}}</h5>
                    </div>
                    
                </div>
                @endforeach
            </div>

            <!-- candidates -->
            <div class="col-md-4">
            
                    <div class="row" style="border: 1px solid black;background-color:white"">    
                    <p class="mt-1 ml-1">Shenoni me se shumti nje kandidate</p>

                </div>
                <div class="row" style="border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;background-color:white"">
                    @foreach($elections as $elc)
                    @if($user->municipality->name == $elc->municipality->name)      
                        @foreach($candidates as $c)
                            @if($c->voter->municipality->name == $user->municipality->name)
                                <div class="col-md-2 ml-4 p-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="candidate_id" id="candidate_id" value="{{$c->id}}" required>
                                            <label class="form-check-label" for="c_id">{{$c->number->number}}</label>
                                        </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                </h1>
                </div>
            </div> 

            <button type="submit" class="btn btn-sm btn-dark float-right mt-3">Voto</button>
        </div>

        </form>
        @endif
        </div>
  @endif
@endif
@else
<div class="card">
        <div class="card-header bg-dark text-white">
           Nuk ka te dhena
        </div>
        <div class="card-body text-center">
            <h5 class="card-title">Nuk ka Zgjedhje ne proces</h5>
            <p class="card-text">Ju lutem prisni kohen e zgjedhjeve</p>
        </div>
    </div>
@endif
@endsection