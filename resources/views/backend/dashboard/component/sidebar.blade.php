<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      <a href="{{ route('dashboard') }}" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="{{ Auth::check() ? Auth::user()->image : asset('colorlib-regform-7/images/signin-image.jpg') }}">
        </div>
      </a>
      <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
        {{ Auth::check() ? Auth::user()->name : 'Dashboard' }}
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="{{ request()->routeIs('dashboard') ? 'active' : ''}}">
          <a href="{{ route('dashboard') }}">
            <i class="nc-icon nc-bank"></i>
            <p>{{ config('apps.title.index.dashboard') }}</p>
          </a>
        </li>
        <li class="{{ (request()->routeIs('user.profile')) || (request()->routeIs('create.profile'))  ? 'active' : ''}}">
          <a href="{{ route('user.profile') }}">
            <i class="nc-icon nc-single-02"></i>
            <p>{{ config('apps.title.index.profile') }}</p>
          </a>
        </li>
        <li>
          <a href="./tables.html">
            <i class="nc-icon nc-tile-56"></i>
            <p>Table List</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
