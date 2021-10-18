<footer class="pt-50 pb-20 bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="sidebar-widget wow fadeInUp animated mb-30">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">About Blog</h5>
                    </div>
                    <div class="textwidget">
                        <p>
                            Start writing, no matter what. The water does not flow until the faucet is turned on.
                            <br>( This website just for my portofolio )<br>( Website still on development )<br>
                            Feel free to ask me at: raprmdn@gmail.com
                        </p>
                        <p><strong class="color-black">Address</strong><br>
                            Jakarta,<br>
                            Indonesia.</p>
                        <p><strong class="color-black">Follow Digital-Knowledge</strong><br>
                            <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                                <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="sidebar-widget widget_categories wow fadeInUp animated mb-30" data-wow-delay="0.1s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Quick link</h5>
                    </div>
                    <ul class="font-small">
                        <li class="cat-item cat-item-2"><a href="#">About Digital-Knowledge</a></li>
                        <li class="cat-item cat-item-4"><a href="#">Help & Support</a></li>
                        <li class="cat-item cat-item-7"><a href="mailto:cs.digital.knowledge@gmail.com">Hire me</a></li>
                        <li class="cat-item cat-item-7"><a href="mailto:cs.digital.knowledge@gmail.com">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="sidebar-widget widget_tagcloud wow fadeInUp animated mb-30" data-wow-delay="0.2s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Tagcloud</h5>
                    </div>
                    <div class="tagcloud mt-50">
                        @foreach ($tags->shuffle()->take(10) as $tag)
                            <a class="tag-cloud-link" href="{{ route('show.tag', $tag->tag_slug) }}">{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="sidebar-widget widget_newsletter wow fadeInUp animated mb-30" data-wow-delay="0.3s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Newsletter</h5>
                    </div>
                    <div class="newsletter">
                        <p class="font-medium">Subscribe to our newsletter and get our newest updates right on your inbox.</p>
                        <form class="input-group form-subcriber mt-30 d-flex">
                            <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                            <button class="btn bg-primary text-white" type="submit">Subscribe</button>
                            <label class="mt-20"> <input class="mr-5" name="name" type="checkbox" value="1" required=""> I agree to the <a href="#" target="_blank">terms &amp; conditions</a> </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copy-right pt-30 mt-20 wow fadeInUp animated">
            <p class="float-md-left font-small text-muted">© 2021, {{ config('app.name') }} Made with <span class="text-danger"><i class="elegant-icon icon_heart"></i></span></p>
        </div>
    </div>
</footer>
