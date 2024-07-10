<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = products::find($productId);
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'url' => $product->url,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $cartItems = Session::get('cart', []);
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Define PayU parameters
        $merchantId = '508029';
        $accountId = '512321'; // Cambiado a tu accountId de PayU
        $description = 'Productos de la tienda';
        $referenceCode = 'TestPayU';
        $tax = 3193;
        $taxReturnBase = 16806;
        $currency = 'COP'; // Moneda colombiana
        $confirmationUrl = url('/confirmation'); // Ajusta según tu ruta
        $responseUrl = url('/response'); // Ajusta según tu ruta
        $test = 1; // Cambia a 0 para producción

        // Generar la firma
        $apiKey = '4Vj8eK4rloUd272L48hsrarnUA'; // Llave secreta proporcionada por PayU
        $signature = md5($apiKey . '~' . $merchantId . '~' . $referenceCode . '~' . $totalAmount . '~' . $currency);

        return view('cart', compact('cartItems', 'totalAmount', 'merchantId', 'accountId', 'description', 'referenceCode', 'tax', 'taxReturnBase', 'currency', 'confirmationUrl', 'responseUrl', 'signature', 'test'));
    }


    public function updateCart(Request $request, $productId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function removeFromCart($productId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Método para procesar la respuesta de PayU
    public function handlePayuResponse(Request $request)
    {
        // Verificar la firma recibida desde PayU
        $receivedSignature = $request->input('signature');
        $expectedSignature = md5(env('PAYU_API_KEY') . '~' . $request->input('merchantId') . '~' . $request->input('referenceCode') . '~' . $request->input('TX_VALUE') . '~' . $request->input('currency') . '~' . $request->input('transactionState'));

        // Comparar la firma recibida con la esperada
        if ($receivedSignature == $expectedSignature) {
            // Firma válida, procesar la respuesta de PayU según el estado de la transacción
            $transactionState = $request->input('transactionState');

            if ($transactionState == 4) { // Transacción aprobada
                // Procesar lógica de negocio (actualizar base de datos, enviar correos, etc.)
                return redirect()->route('thankyou')->with('success', 'Payment successful! Thank you for your purchase.');
            } else {
                // Transacción no aprobada, manejar según necesidades del negocio
                return redirect()->route('cart')->with('error', 'Payment was not successful. Please try again or contact support.');
            }
        } else {
            // Firma inválida, posible intento de fraude
            return redirect()->route('cart')->with('error', 'Invalid signature received. Possible fraud attempt.');
        }
    }

}
