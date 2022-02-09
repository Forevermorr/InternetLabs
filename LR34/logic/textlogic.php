<?php
error_reporting(0);
$ContextOptions = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    ),
);

$preset1 = "https://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D0%BD%D0%BE%D1%80%D0%B8%D0%BD%D1%85%D0%B8";
$preset2 = "https://echo.msk.ru/programs/sorokina/2917870-echo/";
$preset3 = "https://mishka-knizhka.ru/skazki-dlay-detey/zarubezhnye-skazochniki/skazki-alana-milna/vinni-puh-i-vse-vse-vse/#glava-pervaya-v-kotoroj-my-znakomimsya-s-vinni-puhom-i-neskolkimi-pchy";

if ($_GET["preset"]) {
    if ($_GET["preset"] == "1") {
        $text = file_get_contents($preset1, false, stream_context_create($ContextOptions));
    }
    elseif ($_GET["preset"] == "2") {
        $text = file_get_contents($preset2, false, stream_context_create($ContextOptions));
    }
    elseif ($_GET["preset"] == "3") {
        $text = file_get_contents($preset3, false, stream_context_create($ContextOptions));
    }
    else {
        $text = $_POST["text"];
    }
    $analyze = new AnalyzeText($text);
}
else {
    if ($_POST["text"]) {
        $text = $_POST["text"];
    }
    $analyze = new AnalyzeText($text);
}


class analyzeText{
    public $bodyText;

    public function __construct($text){
        $this->bodyText = $text;
    }

    public function First(){
        $i = 0;
        $numlist = '<ol class = "ollist">';
        $checktext = preg_match_all('#\s?<h[12][^>]*>(.*?)</h[12][^>]*>\s?#', $this->bodyText, $matches, PREG_SET_ORDER);
        if ($checktext) {
            $checkerh2 = false;
            if(strpos($matches[0][0], "h2")){
                $checkerh2 = true;
            }
            while($matches[$i][0]){
                if (strpos($matches[$i][0], "h1") && $matches[$i + 1][0]) {
                    $numlist = $numlist . '<li class = "lilist">';
                    if (!strpos($matches[$i + 1][0], "h1")) {
                        $numlist = $numlist . $matches[$i][1] . '<ol class="ollist">';
                    } else {
                        $numlist = $numlist . $matches[$i][1] . '</li>';
                    }
                } elseif (strpos($matches[$i][0], "h2") && $matches[$i + 1][0]) {
                    $numlist = $numlist . '<li class = "lilist">';
                    if (!strpos($matches[$i + 1][0], "h2") && $checkerh2==false) {
                        $numlist = $numlist . $matches[$i][1] . '</li></ol></li>';
                    }elseif(!strpos($matches[$i + 1][0], "h2")&&$checkerh2==true){
                        $numlist = $numlist . $matches[$i][1] . '</li></ol><ol class = "ollist">';
                        $checkerh2 == false;
                    }
                    else {
                        $numlist = $numlist . $matches[$i][1] . '</li>';
                    }
                }
                elseif(!$matches[1][0]){
                    $numlist = $numlist . '<li class = "lilist">'. $matches[0][1].'</li></ol>';
					}
                elseif(strpos($matches[$i][0], "h2") && !$matches[$i + 1][0] && $checkerh2 == false){
                    $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol></li></ol>';
                }
                elseif(strpos($matches[$i][0], "h2") && !$matches[$i + 1][0] && $checkerh2 == true){
                    $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol>';
                }
                elseif(strpos($matches[$i][0], "h1") && !$matches[$i + 1][0]){
                    $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol>';
                }
                $i++;
            }
            return $numlist;
        } else {
            return 0;
        }
    }

    public function Ninth(){
        $this->bodyText = preg_replace("/([^\s]?)\s?([.,?!:;-])\s?([^\s]?)/u", "\$1\$2 \$3" , $this->bodyText);
        $this->bodyText = preg_replace("/\s+([\.|,|!|\?|-]+)/", '\\1', $this->bodyText);
        $this->bodyText = preg_replace("/(-)\s+/", '\\1', $this->bodyText);
		return $this->bodyText;
    }	
	
    public function Fourteenth(): array {
        $a = array();
        $linksAs = array();
        $domBody = new DOMDocument();
        @$domBody->loadHTML('<?xml encoding="utf-8" ?>' . $this->bodyText);
        $divs = $domBody->getElementsByTagName("div");
        foreach ($divs as $key=>$div) {
            $divs[$key]->setAttribute("id", "{$key}");
            $TextA = ($div->getElementsByTagName("a"))[0]->nodeValue;
            if ($TextA) {
                array_push($a, $TextA);
                array_push($linksAs, "<a href=\"#{$key}\">Ссылка №{$key} : {$TextA}</a></br> ");
            }
        }
        $this->bodyText = $domBody->saveHTML();
        return array($this->bodyText, $linksAs);
    }
}
?>