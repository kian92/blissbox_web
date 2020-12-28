<?php

namespace App\Mail;

use app\Helpers\DDD;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Coupon;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $address, $order_payee, $order_details, $delivery_cost, $coupon)
    {
        $this->order = $order;
        $this->address = $address;
        $this->order_payee = $order_payee;
        $this->order_details = $order_details;
        $this->delivery_cost = $delivery_cost;
        $this->coupon = $coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $groups = array();

        foreach(json_decode($this->order_details) AS $item) {

            $key = $item->name;
            if (!isset($groups[$key])) {
                $groups[$key] = array(
                    'items' => array($item),
                    'count' => 1,
                    'price' => $item->price
                );
            } else {
                $groups[$key]['items'][] = $item;
                $groups[$key]['count'] += 1;
                $groups[$key]['price'] += $item->price;
            }

        }

        $invoice = \App\Models\Invoice::create(['order_id' => $this->order['id']]);
        $invoice_no = 'BBINV-' . str_pad($invoice['id'], 6, '0', STR_PAD_LEFT);

        $email = $this->view('email.invoice')
            ->with([
                'name' => $this->order_payee['last_name'] . ' ' . $this->order_payee['first_name'],
                'address' => $this->address['billing_address'] . ' ' . $this->address['billing_city'] . ' ' . $this->address['billing_postal'],
                'invoice' => $invoice_no,
                'order' => $this->order,
                'order_details' => $groups,
                'delivery_cost' => $this->delivery_cost,
                'coupon' => $this->coupon
            ])
            ->from('purchase@blissbox.asia', 'Purchase Blissbox')
            ->replyto('purchase@blissbox.asia', 'Purchase Blissbox')
            ->subject('Blissbox - Purchase Receipt');
    }
}
