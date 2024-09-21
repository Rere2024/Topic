<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Discover. Learn. Enjoy</h1>

                <h6 class="text-center">platform for creatives around the world</h6>

                <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1">

                        </span>

                        <input name="keyword" type="search" class="form-control" id="keyword"
                            placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">

                        <button type="submit" class="form-control">Search</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">
            @if ($firstFeatured)
                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    <div class="custom-block bg-white shadow-lg">
                        <a href="{{ route('test', $firstFeatured->id) }}">
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">{{ $firstFeatured->title }}</h5>

                                    <p class="mb-0">{{ $firstFeatured->content }}.</p>
                                </div>

                                <span
                                    class="badge bg-design rounded-pill ms-auto">{{ $firstFeatured->no_of_views }}</span>
                            </div>

                            <img src="{{ asset('adminassets/images/topics/' . $firstFeatured->image) }}"
                                class="custom-block-image img-fluid" alt="">
                        </a>
                    </div>
                </div>
            @endif

            @if ($secondFeatured)
                <div class="col-lg-6 col-12">
                    <div class="custom-block custom-block-overlay">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset('adminassets/images/topics/' . $secondFeatured->image) }}"
                                class="custom-block-image img-fluid" alt="">

                            <div class="custom-block-overlay-text d-flex">
                                <div>
                                    <h5 class="text-white mb-2">{{ $secondFeatured->title }}</h5>

                                    <p class="text-white">{{ $secondFeatured->content }}.</p>

                                    <a href="{{ route('test', $firstFeatured->id) }}"
                                        class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                </div>

                                <span
                                    class="badge bg-finance rounded-pill ms-auto">{{ $secondFeatured->no_of_views }}</span>
                            </div>

                            <div class="social-share d-flex">
                                <p class="text-white me-4">Share:</p>

                                <ul class="social-icon">
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-twitter"></a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-facebook"></a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-pinterest"></a>
                                    </li>
                                </ul>

                                <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                            </div>

                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
