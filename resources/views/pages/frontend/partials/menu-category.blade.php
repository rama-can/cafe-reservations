<section class="section" id="offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <h6>Klassy Week</h6>
                    <h2>This Week’s Special Meal Offers</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="tabs">
                    <div class="col-lg-12">
                        <div class="heading-tabs">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <ul>
                                        @foreach ($categories as $category)
                                        <li><a href='#tabs-{{ $category->name }}'><img src="{{ $category->image_url }}" alt="">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <section class='tabs-content'>
                            @foreach ($categories as $item)
                            <article id='tabs-{{ $item->name }}'>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="left-list">
                                                @php $count = 0 @endphp
                                                @foreach ($item->foods as $food)
                                                    @if ($count < 3)
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="{{ $food->image_url }}" alt="">
                                                                <h4>{{ $food->name }}</h4>
                                                                <p>{{ $food->description }}</p>
                                                                <div class="price">
                                                                    <h6>{{ $food->curenccy_rupiah }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @php break @endphp
                                                    @endif
                                                    @php $count++ @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="right-list">
                                                @php $count = 0 @endphp
                                                @foreach ($item->foods as $food)
                                                    @if ($count >= 3)
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="{{ $food->image_url }}" alt="">
                                                                <h4>{{ $food->name }}</h4>
                                                                <p>{{ $food->description }}</p>
                                                                <div class="price">
                                                                    <h6>{{ $food->curenccy_rupiah }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @php $count++ @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
