@extends('marketplace.layouts.main', ['title' => 'AnnaiTutionCentre'])

@section('body')
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

        <section class="pt-3 pb-4" id="count-stats">

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto py-3">
                        <div class="row">
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"><span id="state1" countTo="70">48</span>
                                    </h1>
                                    <h5 class="mt-3">DME</h5>
                                    <p class="text-sm font-weight-normal">Diploma In Mechanical Engineering</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"> <span id="state2" countTo="15">48</span>
                                    </h1>
                                    <h5 class="mt-3">DAE</h5>
                                    <p class="text-sm font-weight-normal">Diplome In Auto-Mobile Engineering</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary" id="state3" countTo="4">48</h1>
                                    <h5 class="mt-3">DCE</h5>
                                    <p class="text-sm font-weight-normal">Diploma In Computer Engineering</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
