<div>
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
    <input wire:model="name" class="form-control mr-sm-2"  type="search" placeholder="Search" aria-label="Search">
    <button wire:click="$emit('search')" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>  
  </div>
</nav>
 <div class="container" >
   <div class="row "> 


     <div class="col-lg-4" style=" height:450px; overflow-y: scroll;">
   @foreach ($users as $item)   
     <a  class="list"  userId="{{$item->id}}" href="#">
       <button  style ="border: white;background: white;" wire:click="showUser({{$item->id}})"  class="showUse tip-header "> الاسم:<span class=" tip-text">{{$item->name}}</span></button >
     </a>
     @endforeach

  
     
     </div>
     @if($show!=null)
  
   <div class="col-lg-6">
        <div class="showlist" userId="{{$show->id}}"> 
           <p class="tip-header">   الاسم: <span class=" tip-text">{{$show->name}}</span></p>
           <p class="tip-header"> الموقع:  <span class=" tip-text">{{$show->regoin}},{{$show->stree}}</span></p>
           <p class="tip-header"> الايميل:   <span class=" tip-text">{{$show->email}}</span></p>
           <p class="tip-header">  رقم:    <span class=" tip-text">{{$show->number}}</span></p>
           <form   action="{{route('order_hospital')}}" method="get">
               <div style="padding:2px 2px 4px 2px">
                  <label >الكمية:</label>
                  <input class="w_2" type="numbre" class="form-control" name="num"   placeholder="details">
               </div>
               <div >
                <input type="hidden" class="form-control" name="user_id" value="{{$show->id}}" id="exampleInputPassword1" placeholder="details">
                <input type="hidden" class="form-control" name="bld_group" value="{{$show->grp_bld}}" id="exampleInputPassword1" placeholder="details">
               </div>
               <button type="submit" class="btn btn-primary"> ارسال</button>
           </form>
        </div>
    </div>
     @endif
 </div> 
  

  </div>
</div>
</div>


