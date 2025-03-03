@php use App\Settings\GeneralSettings; @endphp
<div id="top-bar">
    <div class="container">

        <div class="row justify-content-between">
            <div class="col-12 col-md-auto">

                <ul id="top-social">
                    @if ((new GeneralSettings())->facebook)
                    <li>
                        <a href="{{ (new GeneralSettings())->facebook }}" class="h-bg-facebook" target="_blank">
                            <span class="ts-icon"><i class="fa-brands fa-facebook-f"></i></span><span class="ts-text">Facebook</span>
                        </a>
                    </li>
                    @endif
                    @if ((new GeneralSettings())->twitter)
                    <li>
                        <a href="{{ (new GeneralSettings())->twitter }}" class="h-bg-twitter" target="_blank">
                            <span class="ts-icon"><i class="fa-brands fa-twitter"></i></span><span class="ts-text">Twitter</span>
                        </a>
                    </li>
                    @endif
                    @if ((new GeneralSettings())->instagram)
                    <li>
                        <a href="{{ (new GeneralSettings())->instagram }}" class="h-bg-instagram" target="_blank">
                            <span class="ts-icon"><i class="fa-brands fa-instagram"></i></span><span class="ts-text">Instagram</span>
                        </a>
                    </li>
                    @endif

                </ul>

            </div>

            <div class="col-12 col-md-auto">

                <div class="top-links">
                    <ul class="top-links-container">
{{--                        <li class="top-links-item"><a href="#">Locations</a>--}}
{{--                            <ul class="top-links-sub-menu">--}}
{{--                                <li class="top-links-item"><a href="#">San Francisco</a></li>--}}
{{--                                <li class="top-links-item"><a href="#">London</a></li>--}}
{{--                                <li class="top-links-item"><a href="#">Amsterdam</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="top-links-item"><a href="faqs.html">FAQs</a></li>--}}
                        <li class="top-links-item"><a href="{{ route('contact.index') }}">ติดต่อเรา</a></li>
                    </ul>
                </div><!-- .top-links end -->

            </div>
        </div>

    </div>
</div><!-- #top-bar end -->
