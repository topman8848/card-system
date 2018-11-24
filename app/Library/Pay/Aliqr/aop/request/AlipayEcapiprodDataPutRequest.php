<?php
class AlipayEcapiprodDataPutRequest { private $category; private $charSet; private $collectingTaskId; private $entityCode; private $entityName; private $entityType; private $isvCode; private $jsonData; private $orgCode; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setCategory($sp58b2cb) { $this->category = $sp58b2cb; $this->apiParas['category'] = $sp58b2cb; } public function getCategory() { return $this->category; } public function setCharSet($sp51872c) { $this->charSet = $sp51872c; $this->apiParas['char_set'] = $sp51872c; } public function getCharSet() { return $this->charSet; } public function setCollectingTaskId($sp7b71c1) { $this->collectingTaskId = $sp7b71c1; $this->apiParas['collecting_task_id'] = $sp7b71c1; } public function getCollectingTaskId() { return $this->collectingTaskId; } public function setEntityCode($sp812b3c) { $this->entityCode = $sp812b3c; $this->apiParas['entity_code'] = $sp812b3c; } public function getEntityCode() { return $this->entityCode; } public function setEntityName($spb29456) { $this->entityName = $spb29456; $this->apiParas['entity_name'] = $spb29456; } public function getEntityName() { return $this->entityName; } public function setEntityType($sp622cf5) { $this->entityType = $sp622cf5; $this->apiParas['entity_type'] = $sp622cf5; } public function getEntityType() { return $this->entityType; } public function setIsvCode($sp6eeb57) { $this->isvCode = $sp6eeb57; $this->apiParas['isv_code'] = $sp6eeb57; } public function getIsvCode() { return $this->isvCode; } public function setJsonData($spd10f40) { $this->jsonData = $spd10f40; $this->apiParas['json_data'] = $spd10f40; } public function getJsonData() { return $this->jsonData; } public function setOrgCode($sp694d29) { $this->orgCode = $sp694d29; $this->apiParas['org_code'] = $sp694d29; } public function getOrgCode() { return $this->orgCode; } public function getApiMethodName() { return 'alipay.ecapiprod.data.put'; } public function setNotifyUrl($spb15ce9) { $this->notifyUrl = $spb15ce9; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spcdf48b) { $this->returnUrl = $spcdf48b; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp73de8d) { $this->terminalType = $sp73de8d; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp6b4bda) { $this->terminalInfo = $sp6b4bda; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spa57d40) { $this->prodCode = $spa57d40; } public function setApiVersion($spa5b6f4) { $this->apiVersion = $spa5b6f4; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp8f9ba6) { $this->needEncrypt = $sp8f9ba6; } public function getNeedEncrypt() { return $this->needEncrypt; } }