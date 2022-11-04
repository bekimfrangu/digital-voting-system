@extends('layouts.guest')
@section('content')
        @if($users->count() > 0)
                <div class="login-form">
                
                    <form method="POST" action="{{ route('login') }}">
                     @csrf

                        <div class="form-group">
                            <label for="fullname">Emri dhe Mbiemri</label>
                            <input type="text" class="form-control" placeholder="" name="fullname" id="fullname" :value="old('fullname')" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">Numri Personal</label>
                            <input type="text" class="form-control" placeholder="" name="password" id="password" :value="old('password')"required autocomplete="current-password" >
                        </div>
                       
                       <button type="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Kycu</button>
                    </form>
                <x-jet-validation-errors class="mb-4 text-danger" />
                </div>
        @else
        <div class="login-form">
                
                <form method="POST" action="{{ route('login') }}">
                 @csrf

                    <div class="form-group">
                        <label for="fullname">Emri dhe Mbiemri</label>
                        <input type="text" class="form-control" placeholder="" name="fullname" id="fullname" :value="old('fullname')" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password">Numri Personal</label>
                        <input type="text" class="form-control" placeholder="" name="password" id="password" :value="old('password')"required autocomplete="current-password" >
                    </div>
                   
                   <button type="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Kycu</button>
                   <a href="{{url('registration')}}" class="btn btn-success btn-flat m-b-30 m-t-30">Regjistrohu</a>
                </form>
            <x-jet-validation-errors class="mb-4 text-danger" />
            </div>
        @endif
@endsection