<?php
class AlipayOfflineMarketShopPublicBindRequest { private $isAll; private $shopIds; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setIsAll($sp89eb75) { $this->isAll = $sp89eb75; $this->apiParas['is_all'] = $sp89eb75; } public function getIsAll() { return $this->isAll; } public function setShopIds($sp88a6d7) { $this->shopIds = $sp88a6d7; $this->apiParas['shop_ids'] = $sp88a6d7; } public function getShopIds() { return $this->shopIds; } public function getApiMethodName() { return 'alipay.offline.market.shop.public.bind'; } public function setNotifyUrl($spb15ce9) { $this->notifyUrl = $spb15ce9; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spcdf48b) { $this->returnUrl = $spcdf48b; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp73de8d) { $this->terminalType = $sp73de8d; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp6b4bda) { $this->terminalInfo = $sp6b4bda; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spa57d40) { $this->prodCode = $spa57d40; } public function setApiVersion($spa5b6f4) { $this->apiVersion = $spa5b6f4; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp8f9ba6) { $this->needEncrypt = $sp8f9ba6; } public function getNeedEncrypt() { return $this->needEncrypt; } }