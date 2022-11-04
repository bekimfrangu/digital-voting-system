@extends('layouts.base')
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                    <strong>{{$voter->fullname}}</strong> 

                                                       <a href="{{url('voters')}}" class="btn btn-info btn-sm pull-right">Kthehu mbrapa</a>
                                                    </div>
                                                    <div class="card-body">
                                                         <table class="table table-striped">
                                                               
                                                                    <tr>
                                                                        <th>Komuna</th>
                                                                        <td>{{$voter->municipality->name}}</td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th>Numri Personal</th>
                                                                        <td>{{$voter->personalnumber}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Emri dhe Mbiemri</th>
                                                                        <td>{{$voter->fullname}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Gjinia</th>
                                                                        <td>{{$voter->gender}}</td>
                                                                    </tr>
                                                                
                                                               
                                                                    <tr>
                                                                        <th>Datelindja</th>
                                                                        <td>{{$voter->dob}}</td>
                                                                    </tr>
                                                                
                                                               
                                                                    <tr>
                                                                        <th>Numri telefonit</th>
                                                                        <td>
                                                                        @if($voter->phonenumber)
                                                                            {{$voter->phonenumber}}
                                                                        @else
                                                                            <p>Ska te dhene</p>
                                                                        @endif
                                                                        </td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th>Adresa</th>
                                                                        <td>
                                                                        @if($voter->address)
                                                                            {{$voter->address}}
                                                                        @else
                                                                           <p>Ska te dhene</p> 
                                                                        @endif
                                                                        </td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th>Email</th>
                                                                        <td>
                                                                        @if($voter->email)
                                                                            {{$voter->email}}
                                                                        @else
                                                                          <p>Ska te dhene</p>  
                                                                        @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Fjalekalimi</th>
                                                                        <td>{{$voter->password}}</td>
                                                                    </tr>
                                                                
                                                               
                                                                    <tr>
                                                                        <th>Roli</th>
                                                                        <td>{{$voter->role}}</td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th>Statusi</th>
                                                                        <td>{{$voter->status}}</td>
                                                                    </tr>
                                                                

                                                                    <tr>
                                                                        <th>Foto</th>
                                                                        <td>
                                                                        @if($voter->image)
                                                                             <img src="{{asset('admin/images/voters')}}/{{$voter->image}}"  width="100" alt="">
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