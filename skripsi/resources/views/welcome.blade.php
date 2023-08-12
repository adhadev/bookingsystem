<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BMW TEBET </title>
    <link rel="icon" type="image/x-icon" href="/startbootstrap-grayscale-master/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/startbootstrap-grayscale-master/dist/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top" style="font-family: 'Montserrat', sans-serif; color:  white;">
                <img src="https://static.vecteezy.com/system/resources/previews/021/671/890/original/bmw-logo-transparent-free-png.png"
                    alt="BMW Logo" style="height: 30px; margin-right: 10px;">
                BMW TEBET
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation" style="color: white;">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about" style="font-family: 'Montserrat', sans-serif; color: white;font-weight:bold;">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects" style="font-family: 'Montserrat', sans-serif; color: white;font-weight:bold;">Booking</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup" style="font-family: 'Montserrat', sans-serif; color: white;font-weight:bold;">Contact</a></li>
                </ul>
            </div>
        </div>  
    </nav>
    <!-- Masthead-->
    <header class="masthead" style="font-family: 'Montserrat', sans-serif;">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase" style="color: white;">Let's repair</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5" style="font-size: 24px; color: white;text-align: center;">Enchanting Transformations for a Brand-New Feel</h2>
                    <a class="btn btn-primary" href="#projects">Book Now</a>
                </div>
            </div>
        </div>
    </header>
    
    
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">"Your Comfort is Our Priority"</h2>
                    <p class="text-white-50">
                        Discover ultimate comfort with BMW. Our top priority is ensuring your comfort in every interaction. From our welcoming ambiance to our attentive staff, every detail is designed to make you feel at ease. Experience service that revolves around your well-being. Explore BMW today.
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="/startbootstrap-grayscale-master/dist/assets/img/dashboard-car.jpg"
                alt="..." />
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-6 col-lg-5"><img class="img-fluid mb-3 mb-lg-0"
                        src="/startbootstrap-grayscale-master/dist/assets/img/bg-masthead.jpg" alt="..." /></div>
                <div class="col-xl-6 col-lg-6">
                    <div class="featured-text text-center text-lg-left">
                        <h4>- Formulir -</h4>
                        <form action="/input/customer/booking" method="post">
                            @csrf
                            <div class="input-group input-group-lg flex-nowrap mb-2 mt-2">
                                <input type="text" class="form-control" placeholder="Email" aria-label="email"
                                    name="email" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="text" class="form-control" placeholder="Fullname" aria-label="nama"
                                    name="Fullname" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="text" class="form-control" placeholder="Address" aria-label="alamat"
                                    name="alamat" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="tnumber" class="form-control" placeholder="Phone Number" aria-label="no_telp"
                                    name="no_telp" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="text" class="form-control" placeholder="Police Number" name="no_polisi"
                                    aria-label="plat_nomor" aria-describedby="addon-wrapping">
                            </div>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                name="jenis_mobil">
                                <option selected>Select Car Model</option>
                                <option value="BMW SPORT">BMW SPORT</option>
                                <option value="Seri 2">Seri 2</option>
                                <option value="Seri 3">Seri 3</option>
                                <option value="X1">X1</option>
                                <option value="X2">X2</option>
                                <option value="X3">X3</option>
                                <option value="X4">X4</option>
                                <option value="X5">X5</option>
                                <option value="X6">X6</option>
                                <option value="X7">X7</option>
                            </select>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="date" class="form-control" placeholder="tanggal Booking"
                                    aria-label="tanggal_booking" aria-describedby="addon-wrapping"
                                    name="tgl_booking" min="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Confirm</button>
                            <p class="fs-5">Already Booked? <a href="/login/customer">klik disini</a></p>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white ">Contact us For More Information</h2>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">BMW Tunas Mobilindo Parama</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Jl. Dr.Soepomo No. 174, Tebet, Jakarta -12810</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">BMW@yourdomain.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; skripsi Abel</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/startbootstrap-grayscale-master/dist/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
