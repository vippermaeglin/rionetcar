<?php
 
class Pager{

	public $rowCount = 0;
	public $pageNo = 1;
	public $pageSize = 20;
	public $pageCount = 0;
	public $offset = 0;
	public $pageString = 'pag';

	private $script = null;
	private $valueArray = array();

	public function __construct($count=0, $size=20, $string='pag')
	{
		$this->defaultQuery();
		$this->pageString = "pagina";
		$this->pageSize = abs($size);
		$this->rowCount = abs($count);

		$this->pageCount = ceil($this->rowCount/$this->pageSize);
		$this->pageCount = ($this->pageCount<=0)?1:$this->pageCount;
		$this->pageNo = abs(intval(@$_GET[$this->pageString]));
		$this->pageNo = $this->pageNo==0 ? 1 : $this->pageNo;
		$this->pageNo = $this->pageNo>$this->pageCount 
			? $this->pageCount : $this->pageNo;
		$this->offset = ( $this->pageNo - 1 ) * $this->pageSize;
	}

	private function genURL( $param, $value ){
		global $stringzone,$stringidparceiro;
		$valueArray = $this->valueArray;
		$valueArray[$param] = $value;
		$querystrings  = $_SERVER['QUERY_STRING'];
		
		if( $_REQUEST['idparceiro']){
			$stringidparceiro = "&idparceiro=".$_REQUEST['idparceiro'];
		}
		
		if( $_REQUEST['idcategoria']){
			$stringidcategoria = "&idcategoria=".$_REQUEST['idcategoria'];
		}

		if( $_REQUEST['ordena']){ 
			$ordena = "&ordena=".$_REQUEST['ordena']; 
		}

		if( $_REQUEST['city_id']){ 
			$city_id = "&city_id=".$_REQUEST['city_id']; 
		}
		
		if( $_REQUEST['partner_id']){ 
			$partner_id = "&partner_id=".$_REQUEST['partner_id']; 
		}
		 					
		  //return $this->script . '?' . http_build_query($valueArray) . $stringzone;
		  //return $this->script . '?' . http_build_query($valueArray) . $stringzone;
		  //return 'http://'. @$_SERVER['HTTP_HOST'] . '/' . '?' . http_build_query($valueArray) . $stringzone;
		  //return $ROOTPATH . '/' . '?' . http_build_query($valueArray) . $stringzone . $ordena;
		  return $this->script . '?' . http_build_query($valueArray) . $stringzone . $stringidcategoria . $ordena . $city_id . $partner_id. $stringidparceiro; 
	}

	private function defaultQuery()
	{
		($script_uri = @$_SERVER['SCRIPT_URI']) || ($script_uri = @$_SERVER['REQUEST_URI']);
		$q_pos = strpos($script_uri,'?');
		if ( $q_pos > 0 )
		{
			$qstring = substr($script_uri, $q_pos+1);
			parse_str($qstring, $valueArray);
			$script = substr($script_uri,0,$q_pos);
		}
		else
		{
			$script = $script_uri;
			$valueArray = array();
		}
		$this->valueArray = empty($valueArray) ? array() : $valueArray;
		$this->script = $script;
	}

	public function paginate($switch=1){
		$from = $this->pageSize*($this->pageNo-1)+1;
		$from = ($from>$this->rowCount) ? $this->rowCount : $from;
		$to = $this->pageNo * $this->pageSize;
		$to = ($to>$this->rowCount) ? $this->rowCount : $to;
		$size = $this->pageSize;
		$no = $this->pageNo;
		$max = $this->pageCount;
		$total = $this->rowCount;

		return array(
			'offset' => $this->offset,
			'from' => $from,
			'to' => $to,
			'size' => $size,
			'no' => $no,
			'max' => $max,
			'total' => $total,
		);
	}

	public function GenWap() {
		$r = $this->paginate();
		$pagestring= '<p align="right">';
		if( $this->pageNo > 1 ){
			$pageString.= '4 <a href="' . $this->genURL($this->pageString, $this->pageNo-1) . '" accesskey="4">上页</a>';
		}
		if( $this->pageNo >1 && $this->pageNo < $this->pageCount ){
			$pageString.= '｜';
		}
		if( $this->pageNo < $this->pageCount ) {
			$pageString.= '<a href="' .$this->genURL($this->pageString, $this->pageNo+1) . '" accesskey="6">下页</a> 6';
		}
		$pageString.= '</p>';
		return $pageString;
	}

	public function GenBasic() {
		$r = $this->paginate();
		$buffer = null;
		$index = 'in&iacute;cio';
		$pre = 'anterior';
		$next = 'pr&oacute;ximo';
		$last = '&uacute;ltimo';

		if ($this->pageCount<=7) { 
			$range = range(1,$this->pageCount);
		} else {
			$min = $this->pageNo - 3;
			$max = $this->pageNo + 3;
			if ($min < 1) {
				$max += (3-$min);
				$min = 1;
			}
			if ( $max > $this->pageCount ) {
				$min -= ( $max - $this->pageCount );
				$max = $this->pageCount;
			}
			$min = ($min>1) ? $min : 1;
			$range = range($min, $max);
		}
		
		$buffer .= '<ul class="paginator">';
		$buffer .= "<li style='float:left;margin-right:11px;'>({$this->rowCount} registros ) p&aacute;ginas: </li>";
		if ($this->pageNo > 1) {
			$buffer .= "<li style='float:left;margin-right:11px;' ><a href='".$this->genURL($this->pageString,1)."'>{$index}</a><li style='float:left;margin-right:11px;'><a href='".$this->genURL($this->pageString,$this->pageNo-1)."'>{$pre}</a>";
		}
		foreach($range AS $one) {
		 
			if($one){
				if ( $one == $this->pageNo ) {
					$buffer .= "<li style='float:left;margin-right:11px;' class=\"current\">{$one}</li>";
				} else {
					$buffer .= "<li style='float:left;margin-right:11px;'><a href='".$this->genURL($this->pageString,$one)."'>{$one}</a></li>";
				}
				} 
			}
		if ($this->pageNo < $this->pageCount) {
			$buffer .= "<li style='float:left;margin-right:11px;' ><a href='".$this->genURL($this->pageString,$this->pageNo+1)."'>{$next}</a></li><li style='float:left;margin-right:11px;'><a href='".$this->genURL($this->pageString, $this->pageCount)."'>{$last}</a></li>";
		}
		return $buffer . '</ul>';
	}
}
?>
