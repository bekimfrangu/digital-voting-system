@extends('layouts.guest')
@section('content')
            <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                <x-jet-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('register') }}">
                     @csrf

                        <div class="form-group">
                            <label for="personalnumber">Numri Personal</label>
                            <input type="text" class="form-control" placeholder="" name="personalnumber"  id="personalnumber" :value="old('personalnumber')" required autocomplete="personalnumber" >
                        </div> 

                        <div class="form-group">
                            <label for="fullname">Emri dhe Mbiemri</label>
                            <input type="text" class="form-control" placeholder="" name="fullname" id="fullname" :value="old('fullname')" required autofocus autocomplete="fullname">
                        </div>

                        <div class="form-group">
                            <label for="fullname">Gjinia</label>
                            <input type="text" class="form-control" placeholder="" name="gender" id="gender" :value="old('gender')" required autofocus autocomplete="gender">
                        </div>

                         <div class="form-group">
                            <label for="fullname">Datelindja</label>
                            <input type="date" class="form-control" placeholder="" name="dob" id="dob" :value="old('dob')" required autofocus autocomplete="dob">
                        </div>

                        <div class="form-group">
                            <label for="password">Fjalekalimi</label>
                            <input type="text" class="form-control" placeholder="" name="password" id="password" required autocomplete="new-password" >
                        </div> 
                        
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmo Fjalekalimin</label>
                            <input type="text" class="form-control" placeholder="" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" >
                        </div>

                       <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Regjistrohu</button>
                    </form>
                </div>
@endsection