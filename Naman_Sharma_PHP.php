<!-- STUDENT NAME: Naman Sharma
STUDENT NUMBER: 8837689 -->


<?php
require('fpdf/fpdf.php'); //import fpdf package

class PDF extends FPDF
{

	// PDF Header
	function Header()
	{
		$this->SetFont('Arial','B',18); // for font styles
		$this->Cell(80); //white space
		
		$this->Image('logo/conestogalogo.png',80,10,40,20); //for logo 
		$this->Ln(30); //line spacing
		$this->Cell(70);

		$this->Cell(40,10,'Conestoga College',2,0,'C'); 
		$this->Ln(20);
	}
}

$doc = new PDF(); //instance of PDF class
$doc->AliasNbPages(); //define alias 
$doc->AddPage(); //Add new page
$doc->SetFont('Arial','B',12);
$conn = new mysqli('localhost:3306', 'root', '','sharma89'); //connection object

$query1 = "SELECT * FROM student;"; //object of sql query

$queryRes1 = $conn->query($query1); //perform query
$studentID = '';
while($row = mysqli_fetch_array($queryRes1)) { //fetch query response array
	$studentID = $row["student_id"];
	$doc->Write(0,'Name of the student: '. $row["student_name"]); //print name
	$doc->Cell(30);
	$doc->Cell(160,0,'Date: '. date("m/d/Y"),2,0,'C'); //print current date
	
	$doc->Ln(6);
	$doc->Write(0,'Student ID: '.$row["student_id"]); //print student id
	

	$query2 = 'SELECT `letter_grade` FROM `db` where `student_id`='.$studentID; //fetch letter grade of the student in database 
	$queryRes2 = $conn->query($query2); 
	while($row = mysqli_fetch_array($queryRes2)) {
		$doc->Ln(20);
		$doc->Write(0,'Database'); //write Database
		$doc->Cell(78);
		$doc->Cell(70,0,$row["letter_grade"],2,0,'C');	//printing letter grade for database
	}

	$query3 = 'SELECT `letter_grade` FROM `javascript` WHERE `student_id`='.$studentID; //fetch letter grade of the student in javascript 
	$queryRes3 = $conn->query($query3); 
	while($row = mysqli_fetch_array($queryRes3)) {
		$doc->Ln(5);
		$doc->Write(20,'Javascript'); //write javascript
		$doc->Cell(75); //empty cell spacr
		$doc->Cell(71,15,$row["letter_grade"],2,0,'C'); //Print letter grade
	}

	$doc->Line(130,110,200,110); //for signature 
	$doc->Ln(35); //line space
	$doc->Cell(275,0,'Signature',2,0,'C'); //signature text
	ob_start(); 
	$doc->Output(); //output
	ob_end_flush();
}


?>