<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Someone likes you | Shyfirst</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/assets/css/bootstrap.css">
        <link rel="stylesheet" href="/assets/css/main.css">
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="collapse" id="collapseExample">
            <div class="container-fluid">
                <div class="row how">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10"><img class="img-responsive hidden-xs" src="/assets/img/infographic.jpg">
                        <img class="img-responsive visible-xs" src="/assets/img/infographic-mobile.jpg"></div>
                    <div class="col-sm-1"></div>
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><span class="fa fa-close"></span></a>
                </div>
            </div>
        </div>
        <header>
            <div class="container-fluid">
                <div class="row nav-links" id="nav-with-logo">
                    <div class="col-sm-3 col-xs-3 left-link">
                        <a href="/" id="logo">Shyfirst</a>
                    </div>
                    <div class="col-sm-4 col-xs-2"></div>
                    <div class="col-sm-4 col-xs-5 right-link">
                        <a href="/profile/edit">Edit Profile</a>
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">How it Works?</a>
                    </div>
                    <div class="col-sm-1 col-xs-2 right-link">
                        <a href="/faq">Faq</a>
                    </div>
                </div>
            </div>
        </header>
       

        
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5  ">
                        <div class="person-content">
                            <ul class="con-ul">
                                <li>{{$cool['name']}}</li>
                                <li>{{$cool['bio']}}</li>
                                <li>{{$cool['interests']}}</li>
                                <li><strong>Looking for</strong> {{$cool['lookingFor']}} </li>
                                <li><strong>College</strong> {{$cool['college']}}</li>
                            </ul>
                        </div>

                        <nav>
                            <ul class="pager">

                                <li class="cmon">Something's burning on both sides. Time to break the ice. C'mon , don't miss the chance!</li>
                                <li class="previous button-link ask"><a href="{{$cool['url']}}"> Explore 
                                @if($cool['sex'] === 'male')
                                    his
                                @else
                                    her   
                                @endif    
                                world <span class="fa fa-heart"></a></li>
                            </ul>
                        </nav>
                        
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3 notification">
                        <p>Notification</p>
                         <ul class="noti">
                            @foreach ($Notifications as $notification)
                           <a href="/match/{{$notification['id']}}"><li 
                           @if ($notification['active'] ==1)
                               class="unread"
                           @endif

                           >{{ $notification['name'] }} likes you too. Get in touch</li></a>
                            @endforeach    
                        </ul>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </section>
        

        
        <footer>
            <div class="container-fluid">
                <div class="row nav-links">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4 right-link tc">
                        <a href="/t&c">Terms &amp Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
       

       
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
        <script src="/assets/js/bootstrap.js"></script>
        <script>
        $(document).ready(function(){
            function updateNotification(){
                $.get('/api/notifications',function(response){
                    var not = $.parseJSON(response);
                    $('.noti').html("");
                    $.each(not,function(key,value){
                        $('.noti').append('<a href="/match/'+value.id+'"><li class = "'+activate(value.active)+'">'+value.name+' likes you too. Get in touch</li></a>');
                    });
                    
                });
                setTimeout(function(){
                    setTimeout(updateNotification(),3000);
                },2000);
            }
            function activate(active){
                if(active===1)
                    return "unread";
            }
            
            updateNotification();
        });


        </script>
    </body>
</html>