<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'RentAMachine') }}</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

        <!-- Custom Font -->
        <link href="{{ asset('public/css/hover.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet" type="text/css">


        <!-- jQuery JS -->
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




    </head>
    <body>
          @include('inc.navbar')

              <div class="container" style="margin-bottom:100px;">
                <div class="row">
                   <div class="col-lg-12">
                      <h3>Categories</h3>
                      <hr />

                      <a href="{{ url('category/1')}}">
                        <div class="col-lg-4 hvr-shrink">
                              <img src="{{ asset('public/img/electricalequipbg.jpg') }}" style="width:100%;height:250px;;" />
                              <div class="caption">
                                <h3 class="textcenter">Electrical</h3>
                              </div>

                        </div>
                      </a>

                      <a href="{{ url('category/2')}}">
                        <div class="col-lg-4 hvr-shrink">
                            <img src="{{ asset('public/img/constructionbg.jpg') }}" style="width:100%;height:250px;;" />
                            <div class="caption">
                              <h3 class="textcenter">Construction</h3>
                            </div>
                        </div>
                      </a>

                      <a href="{{ url('category/3')}}">
                        <div class="col-lg-4 hvr-shrink">
                          <img src="{{ asset('public/img/entertainmentbg.jpg') }}" style="width:100%;height:250px;;" />
                          <div class="caption">
                            <h3 class="textcenter">Entertainment</h3>
                          </div>
                        </div>
                      </a>



                      <a href="{{ url('category/4')}}">
                        <div class="col-lg-4 hvr-shrink">
                          <img src="{{ asset('public/img/houserentbg.jpg') }}" style="width:100%;height:250px;;" />
                          <div class="caption">
                            <h3 class="textcenter">House</h3>
                          </div>
                        </div>
                      </a>

                      <a href="{{ url('category/5')}}">
                        <div class="col-lg-4 hvr-shrink">
                          <img src="{{ asset('public/img/carsbg.jpeg') }}" style="width:100%;height:250px;;" />
                          <div class="caption">
                            <h3 class="textcenter">Car</h3>
                          </div>
                        </div>
                      </a>

                      <a href="{{ url('category/6')}}">
                        <div class="col-lg-4 hvr-shrink">
                          <img src="{{ asset('public/img/kitchenwarebg.jpg') }}" style="width:100%;height:250px;;" />
                          <div class="caption">
                            <h3 class="textcenter">Kitchenware</h3>
                          </div>
                        </div>
                      </a>



                   </div>
                 </div>
              </div>

    </body>
</html>
