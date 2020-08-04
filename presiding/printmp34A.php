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
if (isset($_SESSION['loggedin']) && isset($_SESSION['presiding_username'])  && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['presiding_username'];
  $current_presiding = $_SESSION['presiding_fullname'];
  $pollingname=$_SESSION['presiding_pollingname'];
   //$clerkid=$_SESSION['clerkid'] ;
  $currentpolling=$_SESSION['presiding_currentpolling'] ;
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
     $this->Cell(0,20,'Automated Voting Management System',0,1,'C');
     $this->SetTextColor(0,0,0);
    $this->SetFont('Times','',15);
     $this->Cell(0,1,'Polling Station: '.$pollingname,0,1,'C');
     $this->Cell(0,20,'FORM 34A: Member of Parliament Results ',0,1,'C');

     $this->SetTextColor(0,255,0);
     $this->SetFont('Times','',13);
     $this->Cell(10,10,'Sno',1,0,'C');

       $this->SetTextColor(0,255,0);
     $this->SetFont('Times','',13);
     $this->Cell(70,10,'MP Name',1,0,'C');

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
if (isset($_SESSION['loggedin']) && isset($_SESSION['presiding_username'])  && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['presiding_username'];
  $current_presiding = $_SESSION['presiding_fullname'];
  $pollingname=$_SESSION['presiding_pollingname'];
   //$clerkid=$_SESSION['clerkid'] ;
  $currentpolling=$_SESSION['presiding_currentpolling'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
    //select applicant info
      $counts=1;
          $sql1 = "SELECT * FROM `presiding_results` where polling='$currentpolling' && type='MP'";
             $result1 = $conn->query($sql1);
             if ($result1->num_rows > 0) {
              while($row1 = $result1->fetch_assoc()) {
                $pres=$row1['contestant'];
                   $sql21 = "SELECT mp.Sno,mp.uname,mp.partycode,party.partycode,party.partyname FROM `mp`,party WHERE mp.Sno='$pres' && mp.partycode=party.partycode order by mp.Sno ";
                      $resultvote=mysqli_query($conn,$sql21);
                      if(mysqli_num_rows($resultvote)>0){
                        while($row21 =mysqli_fetch_array($resultvote)) {
                           
                           
                           $pdf->SetTextColor(0,0,0);
                           $pdf->SetFont('Times','B',12);
                           $pdf->Cell(10,6,$counts,1,0,'C');
                           $pdf->SetTextColor(0,0,0);
                           $pdf->SetFont('Times','B',12);
                           $pdf->Cell(70,6,$row21['uname'],1,0,'C');

                            $pdf->SetTextColor(0,0,0);
                           $pdf->SetFont('Times','B',12);
                           $pdf->Cell(50,6,$row21['partyname'],1,0,'C');

                            $pdf->SetTextColor(0,0,0);
                           $pdf->SetFont('Times','B',12);
                           $pdf->Cell(50,6,$row1['votes'],1,1,'C');


                           $counts++;
                                }
                            } 
                            else{
                              $pdf->Cell(100,10,'MP not Found ',1,1,'C');
                             
                               
                            }
                      }
                    }
                    else{
                       $pdf->Cell(100,10,'No Vote For Any MP '.mysqli_error($conn),1,1,'C');
                           
                         }
 // $sql1 = "SELECT max(votes) as winner,type,contestant FROM `presiding_results` where polling='$currentpolling' && type='MP'";
 //             $result1 = $conn->query($sql1);
 //             if ($result1->num_rows > 0) {
 //              while($row1 = $result1->fetch_assoc()) {
 //                $pres=$row1['contestant'];
                 
                
             $conn->close();



 
$pdf->Output();

?>