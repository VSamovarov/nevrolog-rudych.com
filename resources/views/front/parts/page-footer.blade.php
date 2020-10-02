<footer id="footer" class="page-footer">
    <div class="container page-footer__wrapper">
        <div class="page-footer__menu">

            <ul class="list-nav">
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="about-us.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="grid-gallery.html">Gallery</a></li>
                <li><a href="grid-blog.html">Blog</a></li>
                <li><a href="contacts.html">Contacts</a></li>
            </ul>

            @include('front.modules.social-links')
        </div>
        <hr />
        <div class="page-footer__footer">
            <div class="brand">
                <a href="index.html">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="128" height="37">
                </a>
            </div>
            <div class="rights">
                <span>©&nbsp;</span>
                <span class="copyright-year">2020&nbsp;</span>
                <span>All Rights Reserved.&nbsp;</span>
                <br class="d-sm-none">
                <a href="privacy-policy.html">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
