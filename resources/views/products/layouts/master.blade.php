<!DOCTYPE html>
<html lang="en">
    <head>
		@include('products.layouts.shared.header')
    </head>
    <body>
		@include('products.layouts.shared.navigation')
		@yield('page-content')
		@include('products.layouts.shared.footer')
    </body>
</html>
