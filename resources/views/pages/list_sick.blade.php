@extends('master.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">اضافة طلب</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('sick')}}">add sick</a>
          <a class="dropdown-item" href="{{route('hospital_index')}}">show</a>
      </li>
    </ul>
    <form  action="{{route('hospital_search')}}" method="get" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="name" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


 <!-- <div class="intre" id="page">
      <form action="{{route('hospital_search')}}" method="get">
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter name">
        <button type="submit">search</button>
      </form>
 </div> -->


 <div class="container" >
   <div class="row "> 

     <div class="col-lg-4" style=" height:450px; overflow-y: scroll;">
   @foreach ($users as $item)   
     <a class="list"userId="{{$item->id}}" href="#">
       <p class="tip-header"> الاسم:<span class=" tip-text">{{$item->name}}</span></p>
     </a>
     @endforeach
     
     </div>
  
   <div class="col-lg-6">
   @foreach ($users as $item)
   
        
        <div class="showlist" userId="{{$item->id}}"> 
           <p class="tip-header">   الاسم: <span class=" tip-text">{{$item->name}}</span></p>
           <p class="tip-header"> الموقع:  <span class=" tip-text">{{$item->regoin}},{{$item->stree}}</span></p>
           <p class="tip-header"> الايميل:   <span class=" tip-text">{{$item->email}}</span></p>
           <p class="tip-header">  رقم:    <span class=" tip-text">{{$item->number}}</span></p>
           <a  class="bottum" href="#">add order</a>
    
              
              <div class="container" >
                  <div   class=" from_acountm add_ordder">
                  
                 
                      
                    <form  class="from_input" action="{{route('order_hospital')}}" method="get">
                            <div style="padding:2px 2px 4px 2px">
                              <label >الكمية:</label>
                              <input type="numbre" class="form-control" name="num"   placeholder="details">
                            </div>
                            <div >
                              <input type="hidden" class="form-control" name="user_id" value="{{$item->id}}" id="exampleInputPassword1" placeholder="details">
                              <input type="hidden" class="form-control" name="bld_group" value="{{$item->grp_bld}}" id="exampleInputPassword1" placeholder="details">
                            </div>
                        
                            <button type="submit" class="btn btn-primary"> ارسال</button>
                          </form>
                          <div class="i"> <h2 class="add_order_title">add order  <a id="i" >x</a></h2>
                     </div>
                  </div>

              </div>
        </div>
     @endforeach
 </div>    

  </div>
</div>


 
 
@endsection