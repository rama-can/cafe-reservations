<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <div class="right-text-content">
                        <ul class="social-icons">
                            @if (isset($getTheme['facebook']))
                            <li><a href="{{ $getTheme['facebook'] }}"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if (isset($getTheme['twitter']))
                            <li><a href="{{ $getTheme['twitter'] }}"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if (isset($getTheme['instagram']))
                            <li><a href="{{ $getTheme['instagram'] }}"><i class="fa fa-instagram"></i></a></li>
                            @endif
                        </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="logo">
                    <a href="{{ route('landing') }}"><img src="{{ url($getTheme['logo']) }}" alt="{{ $getTheme['site_name'] }}" height="60"></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12">
                <div class="left-text-content">
                    <p>© {{ $getTheme['copyright'] }}.

                    <br>Design: TemplateMo</p>
                </div>
            </div>
        </div>
    </div>
</footer>
