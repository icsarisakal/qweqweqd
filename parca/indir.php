<?php session_start();ob_start();
require(__DIR__.'/../ayar.php');
if($admn||ytk(z(8,'s'),'listele')){
	$a=z(8,'a');
	if(empty($a))$a='listele';
	else if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	if(z(8,'s')&&$a&&z(8,'tip')){
		require(__DIR__.'/../class/excel/PHPExcel.php');
		switch(z(8,'tip')){
			case'xls':
				$objPHPExcel = new PHPExcel();
				$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")->setLastModifiedBy("Maarten Balliauw")->setTitle("Office 2007 XLSX Test Document")->setSubject("Office 2007 XLSX Test Document")->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")->setKeywords("office 2007 openxml php")->setCategory("Php Excel Dosyasi");
			break;
			case'pdf':
				$rendererName = PHPExcel_Settings::PDF_RENDERER_DOMPDF;
				$rendererLibrary = 'dompdf';
				$rendererLibraryPath = __DIR__.'/../class/excel/PHPExcel/Writer/PDF/'.$rendererLibrary;
				$objPHPExcel = new PHPExcel();
				$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")->setLastModifiedBy("NetADIM")->setTitle("Php PDF Dosyasi")->setSubject("PDF Test Document")->setDescription("PHP Sinifi ile olusturulmus PDF dosyasi")->setKeywords("pdf php")->setCategory("Php PDF Dosyasi");
			break;
		}
		
		
		/*for ($i = 1; $i < 20; $i++) {
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $i);
		}*/
		$phpExcelA=true;
		require(__DIR__.'/../sayfa/'.z(8,'s').'/ayar.php');
		require(__DIR__.'/../sayfa/'.z(8,'s').'/'.$a.'_prc.php');
		if(!empty($phpExcelA)){
			if(!empty($phpExcelStyle)){
				$objPHPExcel->getActiveSheet()->getStyle($phpExcelStyle)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
				$objPHPExcel->getActiveSheet()->getStyle($phpExcelStyle)->getFill()->getStartColor()->setRGB('cccccc');
				$objPHPExcel->getActiveSheet()->getStyle($phpExcelStyle)->getFont()->setBold(true);
				$objPHPExcel->getActiveSheet()->getStyle($phpExcelStyle)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			}
		
			$_DosyaIsmi=array(
				'istakip'=>'İş Takibi Listesi',
				'musteritakip'=>'Müşteri Takip Listesi',
				'siparistakip'=>'Sipariş Takip Listesi',
				'teklif'=>'Teklifler Listesi',
				'firmalistele'=>'Firma Kurum Listesi',
				'personellistele'=>'Personel Listesi',
				'marketlistele'=>'Sipariş Formları Listesi',
				'loglistele'=>'Log Kayıtları',		
				'stoklistele'=>'Stok Listesi',
			);
			if(empty($dosyaIsmi))$dosyaIsmi=ucfirst(z(8,'s')).' '.ucfirst($a).' ';
			if(!empty($_DosyaIsmi[z(8,'s').$a]))$dosyaIsmi=$_DosyaIsmi[z(8,'s').$a];
			$dosyaIsmi.=' - '.$ayr['siteAd'].' ('.date('d-m-Y H-i').')';
			
			switch(z(8,'tip')){
				case'xls':
					$objPHPExcel->getActiveSheet()->setTitle('Simple');
					$objPHPExcel->setActiveSheetIndex(0);
					header('Content-Type: application/vnd.ms-excel');
					header('Content-Disposition: attachment;filename="'.$dosyaIsmi.'.xls"');
					header('Cache-Control: max-age=0');
					header('Cache-Control: max-age=1');
					header('Expires: '.gmdate('D, d M Y H:i:s').' GMT'); // Date in the past
					header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
					header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
					header('Pragma: public'); // HTTP/1.0
					$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
					$objWriter->save('php://output');
					$_Log=array('nesne'=>$tbl,'islem'=>'indir','sonuc'=>1,'nesne'=>$tbl,'mesaj'=>'[MESAJ]-11[/MESAJ] İndirilen Dosya: "'.$dosyaIsmi.'.xls"');
					require('log.php');
					exit;
				break;
				case'pdf':
					$objPHPExcel->getActiveSheet()->setTitle('Simple');
					$objPHPExcel->getActiveSheet()->setShowGridLines(true);
					$objPHPExcel->setActiveSheetIndex(0);
					if (!PHPExcel_Settings::setPdfRenderer($rendererName,$rendererLibraryPath)){die('PDF Ciktisi uretilirken bir hata olustu!');}
					header('Content-Type: application/pdf; charset=UTF-8');
					header('Content-Disposition: attachment;filename="'.$dosyaIsmi.'.pdf"');
					header('Cache-Control: max-age=0');
					$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
					$objWriter->save('php://output');
					$_Log=array('nesne'=>$tbl,'islem'=>'indir','sonuc'=>1,'nesne'=>$tbl,'mesaj'=>'[MESAJ]-11[/MESAJ] İndirilen Dosya: "'.$dosyaIsmi.'.pdf"');
					require('log.php');
					exit;
				break;
			}
		}
		else header('Location: '.z('url','geri'));
	}
}
else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
ob_end_flush();