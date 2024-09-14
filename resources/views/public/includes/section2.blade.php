<section class="explore-section section-padding" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="mb-4">Browse Topics</h1>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="design-tab" data-bs-toggle="tab"
                        data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane"
                        aria-selected="true">Design</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="marketing-tab" data-bs-toggle="tab"
                        data-bs-target="#marketing-tab-pane" type="button" role="tab"
                        aria-controls="marketing-tab-pane" aria-selected="false">Marketing</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane"
                        type="button" role="tab" aria-controls="finance-tab-pane"
                        aria-selected="false">Finance</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music-tab-pane"
                        type="button" role="tab" aria-controls="music-tab-pane"
                        aria-selected="false">Music</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="education-tab" data-bs-toggle="tab"
                        data-bs-target="#education-tab-pane" type="button" role="tab"
                        aria-controls="education-tab-pane" aria-selected="false">Education</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel"
                        aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            @foreach ($topics as $topic)
                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="{{ route('topic-detail', $topic['id']) }}">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">{{ Str::limit($topic['title'], 20, '.....') }}
                                                    </h5>

                                                    <p class="mb-0">{{ Str::limit($topic['content'], 20, '.....') }}
                                                    </p>
                                                </div>

                                                <span
                                                    class="badge bg-design rounded-pill ms-auto">{{ $topic['no_of_views'] }}</span>
                                            </div>

                                            <img src="{{ asset('adminassets/images/topics/' . $topic->image) }}"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel" aria-labelledby="marketing-tab"
                        tabindex="0">

                        <div class="row">
                            @foreach ($topics as $topic)
                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">

                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="{{ route('topic-detail', $topic['id']) }}">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">{{ Str::limit($topic['title'], 20, '.....') }}
                                                    </h5>

                                                    <p class="mb-0">{{ Str::limit($topic['content'], 20, '.....') }}
                                                    </p>
                                                </div>

                                                <span
                                                    class="badge bg-advertising rounded-pill ms-auto">{{ $topic['no_of_views'] }}</span>
                                            </div>

                                            <img src="{{ asset('adminassets/images/topics/' . $topic->image) }}"
                                                class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="tab-pane fade" id="finance-tab-pane" role="tabpanel" aria-labelledby="finance-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="{{ route('topic-detail', $topic['id']) }}">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Investment</h5>

                                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                            </div>

                                            <span class="badge bg-finance rounded-pill ms-auto">30</span>
                                        </div>

                                        <img src="{{ asset('publicassets/images/topics/undraw_Finance_re_gnv2.png') }}"
                                            class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-block custom-block-overlay">
                                    <div class="d-flex flex-column h-100">
                                        <img src="{{ asset('publicassets/images/businesswoman-using-tablet-analysis-graph-company-finance-strategy-statistics-success-concept-planning-future-office-room.jpg') }}"
                                            class="custom-block-image img-fluid" alt="">

                                        <div class="custom-block-overlay-text d-flex">
                                            <div>
                                                <h5 class="text-white mb-2">Finance</h5>

                                                <p class="text-white">Lorem ipsum dolor, sit amet consectetur
                                                    adipisicing elit. Sint animi necessitatibus aperiam
                                                    repudiandae nam omnis</p>

                                                <a href="{{ route('topic-detail', $topic['id']) }}"
                                                    class="btn custom-btn mt-2 mt-lg-3">Learn
                                                    More</a>
                                            </div>

                                            <span class="badge bg-finance rounded-pill ms-auto">25</span>
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
                        </div>
                    </div>

                    <div class="tab-pane fade" id="music-tab-pane" role="tabpanel" aria-labelledby="music-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="{{ route('topic-detail', $topic['id']) }}">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Composing Song</h5>

                                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                            </div>

                                            <span class="badge bg-music rounded-pill ms-auto">45</span>
                                        </div>

                                        <img src="{{ asset('publicassets/images/topics/undraw_Compose_music_re_wpiw.png') }}"
                                            class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="{{ route('topic-detail', $topic['id']) }}">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Online Music</h5>

                                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                            </div>

                                            <span class="badge bg-music rounded-pill ms-auto">45</span>
                                        </div>

                                        <img src="{{ asset('publicassets/images/topics/undraw_happy_music_g6wc.png') }}"
                                            class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="{{ route('topic-detail', $topic['id']) }}">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Podcast</h5>

                                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                            </div>

                                            <span class="badge bg-music rounded-pill ms-auto">20</span>
                                        </div>

                                        <img src="{{ asset('publicassets/images/topics/undraw_Podcast_audience_re_4i5q.png') }}"
                                            class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="education-tab-pane" role="tabpanel"
                        aria-labelledby="education-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="{{ route('topic-detail', $topic['id']) }}">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Graduation</h5>

                                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                            </div>

                                            <span class="badge bg-education rounded-pill ms-auto">80</span>
                                        </div>

                                        <img src="{{ asset('publicassets/images/topics/undraw_Graduation_re_gthn.png') }}"
                                            class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="{{ route('topic-detail', $topic['id']) }}">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Educator</h5>

                                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                            </div>

                                            <span class="badge bg-education rounded-pill ms-auto">75</span>
                                        </div>

                                        <img src="{{ asset('publicassets/images/topics/' . $topic->image) }}"
                                            class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>
