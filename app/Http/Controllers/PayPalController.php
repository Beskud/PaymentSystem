<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $product = Product::where('id',$request->id)->first();
        $response = $provider->createOrder([
            
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            
            "purchase_units" => [
                [
                    "amount" =>  [
                        "currency_code" => "USD",
                        "value" => $product->price,
                        "breakdown" => [
                            "item_total" => [ 
                                "currency_code" => "USD",
                                "value"=> $product->price
                            ]
                        ]
                    ],
                    'custom_id' => $request->id,
                ]
            ]
        ]);
     
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()->route('createTransaction');
        } else {
            return redirect()->route('error_page');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
          
            UserProduct::create([
                'user_id' => Auth::user()->id,
                'product_id' => $response['purchase_units'][0]['payments']['captures'][0]['custom_id']
            ]);

            User::where('id',Auth::user()->id)->
            update([
               'paypal_id' => $response['payment_source']['paypal']['account_id']
            ]);
     
            return redirect()->route('createTransaction');
        } else {
            return redirect()->route('error_page');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()->route('error_page');
    }

    public function errorTransaction(Request $request)
    {
        return view('error_page');
    }
}