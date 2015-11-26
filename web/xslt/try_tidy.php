<?php

require_once ('arana/simple_html_dom.php');
// $url = 'http://www.ripley.cl/ripley-chile/moda/calzado-mujer/botas-y-botines';
// $url = 'http://localhost/criptografia/';
// $url = 'http://localhost/intento_xslt/asaa.xhtml';
// $url = 'http://localhost/intento_xslt/algo.xhtml';
// $url = 'http://www.ripley.cl/ripley-chile/moda/calzado-mujer/botas-y-botines/2000350625319';
// $url = 'http://www.ripley.cl/ripley-chile/moda/calzado-mujer/botas-y-botines/2000350592307';
// $url = 'http://www.ripley.cl/ripley-chile/moda/calzado-mujer/ver-todo-calzado-muj-3/2000350101844';
// $url = 'http://www.ripley.cl/ripley-chile/computacion/marcas-computacion/ver-todo-marcasp/telon-acer-acc-158-2000339113653p';
$url = $_GET['url'];
$html = tomarHtml($url);
$tidy = transformarXHTML($html);
// echo $tidy;
generarArchivo($tidy);

function tomarHtml($url){
    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_URL, $url);  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);  
    $str = curl_exec($curl);  
    curl_close($curl);  
    $html = str_get_html($str);
// print_r(get_loaded_extensions());
        foreach ($html->find('body') as $body) {

        }


    return $body;
}

function transformarXHTML($html){
    // Specify configuration
     $config = array(
                'indent'         => true,
                'output-xhtml'   => true,
                'wrap'           => 200);

     // Tidy

    $tidy = new tidy;
    $tidy->parseString($html, $config, 'utf8');
    $tidy->cleanRepair();
    $tidy = str_replace('waistate:live="polite"', '', $tidy);
    $tidy = str_replace('waistate:atomic="true"', '', $tidy);
    $tidy = str_replace('waistate:relevant="all"', '', $tidy);
    $tidy = str_replace('waistate:haspopup="true"', '', $tidy);
    $tidy = str_replace('waistate:controls="ShopCartDisplay"', '', $tidy);
    $tidy = str_replace('&nbsp', '', $tidy);
    $name = "'name'";
    $asd = utf8_encode('span[@itemprop='.$name.']');
    $tidy = str_replace('</body>', '<a id="nombreTag">'.$asd.'</a></body>', $tidy);

    // Output
     // echo $tidy;
    // echo $html;
    // echo $html;
    // echo "asd";
     return $tidy;
}

function generarArchivo($tidy){
    $tex ='<?xml version="1.0" encoding="UTF-8"?>';
    $tex1 = "\n";
    $tex2 = '<?xml-stylesheet type="text/xsl" href="test.xsl"?>';

    $file = fopen("algo.xhtml", "w+");
    fwrite ($file,$tex.$tex1.$tex2.$tex1.$tidy); 

    fclose($file);
}
            ?>
            <script type="text/javascript">
                    alert("Proceso Terminado!");
                    // window.close();
                    // window.history.back();
                    window.location.replace(document.referrer);

            </script>                   
            <?php
?>
