@extends('marketplace.layouts.main', ['title' => 'product'])
@section('header')
    <div class="page-header min-vh-25 relative"
        style="background: linear-gradient(153deg, rgba(0,0,113,0.6449930313922444) 9%, rgba(0,0,113,1) 60%);">
    </div>
@endsection

@section('body')
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <section class="pt-3 pb-4" id="count-stats">
            <div class="container">
                <div class="row p-3">
                    <div class="col-5">
                        <div class="card" style="width: 30rem; height: 30rem;">
                            {{-- NFT image --}}
                            <input type="hidden" id="userId" value="{{ $nftImg[0]->fkuser_id }}" />
                            <img src="" id="nftImage"
                                class="card-img-top p-3 nftImage"style="width: 30rem; height: 32rem;" alt="...">
                        </div>
                    </div>
                    <div class="col p-5">
                        <div class="row">
                            <h1 id="artName"></h1>
                            <div id="result"></div>
                            <div id="">
                                <img src="" id="nftUserProfile" class="rounded-circle" style="width: 33px;"
                                    alt="Avatar" />
                                <span class="mt-4 fs-4" id="nftProductUserName"></span>
                            </div>


                        </div>
                        <div class="row mt-4 p-2">
                            <div class="col-5" style="border-right: 1px solid rgb(7, 7, 7);">
                                <span>Current Bid</span><br />
                                <h3>3.00 ETH</h3>
                                <span>$9000.00</span>

                            </div>

                            <div class="col-6" style="padding-left: 55px;">
                                <span>Action end in</span><br />
                                <div class="row">
                                    <div class="col">
                                        <h3>19</h3>
                                    </div>
                                    <div class="col">
                                        <h3>00</h3>
                                    </div>
                                    <div class="col">
                                        <h3>00</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <span>Hours</span>
                                    </div>
                                    <div class="col">
                                        <span>Minutes</span>
                                    </div>
                                    <div class="col">
                                        <span>Seconds</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 mt-4">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    style="width: 88%; height: 95%;">Place a Bid
                                </button>
                            </div>
                            <div class="col-6 mt-4" style="padding-left: 63px;">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    style="width: 86%;height: 95%;">View Artwork
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-5 py-5">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-7">
                        <h5 class="float-start" style="font-size: 35px;">Trending Auction</h5>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary float-end" id="filter-btn" type="button">
                            Filter&nbsp;<i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div id="filter-box" style="display:none">
                        <div class="row">
                            <div class="col">
                                <select class="form-select form-control" id="inputGroupSelect04"
                                    aria-label="Example select with button addon">
                                    <option selected>Collections</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="date" class="form-control" placeholder="Date">
                            </div>
                            <div class="col">
                                <i class="fas fa-check-circle" style="font-size: 33px;color:gold;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    @foreach ($getAllNFTImg as $getAllNFTImgs)
                        <div class="col-lg-4 mt-3">
                            <div class="card" style="width: 26rem;height:29rem;">
                                <img src="{{ $getAllNFTImgs->art_attachment }}" class="card-img-top p-2 rounded-8"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $getAllNFTImgs->nft_name }}</h5>
                                    <p class="card-text">{{ $getAllNFTImgs->username }}</p>
                                    <a href="{{ url('marketplace/product/' . $getAllNFTImgs->fkuser_id) }}"
                                        class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(".slick-slider").slick({
            dots: true,
            // arrows: true;
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 3,
            autoplay: false,
            autoplaySpeed: 2000
        });
        // var userId = 2;
    </script>
@endpush
