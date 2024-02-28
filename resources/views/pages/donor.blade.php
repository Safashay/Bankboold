@extends('master.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">اضافة متبرع</a>
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
<div class=" from_acount">
 <div class="container ">
   <form class="from_input"action="{{route('add_donor')}}" method="POST">
     @csrf
     <div class="form-group"> 
       <!-- <label for="">type blood</label> -->
       <select  class="form-control"  name="grp_bld" id="">
         <option hidden>اختر الزمرة</option>
         <option   >A<sup>+</sup></option>
         <option  >A<sup>-</sup></option>
         <option  >B<sup>+</sup></option>
         <option  >B<sup>-</sup></option>
         <option   >AB<sup>+</sup></option>
         <option   >AB<sup>-</sup></option>
         <option   >O<sup>+</sup></option>
         <option  >O<sup>-</sup></option>
       </select>
     </div>

     <div class="form-group">           
       <input type="text"  class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="ادخل الاسم">
     </div>
     @error('name')
       <div style="color: red">{{ $message }}</div>
     @enderror
     <div class="form-group">    
       <input type="number" class="form-control" id="exampleInputEmail1" name="mobile" aria-describedby="emailHelp" placeholder="09000000">
     </div>
      @error('mobile')
         <div style="color: red">{{ $message }}</div>
      @enderror

      <div  class="form-group ">
       <div class="row">
         <div class="col-lg-6">
           <input type="text" class="form-control "   name="regoin" aria-describedby="emailHelp" placeholder="المنطقة"> 
         </div>
         <div class="col-lg-6">
            <input type="text"  class="form-control"  name="stree" aria-describedby="emailHelp" placeholder="الشارع">                               
         </div>
       </div> 
      </div>
       @error('regoin')
         <div style="color: red">{{ $message }}</div>
       @enderror 
        @error('stree')
         <div style="color: red">{{ $message }}</div>
        @enderror 
        <div class="form-group "> 
          <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="ادخل الايميل">
        </div> 
        @error('email')
          <div style="color: red">{{ $message }}</div>
        @enderror
        <div class="form-group ">
         <!-- <label for="">رقم الهاتف</label> -->
         <input type="number" class="form-control" id="exampleInputEmail1" name="number" aria-describedby="emailHelp" placeholder="ادخل الرقم لوطني">
        </div>
        @error('number')
         <div style="color: red">{{ $message }}</div>
        @enderror      
        <div > 
         <input class="btn btn-primary" type="submit"id="bottum" value="التالي">
       </div>
   </form>
   @if(session('statue'))
     <div>{{session('statue')}} </div>
   @endif
 </div>
</div>  

@endsection