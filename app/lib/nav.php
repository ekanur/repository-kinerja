<?

class nav {
	var $max_page = 10;
    var $page_text = "";
    var $out_of_text = "";
    var $page_offset_var = "page.offset";
    var $page_total_var = "page.total";
    var $page_size_var = "page.size";
    var $first_text = "[<<]";
    var $last_text = "[>>]";
    var $prev_text = "[<]";
    var $next_text = "[>]";
    var $page_offset = 0;
    var $page_total = 0;
    var $param = "";
    var $url = "";
	var $url_short = "";
    var $navbar = "";
	var $type="";
    function init($offset, $total,$type='',$vurl='') {
		global $app;
		$script = @explode('/', $_SERVER["PHP_SELF"]);
		$this->type=$type;
		$this->url = $script[@count($script) - 1];
		$this->url_short=$vurl;
		$this->page_offset = $offset;
		$this->page_total = $total;
		$this->page_text = $app['lang']['txt']['page_text'];
		$this->out_of_text = $app['lang']['txt']['out_of_text'];
    }

	function get_offset() {
		return $this->page_offset;
	}

	function build($size) {
		global $app;
		$folder=explode('/',$this->url_short);
		$val_param='';
		if($this->param){
			$var_param=explode('&',$this->param);
			for($m=0;$m<count($var_param);$m++){
				$param[$m]=explode('=',$var_param[$m]);
				$val_param.=$param[$m]['0']."/".$param[$m]['1'];
			}
		}
		$this->page_size = $size;
		$offset = $this->page_offset;
		$length = $this->page_total;
		if ($length <= $size):
			$this->navbar = "";
			return;
		endif;

        $pref = (ereg("\?", $this->url)) ? "&" : "?";
	    $out = '<div><ul class="pagination">';
	    if ($offset > 0):
			if($this->type):
				$out .= "<li><a href='" . $app['www'].'/'.$this->url_short.'/'.$val_param."'>". $this->first_text ."</a></li>";
				//$out .= "<a href='" . $this->url . $pref . $this->page_offset_var . "=" . 0 . "&". $this->page_total_var . "=" . $length . "&". $this->page_size_var . "=" . $size . $this->param . "' class='text'>". $this->first_text ."</a>\n";
				if($offset - $size==0):
					$out .= "<li><a href='" . $app['www'].'/'.$this->url_short.'/'.$val_param."'>". $this->prev_text ."</a></li>";
				else:
	        		$out .= "<li><a href='".$app['www'].'/'.$this->url_short ."/" . ($offset - $size) . "/".$length . "/".$size.'/'.$val_param."'>". $this->prev_text ."</a></li>";
				endif;
			else:
				$out .= "<li><a href='" . $this->url . $pref . $this->page_offset_var . "=" . 0 . "&". $this->page_total_var . "=" . $length . "&". $this->page_size_var . "=" . $size . $this->param . "'>". $this->first_text ."</a></li>";
				$out .= "<li><a href='" . $this->url . $pref . $this->page_offset_var . "=" . ($offset - $size) . "&". $this->page_total_var . "=" . $length . "&". $this->page_size_var . "=" . $size . $this->param . "'>". $this->prev_text ."</a></li>";
			endif;
        else:
            $out .= "";
	    endif;

	    $radius = floor($this->max_page / 2 * $size);
	    if ($offset < $radius):
	        $start = 0;
	    elseif ($offset < $length - $radius):
	        $start = $offset - $radius;
	    else:
	        $start = (floor($length / $size) - $this->max_page) * $size + $size;
            if ($start < 0):
                $start = $size;
            endif;
	    endif;
		for ($i = $start; (($i < $length) && ($i <= $start + $this->max_page * $size)); $i += $size):
	        if ($i == $offset):
	            $out .= "<li class=\"disabled\"><a href=\"#\">" . ($i / $size + 1) . "</a></li>";
	        else:
				if($this->type):
					if($i==0):
						$out .= "<li><a href='" . $app[www].'/'.$this->url_short.'/'.$val_param."'>" . ($i / $size + 1) . "</a></li>";
					else:
						$out .= "<li><a href='" . $app[www].'/'.$this->url_short .'/'.  $i .'/'. $length .'/'. $size .'/'.$val_param."'>" . ($i / $size + 1) . "</a></li>";
					endif;
				else:
					$out .= "<li><a href='" . $this->url . $pref . $this->page_offset_var . "=" . $i . "&" . $this->page_total_var . "=" . $length . "&". $this->page_size_var . "=" . $size . $this->param . "'>" . ($i / $size + 1) . "</a></li>";
				endif;
	        endif;
	    endfor;
	    if ($offset < $length - $size):
			if($this->type):
					$out .= "<li><a href='" .$app['www'].'/'.$this->url_short.'/'. ($offset + $size) ."/" . $length . "/". $size .'/'.$val_param. "'>". $this->next_text ."</a></li>";
					//$out .= "<a href='" . $this->url . $pref . $this->page_offset_var . "=" . (floor($length/$size) - 1) * $size . "&". $this->page_total_var . "=" . $length . "&". $this->page_size_var . "=" . $size . $this->param . "'>". $this->last_text ."</a>\n";
					$out .= "<li><a href='" . $app['www'].'/'.$this->url_short.'/'. (ceil($length/$size) - 1) * $size . "/".$length ."/".$size.'/'.$val_param."'>". $this->last_text ."</a></li>";
					/*if($i==0):
						$out .= "<a href='" . $app[www].'/'.$folder[0]."' class='text'>" . ($i / $size + 1) . "</a>\n";
					else:
						$out .= "<a href='" . $app[www].'/'.$this->url_short .'/'.  $i .'/'. $length .'/'. $size ."' class='text'>" . ($i / $size + 1) . "</a>\n";
					endif;*/
			else:
					$out .= "<li><a href='" . $this->url . $pref . $this->page_offset_var . "=" . ($offset + $size) . "&" . $this->page_total_var . "=" . $length . "&". $this->page_size_var . "=" . $size . $this->param . "'>". $this->next_text ."</a></li>";
					//$out .= "<a href='" . $this->url . $pref . $this->page_offset_var . "=" . (floor($length/$size) - 1) * $size . "&". $this->page_total_var . "=" . $length . "&". $this->page_size_var . "=" . $size . $this->param . "'>". $this->last_text ."</a>\n";
					$out .= "<li><a href='" . $this->url . $pref . $this->page_offset_var . "=" . (ceil($length/$size) - 1) * $size . "&". $this->page_total_var . "=" . $length . "&". $this->page_size_var . "=" . $size . $this->param . "'>". $this->last_text ."</a></li>";
			endif;
	    endif;
		$out.=' </ul></div>';
        $this->navbar = $out.'<br>';
	}

	function navbar() {
		return $this->navbar;
	}

	function navbar_text() {
		global $app;
		if ($this->navbar):
			$out = "{$app['lang']['txt']['page']} " . ($this->page_offset / $this->page_size + 1) . " {$app['lang']['txt']['out_of']} " . ceil($this->page_total / $this->page_size) . "&nbsp;";
		endif;
		return $out;
	}

	function up(){
		global $app;
		$img = "<img src=\"{$app['www']}/img/up.gif\" align=\"right\"  onClick=\"javasript:location.replace('#')\" title=\"To Upper Line\">";
		return $img;
	}
}

?>