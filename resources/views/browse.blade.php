<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Find Love | Shyfirst</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/assets/css/bootstrap.css">
        <link rel="stylesheet" href="/assets/css/main.css">
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
        <script src="/assets/js/modernizr.custom.63321.js"></script>
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
        <form  method="GET">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                        <select id="cd-dropdown" name="college" class="cd-select">
                           @foreach ($colleges as $row)
                                   <option value="{{ $row->college }}" 
                                   @if ($row->college === $college)
                                       selected
                                   @endif    
                                   >{{ $row->college }}
                                   </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <input type="submit" id="collegeChange" style="display:none;">
        </form>
        
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-sm-1"></div>
                    
                    <div class="col-sm-5  ">
                                @if(isset($cool[0]['sex']))
                        <div class="person-content">
                            <ul class="con-ul" id="person-data">
                           <li>{{$cool[0]['name'] or ''}}</li>
                                <li>{{$cool[0]['bio'] or ''}}</li>
                                <li>{{$cool[0]['interests'] or '' }}</li>
                                <li><strong>Looking for</strong> {{$cool[0]['lookingFor'] or ''}} </li>
                                <li><strong>College</strong> {{$cool[0]['college'] or ''}}</li>
                                <input type="hidden" name='id' id="personId" value={{$cool[0]['id'] or ''}}>
                            </ul>
                        </div>

                        <nav>
                            <ul class="pager">
                                <li class="previous button-link ask"><a id='yes'>
                                I think I like 
                                @if ($cool[0]['sex'] === 'male')
                                    him
                                @else
                                    her    
                                
                                <span class="fa fa-heart"></a></li>
                                <li class="next  button-link ask"><a id="no">Maybe someone else ! <span aria-hidden="true">&rarr;</span></a></li>
                            </ul>
                            @endif
                        </nav>
                     @else
                        Sorry no one in this college is available.Better luck next time.   
                    @endif
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
        <script type="text/javascript" src="/assets/js/getLucky.js"></script>
        
        <script type="text/javascript" src="/assets/js/jquery.dropdown.js"></script>
        <script type="text/javascript">

            $( function() {

                $.DropDown.prototype.close = function () {

            var self = this;
            this.dd.toggleClass( 'cd-active' );
            if( this.options.delay && Modernizr.csstransitions ) {
                this.opts.each( function( i ) {
                    $( this ).css( { 'transition-delay' : self.options.slidingIn ? ( ( self.optsCount - 1 - i ) * self.options.delay ) + 'ms' : ( i * self.options.delay ) + 'ms' } );
                } );
            }
            this._positionOpts( true );
            this.opened = false;
            $.event.trigger({type:'collegeChange',message:'College Changed'});
            }
                $( '#cd-dropdown' ).dropdown( {
                    gutter : 5,
                } );

            });

        </script>
    </body>
</html>
