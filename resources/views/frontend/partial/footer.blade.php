
<!-- Start footer -->
<footer class="pgb-100 pgt-160  bg-color--dark">
    <div class="container custom_width">
        <div class="row footer_row">
            <div class="col-md-6 col-sm-6">
                <div class="footer-desc-cont">
                    <h5 class="txt-light footer-menu-title">
                        HOGASH STUDIOS
                    </h5>
                    <p class="footer-desc txt-light">
                        We're a full-service digital agency that believes being a Favorite brand is more valuable than just being a Famous one. We craft beautifully useful, connected ecosystems that grow businesses and build enduring relationships between brands and humans.
                    </p>
                </div>
            </div>
            <div class=" col-md-6 col-sm-6 col-xs-12">
                @include('admin.info')
                @include('admin.errors')
                <form action="{{route('contactus.mail')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fancyUsername" class="fancy-form-label">Name</label>
                        <input id="fancyUsername" type="text" class="form-control form-control--fancy name" name="username" placeholder="eg: james_smith">

                    </div>
                    <div class="form-group">
                        <label for="fancyEmail" class="fancy-form-label">Email</label>
                        <input id="fancyEmail" type="text" class="form-control form-control--fancy name" name="email" placeholder="eg: james_smith@example.com">

                    </div>
                    <div class="form-group">
                        <label for="fancySubject" class="fancy-form-label">Subject</label>
                        <input id="fancySubject" type="text" class="form-control form-control--fancy name" name="subject" placeholder="eg: How to use site">

                    </div>
                    <div class="form-group">
                        <label for="fancymessage" class="fancy-form-label">Message</label>
                        <textarea id="fancymessage" type="text" class="form-control form-control--fancy name" name="message">


                        </textarea>
                    </div>

                    <button class="btn btn--round btn--md btn--white" type="submit">   Send </button>

                </form>
            </div>




        </div>
        <div class="row">
            <div class=" col-md-12 col-sm-12">
                <p class="copyright">© {{date('Y')}}
                    <a href="https://kallyas.net">{{config('app.name')}}</a>
                    | ALL RIGHTS RESERVED
                    <a href="https://hogash.com"> {{ucwords(config('app.url'))}}.</a>
                </p>
                </p>
            </div>
        </div>
    </div>

</footer>

