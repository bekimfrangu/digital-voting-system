@extends('layouts.base')
@section('content')


   <div class="content mt-3">
            <div class="animated fadeIn">
           @foreach($subjects as $subject)
                <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                         
                                <div class="card-header">
                                    <strong class="card-title">Kandidatet e {{$subject->abbreviation}}-se</strong>
                                     
                                    <br>
                                </div>
                                <div class="card-body">
                                @if($subject->candidates->count() > 0)
                                    @foreach($subject->candidates as $candidate)
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Kandidati</th>
                                                <th>Komuna</th>
                                                <th>Pozita</th>  
                                                <th>Numri</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                               <td>
                                                   <img src="{{asset('admin/images/voters')}}/{{$candidate->voter->image}}"  width="40" alt="">
                                               </td>
                                               <td>{{$candidate->voter->fullname}}</td>
                                               <td>{{$candidate->voter->municipality->name}}</td>
                                               <td>{{$candidate->position->position}}</td>
                                               <td>{{$candidate->number->number}}</td>
                                            </tr>
                                     
                                        </tbody>
                                    </table>
                                    @endforeach
                                    @else
                                       Nuk ka kandidate per kete subjekt.
                                @endif
                                </div>
                      
                            </div>
                        </div>
                        </div>
              @endforeach
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection