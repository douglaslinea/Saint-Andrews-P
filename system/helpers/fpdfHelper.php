<?php
LibFactory::getInstance(null,null,'fpdf/class.fpdf.php');

class fpdfHelper extends FFPDF
{
	public function setFPDF($orientation='P', $unit='mm', $size='A4')
	{
		$this->FPDF($orientation, $unit, $size);
	}
	
	public function setSetMargins($left, $top, $right=null)
	{
		$this->SetMargins($left, $top, $right);
	}
	
	public function setSetLeftMargin($margin)
	{
		$this->SetLeftMargin($margin);
	}
	
	public function setSetTopMargin($margin)
	{
		$this->SetTopMargin($margin);
	}
	
	public function setSetRightMargin($margin)
	{
		$this->SetRightMargin($margin);
	}
	
	public function setSetAutoPageBreak($auto, $margin=0)
	{
		$this->SetAutoPageBreak($auto, $margin);
	}
	
	public function setSetDisplayMode($zoom, $layout='default')
	{
		$this->SetDisplayMode($zoom, $layout);
	}
	
	public function setSetCompression($compress)
	{
		$this->SetCompression($compress);
	}
	
	public function setSetTitle($title, $isUTF8=false)
	{
		$this->SetTitle($title, $isUTF8);
	}
	
	public function setSetSubject($subject, $isUTF8=false)
	{
		$this->SetSubject($subject, $isUTF8);
	}
	
	public function setSetAuthor($author, $isUTF8=false)
	{
		$this->SetAuthor($author, $isUTF8);
	}
	
	public function setSetKeywords($keywords, $isUTF8=false)
	{
		$this->SetKeywords($keywords, $isUTF8);
	}
	
	public function setSetCreator($creator, $isUTF8=false)
	{
		$this->SetCreator($creator, $isUTF8);
	}
	
	public function setAliasNbPages($alias='{nb}')
	{
		$this->AliasNbPages($alias);
	}
	
	public function setError($msg)
	{
		$this->Error($msg);
	}
	
	public function setOpen()
	{
		$this->Open();
	}
	
	public function setClose()
	{
		$this->Close();
	}
	
	public function setAddPage($orientation='', $size='')
	{
		$this->AddPage($orientation, $size);
	}
	
	public function setHeader()
	{
		$this->Header();
	}
	
	public function setFooter()
	{
		$this->Footer();
	}
	
	public function setPageNo()
	{
		$this->PageNo();
	}
	
	public function setSetDrawColor($r, $g=null, $b=null)
	{
		$this->SetDrawColor($r, $g, $b);
	}
	
	public function setSetFillColor($r, $g=null, $b=null)
	{
		$this->SetFillColor($r, $g, $b);
	}
	
	public function setSetTextColor($r, $g=null, $b=null)
	{
		$this->SetTextColor($r, $g, $b);
	}
	
	public function setGetStringWidth($s)
	{
		$this->GetStringWidth($s);
	}
	
	public function setSetLineWidth($width)
	{
		$this->SetLineWidth($width);
	}
	
	public function setLine($x1, $y1, $x2, $y2)
	{
		$this->Line($x1, $y1, $x2, $y2);
	}
	
	public function setRect($x, $y, $w, $h, $style='')
	{
		$this->Rect($x, $y, $w, $h, $style);
	}
	
	public function setAddFont($family, $style='', $file='')
	{
		$this->AddFont($family, $style, $file);
	}
	
	public function setSetFont($family, $style='', $size=0)
	{
		$this->SetFont($family, $style, $size);
	}
	
	public function setSetFontSize($size)
	{
		$this->SetFontSize($size);
	}
	
	public function setAddLink()
	{
		$this->AddLink();
	}
	
	public function setSetLink($link, $y=0, $page=-1)
	{
		$this->SetLink($link, $y, $page);
	}
	
	public function setLink($x, $y, $w, $h, $link)
	{
		$this->Link($x, $y, $w, $h, $link);
	}
	
	public function setText($x, $y, $txt)
	{
		$this->setText($x, $y, $txt);
	}
	
	public function setAcceptPageBreak()
	{
		$this->AcceptPageBreak();
	}
	
	public function setCell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
	{
		$this->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
	}
	
	public function setMultiCell($w, $h, $txt, $border=0, $align='J', $fill=false)
	{
		$this->MultiCell($w, $h, $txt, $border, $align, $fill);
	}
	
	public function setWrite($h, $txt, $link='')
	{
		$this->Write($h, $txt, $link);
	}
	
	public function setLn($h=null)
	{
		$this->Ln($h);
	}
	
	public function setImage($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='')
	{
		$this->Image($file, $x, $y, $w, $h, $type, $link);
	}
	
	public function setGetX()
	{
		$this->GetX();
	}

	public function setSetX($x)
	{
		$this->SetX($x);
	}
	
	public function setGetY()
	{
		$this->GetY();
	}
	
	public function setSetY($y)
	{
		$this->SetY($y);
	}
	
	public function setSetXY($x, $y)
	{
		$this->SetXY($x, $y);
	}
	
	public function setOutput($name='', $dest='')
	{
		$this->Output($name, $dest);
	}
}