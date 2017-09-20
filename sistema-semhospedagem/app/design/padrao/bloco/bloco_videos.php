 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
	
<? if(!empty($team['video1']) or !empty($team['video2']) ){?>
	<script type="text/javascript" src="<?=$ROOTPATH?>/js/video-js/video.js" ></script> 
	<link href="<?=$ROOTPATH?>/js/video-js/video-js.css" rel="stylesheet" type="text/css">
	  <script>
		videojs.options.flash.swf = "<?=$ROOTPATH?>/js/video-js/video-js.swf";
	</script> 
 <? } ?> 
 
<? if(!empty($team['video1']) ){?>
	<div style="margin-bottom:6px;"> 
	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="311" height="152px"  poster="<?=$this->imagemoferta?>" data-setup="{}">
		<source src="<?=$ROOTPATH?>/media/<?=$team['video1']?>" type='video/mp4' />   
	</video>  
	</div>
<? } ?> 

<? if( !empty($team['video2']) ){?> 
	 <div style="margin-bottom:23px;"> 
		<video id="example_video_2" class="video-js vjs-default-skin" controls preload="none" width="311" height="152px"  poster="<?=$this->imagemoferta2?>" data-setup="{}">
			<source src="<?=$ROOTPATH?>/media/<?=$team['video2']?>" type='video/mp4' />   
		</video>  
	</div>
<? } ?> 

 