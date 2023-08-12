<header class="site-navbar" role="banner">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-4 col-xl-4">
                <div class="row"> <span class=""><img src="/logobmw.png" alt="" srcset=""
                            style="width: 50px;" class="ms-5"></span>
                    <h1 class="mb-0 site-logo mt-2 " style="margin-left: 10px;"><a href="/"
                            class="text-white mb-0"> BMW TEBET</a></h1>
                </div>

            </div>
            <div class="col-8 col-md-8 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        @if (Auth::user()->isCustomer())
                           
                        @elseif(Auth::user()->isAdmin())
                            <li><a href="/wo/table"><span>WO</span></a></li>
                            <li><a href="/wo/tagihan"><span>Tagihan</span></a></li>
                            <li class="has-children">
                                <a><span>Data Master</span></a>
                                <ul class="dropdown arrow-top">
                                    <li><a href="/customer/service/booking">Data Mobil</a></li>
                                    <li><a href="/customer/service/onservice">Data Jenis Service</a></li>
                                    <li><a href="/customer/service/onservice">Data Pelanggan</a></li>
                                    {{-- <li><a href="#">Menu Three</a></li> --}}
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>


            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                    href="#" class="site-menu-toggle js-menu-toggle text-white"><span
                        class="icon-menu h3"></span></a></div>

        </div>

    </div>
    </div>

</header>
