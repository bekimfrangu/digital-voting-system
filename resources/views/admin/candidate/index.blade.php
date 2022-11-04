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
                                    <strong class="card-title">Kandidatet</strong>
                                    <a href="{{url('voters')}}" class="btn btn-dark btn-sm pull-right">Shto</a>
                            <br>
                            <br>
                            @if($candidates->count() >0)
                            <form action="{{url('candidates/')}}" method="post">
                                @method('get')
                                @csrf
                                     <div class="col-md-3">
                                      <select name="subject_id" id="subject_id" class="form-control">
                                             <option value="">Zgjidhni Subjektin</option>
                                             @foreach($subjects as $subject)
                                                    <option value="{{$subject->id}}">{{$subject->abbreviation}}</option>
                                             @endforeach
                                       </select>
                                     </div>

                                     <div class="col-md-3">
                                      <select name="position_id" id="position_id" class="form-control">
                                             <option value="">Zgjidhni Poziten</option>
                                             @foreach($positions as $position)
                                                    <option value="{{$position->id}}">{{$position->position}}</option>
                                             @endforeach
                                       </select>
                                     </div>

                                <div class="col-md-2">
                                  <button type="submit" class="btn btn-dark btn-sm m-1">Kerko</button>
                                </div>
                            </form>
                            @endif
                              
                                </div>
                                <div class="card-body">
                                @if($candidates->count() > 0)
                                    @if($candidate->count() > 0)
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Numri</th>
                                                <th>Kandidati</th>
                                                <th>Komuna</th>
                                                <th>Subjekti</th>
                                                <th>Pozita</th>
                                                <th>Veprimet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    
                                        @foreach($candidate as $c)
                                            <tr>
                                                <td>
                                                @if($c->voter->image)
                                                  <img src="{{asset('admin/images/voters')}}/{{$c->voter->image}}" width="70" alt="">  
                                                @else
                                                    <p>No Image</p>
                                                @endif
                                                </td>
                                                <td>{{$c->number->number}}</td>
                                                <td>{{$c->voter->fullname}}</td>
                                                <td>{{$c->voter->municipality->name}}</td>
                                                <td>{{$c->subject->name}}</td>
                                                <td>{{$c->position->position}}</td>
                                                <td>
                                                    <a href="{{url('candidates/'.$c->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="{{url('candidates/'.$c->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('candidates',['cid'=>$c->id,'vid'=>$c->voter->id])}}" onclick="return confirm('A jeni i sigurte qe deshironi te fshini kandidatin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                
                                            </tr>
                                        @endforeach
                                        
                                

                                        </tbody>
                                    </table>
                                   
                                    @else
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Numri</th>
                                                <th>Kandidati</th>
                                                <th>Komuna</th>
                                                <th>Subjekti</th>
                                                <th>Pozita</th>
                                                <th>Veprimet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    
                                        @foreach($candidates as $candidate)
                                            <tr>
                                                <td>
                                                @if($candidate->voter->image)
                                                  <img src="{{asset('admin/images/voters')}}/{{$candidate->voter->image}}" width="70" alt="">  
                                                @else
                                                    <p>Nuk ka te dhene</p>
                                                @endif
                                                </td>
                                                <td>{{$candidate->number->number}}</td>
                                                <td>{{$candidate->voter->fullname}}</td>
                                                <td>{{$candidate->voter->municipality->name}}</td>
                                                <td>{{$candidate->subject->name}}</td>
                                                <td>{{$candidate->position->position}}</td>
                                                <td>
                                                    <a href="{{url('candidates/'.$candidate->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="{{url('candidates/'.$candidate->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('candidates',['cid'=>$candidate->id,'vid'=>$candidate->voter->id])}}" onclick="return confirm('A jeni i sigurte qe deshironi te fshini kandidatin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                
                                            </tr>
                                        @endforeach
                                        
                                

                                        </tbody>
                                    </table>
                                    {{ $candidates->links() }}
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