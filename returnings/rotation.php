<?php
require('../fpdf/fpdf.php');
class PDF_Rotate extends FPDF{
var $angle=0;function Rotate($angle,$x=-1,$y=-1){
    if($x==-1)
    	$x=$this->x;
    if($y==-1)
    $y=$this->y;  
      if($this->angle!=0)
      	$this->_out('Q');  
      	  $this->angle=$angle;   
      	   if($angle!=0)    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);    
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F%.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
        }
    }
    function _endpage(){
    if($this->angle!=0)    {
        $this->angle=0;    
            $this->_out('Q');  
              }
              parent::_endpage();
          }
      }
      ?>ExampleHere's an example which defines the utilitymethods RotatedText() and RotatedImage() and uses them to print a text and an image rotated to 45°.
<?php
//require('rotation.php');
      class PDF extends PDF_Rotate{
function RotatedText($x,$y,$txt,$angle){
    //Text rotated around its origin  
      $this->Rotate($angle,$x,$y);
      $this->Text($x,$y,$txt);   
       $this->Rotate(0);
   }
}
   ?>
