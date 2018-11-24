<?php
namespace App\Mail; use Illuminate\Bus\Queueable; use Illuminate\Mail\Mailable; use Illuminate\Queue\SerializesModels; use Illuminate\Contracts\Queue\ShouldQueue; class ProductCountWarn extends Mailable { use Queueable, SerializesModels; public $product = null; public $count = null; public function __construct($spb0ecc4, $sp93b866) { $this->product = $spb0ecc4; $this->count = $sp93b866; } public function build() { return $this->subject(config('app.name') . '-库存预警 #' . $this->product->name)->view('emails.product_count_warn'); } }