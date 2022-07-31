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
                                <strong class="card-title">Komunat</strong>
                                <a href="{{url('municipalities/create')}}" class="btn btn-dark btn-sm float-right">Shto</a>
                            </div>
                            <div class="card-body">
                             @if($municipalities->count() >0)
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Komuna</th>
                                            <th>Rajoni</th>
                                            <th>Veprimet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($municipalities as $municipality)
                                        <tr>
                                            <td>{{$municipality->name}}</td>
                                            <td>{{$municipality->region->region}}</td>
                                            <td>
                                                <a href="{{url('municipalities/'.$municipality->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('municipalities/'.$municipality->id.'/delete')}}" onclick="return confirm('A jeni i sigurte qe deshironi te fshini Komunen?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                               
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $municipalities->links() }}
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