<!DOCTYPE html>
@include("pages.head")
<body>
    @include("pages.menu")
    <div class="container">
        @yield("content")
    </div>
    <div class="container">
        @yield("detail")
    </div>
</body>
</html>
