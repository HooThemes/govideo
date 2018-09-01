<?php

class GovideoVideo {
  
  private $url;
  private $autoplay;
  private $height;
  
  function __construct($url, $autoplay = 0, $height = 400 ){
    $this->url = $url;
    $this->autoplay = $autoplay;
	$this->height = $height;
		
  }
  public function render_embed() {
    if ($this->is_youtube()) { 
      $this->render_youtube_player(); 
    } elseif($this->is_vimeo()) {
      $this->render_vimeo_player();
    } elseif($this->is_bliptv()) { 
      $this->render_bliptv_player();
    }
  }
  
  private function is_youtube() {
    return strpos($this->url,'youtube') !== false;
  }
  
  private function is_vimeo() {
    return strpos($this->url,'vimeo') !== false;
  }
  
  private function is_bliptv() {
    return strpos($this->url,'vimeo') !== false;
  }
  /* Vimeo Stuff */

  private function render_vimeo_player() {
    echo '<iframe width="100%" height="'.$this->height.'" src="//player.vimeo.com/video/'. $this->get_vimeo_ref_from_url() .'?autoplay='. $this->autoplay .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
  }
  private function get_vimeo_ref_from_url(){
    $last_bit = explode('.com/',$this->url);
    $last_bit = explode('&',$last_bit[1]);
    return $last_bit[0];
  }
  /* Youtube Stuff */
  public function the_youtube_img() {
    echo "<div class='youtube_thumb'><img src=\"//img.youtube.com/vi/".$this->get_youtube_ref_from_url()."/0.jpg\"></div>";
  }
  private function render_youtube_player() {
    echo '<iframe width="100%" height="'.$this->height.'" class="youtube-player" type="text/html" src="//www.youtube.com/embed/'.$this->get_youtube_ref_from_url().'?autoplay='.$this->autoplay.'&rel=0" frameborder="0"></iframe>';
  }
  private function get_youtube_ref_from_url(){
    $last_bit = explode('v=',$this->url);
    $last_bit = explode('&',$last_bit[1]);
    return $last_bit[0];
  }
  /* Blip TV Stuff - no, me neither */
  private function get_bliptv_ref_from_url(){
    $last_bit = explode('play/',$this->url);
    $last_bit = explode('.',$last_bit[1]);
    return $last_bit[0];
  }
  private function the_bliptv_player(){
    echo '<iframe src="//blip.tv/play/'.$this->get_bliptv_ref_from_url().'.html?p='.$this->autoplay.'" frameborder="0" allowfullscreen></iframe><embed type="application/x-shockwave-flash" src="//a.blip.tv/api.swf#'.$this->get_bliptv_ref_from_url().'" style="display:none"></embed>';
  }
  
}