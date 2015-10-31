<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Express Yourself | Shyfirst</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
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
                    <div class="col-sm-5 col-xs-2"></div>
                    <div class="col-sm-3 col-xs-5 right-link">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">How it Works?</a>
                    </div>
                    <div class="col-sm-1 col-xs-2 right-link">
                        <a href="/faq">Faq</a>
                    </div>
                </div>
            </div>
        </header>
        
        <section>
            <div class="container-fluid">
                <div class="row info">
                    <h2>Just a little information for your dear one</h2>
                </div>
            </div>
        </section>
        
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <form action='/completeProfile' method='POST'>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="sr-only">Your way of living life is ..</label>
                                <input type="text" class="form-control" required name="interests" id="exampleInputEmail1" placeholder="Your way of living life is .. ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="sr-only">Speak your heart out .. </label>
                                <textarea class="form-control" required name="bio" rows="3" placeholder="Speak your Heart out ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="sr-only">Looking for </label>
                                <input type="text" class="form-control" required name="lookingFor" id="exampleInputPassword1" placeholder="Looking for">
                            </div>
                        
                            <select id="cd-dropdown" name="college" class="cd-select">
                                <option value="-1" selected disabled>Your College?</option>
                                
                            @foreach ($colleges as $row)
                                   <option value="{{ $row->college }}"> 
                                   {{ $row->college }}
                                   </option>
                            @endforeach
                            
                            </select>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="sr-only">Not in the list? Add your college here. </label>
                                <input type="text" name="newCollege" class="form-control" id="exampleInputPassword1" placeholder="Not in the list? Add your college here.">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" required> I agree to the <a href="#">Terms &amp Conditions</a>
                                </label>
                            </div>
                            <div class="button-link form-submit" id="left-button-link" >
                                <a id='upform'>Voila !</a>
                            </div>
                            <input type="submit" id='submit' style="display:none;">
                        </form>
                    </div>
                    <div class="col-sm-3"></div>
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
        <script type="text/javascript" src="/assets/js/jquery.dropdown.js"></script>
        <script type="text/javascript">

            $( function() {

                $('#upform').on('click',function(evt){
                    evt.preventDefault();
                    if($('input[name="newCollege"]').val()=== '' && $('input[name="college"]').val()=== '-1' ){
                        $('input[name="newCollege"]').focus();
                    }else{
                    $('#submit').click();
                    }

                });

                $( '#cd-dropdown' ).dropdown( {
                    gutter : 5
                } );

            });

        </script>
    </body>
</html>
