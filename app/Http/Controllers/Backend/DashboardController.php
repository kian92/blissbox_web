<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Voucher;
use App\Models\Redemption;
use App\Models\Company;
use app\Models\User;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	switch (Auth::user()->role_id) {
    		case '1':
    			return $this->isUser();
    			break;

			case '2':
				return $this->isMerchant();
				break;
    		
    		default:
    			return $this->isAdministrator();
    			break;
    	}
    }

    protected function isUser() {
    	return view('backend.user.dashboard');
    }

    public function userInformation() {

        $result = Voucher::with('giftbox')->where('user_id', Auth::user()->id)->get();

        return [ 'status' => true, 'result' => $result ];
    }

    protected function isMerchant() {
    	return view('backend.merchant.dashboard', ['content' => 'Merchant']);
    }

    public function merchantInformation() {

        $redeemed = DB::table('vouchers')
            ->select(DB::raw('count(experience_id) as total, experiences.name'))
            ->join('experiences', 'vouchers.experience_id', '=', 'experiences.id')
            ->join('companies', 'experiences.company_id', '=', 'companies.id')
            ->where('companies.id', Auth::user()->company_id)
            ->where('redeemed_at', '!=', NULL)
            ->groupBy('experience_id')->get();

        $upcoming = DB::table('vouchers')
            ->select(DB::raw('count(experience_id) as total, experiences.name'))
            ->join('experiences', 'vouchers.experience_id', '=', 'experiences.id')
            ->join('companies', 'experiences.company_id', '=', 'companies.id')
            ->where('companies.id', Auth::user()->company_id)
            ->where('redeemed_at', NULL)
            ->groupBy('experience_id')->get();

        $booking = Voucher::where([['booking_date', '!=', NULL],['status', 4]])
            ->whereHas('experience', function($query) {
                $query->where([['company_id', Auth::user()->company_id]]);
            })
            ->with(['experience', 'experience.company', 'user'])
            ->get();

        if ($booking) {
            return [ 'status' => true, 'redeemed' => $redeemed, 'booking' => $booking, 'upcoming' => $upcoming ];
        } else {
            return [ 'status' => false, 'redeemed' => $redeemed, 'upcoming' => $upcoming ];
        }
    }

    protected function isAdministrator() {
    	return view('backend.administrator.dashboard', ['content' => 'Administrator']);
    }

    public function adminInformation() {
        $orders = Order::with('user')->where('status', 3)->orderBy('created_at', 'desc')->simplePaginate(10);

        if ($orders) {
            return ['status' => true, 'orders' => $orders];
        } else {
            return [ 'status' => false ];
        }
    }
}
