<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Barra de registro -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <a class="navbar-brand" href="#">CardMarket</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>
                
            </button>

        <div class="collapse navbar-collapse" id="navbarColor01">

            <ul class="navbar-nav mr-auto">
     
                <div class="form-group">

                    <label for="exampleInputEmail1"></label>

                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>

                <div class="form-group">

                    <label for="exampleInputPassword1"></label>

                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

                </div>

            </ul>

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </nav>
    <!-- Barra de registro -->

    <!-- Barra de busqueda -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="#">Navbar</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

            </button>

        <div class="collapse navbar-collapse" id="navbarColor02">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">

                    <a class="nav-link" href="#">Home

                        <span class="sr-only">(current)</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">Features</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">Pricing</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">About</a>

                </li>

                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>

                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="#">Action</a>

                            <a class="dropdown-item" href="#">Another action</a>

                            <a class="dropdown-item" href="#">Something else here</a>

                                <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="#">Separated link</a>

                                </div>

                </li>

            </ul>

            <form class="form-inline my-2 my-lg-0">

                <input class="form-control mr-sm-2" type="text" placeholder="Search">

                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>

            </form>

        </div>

    </nav>
    <!-- Barra de busqueda -->

    <!--Tabla de mostrar cartas-->
    <table class="table table-hover">

        <thead>

            <tr>

                <th scope="col">Carta</th>

                <th scope="col">Column heading</th>

                <th scope="col">Column heading</th>

                <th scope="col">Column heading</th>

            </tr>

        </thead>

    <tbody> 

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        
        <div class="container p-4">
            
            <div class="row">
                
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Footer Content</h5>

                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                                voluptatem veniam, est atque cumque eum delectus sint!

                            </p>
                    </div>
        

        
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                        <h5 class="text-uppercase">Links</h5>

                            <ul class="list-unstyled mb-0">

                              <li>
                                <a href="#!" class="text-dark">Link 1</a>
                              </li>

                              <li>
                                <a href="#!" class="text-dark">Link 2</a>
                              </li>

                              <li>
                                <a href="#!" class="text-dark">Link 3</a>
                              </li>

                              <li>
                                <a href="#!" class="text-dark">Link 4</a>
                              </li>

                            </ul>
                    </div>
      

      
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                        <h5 class="text-uppercase mb-0">Links</h5>

                        <ul class="list-unstyled">

                          <li>
                            <a href="#!" class="text-dark">Link 1</a>
                          </li>

                          <li>
                            <a href="#!" class="text-dark">Link 2</a>
                          </li>

                          <li>
                            <a href="#!" class="text-dark">Link 3</a>
                          </li>

                          <li>
                            <a href="#!" class="text-dark">Link 4</a>
                          </li>

                        </ul>

                    </div>
      
        </div>
    
  </div>
  
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  
</footer>
  
</body>
</html>