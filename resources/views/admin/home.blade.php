@extends('layouts.base')
@section('content')
    <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Miresevini {{$user->fullname}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-danger border-danger text-center"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Te gjithe votuesit</div>
                                <div class="stat-digit">{{$voters}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Votat</div>
                                <div class="stat-digit">{{$distinctVoters}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-dark border-dark"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Numri i Kandidateve</div>
                                <div class="stat-digit">{{$candidates->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-secondary border-secondary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Numri i Subjekteve</div>
                                <div class="stat-digit">{{$subjects->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tabela e Rezultateve</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kandidati</th>
                                            <th scope="col">Subjekti</th>
                                            <th scope="col">Votat</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($candidates as $c)
                                     <!-- if there are votes  -->
                                      @if($votes->count() > 0) 
                                        <tr>
                                            <td>{{$c->voter->fullname}}</td>
                                            <td>{{$c->subject->name}}</td>

                                            <td> 
                                            @php
                                                $count = 0;
                                            @endphp
                                       
                                            @foreach($votes as $v)
                                                        @if($v->candidate_id == $c->id)
                                                                @php
                                                                    $count = $count + 1;
                                                                @endphp
                                                          
                                                        @endif
                                            @endforeach
                                             {{$count}} 
                                            
                                          </td>
                                          <td>
                                            @php
                                                $votePerc = number_format(($count/$votesCount) * 100,2);
                                            @endphp
                                             
                                            {{$votePerc}} %
                                            <div class="progress" title="{{ $votePerc }}%">
                                              @if($votePerc > 50)
                                                 <div class="progress-bar bg-success" style="width: {{ $votePerc }}%"></div>
                                              @elseif(($votePerc <= 50) && ($votePerc >= 2.5))
                                                 <div class="progress-bar bg-warning" style="width: {{ $votePerc }}%"></div>
                                              @else
                                                 <div class="progress-bar bg-danger" style="width: {{ $votePerc }}%"></div>
                                              @endif
                                            </div>  
                                          </td>
                                        </tr>
                                        <!-- if there are not any votes  -->
                                          @else
                                          <tr>
                                            <td>{{$c->voter->fullname}}</td>
                                            <td>{{$c->subject->name}}</td>

                                            <td> 
                                              0
                                          </td>
                                          <td>
                                           
                                            <div class="progress" title="0 %">
                                                 <div class="progress-bar bg-success" style="width: 0%"></div>
                                            </div>  
                                          </td>
                                        </tr>
                                            @endif
                                   @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tabela e % se votuesve</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">% e votuesve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <td>
                                      @php
                                        $percVote = number_format(($distinctVoters/$voters) * 100,2);
                                      @endphp
                                      {{$percVote}} %
                                      <div class="progress" title="{{ $percVote }} %">
                                              @if($percVote > 50)
                                                 <div class="progress-bar bg-success" style="width: {{ $percVote }}%"></div>
                                              @else
                                                 <div class="progress-bar bg-info" style="width: {{ $percVote }}%"></div>
                                              @endif
                                     </div>  
                                    </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
     </div>

</div><!-- .content -->
 
@endsection