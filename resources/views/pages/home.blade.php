@extends('master.app')

@section('content')

<body dir="rtl">
        <div class="footer_nav">
                <ul>
                    <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            </li>
                </ul>
       </div>

        
        

     <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-block intre w-100 intr" id="first"></div>
            </div> 
       </div>
     </div>

         <div class="row">
                <h6 class=""> </h6>         
         </div>
         <div  class="row ">
         @if(auth()->user()->statue=='hospital'))
             <div  class="col-md-4 col-sm-6 col-xs-12">
                 <div class="div_card" >
                     <a href="{{route('sick')}}"id="">
                        <img  class="image_card"src="images/blooddonating.jpg" alt="">
                       <h3 style="	direction: rtl!important;" class="title_card">
                          استمارة المريض
                       </h3>
                     
                     </a>
                 </div>
             </div> 
             @endif
             @if(auth()->user()->statue=='bank')
             <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="car div_card">
                    <a href="{{route('donor')}}" id="">
                        <img class="image_card" src="images/BloodDonation.jpg" alt="">
                        <h3 class="title_card">
                          استمارة للتبرع
                        </h3>
                    </a>
                </div>
            </div> 
            @endif
            <div  class="col-md-4 col-sm-6 col-xs-12">
               <div class="car div_card" >
                 <a href="{{route('bank_index')}}">
                    <img class="image_card"src="images/blood2.png" alt="">
                    <h3 class="title_card">
                        طلبات  التبرع 
                    </h3>
                  
                   
                </a>
               </div>
             </div>
            
         </div>



     
         <h5  class="text-center text-dange" > نصائح بعد التبرع</h5>          
         

           <div class="container">
     
            <div class="row tip">
             
                        
                <div  class="col-lg-4">
                         <img  class="hw" src="images/back.jpg">
                </div>
                <div  class="col-lg-8 right">
                    <div class="row"> <h3  class="tip-header">أمور تفعلها بعد التبرع بالدم</h3></div>


            

                         <ul class="contact_info_list">
                                <li>
                                     <div class="p">
                                            <p class=" tip-text" >عليك البقاء متمدداًعلى السرير بعد التبرع لمدة لا تقل عن عشر دقائق حتى تشعر انك عدت الى طبيعتك .</p>
                                        </div>
                
                                 <li>
                                     <div class="p">
                                         
                                       <p dir="rtl" class=" tip-text">يجدر بك شرب الكثير من السوائل لتساعد في تعويض السوائل المفقودة.</p>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="p">
                                         
                                      <p class=" tip-text">ينبغي عليك التأكد من عدم ارتفاع درجة حرارة جسمك بعد التبرع </p> 
                                   </div>
                                    
                                </li>
                                 <li>
                                        <div class="p">
                                                <p class=" tip-text">وتجنب الاستحمام بالماءالساخن والوقوف تحت أشعة الشمس المباشرة أو احتساء المشروبات الساخنة .</p>
                                            </div>
                                 </li>
                                 <li>
                                        <div class="p">
                                           <p class=" tip-text">تأكد من تناول الأطعمة المغذية التي من شأنها أن تعوض جسمك عما خسره من عناصر غذائية.</p>
                                        </div>
                                 </li>
                       </ul>


                  </div>
                        
               
           </div>
           </div>


             <div class="container">      
            <div class="row tip"> 
                <div class="col-lg-8   left ">
                        <h3 class="tip-header">ماذا افعل في حال اصبت بنزيف خفيف أو بكدمات بعد التبرع :</h3>
                        <ul class="contact_info_list">
                                <li>
                                     <div class="p">
                                            <p class=" tip-text">اضغط بقوة على المنطقة التي قام الممرض بإدخال الإبرة منها</p>                     
                                     </div>
                
                                 <li>
                                     <div class="p">
                                            <p class=" tip-text">ارفع ذراعك فوق كتفك لمدة لاتقل عن نصف ساعة</p>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="p">
                                            <p class=" tip-text">.ضع كيس ثلج على المنطقة المصابة بمجرد  أن يتوقف النزيف ثلاث مرات خلال اليومين التاليين للتبرع </p>
                                     </div>
                                 </li>
                                 <li>
                                        <div class="p">
                                                <p class=" tip-text" >.وتأكد من لف كيس الثلج بقطعة مبللة قبل تطبيقها على جلدك</p>
                                        </div>
                                    </li>
                       </ul>
                </div>
                <div class="col-lg-4">
                    <img  class="  hw" src="images/back.jpg">
               </div>
           </div> 
           </div>


         <div class="container">     
           <div class="row  ">
                <div  class="col-lg-4">
                     <img  class=" hw" src="images/back.jpg">
                </div>

                        
                <div   class="col-lg-8 right">
                        <div class="row">
                            <h3 class="tip-header">أمور لاتفعلها بعد التبرع بالدم</h3>                        
                        </div>
                        <ul class="contact_info_list">
                                <li>
                                     <div class="p">
                                   <p  class=" tip-text">تناول الكافيين والمشروبات الغازية </p>                        
                                     </div>
                
                                 <li>
                                     <div class="p">
                                            <p class=" tip-text">تجنب التدخين</p>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="p">
                                            <p class=" tip-text">القيام بالتمارين المحفزة للقلب</p>
                                     </div>
                                 </li>
                                 <li>
                                        <div class="p">
                                                <p class=" tip-text">الإفراط في ممارسة الرياضة أو حمل الأشياء الثقيلة</p>
                                        </div>
                                    </li>
                             </ul>
                

                </div>
           </div> 
           </div> 
        
        
           <div class="row">
                <h6  > للتواصل</h6>          
           </div>
            
            <section dir="ltr"class="get_in_touch_area p_100">
                    <div class="container">
                            <h3 id="contact"> </h3>
                        <div class="row">
        
                            <!-- Contact Info -->
                            <div class="col-lg-4 ">
                                <div class="contact_info">
                                    <div class="contact_info_content">
                                        <ul class="contact_info_list">
                                           <li>
                                                <div class="">
                                                    <i class="fas fa-map-marker"></i>
                                                </div>
                                                <div>1481 Creekside Lane Avila Beach, CA 93424</div>
                                            </li>
                                            <li>
                                                <div class="">
                                                    <i class="glyphicon glyphicon-envelope"></i>
                                                </div>
                                                <div>yourmail@gmail.com</div>
                                            </li>
                                            <li>
                                                <div class="">
                                                   <i class="fa fa-phone"></i>
                                                </div>
                                                <div>+53 345 7953 32453</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Contact Form -->
                            <div dir="rtl" class="col-lg-8">
                            <div class="contact_form_container">
                            
                                <form action="" method="post" class="contact_form" id="contact_form">
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="col-lg-6 contact_name_col">
                                            <input type="text" class="contact_input" name="Name" placeholder="الاسم" >
                                        </div>
                                        <!-- Email -->
                                        <div class="col-lg-6">
                                            <input type="text" class="contact_input" name="Email" placeholder="Email" >
                                        </div>
                                    </div>
                                    <div><input type="text" class="contact_input" name="Subject" placeholder="Subject"></div>
                                    <div><textarea class="contact_textarea contact_input" name="Message" placeholder="الرسالة" ></textarea></div>
                                    <button class="contact_button button">ارسال</button>
                                </form>
                                @if(session('<br>'))
                                 <div>{{session('statue')}} </div>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
            </section>
        
        
            
        <div class="footer-top">
            <div class="thm-container clearfix">
                <!-- <div class="logo pull-left">
                    <a href="index.html"><img src="img/logo-1-1.png" alt="Awesome Image"/></a>
                </div>/.logo pull-left -->
                <div class="social pull-right">
                    <a href="#" class="fab fa-twitter"></a>
                   <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-google-plus-g"></a>
                </div><!-- /.social pull-right -->
            </div><!-- /.thm-container clearfix -->
        </div><!-- /.footer-top -->
        
        <div class="footer-bottom text-center">
            <div class="thm-container">
                <p>&copy; copyright 2018 by Layerdrops.com</p>
            </div><!-- /.thm-container -->    
        </div><!-- /.footer-bottom -->
        







    
 

    
    
@endsection