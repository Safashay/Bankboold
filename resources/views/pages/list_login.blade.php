@extends('master.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('index_login')}}">add employee</a>
          <a class="dropdown-item" href="{{route('list_login')}}">list employee</a>
      </li>
    </ul>
    <form  action="{{route('login_search')}}" method="get" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="name" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div  class="d-flex" style="justify-content: center">
  <h1>account List</h1>
</div>
@if(isset($logins) && $logins->count()>0)
<div  class="d-flex" style="justify-content: center ;">
  
   <table class="table" style="border: 1px;padding:10px">
      <tr class="table-bordered" style="padding:10px">
        <td>name </td>
        <td>email</td>
        <td>show</td>
        <td>delete</td>
      </tr>

      @foreach ($logins as $item)
      <tr  class="table-bordered">
         <td>{{$item->name}}</td>
         <td>{{$item->email}}</td>
        
         <td>
           <a href="{{route('show_login',$item->login_id)}}">
             <i class="fa fa_delete">show</i>
           </a>
         </td>
         <td>
           <a href="{{route('delet_login',$item->login_id)}}">
             <i class="fa fa_delete">delete</i>
           </a>
         </td>
      </tr>

      @endforeach
   </table>
   @if($logins->count()>20)
    <div class="d-flex" style="justify-content: center">
      {!! $logins->links() !!}
    </div>
  @endif

</div>
@else

 <div class="d-flex" style="justify-content: center">no find</div>
 
@endif

@endsection