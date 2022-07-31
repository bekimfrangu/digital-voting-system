@extends('layouts.base')
@section('content')


   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                        @if(Session::has('message'))
                                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Sukses! </strong> {{Session::get('message')}}
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                   </div>
                          @endif
                            <div class="card-header">
                                <strong class="card-title">Votuesit</strong>
                                <a href="{{url('voters/create')}}" class="btn btn-dark btn-sm float-right">Shto</a>
                            <br>
                            <br>
                            @if($voters->count() >0)
                            <form action="{{url('voters/')}}" method="post">
                                @method('get')
                                @csrf
                                    <div class="col-md-3">
                                      <select name="municipality_id" id="municipality_id" class="form-control">
                                             <option value="">Zgjidhni Komunen</option>
                                             @foreach($municipalities as $municipality)
                                                    <option value="{{$municipality->id}}">{{$municipality->name}}</option>
                                             @endforeach
                                       </select>
                                </div>
                                <div class="col-md-4">
                                      <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Emri i votuesit">
                                </div>
                                <div class="col-md-2">
                                  <button type="submit" class="btn btn-dark btn-sm m-1">Kerko</button>
                                </div>
                            </form>
                            @endif
                              
                            </div>
                            <div class="card-body">
                             @if($voters->count() >0)
                                @if($voter->count() > 0)
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Komuna</th>
                                            <th>Votuesi</th>
                                            <th>Gjinia</th>
                                            <th>Datelindja</th>
                                            <th>Kandidate</th>
                                            <th>Veprimet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($voter as $v)
                                        <tr>
                                            @if($v->municipality_id == NULL)
                                                <td>Nuk ka te dhene</td>
                                            @else
                                                <td>{{$v->municipality->name}}</td>
                                            @endif
                                           
                                            <td>{{$v->fullname}}</td>
                                            <td>{{$v->gender}}</td>
                                            <td>{{$v->dob}}</td>
                                            <td>
                                                @if($v->role === 'voter')
                                                  <span class="badge badge-danger">
                                                       Jo
                                                  </span> 
                                                @else   
                                                <span class="badge badge-success">
                                                       Po
                                                  </span> 
                                                @endif
                                            
                                            </td>
                                            <td>
                                                 <a href="{{url('voters/'.$v->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{url('voters/'.$v->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('voters/'.$v->id.'/delete')}}" onclick="return confirm('A jeni i sigurte qe deshironi te fshini votuesin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                @if($v->role == 'voter')
                                                   <a href="{{url('candidates/candidate/'.$v->id)}}" class="btn btn-dark btn-sm">Zgjedh kandidate</a>
                                                @else
                                                @foreach($candidates as $candidate)
                                                    @if($candidate->voter->id == $v->id)
                                                         <a href="{{route('deleteCandidate',['vid'=>$v->id, 'cid'=>$candidate->id])}}" class="btn btn-danger btn-sm">Fshi kandidate</a>
                                                    @else
                                                    @endif
                                                @endforeach
                                                @endif
                                               
                                            </td>
                               
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                
                                @else
                                 
                                
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Komuna</th>
                                            <th>Votuesi</th>
                                            <th>Gjinia</th>
                                            <th>Datelindja</th>
                                            <th>Kandidate</th>
                                            <th>Veprimet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($voters as $voter)
                                        <tr>
                                            <td>{{$voter->municipality->name}}</td>
                                            <td>{{$voter->fullname}}</td>
                                            <td>{{$voter->gender}}</td>
                                            <td>{{$voter->dob}}</td>
                                            <td>
                                                @if($voter->role === 'voter')
                                                  <span class="badge badge-danger">
                                                    Jo
                                                  </span> 
                                                @else   
                                                <span class="badge badge-success">
                                                       Po
                                                  </span> 
                                                @endif
                                            
                                            </td>
                                            <td>
                                                 <a href="{{url('voters/'.$voter->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{url('voters/'.$voter->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('voters/'.$voter->id.'/delete')}}" onclick="return confirm('A jeni i sigurte qe deshironi te fshini votuesin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            @if($voter->role == 'voter')
                                                <a href="{{url('candidates/candidate/'.$voter->id)}}" class="btn btn-dark btn-sm">Zgjedh kandidate</a>
                                            @else
                                            @foreach($candidates as $candidate)
                                                @if($candidate->voter->id == $voter->id)
                                                  <a href="{{route('deleteCandidate',['vid'=>$voter->id, 'cid'=>$candidate->id])}}" class="btn btn-danger btn-sm">Fshi kandidate</a>
                                                @else
                                                @endif
                                            @endforeach
                                            @endif
                                            </td>
                               
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                  {{ $voters->links() }}
                                @endif
                          @else
                           Nuk ka asgje per te shfaqur.
                            @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection