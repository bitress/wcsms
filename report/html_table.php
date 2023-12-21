<?php
require('../fpdf/fpdf.php');
session_start();
require_once '../conn.php';	

//function hex2dec
//returns an associative array (keys: R,G,B) from a hex html code (e.g. #3FE5AA)
function hex2dec($couleur = "#000000"){
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R']=$rouge;
    $tbl_couleur['G']=$vert;
    $tbl_couleur['B']=$bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter in 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}
////////////////////////////////////

$currentuserdept = $_SESSION['current_dept'];
$query = "SELECT dept_name FROM department WHERE dept_code = '$currentuserdept'";
$result = $conn->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$department = $row['dept_name'];
// $class = $_GET['class'];

class PDF_HTML_Table extends FPDF
{

function header()
	{	
		global $conn;	
		global $department;
		$currentsy = $_SESSION['current_sy'];
		$currentsem = $_SESSION['current_sem'];

		$this->Image('../fpdf/logo.png', 70, 10, 25, 25);
		$this->SetFont('GOTHIC', '', 10);
		$this->SetX(40);
		$this->Cell(200,10,'Republic of the Philippines',0,0,'C');
		$this->Ln(5);
		$this->SetFont('GOTHICB', '', 10);
		$this->SetX(40);
		$this->Cell(200,10,'ILOCOS SUR POLYTECHNIC STATE COLLEGE',0,0,'C');
		$this->Ln(5);
		$this->SetFont('GOTHIC', '', 10);
		$this->SetX(40);
		$this->Cell(200,10,'Tagudin Campus',0,0,'C');
		$this->Ln(5);
		$this->SetX(40);
		$this->Cell(200,10,'Tagudin, Ilocos Sur',0,0,'C');
		$this->Ln(10);
		$this->SetX(40);
		$this->SetFont('GOTHICB', '', 10);
		$this->Cell(200,10, strtoupper($department), 0, 0,'C');
		$this->Ln(5);
		$this->SetFont('GOTHIC', '', 10);
		$this->SetX(40);
		$this->Cell(200,10, $currentsem.', SY '.$currentsy ,0,0,'C');
		$this->Ln(5);
		

	}


	function Sign()
	{
		global $conn;
		global $department;
        global $currentuserdept;
		$currentuser = $_SESSION['current_user_id'];
		$query = "  SELECT
                    faculty.faculty_fname,
                    faculty.faculty_mname,
                    faculty.faculty_lname,
                    faculty.faculty_dletter,
                    faculty_load.faculty_desg
                    FROM
                    faculty_load
                    Inner Join faculty ON faculty.faculty_id = faculty_load.faculty_id
                    WHERE (faculty_desg = 'Dean' OR faculty_desg = 'Associate Dean' OR faculty_desg = 'Director' OR faculty_desg = 'Associate Director') AND faculty.faculty_dept = '$currentuserdept'";
		$result = $conn->query($query);
		$row = $result->fetch_array(MYSQLI_ASSOC);

        $mi = '';   
        if (!empty($row['faculty_mname'])) {
            $mi = substr($row['faculty_mname'], 0, 1).'.';
        }

        $dletter = '';
        if (!empty($row['faculty_dletter'])) {
            $dletter = ', '.$row['faculty_dletter'];
        }

		$user = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter;
		$dept = $department;
		$desg = $row['faculty_desg'];


		$queryCED = "SELECT
                     faculty.faculty_fname,
                     faculty.faculty_mname,
                     faculty.faculty_lname,
                     faculty.faculty_dletter,
                     faculty_load.faculty_desg
                     FROM
                     faculty_load
                     Inner Join faculty ON faculty.faculty_id = faculty_load.faculty_id 
                     WHERE faculty_desg = 'Campus Executive Director'";
		$resultCED = $conn->query($queryCED);
		$rowCED = $resultCED->fetch_array(MYSQLI_ASSOC);

        $miCED = '';   
        if (!empty($rowCED['faculty_mname'])) {
            $miCED = substr($rowCED['faculty_mname'], 0, 1).'.';
        }

        $dletterCED = '';
        if (!empty($rowCED['faculty_dletter'])) {
            $dletterCED = ', '.$rowCED['faculty_dletter'];
        }

        $CED = $rowCED['faculty_fname'].' '.$miCED.' '.$rowCED['faculty_lname'].$dletterCED;
		$desgCED = $rowCED['faculty_desg'];


		$this->SetFont('GOTHIC');
		$this->Cell(130, 8, 'Prepared by:', 0, 0);
		$this->Cell(60	, 8, 'Approved by:', 0, 0);
		$this->Ln();
		$this->SetFont('GOTHICB');
		$this->Cell(130, 8, $user, 0, 0);
		$this->Cell(60, 8, $CED, 0, 0);
		$this->Ln(5);
		$this->SetFont('GOTHIC');
		$this->Cell(130, 8, $dept, 0, 0);
		$this->Cell(60, 8, $desgCED, 0, 0);
		$this->Ln(5);
		$this->Cell(35, 8, $desg, 0, 0);
	}

protected $B;
protected $I;
protected $U;
protected $HREF;
protected $fontList;
protected $issetfont;
protected $issetcolor;

function __construct($orientation='P', $unit='mm', $format='A4')
{
    //Call parent constructor
    parent::__construct($orientation,$unit,$format);

    //Initialization
    $this->B=0;
    $this->I=0;
    $this->U=0;
    $this->HREF='';

    $this->tableborder=0;
    $this->tdbegin=false;
    $this->tdwidth=0;
    $this->tdheight=0;
    $this->tdalign="L";
    $this->tdbgcolor=false;

    $this->oldx=0;
    $this->oldy=0;

    $this->fontlist=array("arial","times","courier","helvetica","symbol");
    $this->issetfont=false;
    $this->issetcolor=false;
}

//////////////////////////////////////
//html parser

function WriteHTML($html)
{
    $html=strip_tags($html,"<b><u><i><a><img><p><br><strong><em><font><tr><blockquote><hr><td><tr><table><sup>"); //remove all unsupported tags
    $html=str_replace("\n",'',$html); //replace carriage returns with spaces
    $html=str_replace("\t",'',$html); //replace carriage returns with spaces
    $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE); //explode the string
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            //Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            elseif($this->tdbegin) {
                if(trim($e)!='' && $e!="&nbsp;") {
                    $this->Cell($this->tdwidth,$this->tdheight,$e,$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
                }
                elseif($e=="&nbsp;") {
                    $this->Cell($this->tdwidth,$this->tdheight,'',$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
                }
            }
            else
                $this->Write(5,stripslashes(txtentities($e)));
        }
        else
        {
            //Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                //Extract attributes
                $a2=explode(' ',$e);
                $tag=strtoupper(array_shift($a2));
                $attr=array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])]=$a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    //Opening tag
    switch($tag){

        case 'SUP':
            if( !empty($attr['SUP']) ) {    
                //Set current font to 6pt     
                $this->SetFont('','',6);
                //Start 125cm plus width of cell to the right of left margin         
                //Superscript "1" 
                $this->Cell(2,2,$attr['SUP'],0,0,'L');
            }
            break;

        case 'TABLE': // TABLE-BEGIN
            if( !empty($attr['BORDER']) ) $this->tableborder=$attr['BORDER'];
            else $this->tableborder=0;
            break;
        case 'TR': //TR-BEGIN
            break;
        case 'TD': // TD-BEGIN
            if( !empty($attr['WIDTH']) ) $this->tdwidth=($attr['WIDTH']/4);
            else $this->tdwidth=40; // Set to your own width if you need bigger fixed cells
            if( !empty($attr['HEIGHT']) ) $this->tdheight=($attr['HEIGHT']/6);
            else $this->tdheight=6; // Set to your own height if you need bigger fixed cells
            if( !empty($attr['ALIGN']) ) {
                $align=$attr['ALIGN'];        
                if($align=='LEFT') $this->tdalign='L';
                if($align=='CENTER') $this->tdalign='C';
                if($align=='RIGHT') $this->tdalign='R';
            }
            else $this->tdalign='L'; // Set to your own
            if( !empty($attr['BGCOLOR']) ) {
                $coul=hex2dec($attr['BGCOLOR']);
                    $this->SetFillColor($coul['R'],$coul['G'],$coul['B']);
                    $this->tdbgcolor=true;
                }
            $this->tdbegin=true;
            break;

        case 'HR':
            if( !empty($attr['WIDTH']) )
                $Width = $attr['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.2);
            $this->Line($x,$y,$x+$Width,$y);
            $this->SetLineWidth(0.2);
            $this->Ln(1);
            break;
        case 'STRONG':
            $this->SetStyle('B',true);
            break;
        case 'EM':
            $this->SetStyle('I',true);
            break;
        case 'B':
        case 'I':
        case 'U':
            $this->SetStyle($tag,true);
            break;
        case 'A':
            $this->HREF=$attr['HREF'];
            break;
        case 'IMG':
            if(isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                if(!isset($attr['WIDTH']))
                    $attr['WIDTH'] = 0;
                if(!isset($attr['HEIGHT']))
                    $attr['HEIGHT'] = 0;
                $this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
            }
            break;
        case 'BLOCKQUOTE':
        case 'BR':
            $this->Ln(5);
            break;
        case 'P':
            $this->Ln(10);
            break;
        case 'FONT':
            if (isset($attr['COLOR']) && $attr['COLOR']!='') {
                $coul=hex2dec($attr['COLOR']);
                $this->SetTextColor($coul['R'],$coul['G'],$coul['B']);
                $this->issetcolor=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                $this->SetFont(strtolower($attr['FACE']));
                $this->issetfont=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist) && isset($attr['SIZE']) && $attr['SIZE']!='') {
                $this->SetFont(strtolower($attr['FACE']),'',$attr['SIZE']);
                $this->issetfont=true;
            }
            break;
    }
}

function CloseTag($tag)
{
    //Closing tag
    if($tag=='SUP') {
    }

    if($tag=='TD') { // TD-END
        $this->tdbegin=false;
        $this->tdwidth=0;
        $this->tdheight=0;
        $this->tdalign="L";
        $this->tdbgcolor=false;
    }
    if($tag=='TR') { // TR-END
        $this->Ln();
    }
    if($tag=='TABLE') { // TABLE-END
        $this->tableborder=0;
    }

    if($tag=='STRONG')
        $tag='B';
    if($tag=='EM')
        $tag='I';
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF='';
    if($tag=='FONT'){
        if ($this->issetcolor==true) {
            $this->SetTextColor(0);
        }
        if ($this->issetfont) {
            $this->SetFont('arial');
            $this->issetfont=false;
        }
    }
}

function SetStyle($tag, $enable)
{
    //Modify style and select corresponding font
    $this->$tag+=($enable ? 1 : -1);
    $style='';
    foreach(array('B','I','U') as $s) {
        if($this->$s>0)
            $style.=$s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    //Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}



}
?>
