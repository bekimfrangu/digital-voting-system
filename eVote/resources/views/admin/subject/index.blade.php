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
                                <strong class="card-title">Subjektet</strong>
                                <a href="{{url('subjects/create')}}" class="btn btn-dark btn-sm float-right">Shto</a>
                                <a href="{{url('subjects/reset')}}" class="btn btn-danger btn-sm float-right mr-2" onclick="return confirm('A jeni i sigurte qe deshironi te pastroni listen?')">Rivendos</a>
                            </div>
                            <div class="card-body">
                             @if($subjects->count() >0)
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Llogo</th>
                                            <th>Numri</th>
                                            <th>Subjekti</th>
                                            <th>Shkurtesa</th>
                                            <th>Sllogani</th>
                                            <th>Pershkrimi</th>
                                            <th>Veprimet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($subjects as $subject)
                                        <tr>
                                            
                                            <td>
                                                <img src="{{asset('admin/images/subjects')}}/{{$subject->logo}}" width="70" alt="">
                                            </td>
                                            <td>{{$subject->number->number}}</td>
                                            <td>{{$subject->name}}</td>
                                            <td>{{$subject->abbreviation}}</td>
                                            <td>{{$subject->slogan}}</td>
                                            <td>{{$subject->description}}</td>

                                            <td>
                                                <a href="{{url('subjects/'.$subject->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('subjects/'.$subject->id.'/delete')}}" onclick="return confirm('A jeni i sigurte qe deshironi te fshini subjektin politike?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                               
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $subjects->links() }}
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