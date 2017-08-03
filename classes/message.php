<?php
	class Message{
		public static function setMsg($text, $type){
			$_SESSION['msgText'] = $text;
			$_SESSION['msgType'] = $type;
		}

		public static function showMsg(){
			//print_r($_SESSION);
			if(!empty($_SESSION['msgType']) && !empty($_SESSION['msgText'])){
				if($_SESSION['msgType'] == "success"){
					echo '<div class="alert alert-success fade in alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>

  						    <ul class="fa-ul">
                            <li>
                                <i class="fa fa-info-circle fa-lg fa-li" aria-hidden="true">
                                </i><strong class="sr-only">Example: basic icon</strong>
                                '.$_SESSION['msgText'].'</li></ul></div>' ;
				}
				if($_SESSION['msgType'] == "danger"){
					echo '<div class="alert alert-dange fade in alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
  						    <ul class="fa-ul"><li>
                                <i class="fa fa-exclamation-triangle fa-li fa-lg" aria-hidden="true">
                                </i><strong class="sr-only">Example: basic icon</strong>
                                '.$_SESSION['msgText'].'</li></ul></div>' ;
				}



				unset($_SESSION['msgText']);
				unset($_SESSION['msgType']);
			}
		}

	}
?>