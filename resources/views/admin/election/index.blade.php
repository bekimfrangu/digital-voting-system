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
                                <strong class="card-title">Zgjedhjet</strong>
                                <a href="{{url('elections/create')}}" class="btn btn-dark btn-sm float-right">Shto</a>
                                <a href="{{url('elections/reset')}}" class="btn btn-danger btn-sm float-right mr-2" onclick="return confirm('A jeni i sigurte qe deshironi te pastroni listen?')">Rivendos</a>
                            </div>
                            <div class="card-body">
                             @if($elections->count() >0)
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Lloji i zgjedhjeve</th>
                                            <th>Komuna</th>
                                            <th>Data</th>
                                            <th>Koha e fillimit</th>
                                            <th>Koha e mbarimit</th>
                                            <th>Veprimet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($elections as $election)
                                        <tr>
                                            <td>{{$election->electionType->type}}</td>
                                            @if($election->municipality_id == null)
                                                <td>Kosova</td>
                                            @else
                                                <td>{{$election->municipality->name}}</td>
                                            @endif
                                            <td>{{$election->date}}</td>
                                            <td>{{$election->start_time}}</td>
                                            <td>{{$election->end_time}}</td>
                                            <td>
                                                <a href="{{url('elections/'.$election->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('elections/'.$election->id.'/delete')}}" onclick="return confirm('A jeni i sigurte qe deshironi ti fshini zgjedhjet?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                       
                               

                                    </tbody>
                                </table>
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