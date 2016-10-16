<?php

/**
 * はてなカウンター貼り付けプラグイン
 *
 * @author TakamiChie
 */
 
class Pico_HatenaCounter extends AbstractPicoPlugin {

  protected $enabled = false;

  private $counter_name = "";
  
  private $counter_id = 0;

  private $code = "";
  
  public function onConfigLoaded(array &$config)
  {
    if(isset($config['hatenacounter'])){
      $name = $config['hatenacounter']['name'];
      $id = $config['hatenacounter']['id'];
      $this->code = <<< CODE
<script type="text/javascript"><!--
    hatena_counter_name = "${name}";
    hatena_counter_id = "${id}";
    hatena_counter_ref = document.referrer+"";
    hatena_counter_screen = screen.width + "x" + screen.height+","+screen.colorDepth;
//--></script>
<script type="text/javascript" src="http://counter.hatena.ne.jp/js/counter.js"></script>
<noscript><img src="http://counter.hatena.ne.jp/${name}/${id}" border="0" alt="counter"></noscript>

CODE;

    }
  }

  public function onPageRendering(Twig_Environment &$twig, array &$twigVariables, &$templateName)
  {
    if($this->code){
      $twigVariables['hatena_counter'] = $this->code;
    }
  }

  public function onPageRendered(&$output)
  {
    // 書き込み処理
    if($this->code && strpos($output, "hatena_counter") === FALSE){
      $output = preg_replace("/<\/body>/", "$this->code</body>", $output, 1);
    }
  }

}

?>
