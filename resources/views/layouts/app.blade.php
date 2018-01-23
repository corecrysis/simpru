<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    <div class="mv-site">
        @include('layouts.header')
        @section('main-content')
        @show
        @include('layouts.footer')
    </div>
    <!-- .mv-site-->
    @include('layouts.foot')
</body>
</html>