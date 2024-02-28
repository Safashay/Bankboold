@extends('master.app')

@section('content')


 <div class="intre" id="page">
      <form action="{{route('bank_search')}}" method="get">
       <select class="s "  name="type" id="">
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
       <button type="submit" class="search_buttom"> <i class="fa fa-search"></i></button>
      </form>
    
 </div>

 <section class="features-style-one">
   <div class="thm-container">
       <div class="row">
                       
           @foreach ($orders as $item)    
            <div class="col-md-6  col-xs-12">
               <div class="single-feature-style-one text-center order">
                   <div class="icon-box hvr-radial-out">
                       <img class="image_order" src="{{asset('images/bloodd.png')}}">
                   </div><!-- /.icon-box -->
                   <div class="text-box">
                       <p class="tip-header"> الاسم:<i class=" tip-text">{{$item->name}}</i></p>
                        <p class="tip-header">الموقع:<i class=" tip-text">{{$item->regoin}},{{$item->stree}}</i></p>
                        <p class="tip-header">الزمرة:<i class=" tip-text">{{$item->grp_bld}}</i></p>
                        <a><i class="glyphicon glyphicon-envelope"></i></a>
               
                   </div><!-- /.text-box -->
               </div><!-- /.single-feature-style-one -->                
            </div><!-- /.col-md-4 -->
           @endforeach
           @if($orders->count()>20)
              <div class="d-flex ">
                {!! $orders->links() !!}
              </div>
           @endif
       </div><!-- /.row -->
   </div><!-- /.thm-container -->
 </section><!-- /.features-style-one -->
@endsection