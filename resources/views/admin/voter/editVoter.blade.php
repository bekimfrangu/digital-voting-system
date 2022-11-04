@extends('layouts.base')
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Modifiko <strong>{{$voter->fullname}}</strong>

                        <a href="{{url('voters')}}" class="btn btn-info btn-sm pull-right">Listo te gjitha</a>
                    </div>
                    <div class="card-body card-block">
                        @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses! </strong> {{Session::get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form action="{{url('voters/'.$voter->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="municipality_id" class=" form-control-label">Zgjidhni Komunen <span class="text-danger">*</span></label></div>
                                <div class="col-12 col-md-9">
                                    <select name="municipality_id" id="municipality_id" class="form-control">
                                        @foreach($municipalities as $municipality)
                                        <option @if($voter->municipality_id == $municipality->id) selected @endif
                                            value="{{$municipality->id}}">{{$municipality->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('municipality_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="personalnumber" class=" form-control-label">Numri Personal <span class="text-danger">*</span></label></div>
                                <div class="col-12 col-md-9"><input type="text" id="personalnumber" name="personalnumber" placeholder="" value="{{$voter->personalnumber}}" class="form-control">
                                    @error('personalnumber')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="fullname" class=" form-control-label">Emri dhe Mbiemri <span class="text-danger">*</span></label></div>
                                <div class="col-12 col-md-9"><input type="text" id="fullname" name="fullname" placeholder="" value="{{$voter->fullname}}" class="form-control">
                                    @error('fullname')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="gender" class=" form-control-label">Gjinia <span class="text-danger">*</span></label></div>
                                <div class="col-12 col-md-9"><input type="text" id="gender" name="gender" placeholder="" value="{{$voter->gender}}" class="form-control">
                                    @error('gender')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="dob" class=" form-control-label">Datelindja <span class="text-danger">*</span></label></div>
                                <div class="col-12 col-md-9"><input type="date" id="dob" name="dob" placeholder="" value="{{$voter->dob}}" class="form-control">
                                    @error('dob')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="phonenumber" class=" form-control-label">Numri i telefonit</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="phonenumber" name="phonenumber" placeholder="" value="{{$voter->phonenumber}}" class="form-control">

                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="address" class=" form-control-label">Adresa</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="address" name="address" placeholder="" value="{{$voter->address}}" class="form-control">

                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="" value="{{$voter->email}}" class="form-control">

                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="image" class=" form-control-label">Foto </label></div>
                                <div class="col-12 col-md-9"><input type="file" id="image" name="image"><br><br>
                                    @if($voter->image)
                                    <h6>Foto aktuale</h6>
                                    <img src="{{asset('admin/images/voters')}}/{{$voter->image}}" width="80" alt="">

                                    @endif

                                </div>

                            </div>


                            <button type="submit" class="btn btn-dark btn-sm pull-right">
                                Modifiko
                            </button>


                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection