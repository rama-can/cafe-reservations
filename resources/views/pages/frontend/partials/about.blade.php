<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>About Us</h6>
                        <h2>{{ $getTheme['site_name'] }}</h2>
                    </div>
                    <p>{{ $getTheme['about-us'] }}</p>
                    @if($food->isNotEmpty())
                        <div class="row">
                            @foreach ($food->take(3) as $item)
                                <div class="col-4">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->name }}">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Tidak ada data yang tersedia.</p>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="right-content">
                    <div class="thumb">
                        <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                        <img src="assets/images/about-video-bg.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
