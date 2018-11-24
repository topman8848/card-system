<?php
require_once '../lib/WxPay.Api.php'; class JsApiPay { public $data = null; public function GetOpenid() { if (!isset($_GET['code'])) { $sp4c3fe1 = urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']); $sp833b34 = $this->__CreateOauthUrlForCode($sp4c3fe1); Header("Location: {$sp833b34}"); die; } else { $spc8e60b = $_GET['code']; $spd321f1 = $this->getOpenidFromMp($spc8e60b); return $spd321f1; } } public function GetJsApiParameters($sp2bfca5) { if (!array_key_exists('appid', $sp2bfca5) || !array_key_exists('prepay_id', $sp2bfca5) || $sp2bfca5['prepay_id'] == '') { throw new WxPayException('参数错误'); } $sp90e982 = new WxPayJsApiPay(); $sp90e982->SetAppid($sp2bfca5['appid']); $sp07e513 = time(); $sp90e982->SetTimeStamp("{$sp07e513}"); $sp90e982->SetNonceStr(WxPayApi::getNonceStr()); $sp90e982->SetPackage('prepay_id=' . $sp2bfca5['prepay_id']); $sp90e982->SetSignType('MD5'); $sp90e982->SetPaySign($sp90e982->MakeSign()); $spc37a03 = json_encode($sp90e982->GetValues()); return $spc37a03; } public function GetOpenidFromMp($spc8e60b) { $sp833b34 = $this->__CreateOauthUrlForOpenid($spc8e60b); $speafaa9 = curl_init(); curl_setopt($speafaa9, CURLOPT_TIMEOUT, $this->curl_timeout); curl_setopt($speafaa9, CURLOPT_URL, $sp833b34); curl_setopt($speafaa9, CURLOPT_SSL_VERIFYPEER, FALSE); curl_setopt($speafaa9, CURLOPT_SSL_VERIFYHOST, FALSE); curl_setopt($speafaa9, CURLOPT_HEADER, FALSE); curl_setopt($speafaa9, CURLOPT_RETURNTRANSFER, TRUE); if (WxPayConfig::CURL_PROXY_HOST != '0.0.0.0' && WxPayConfig::CURL_PROXY_PORT != 0) { curl_setopt($speafaa9, CURLOPT_PROXY, WxPayConfig::CURL_PROXY_HOST); curl_setopt($speafaa9, CURLOPT_PROXYPORT, WxPayConfig::CURL_PROXY_PORT); } $sp904799 = curl_exec($speafaa9); curl_close($speafaa9); $sp94131d = json_decode($sp904799, true); $this->data = $sp94131d; $spd321f1 = $sp94131d['openid']; return $spd321f1; } private function ToUrlParams($spc3c6c8) { $sp3b03ee = ''; foreach ($spc3c6c8 as $spf169bd => $spb83a69) { if ($spf169bd != 'sign') { $sp3b03ee .= $spf169bd . '=' . $spb83a69 . '&'; } } $sp3b03ee = trim($sp3b03ee, '&'); return $sp3b03ee; } public function GetEditAddressParameters() { $sp3a69ca = $this->data; $sp94131d = array(); $sp94131d['appid'] = WxPayConfig::APPID; $sp94131d['url'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; $spaa00eb = time(); $sp94131d['timestamp'] = "{$spaa00eb}"; $sp94131d['noncestr'] = '1234568'; $sp94131d['accesstoken'] = $sp3a69ca['access_token']; ksort($sp94131d); $sp31ee10 = $this->ToUrlParams($sp94131d); $spf8f896 = sha1($sp31ee10); $spdb34c5 = array('addrSign' => $spf8f896, 'signType' => 'sha1', 'scope' => 'jsapi_address', 'appId' => WxPayConfig::APPID, 'timeStamp' => $sp94131d['timestamp'], 'nonceStr' => $sp94131d['noncestr']); $spc37a03 = json_encode($spdb34c5); return $spc37a03; } private function __CreateOauthUrlForCode($spa7840d) { $spc3c6c8['appid'] = WxPayConfig::APPID; $spc3c6c8['redirect_uri'] = "{$spa7840d}"; $spc3c6c8['response_type'] = 'code'; $spc3c6c8['scope'] = 'snsapi_base'; $spc3c6c8['state'] = 'STATE' . '#wechat_redirect'; $sp4ebff0 = $this->ToUrlParams($spc3c6c8); return 'https://open.weixin.qq.com/connect/oauth2/authorize?' . $sp4ebff0; } private function __CreateOauthUrlForOpenid($spc8e60b) { $spc3c6c8['appid'] = WxPayConfig::APPID; $spc3c6c8['secret'] = WxPayConfig::APPSECRET; $spc3c6c8['code'] = $spc8e60b; $spc3c6c8['grant_type'] = 'authorization_code'; $sp4ebff0 = $this->ToUrlParams($spc3c6c8); return 'https://api.weixin.qq.com/sns/oauth2/access_token?' . $sp4ebff0; } }