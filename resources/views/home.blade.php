@extends('layouts.app')

@section('content')
    <hr>
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex">
            <img src="{{ asset('images/logo/kayanlog.png') }}" alt="" style="height: 250px" class="me-5">
            <h1 class="text-center mt-4">Welcome To Kay-Anlog <br> Baranggay Management Information System</h1>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header text-center">
            <h5>Overview/Statistics</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Census</th>
                        <th scope="col">Count</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Population</td>
                        <td>26,000</td>
                    </tr>
                    <tr>
                        <td>Ongoing Projects</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Upcoming Events</td>
                        <td>4</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header text-center">
            <h5>
                Organization Chart
            </h5>
        </div>
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/nemar.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Nemar G. <br> Mendoza</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Punong Barangay</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/nancy.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Nancy G. <br> Mendoza</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Barangay Kagawad</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/jimmy.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Jimmy O. <br> Castillo</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Barangay Kagawad</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/joanne.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Joanne M. <br> Soriano</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Barangay Kagawad</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/marcos.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Marcos E. <br> Alcantara</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Barangay Kagawad</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/valeriano.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Valeriano T. <br> Evangelista</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Barangay Kagawad</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/marni.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Marni M. <br> Matamis</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Barangay Kagawad</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/aaron.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Aaron O. <br> Lucido</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Barangay Kagawad</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/kym.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hon. Kym Ervin J. <br> Alcantara</h5>
                            <h6 class="card-subtitle mb-2 text-muted">SK Chairman</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/lea.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sec. Lea P. <br> Tercero</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Kalihim</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/pics/rodelyn.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">Treas. Rodelyn M. <br> Grumal</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Ingat Yaman</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
