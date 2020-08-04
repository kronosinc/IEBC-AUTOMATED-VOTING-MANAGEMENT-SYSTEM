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
if (isset($_SESSION['loggedin']) && isset($_SESSION['clerk_username']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation=  $_SESSION['clerk_pollingstation'] ;
  $pollingname=  $_SESSION['clerk_pollingname'] ;
    $clerkid=$_SESSION['clerkid'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
if (isset($_GET['Sno'])) {
  $Sno= $_GET['Sno'];
}
 $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(0,255,0);

     $this->SetFont('Arial','',10);
    // Title
     $this->SetTextColor(0,0,0);
     $this->Cell(0,1,'IEBC Acknowledgment Slip',0,1,'L');

     $this->SetTextColor(0,0,0);
    $this->SetFont('Times','B',10);
     $this->Cell(110,-1,'JAMHURI YA KENYA',0,0,'R');
     $this->Cell(1,10,'REPUBLIC OF KENYA',0,1,'R');
     
$this->Ln(0);
   
    // Logo
    $this->Image('../dist/img/small-iebc.jpg',60,10,10);
    // $this->Image('../logo.png',160,10,40);
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
//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('L','mm',array(100,140));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
 include '../db_config/connection.php';
if (isset($_SESSION['loggedin']) && isset($_SESSION['clerk_username']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation=  $_SESSION['clerk_pollingstation'] ;
  $pollingname=  $_SESSION['clerk_pollingname'] ;
    $clerkid=$_SESSION['clerkid'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
    //select applicant info
 if (isset($_GET['Sno'])) {
  $Sno= $_GET['Sno'];
}

      $counts=1;
          $sql1 = "select * from voters where Sno='$Sno' ORDER BY Sno";
             $result1 = $conn->query($sql1);
             if ($result1->num_rows > 0) {
              while($row = $result1->fetch_assoc()) {
                $polling=$row['polling'];
          $sql2 = "SELECT polling.pollingcode,pollingname,ward.wardcode,ward.wardname,constituency.constituencycode,constituency.constituencyname,county.countycode,county.countyname FROM ward,polling,constituency,county where polling.pollingcode='$polling' && polling.wardcode=ward.wardcode && ward.constituencycode=constituency.constituencycode && constituency.countycode=county.countycode ";
            $result2 = $conn->query($sql2) or die(mysqli_error($conn));
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                  $county=$row2['countyname'];
                  $constituency=$row2['constituencyname'];
                  $ward=$row2['wardname'];
                  $pdf->Image('../uploads/'.$row['photo'],70,10,10,10);
                   $pdf->SetFont('Times','',12);
                   $pdf->Cell(0,-10,'Elector\'s No:',0,1,'L');
                  $pdf->SetFont('Times','U',12);
                  $pdf->Cell(50,10,$Sno,0,1,'C');
                  $pdf->Ln(5);
                   $pdf->SetFont('Arial','B',10);
               $pdf->Cell(40,8,'Elector\'s Full Names: ',1,0,'C');
                $pdf->SetFont('');
                $pdf->Cell(70,8,$row['firstname'].' '.$row['middlename'].' '.$row['lastname'],1,1,'C');
                 $pdf->SetFont('Arial','B',10);
                $pdf->Cell(40,8,'ID/Passport No: ',1,0,'C');
                 $pdf->SetFont('');
                $pdf->Cell(70,8,$row['nid'],1,1,'C');

                $pdf->Cell(40,8,'Polling Station: ',1,0,'C');
                $pdf->SetFont('');
                $pdf->Cell(70,8,$pollingname,1,1,'C');
                 $pdf->SetFont('Arial','B',10);
                $pdf->Cell(40,8,'Assembly Ward: ',1,0,'C');
                 $pdf->SetFont('');
                $pdf->Cell(70,8,$ward,1,1,'C');

                 $pdf->Cell(40,8,'Constituency: ',1,0,'C');
                $pdf->SetFont('');
                $pdf->Cell(70,8,$constituency,1,1,'C');
                 $pdf->SetFont('Arial','B',10);
                $pdf->Cell(40,8,'County: ',1,0,'C');
                 $pdf->SetFont('');
                $pdf->Cell(70,8,$county,1,1,'C');
                  }
                  
            }
               
//update print status here

 $update=" UPDATE `amvs_system`.`voters` SET `voterscard` = 'Printed' WHERE `voters`.`Sno` ='$Sno'";
                    $updateresult=mysqli_query($conn,$update);
                    if ($updateresult) {
                     // echo "Your Reset Password is <br><b>".$Password."</b>";
                    }
                    else{
                      //echo "Reset Password Not Generated.<br>Please Reset Again".mysqli_error($conn);
                    }
            ///
                      }

                    }
                    else{
                       $pdf->Cell(200,10,'Candidate Not Found '.mysqli_error($conn),1,1,'C');
                           
                         }

                
             $conn->close();



 
$pdf->Output();

?>