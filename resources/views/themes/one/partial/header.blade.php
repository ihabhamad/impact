<!--================================
            SIDE MENU
=================================-->
<!-- PAGE OVERLAY WHEN MENU ACTIVE -->
<div class="gl-side-menu-overlay"></div>
<!-- PAGE OVERLAY WHEN MENU ACTIVE END -->

<div class="gl-side-menu-wrap">
    <div class="gl-side-menu">
        <div class="gl-side-menu-widget-wrap">
            <div class="gl-login-form-wrapper">
                <h3>User Login</h3>
                <p>Login to add new listing </p>

                <div class="gl-login-form">
                    <form action="#">
                        <input type="text" name="gl-user-name" id="gl-user-input" placeholder="User Name">
                        <input type="password" name="gl-user-password" id="gl-user-password" placeholder="Password">
                        <button type="submit">Login</button>
                    </form>
                </div>

                <div class="gl-social-login-opt">
                    <a href="#" class="gl-social-login-btn gl-facebook-login">Login with Facebook</a>
                    <a href="#" class="gl-social-login-btn gl-twitter-login">Login with Twitter</a>
                </div>

                <div class="gl-other-options">
                    <a href="#" class="gl-forgot-pass">Forget Password ?</a>
                    <a href="#" class="gl-signup">Sign up</a>
                </div>
            </div>
        </div>
    </div>

    <button class="gl-side-menu-close-button" id="gl-side-menu-close-button">Close Menu</button>
</div>
<!-- SIDE MENU END -->


<!-- HEADER -->
<header class="gl-header">
    <!-- BOTTOM BAR/NAVIGATION -->
    <div class="gl-header-bottombar">
        <!-- Navigation Menu start-->
         @include('themes.one.menus.menu')
        <!-- Navigation Menu end-->
    </div>
    <!-- END -->
</header>
<!-- HEADER END -->