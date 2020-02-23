<?php
include 'conn.php';

function fetch_data()  
 {  
$output = ''; 
global $conn; 
$sql = "SELECT * FROM users ORDER BY user_id ASC";  
$result = mysqli_query($conn, $sql);  
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
while($row = mysqli_fetch_array($result))  
{       
$output .= '<tr>  
                    <td>'.$row["user_id"].'</td>  
                    <td>'.$row["user_company"].'</td>  
                    <td>'.$row["user_fName"].'</td>  
                    <td>'.$row["user_lName"].'</td>  
               </tr>  
                    ';  
}  
return $output;  
}  
// Generating pdf document from DB
if(isset($_POST["generate_pdf"]))  
{  
require_once('../library/tcpdf.php');  
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Kasmetinių atostogų prašymas");  
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$obj_pdf->SetMargins('30', '30', '20');  
$obj_pdf->setPrintHeader(false);  
$obj_pdf->setPrintFooter(false);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);  
$obj_pdf->SetFont('helvetica', '', 11);  
$obj_pdf->AddPage();  
$content = '';  
$content .= '
<h2 align="center">Pavardenis</h2>  ';  
$content .= fetch_data();  
$obj_pdf->writeHTML($content); 
ob_end_clean(); 
$obj_pdf->Output('file.pdf', 'I');  
}  
?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SoftAOX | Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
        </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4><br />  
                <div class="table-responsive">  
                	<div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Id</th>  
                               <th width="30%">Name</th>  
                               <th width="15%">Age</th>  
                               <th width="50%">Email</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
</html>