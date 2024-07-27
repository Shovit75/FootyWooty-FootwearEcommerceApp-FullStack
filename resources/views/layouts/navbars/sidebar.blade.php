<div class="sidebar">
    <div class="sidebar-wrapper">
    @can('Product_navigations')
        <div class="logo">
            <a class="simple-text text-center logo-normal">{{ __('Product Navigations') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('product.index') }}">
                    <i class="tim-icons icon-bag-16"></i>
                    <p>{{ __('Products') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('productcat.index') }}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>{{ __('Product Categories') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('productsubcat.index') }}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>{{ __('Product Sub-Categories') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('attribute.index') }}">
                    <i class="tim-icons icon-caps-small"></i>
                    <p>{{ __('Attributes') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('banner.index') }}">
                    <i class="tim-icons icon-palette"></i>
                    <p>{{ __('Banners') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('trustedpartners.index') }}">
                    <i class="tim-icons icon-gift-2"></i>
                    <p>{{ __('Trusted Partners') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('checkoutb.index') }}">
                    <i class="tim-icons icon-cart"></i>
                    <p>{{ __('Checkouts') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('webuser.index') }}">
                    <i class="tim-icons icon-heart-2"></i>
                    <p>{{ __('Webusers') }}</p>
                </a>
            </li>
        </ul>
        @endcan
        @can('User_navigations')
        <div class="logo">
            <a class="simple-text text-center logo-normal">{{ __('User Navigations') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('User Profile') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('User Management') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('permission.index') }}">
                    <i class="tim-icons icon-key-25"></i>
                    <p>{{ __('User Permissions') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('role.index') }}">
                    <i class="tim-icons icon-lock-circle"></i>
                    <p>{{ __('User Roles') }}</p>
                </a>
            </li>
        </ul>
        @endcan
    </div>
</div>
