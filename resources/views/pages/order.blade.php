@extends('master.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">مخزن الدم</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('donor')}}">add donor</a>
          <a class="dropdown-item" href="{{route('order_bank')}}"> add order</a>
          
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('add order') }}</div>

               <div class="card-body">
                    <form method="get" action="{{ route('bank_order') }}">
                
                        <div class="form-group row">
                            <label for="bld_group" class="col-md-4 col-form-label text-md-right">{{ __('bld_group') }}</label>

                            <div class="col-md-6">
                              <select  class="form-control"  name="bld_group" id=""> <option hidden>اختر الزمرة</option>
                                  <option   >A<sup>+</sup></option>
                                 <option  >A<sup>-</sup></option>
                                 <option  >B<sup>+</sup></option>
                                  <option  >B<sup>-</sup></option>
                                  <option   >AB<sup>+</sup></option>
                                 <option   >AB<sup>-</sup></option>
                                 <option   >O<sup>+</sup></option>
                                 <option  >O<sup>-</sup></option>
                              </select>
                                @error('bld_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      

                        <div class="form-group row">
                            <label for="num" class="col-md-4 col-form-label text-md-right">{{ __('amount') }}</label>

                            <div class="col-md-6">
                                <input id="num" type="number" class="form-control @error('num') is-invalid @enderror" name="num" value="{{ old('num') }}" required >

                                @error('num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('add') }}
                                </button>
                            </div>
                        </div>
                    </form>
               </div>
               @if(session('statue'))
                <div>{{session('statue')}} </div>
                @endif
           </div>
       </div>
    </div>
</div>
@endsection