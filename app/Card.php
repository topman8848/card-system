<?php
namespace App; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Support\Facades\DB; class Card extends Model { protected $guarded = array(); use SoftDeletes; protected $dates = array('deleted_at'); const STATUS_NORMAL = 0; const STATUS_SOLD = 1; const STATUS_USED = 2; const TYPE_ONETIME = 0; const TYPE_REPEAT = 1; function orders() { return $this->hasMany(Order::class); } function product() { return $this->belongsTo(Product::class); } public static function add_cards($spc52aea, $spd09702, $spcbde7f, $spd4997e, $sp7581fb, $spf02f30) { DB::statement('call add_cards(?,?,?,?,?,?)', array($spc52aea, $spd09702, $spcbde7f, $spd4997e, $sp7581fb, (int) $spf02f30)); } }