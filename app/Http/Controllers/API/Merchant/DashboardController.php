<?php

namespace App\Http\Controllers\API\Merchant;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard($branch_id, $limit, $offset) {

        $upcoming = DB::table('branch_experience')
            ->select(DB::raw('branch_experience.id, experiences.id as experienceID, vouchers.code, experiences.name as experienceName, branches.name as branchName'))
            ->join('vouchers', 'branch_experience.voucher_id', '=', 'vouchers.id')
            ->join('companies', 'branch_experience.company_id', '=', 'companies.id')
            ->join('branches', 'branch_experience.branch_id', '=', 'branches.id')
            ->join('experiences', 'branch_experience.experience_id', '=', 'experiences.id')
            ->where('branch_experience.branch_id', $branch_id)
            ->where('vouchers.redeemed_at', NULL)
            ->whereNotNull('vouchers.booking_date')
            ->whereNotNUll('vouchers.booking_time')
            ->limit($limit)
            ->offset($offset)
            ->get();

        return [ 'status' => true, 'upcoming' => $upcoming ];
    }
    public function searchUpcomingBooking($branch_id, $query) {
        $result = DB::table('branch_experience')
        ->select(DB::raw('vouchers.code, experiences.id, experiences.name as experienceName, branches.name as branchName'))
        ->join('vouchers', 'branch_experience.voucher_id', '=', 'vouchers.id')
        ->join('companies', 'branch_experience.company_id', '=', 'companies.id')
        ->join('branches', 'branch_experience.branch_id', '=', 'branches.id')
        ->join('experiences', 'branch_experience.experience_id', '=', 'experiences.id')
        ->where('branch_experience.branch_id', $branch_id)
        ->where('vouchers.redeemed_at', NULL)
        ->whereNotNull('vouchers.booking_date')
        ->whereNotNUll('vouchers.booking_time')
        ->where('vouchers.code', 'LIKE', '%'. urldecode($query)  . '%')
        ->orWhere('experiences.name', 'LIKE', '%'. urldecode($query)  . '%')
        ->orWhere('branches.name', 'LIKE', '%'. urldecode($query)  . '%')
        ->get();

        return [ 'result' => $result ];
    }
}
