<?php
class AlipayMemberCardDeletecardRequest { private $bizSerialNo; private $cardMerchantInfo; private $extInfo; private $externalCardNo; private $reasonCode; private $requestFrom; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setBizSerialNo($sp90e44d) { $this->bizSerialNo = $sp90e44d; $this->apiParas['biz_serial_no'] = $sp90e44d; } public function getBizSerialNo() { return $this->bizSerialNo; } public function setCardMerchantInfo($sp1f86a6) { $this->cardMerchantInfo = $sp1f86a6; $this->apiParas['card_merchant_info'] = $sp1f86a6; } public function getCardMerchantInfo() { return $this->cardMerchantInfo; } public function setExtInfo($sp7f1d1a) { $this->extInfo = $sp7f1d1a; $this->apiParas['ext_info'] = $sp7f1d1a; } public function getExtInfo() { return $this->extInfo; } public function setExternalCardNo($spad45c6) { $this->externalCardNo = $spad45c6; $this->apiParas['external_card_no'] = $spad45c6; } public function getExternalCardNo() { return $this->externalCardNo; } public function setReasonCode($sp769e00) { $this->reasonCode = $sp769e00; $this->apiParas['reason_code'] = $sp769e00; } public function getReasonCode() { return $this->reasonCode; } public function setRequestFrom($sp2ca0ce) { $this->requestFrom = $sp2ca0ce; $this->apiParas['request_from'] = $sp2ca0ce; } public function getRequestFrom() { return $this->requestFrom; } public function getApiMethodName() { return 'alipay.member.card.deletecard'; } public function setNotifyUrl($spb15ce9) { $this->notifyUrl = $spb15ce9; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spcdf48b) { $this->returnUrl = $spcdf48b; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp73de8d) { $this->terminalType = $sp73de8d; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp6b4bda) { $this->terminalInfo = $sp6b4bda; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spa57d40) { $this->prodCode = $spa57d40; } public function setApiVersion($spa5b6f4) { $this->apiVersion = $spa5b6f4; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp8f9ba6) { $this->needEncrypt = $sp8f9ba6; } public function getNeedEncrypt() { return $this->needEncrypt; } }