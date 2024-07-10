<!-- resources/views/product.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product View</title>
    @vite('resources/css/app.css')
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/fondo.png') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
</head>
<body class="h-screen overflow-hidden">
    <div class="background-fixed fixed inset-0"></div>
    <div class="relative w-full h-full bg-no-repeat bg-cover bg-center bg-shadow bg-opacity-75">
        <div class="content relative z-10 h-full overflow-auto">
            <header class="lg:px-16 px-4 flex flex-wrap items-center py-4">
                <div class="flex-1 flex justify-between items-center">
                    <a href="#" class="text-4xl font-extrabold text-white">
                        <img src="{{ asset('storage/img/logo.png') }}" class="h-20">
                    </a>
                </div>
                <input class="hidden" type="checkbox" id="menu-toggle" />
                <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
                    @include('components/nav_landing')
                </div>
            </header>
            <main class="flex justify-center items-center h-full">
                <div class="container mx-auto my-10 max-w-4xl bg-white rounded-lg shadow-md">
                    <div class="w-full px-10 py-10"> 
                        <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                            <input name="merchantId" type="hidden" value="508029"   >
                            <input name="accountId" type="hidden" value="512321" >
                            <input name="description" type="hidden" value="Test PAYU"  >
                            <input name="referenceCode" type="hidden" value="TestPayU" >
                            <input name="amount" type="hidden" value="20000"   >
                            <input name="tax" type="hidden" value="3193"  >
                            <input name="taxReturnBase" type="hidden" value="16806" >
                            <input name="currency" type="hidden" value="COP" >
                            <input name="signature" type="hidden" value="7ee7cf808ce6a39b17481c54f2c57acc"  >
                            <input name="test" type="hidden" value="0" >
                            <input name="buyerEmail" type="hidden" value="test@test.com" >
                            <input name="responseUrl" type="hidden" value="http://www.test.com/response" >
                            <input name="confirmationUrl" type="hidden" value="http://www.test.com/confirmation" >
                            <input name="Submit" type="submit" value="Send" >
                            <input name="shippingAddress" type="text" value="calle 93 n 47 - 65"   >
                            <input name="shippingCity" type="text" value="Bogotá" >
                            <input name="shippingCountry" type="hidden" value="CO"  >
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
