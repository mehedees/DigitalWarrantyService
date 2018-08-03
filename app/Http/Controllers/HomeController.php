<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts = DB::table('product_details')
            ->paginate(15);

        $histories = DB::table('history')
            ->paginate(15);

        return view('dashboard')
            ->with('products', $allProducts)
            ->with('histories', $histories);
    }

    public function getProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'bail|required|string|max:100',
        ]);
        $productName = $request->product_name;
        //partial match
        $products = DB::table('product_details')
            ->where('product_name', 'like', '%' . $productName . '%')
            ->paginate(20);

        if (count($products) == 0)
        {
            return redirect()->back()
                ->with('errMsg', 'No Products Found');

        } else
        {
            return view('products')
                ->with('products', $products);
        }
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'bail|required|string|max:100|unique:product_details',
            'validity' => 'bail|required|numeric',
            'product_type' => 'bail|required|string|max:100',
        ]);

        $productName = $request->product_name;
        $validity = $request->validity;
        $productType = $request->product_type;

        $newProduct = DB::table('product_details')
            ->insertGetId([
                'product_name' => $productName,
                'validity' => $validity,
                'product_type' => $productType
            ]);
        if ($newProduct > 0) {
            return redirect()->back()
                ->with('successMsg', 'Product Successfully Added');
        } else {
            return redirect()->back()
                ->with('errMsg', 'Failed to Add Product');
        }
    }

    public function recordPurchaseView(Request $request, $product_id)
    {
        $product = DB::table('product_details')
            ->where('id', $product_id)
            ->first();
        return view('recordPurchase')
            ->with('product', $product);
    }

    public function recordPurchase(Request $request)
    {
        $request->validate([
            'uid' => 'bail|required|string|alpha_num|max:100|unique:history',
            'product_name' => 'bail|required|string|max:100|exists:product_details',
            'customer_phone' => 'bail|required|string|min:11|max:11',
            'purchase_date' => 'bail|required|date',
            'validity' => 'bail|required|numeric',
            'expiry_date' => 'bail|required|date',
            'status' => 'bail|required|string',
        ]);

        $uid = $request->uid;
        $productName = $request->product_name;
        $customerPhone = $request->customer_phone;
        $purchaseDate = $request->purchase_date;
        $validity = $request->validity;
        $expiryDate = $request->expiry_date;
        $status = $request->status;

        //re-validating expiry date
        $checkDate = new \DateTime($purchaseDate);
        $checkDate->add(new \DateInterval('P'.$validity.'M'));
        if ($checkDate == new \DateTime($expiryDate))
        {
            $newPurchase = DB::table('history')
                ->insertGetId([
                    'uid' =>$uid,
                    'product_name' => $productName,
                    'customer_phone' => $customerPhone,
                    'purchase_date' => $purchaseDate,
                    'expiry_date' => $expiryDate,
                    'status' => $status
                ]);

            if ($newPurchase > 0)
            {
                return redirect()->route('home')
                    ->with('successMsg', 'Purchase Recorded Successfully');

            } else
            {
                return redirect()->back()
                    ->with('errMsg', 'Failed To Record Purchase');
            }

        } else
        {
            return redirect()->back()
                ->with('errMsg', 'Validity and Expiry Date do not match');
        }
    }

    public function replaceProductView($history_id)
    {
        $history = DB::table('history')
            ->where('id', $history_id)
            ->first();
        if ($history->expiry_date >= date('Y-m-d'))
        {
            return view('replaceProduct')
                ->with('history', $history);
        } else
        {
            return redirect()->back()
                ->with('errMsg', 'Warranty Expired for this product!');
        }
    }

    public function replaceProduct(Request $request)
    {
        $request->validate([
            'uid' => 'bail|required|string|alpha_num|max:100|exists:history',
            'product_name' => 'bail|required|string|max:100|exists:product_details',
            'customer_phone' => 'bail|required|string|min:11|max:11',
            'purchase_date' => 'bail|required|date',
            'expiry_date' => 'bail|required|date',
            'replace_date' => 'bail|required|date',
            'status' => 'bail|required|string',
        ]);

        $uid = $request->uid;
        $productName = $request->product_name;
        $customerPhone = $request->customer_phone;
        $purchaseDate = $request->purchase_date;
        $expiryDate = $request->expiry_date;
        $replaceDate = $request->replace_date;
        $status = $request->status;

        //checking in case form loaded before 12AM but submitted after 12AM
        if ($expiryDate >= date('Y-m-d'))
        {
            $newPurchase = DB::table('history')
                ->insertGetId([
                    'uid' =>$uid,
                    'product_name' => $productName,
                    'customer_phone' => $customerPhone,
                    'purchase_date' => $purchaseDate,
                    'expiry_date' => $expiryDate,
                    'replace_date' => $replaceDate,
                    'status' => $status
                ]);

            if ($newPurchase > 0)
            {
                return redirect()->back()
                    ->with('successMsg', 'Product Replaced Successfully');

            } else
            {
                return redirect()->back()
                    ->with('errMsg', 'Failed To Replace Product');
            }

        } else
        {
            return redirect()->back()
                ->with('errMsg', 'Warranty Expired for this product!');
        }
    }

    public function searchHistory(Request $request)
    {
        $request->validate([
            'uid' => 'required|string|max:100|exists:history',
        ]);
        $uid = $request->uid;
        $histories = DB::table('history')
            ->where('uid', $uid)
            ->get();

        return view('searchHistory')
            ->with('histories', $histories);
    }

}
