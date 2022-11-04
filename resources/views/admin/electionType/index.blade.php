@extends('layouts.base')
@section('content')
   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-8">
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
                                <strong class="card-title">Llojet e Zgjedhjeve</strong>
                                <a href="{{url('election-types/create')}}" class="btn btn-dark btn-sm float-right">Shto</a>
                                <a href="{{url('election-types/reset')}}" class="btn btn-danger btn-sm float-right mr-2" onclick="return confirm('A jeni i sigurte qe deshironi te pastroni listen?')">Rivendos</a>
                            </div>
                            <div class="card-body">
                             @if($electiontypes->count() >0)
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Lloji i Zgjedhjeve</th>
                                            <th>Veprimet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($electiontypes as $type)
                                        <tr>
                                            <td>{{$type->type}}</td>
                                            <td>
                                                <a href="{{url('election-types/'.$type->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('election-types/'.$type->id.'/delete')}}" onclick="return confirm('A jeni i sigurte qe deshironi te fshini llojin e zgjedhjeve?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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