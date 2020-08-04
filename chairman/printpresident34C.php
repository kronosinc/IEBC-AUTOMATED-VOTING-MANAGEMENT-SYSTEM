<?php
require('../fpdf/fpdf.php');

include '../db_config/connection.php';

class PDF extends FPDF
{
// Page header
function Header()
{
   include '../db_config/connection.php';

session_start();
if (isset($_SESSION['loggedin']) && isset($_SESSION['chairman_username'])  && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['chairman_username'];
  $current_user = $_SESSION['chairman_fullname'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }

 $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(0,255,0);

     $this->SetFont('Arial','B',13);
   // $this->Cell(2);
    // Title
     $this->Cell(0,-4,'FORM 34B',0,1,'L');
     $this->Cell(0,20,'Automated Voting Management System',0,1,'C');
     $this->SetTextColor(0,0,0);
    $this->SetFont('Times','',20);

     $this->Cell(0,1,'Commission:Chairman',0,1,'C');
     $this->Cell(0,20,'Presidential Results ',0,1,'C');

     $this->SetTextColor(0,255,0);
     $this->SetFont('Times','',13);
     $this->Cell(10,10,'Sno',1,0,'C');

       $this->SetTextColor(0,255,0);
     $this->SetFont('Times','',13);
     $this->Cell(70,10,'President Name',1,0,'C');

     $this->SetTextColor(0,255,0);
     $this->SetFont('Times','',13);
     $this->Cell(50,10,'Party Name',1,0,'C');

      $this->SetTextColor(0,255,0);
     $this->SetFont('Times','',13);
     $this->Cell(50,10,'Votes Attained',1,1,'C');

  
    // Logo
    $this->Image('../iebc.jpg',10,10,40);
    $this->Image('../iebc.jpg',160,10,40);
     //$this->Image('../uploads/'.$row['passport'],10,40,50,65);

    // Arial bold 15
    $this->SetFont('Arial','B',15);
  
    $this->Ln(0);
            }
            
  

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
 include '../db_config/connection.php';

if (isset($_SESSION['loggedin']) && isset($_SESSION['chairman_username'])  && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['chairman_username'];
  $current_user = $_SESSION['chairman_fullname'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
    //select applicant info

           
                          //select all presedint from that ward
$counts=1;
                       $sql2 = "select sum(county_results.votes) as total, county_results.type,county_results.contestant,president.Sno,president.photo,president.uname,president.partycode,party.partycode,party.partyname from county_results,president,party where type='President' && president.Sno=county_results.contestant && president.partycode=party.partycode group by contestant";
                         $result2 = $conn->query($sql2);
                         if ($result2->num_rows > 0) {
                          while($row2 = $result2->fetch_assoc()) {
                                        $pdf->SetTextColor(0,0,0);
                           $pdf->SetFont('Times','B',12);
                           $pdf->Cell(10,6,$counts,1,0,'C');
                           $pdf->SetTextColor(0,0,0);
                           $pdf->SetFont('Times','B',12);
                           $pdf->Cell(70,6,$row2['uname'],1,0,'C');

                            $pdf->SetTextColor(0,0,0);
                           $pdf->SetFont('Times','B',12);
                            $pdf->Cell(50,6,$row2['partyname'],1,0,'C');

                            $pdf->SetTextColor(0,0,0);
                           $pdf->SetFont('Times','B',12);
                           $pdf->Cell(50,6,$row2['total'],1,1,'C');


                           $counts++;
                                            }
                                        } 
                                        else{
                                           $pdf->Cell(100,10,'President not Found ',1,1,'C');
                                           
                                        }


                //          $sql21 = "SELECT president.Sno,president.uname,president.partycode,party.partycode,party.partyname,constituency_results.type,max(constituency_results.votes) as winner,constituency_results.contestant FROM `president`,party,constituency_results WHERE  president.partycode=party.partycode && constituency='$current_constituency' && type='President' order by president.Sno  ";
                //       if($resultvote=mysqli_query($conn,$sql21)){
                      
                //       if(mysqli_num_rows($resultvote)>0){
                //         while($row21 =mysqli_fetch_array($resultvote)) {
                           
                //            $pdf->Ln(6);
                //            $pdf->SetTextColor(0,255,0);
                //            $pdf->SetFont('Times','B',14);
                //            $pdf->Cell(70,10,'Polling Station Winner: ',1,1,'C');

                //            $pdf->SetTextColor(0,0,0);
                //            $pdf->SetFont('Times','B',12);
                //            $pdf->Cell(70,6,$row21['uname'],1,1,'C');

                //            $pdf->SetTextColor(0,0,0);
                //            $pdf->SetFont('Times','B',12);
                //            $pdf->Cell(70,6,'Votes: '.$row21['winner'],1,1,'C');
                //          //  $pdf->Cell(70,6,mysqli_num_rows($resultvote),1,0,'C');
                //      }
                //    }
                //  }
                // else{
                                     //     $pdf->Cell(100,10,'No Vote For Any President '.mysqli_error($conn),1,1,'C');
                                     // }
             $conn->close();



 
 $pdf->Output();

?>