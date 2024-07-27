
<footer id="colorlib-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col footer-col colorlib-widget">
                <h4>About FootyWooty</h4>
                <p>
                    Discover FootyWooty for stylish shoes with easy browsing, secure checkout,
                    and real-time tracking. Find your perfect pair!
                </p>
                <p>
                    <ul class="colorlib-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                </p>
            </div>
            <div class="col footer-col colorlib-widget">
                <h4>Navigation Links</h4>
                <p>
                    <ul class="colorlib-footer-links">
                        <li>
                            <a href="{{route('frontend.showallproducts')}}">Show All Products</a>
                        </li>
                        @if(Auth::guard('webuser')->check())
                            <li>
                                <a href="{{route('frontend.logout')}}">Logout</a>
                            </li>
                        @else
                            <li>
                                <a href="{{route('frontend.login')}}">Login</a>
                            </li>
                            <li>
                                <a href="{{route('frontend.register')}}">Register</a>
                            </li>
                        @endif
                    </ul>
                </p>
            </div>
            <div class="col footer-col colorlib-widget">
                <h4>Information</h4>
                <p>
                    <ul class="colorlib-footer-links">
                        <li><a href="{{route('frontend.about')}}">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </p>
            </div>

            <div class="col footer-col">
                <h4>Contact Information</h4>
                <ul class="colorlib-footer-links">
                    <li>Bettadasanapur, 560100 <br>Bengaluru, Karnataka</li>
                    <li>+ 9876 543 210</li>
                    <li>info@footywooty.com</li>
                    <li>Mobile App : <a href="https://github.com/Shovit75/FootyWooty">
                        <span style="color: black">
                            FootyWooty
                        </span>
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
        <div class="text-center pb-2">
        <p>
            <span>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> | <a href="https://github.com/Shovit75/FootyWooty"> Website Modified by Shovit</a>
            </span>
        </p>
    </div>
</footer>
</div>

<div class="gototop js-top">
<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- popper -->
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<!-- bootstrap 4.1 -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- jQuery easing -->
<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<!-- Flexslider -->
<script src="{{asset('frontend/js/jquery.flexslider-min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/magnific-popup-options.js')}}"></script>
<!-- Date Picker -->
<script src="{{asset('frontend/js/bootstrap-datepicker.js')}}"></script>
<!-- Stellar Parallax -->
<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
<!-- Main -->
<script src="{{asset('frontend/js/main.js')}}"></script>

</body>
</html>
