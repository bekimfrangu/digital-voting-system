@extends('layouts.base')
@section('content')
   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lista e votuesve</strong>
                            </div>
                            <div class="card-body">
                             @if($votes->count() > 0)
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Votuesi</th>
                                            <th>Subjekti</th>
                                            <th>Kandidati/et</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($votesDistinct as $vote)
                                        <tr>
                                            <td>{{$vote->voter->fullname}}</td>
                                            <td>{{$vote->subject->name}}</td>
                                            <td>
                                                @foreach($votes as $v)
                                                    @if($v->voter_id == $vote->voter_id)
                                                            {{$v->candidate->voter->fullname}}<br/>
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $votes->links() }}
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