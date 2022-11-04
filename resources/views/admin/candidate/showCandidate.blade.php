@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                    <strong>{{$candidate->voter->fullname}}</strong> 

                                                       <a href="{{url('candidates')}}" class="btn btn-info btn-sm pull-right">Kthehu mbrapa</a>
                                                    </div>
                                                    <div class="card-body">
                                                         <table class="table table-striped">
                                                               
                                                                    <tr>
                                                                        <th>Numri</th>
                                                                        <td>{{$candidate->number->number}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Komuna</th>
                                                                        <td>{{$candidate->voter->municipality->name}}</td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th>Subjekti</th>
                                                                        <td>{{$candidate->subject->name}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Pozita</th>
                                                                        <td>{{$candidate->position->position}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Numri Personal</th>
                                                                        <td>{{$candidate->voter->personalnumber}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Emri dhe Mbiemri</th>
                                                                        <td>{{$candidate->voter->fullname}}</td>
                                                                    </tr>
                                                                
                                                               
                                                                   
                                                                    <tr>
                                                                        <th>Gjinia</th>
                                                                        <td>{{$candidate->voter->gender}}</td>
                                                                    </tr>
                                                                
                                                               
                                                                    <tr>
                                                                        <th>Datelindja</th>
                                                                        <td>{{$candidate->voter->dob}}</td>
                                                                    </tr>
                                                                
                                                               
                                                                    <tr>
                                                                        <th>Numri i telefonit</th>
                                                                        <td>
                                                                        @if($candidate->voter->phonenumber)
                                                                            {{$candidate->voter->phonenumber}}
                                                                        @else
                                                                            <p>Ska te dhene</p>
                                                                        @endif
                                                                        </td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th>Adresa</th>
                                                                        <td>
                                                                        @if($candidate->voter->address)
                                                                            {{$candidate->voter->address}}
                                                                        @else
                                                                           <p>Ska te dhene</p> 
                                                                        @endif
                                                                        </td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th>Email</th>
                                                                        <td>
                                                                        @if($candidate->voter->email)
                                                                            {{$candidate->voter->email}}
                                                                        @else
                                                                          <p>Ska te dhene</p>  
                                                                        @endif
                                                                        </td>
                                                                    </tr>
                                                                   

                                                                    <tr>
                                                                        <th>Foto</th>
                                                                        <td>
                                                                        @if($candidate->voter->image)
                                                                             <img src="{{asset('admin/images/voters')}}/{{$candidate->voter->image}}"  width="100" alt="">
                                                                        @else
                                                                            <p>Ska te dhene</p>
                                                                        @endif
                                                                        </td>
                                                                    </tr>
                                                            </table>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                      </div>
                </div>
          </div>
    @endsection