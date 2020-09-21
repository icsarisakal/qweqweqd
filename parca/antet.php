<?Php if(!empty($ayr['antetA'])&&$ayr['antetA']==1){
	if(z(8,'antetTip')){$yazdirTip=z(8,'antetTip');z(12,'antetTip',$yazdirTip);}else{$yazdirTip=z(12,'antetTip')?z(12,'antetTip'):1;}
	$antet['ust']='<table cellpadding="0" cellspacing="0" border="0" id="antet">
		<colgroup><col width="33%" /><col /><col width="33%" /></colgroup>
		<tbody>';
			$antet['ust'].='<tr>';
				$antet['ust'].='<td style="text-align:left"><img src="'.$ayr['siteUrl'].'/img/logo-antet2.png" width="80" /></td>';
				$antet['ust'].='<td><strong>'.(!empty($antet['baslikM'])?$antet['baslikM']:'&nbsp;').'</strong></td>';
				$antet['ust'].='<td style="text-align:left">
					<div><span style="width:110px;display:inline-block;text-align:right;">'.(!empty($antet['musteriM'])?$antet['musteriM']:'&nbsp;').'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; '.(!empty($antet['musteri'])?$antet['musteri']:'&nbsp;').'</div>
					<div><span style="width:110px;display:inline-block;text-align:right;">'.(!empty($antet['cekiNoM'])?$antet['cekiNoM']:'&nbsp;').'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; '.(!empty($antet['cekiNo'])?$antet['cekiNo']:'&nbsp;').'</div>
					<div><span style="width:110px;display:inline-block;text-align:right;">'.(!empty($antet['tarihM'])?$antet['tarihM']:'&nbsp;').'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; '.(!empty($antet['tarih'])?$antet['tarih']:date('d.m.Y')).'</div>
				</td>';
			$antet['ust'].='</tr>';
		$antet['ust'].='</tbody>
	</table>';
	$antet['alt']='Kale Mah. İstiklal Cad. No:7 Akkale/ Denizli, Türkiye<br />Tel.: +90 258 267 19 19&nbsp;&nbsp;&nbsp;Fax.: +90 258 267 11 12<br />www.starteks.com.tr info@starteks.com.tr';
	
	if(empty($antetTip)){
		
		if(empty($antetAlt)){
			?><div class="printy"><style type="text/css">#antet,#antet *{ border:0px;}#antet{ margin-bottom:20px;}</style><?Php echo $antet['ust']?></div><?Php 
		}else{?>
            <div class="printy" style="position:absolute;left:0px;right:0px;bottom:0px; border-top:1px solid #aaa;padding-top:4px;">
<div style="text-align:center;"><?Php echo $antet['alt']?></div></div>
		<?Php }
		
	}else if($antetTip=='mail'){}
}
else if(!empty($ayr['antetA'])&&$ayr['antetA']==2){
	$antet['ust']='<table cellpadding="0" cellspacing="0" border="0" id="antet">
		<colgroup><col width="33%" /><col /><col width="33%" /></colgroup>
		<tbody>';
			$antet['ust'].='<tr>';
				$antet['ust'].='<td style="text-align:left">
					<div><span style="width:40px;display:inline-block;text-align:left;">'.(!empty($antet['cekiNoM'])?$antet['cekiNoM']:'&nbsp;').'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; '.(!empty($antet['cekiNo'])?$antet['cekiNo']:'&nbsp;').'</div></td>';
				$antet['ust'].='<td><strong>'.(!empty($antet['baslikM'])?$antet['baslikM']:'&nbsp;').'</strong></td>';
				$antet['ust'].='<td style="text-align:left">
					<div><span style="width:110px;display:inline-block;text-align:right;">'.(!empty($antet['tarihM'])?$antet['tarihM']:'&nbsp;').'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; '.(!empty($antet['tarih'])?$antet['tarih']:date('d.m.Y')).'</div>
				</td>';
			$antet['ust'].='</tr>';
		$antet['ust'].='</tbody>
	</table>';
	$antet['alt']='';
	if(empty($antetAlt)){
			?><div class="printy"><style type="text/css">#antet,#antet *{ border:0px;}#antet{ margin-bottom:20px;}</style><?Php echo $antet['ust']?></div><?Php 
	}/*else{?>
		<div class="printy" style="position:absolute;left:0px;right:0px;bottom:0px; border-top:1px solid #aaa;padding-top:4px;">
<div style="text-align:center;"><?Php echo $antet['alt']?></div></div>
	<?Php }*/
		
}?>