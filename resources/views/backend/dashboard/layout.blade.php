<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.dashboard.component.head')
</head>

<body>
    <div class="wrapper">
        @include('backend.dashboard.component.sidebar')

        <div class="main-panel">
            @include('backend.dashboard.component.navbar')

            <div class="content">
                @yield('content-dashboard')
            </div>

            @include('backend.dashboard.component.footer')
        </div>
    </div>

    <!--   Core JS Files   -->
    @include('backend.dashboard.component.script')
</body>

</html>
