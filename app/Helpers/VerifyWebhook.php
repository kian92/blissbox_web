<?php

namespace app\Helpers;

class VerifyWebhook {
    public static function verify($secret, $hmac_header) {
        $calculated_hmac = base64_encode(hash_hmac('sha256', $data, SHOPIFY_APP_SECRET, true));
        return hash_equals($hmac_header, $calculated_hmac);
    }
}
?>