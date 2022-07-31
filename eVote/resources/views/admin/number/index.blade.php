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
                            <strong class="card-title">Numrat</strong>
                        
                                    <a href="{{url('numbers/create')}}" class="btn btn-dark btn-sm float-right ml-2">Shto</a>
                        </div>

                        <div class="card-body">
                        @if($numbers->count() > 0)
                            
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Numri</th>
                                        <th>Veprimet</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                @foreach($numbers as $number)
                                    <tr>
                                        <td>{{$number->number}}</td>
                                        <td>
                                            <a href="{{url('numbers/'.$number->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{url('numbers/'.$number->id.'/delete')}}" onclick="return confirm('A jeni i sigurte qe deshirni te fshini numrin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $numbers->links() }}
                        @else 
                            Nuk ka asgje per te shfaqur.  
                        @endif
                        </div>
                    </div>
                </div>
            </div>
                </div><!
        </div><!-- .content -->

@endsection