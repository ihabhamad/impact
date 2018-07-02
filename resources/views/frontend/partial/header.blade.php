<header id="header" class="site-header header--sticky header--not-sticked site-header--absolute">
    <div class="site-header-main-wrapper clearfix">
        <div class="container siteheader-container">
            <div class="flex-col flex-basis-auto">
                <div class="flex-row site-header-row site-header-main">
                    <!-- left column - logo -->
                    <div class="flex-col flex flex-start-x flex-center-y flex-basis-auto flex-grow-0 flex-sm-half site-header-col-left">
                        <div class="logo-container">
                            <div class="site-logo">
                                <a href="" class="site-logo-anch">
                                    <img class="logo-img-sticky site-logo-img-sticky" src="{{ asset('front/img-assets/logo-landing2.png') }}" alt="logo" title="membership">
                                    <img class="logo-img site-logo-img" src="{{ asset('front/img-assets/logo-landing2.png') }}" alt="logo" title="membership" width="196" height="36">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- right column - navigation menu -->
                    <div class="flex-col flex flex-end-x flex-center-y flex-basis-auto flex-sm-half site-header-col-right site-header-main-right">
                        @include('frontend.menus.menu')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
