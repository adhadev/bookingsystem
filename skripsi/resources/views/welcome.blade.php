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
            <a class="navbar-brand" href="#page-top">BMW TEBET</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Booking</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Let's repair</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Sulap Mobilmu Menjadi Seperti Baru</h2>
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
                    <h2 class="text-white mb-4">Kenyamanan Anda adalah Prioritas Kami</h2>
                    <p class="text-white-50">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, id. Repellendus error ipsam
                        quam animi facilis, eveniet odit magnam, sapiente vero voluptatum rerum, cumque ea enim quis
                        soluta ad beatae.
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
                                <input type="text" class="form-control" placeholder="Nama" aria-label="nama"
                                    name="nama" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="text" class="form-control" placeholder="Alamat" aria-label="alamat"
                                    name="alamat" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="tnumber" class="form-control" placeholder="No telp" aria-label="no_telp"
                                    name="no_telp" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="text" class="form-control" placeholder="No Polisi" name="no_polisi"
                                    aria-label="plat_nomor" aria-describedby="addon-wrapping">
                            </div>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                name="jenis_mobil">
                                <option selected>Pilih Jenis Mobil</option>
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
                                    name="tgl_booking">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Confirm</button>
                            <p class="fs-5">Sudah Booking? <a href="/login/customer">klik disini</a></p>
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
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">hello@yourdomain.com</a></div>
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
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div>
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
