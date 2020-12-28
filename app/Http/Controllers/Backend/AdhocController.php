<?php

namespace App\Http\Controllers\Backend;

use app\Helpers\DDD;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Barryvdh\Snappy;
use Milon\Barcode\DNS1D;
use Google\Cloud\ServiceBuilder;
use Illuminate\Support\Facades\Mail;
use App\Mail\MerchantCredentials;
use App\Mail\ComingSoon;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Vinkla\Instagram\Instagram;

class AdhocController extends Controller
{
    public function generate() {
//        header('Content-Description: File Transfer');
//        header("Content-type: application/octet-stream");
//        header("Content-disposition: attachment; filename=.jpg");
        echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("110932939816", "C128C") . '" alt="barcode"   />';
//        $disk = Storage::disk('gcs');
//        $url = $disk->put('Barcode/1506079517.png', base64_decode(DNS1D::getBarcodePNG("110932939816", "C128C", 3,33,array(1,1,1), true)));
    }

    public function email() {
        $users = User::where('role_id', 2)->get();

        foreach($users AS $user) {

            $password = str_random(12);
            $user->update(['password' => bcrypt($password)]);

            Mail::to($user['email'])->send(
                new MerchantCredentials(
                    $user,
                    $password
                )
            );
        }
    }

    public function generatePassword() {
        $password = str_random(12);
        return ['password' => $password, 'encrpyt_password' => bcrypt($password)];
    }

    public function sendCoupon() {
        $emails = Newsletter::all();
        foreach($emails AS $email) {
            Mail::to($email['email'])->send(
                new ComingSoon(
                    $email['email'],
                    'H9V2G83UPW23LZ5TMVR9'
                )
            );
        }
    }

    public function sendPassword() {
        $emails = DB::select('SELECT * FROM users_password');

        foreach($emails AS $email) {
            Mail::to($email->email)->send(
                new MerchantCredentials(
                    $email->email,
                    'password'
                )
            );
        }
    }

    public function sendInvoice() {
        Mail::to('weehong@blissbox.asia')->send(
            new MerchantCredentials(
                'test',
                'password'
            )
        );
    }

    public function storePdf() {
        $pdf = PDF::loadView('email.newinvoice');

        return $pdf->download('Invoice.pdf');
    }

    public function sendVoucherPDF() {
        Mail::to('weehong@blissbox.asia')->send(
            new Voucher(
                $pdfList[0][$index],
                $pdfList[1],
                $voucher->pivot['message']
            )
        );
    }

    public function diskStorage() {
        $disk = Storage::disk('gcs');
        $url = $disk->put('Barcode/1506079517.pdf', 'asd');
    }

    public function instagram() {
        $instagram = new Instagram(env('INSTAGRAM_ACCESS_TOKEN'));

        DDD::ddd($instagram->get());
    }

    public function generateFakeData() {

        for ($i = 0; $i < 200000; $i++) {
            DB::table('branch_experience')
            ->insert([
                'voucher_id' => 14,
                'company_id' => 1,
                'branch_id' => 2,
                'experience_id' => 10
            ]);
        }
    }

}
