@extends('master.app') 
 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                                    <a href="{{ route('passward') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">password</a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


      
     <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-block intre w-100 intr" id="first"></div>
            </div> 
       </div>
     </div>
         @auth
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
         @endauth



     
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
                                <form  action="{{route('contact')}}"  method="post" class="contact_form" id="contact_form">
                                   @csrf
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
    </body>
</html>
