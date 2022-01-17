<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailDonHang extends Mailable
{
    use Queueable, SerializesModels;
    public $DonDatHang;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($DonDatHang)
    {
        $this->subject('Đơn đặt hàng');
        $this->DonDatHang = $DonDatHang;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('trungnhanxl@gmail.com','Shop quần áo cozra')->view('client.sendMail.order');
    }
}
