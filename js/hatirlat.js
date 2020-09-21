
function hatirlaticiKontrol(){
	return;

	$.ajax({
		type:"POST",
		url:"ajaxayar.php?s=hatirlatici&a=ajax-hatirlatici-kontrol",
		success:function(gelensorgu){
			if(gelensorgu.sonuc==1){
				//console.log(gelensorgu.cevap.tekseferlik);
				var ktk=gelensorgu.cevap.kendime;
				var khf=gelensorgu.cevap.kendimehaftalik;
				var ktp=gelensorgu.cevap.kendimetoplu;
				var ptk=gelensorgu.cevap.personelsec;
				var phf=gelensorgu.cevap.personelsechaftalik;
				var ptp=gelensorgu.cevap.personelsectoplu;
				var tk=gelensorgu.cevap.tekseferlik;
				var hf=gelensorgu.cevap.haftalik;
				var ay=gelensorgu.cevap.aylik;
				var yl=gelensorgu.cevap.yillik;
				var tp=gelensorgu.cevap.toplu;
				var te=gelensorgu.cevap.topluertele;
				var personel=gelensorgu.cevap.personel;
				var musteritakip=gelensorgu.cevap.musteritakip;
				var istakip=gelensorgu.cevap.istakip;
				var siparistakip=gelensorgu.cevap.siparistakip;
				var firma=gelensorgu.cevap.firma;
				var teklif=gelensorgu.cevap.teklif;
				if(te!=null){

				}
				else if(ptk!=null){
					console.log("ptk");
					ses('destek',1);
					for (var i = 0; i < ptk.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+ptk[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						
						//console.log(ptk[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+ptk[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+ptk[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+ptk[i].ID;
						
						if(ptk[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+ptk[i].hmodul+"&modulertele="+ptk[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(ptk[i].aciklama);
						$("#aciklamabas").html(ptk[i].sanalTarih+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==ptk[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						var hmodul=ptk[i].hmodul;
						var hmodulid=ptk[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						console.log(firmaid+firmaad);
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+ptk[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(phf!=null){
					console.log("phf");
					ses('destek',1);
					for (var i = 0; i < phf.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+phf[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(phf[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+phf[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+phf[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+phf[i].ID;
						if(phf[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+phf[i].hmodul+"&modulertele="+phf[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(phf[i].aciklama);
						$("#aciklamabas").html(phf[i].hftMulti+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==phf[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+phf[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=phf[i].hmodul;
						var hmodulid=phf[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(ptp!=null){
					console.log("ptp");
					ses('destek',1);
					for (var i = 0; i < ptp.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+ptp[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(ptp[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+ptp[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+ptp[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+ptp[i].ID;
						if(ptp[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+ptp[i].hmodul+"&modulertele="+ptp[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(ptp[i].aciklama);
						$("#aciklamabas").html(ptp[i].tarihMulti+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==ptp[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+ptp[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=ptp[i].hmodul;
						var hmodulid=ptp[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(ktk!=null){
					console.log("ktk");
					ses('destek',1);
					for (var i = 0; i < ktk.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+ktk[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(ktk[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+ktk[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+ktk[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+ktk[i].ID;
						if(ktk[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+ktk[i].hmodul+"&modulertele="+ktk[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(ktk[i].aciklama);
						$("#aciklamabas").html(ktk[i].sanalTarih+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==ktk[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+ktk[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=ktk[i].hmodul;
						var hmodulid=ktk[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(khf!=null){
					console.log("khf");
					ses('destek',1);
					for (var i = 0; i < khf.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+khf[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(khf[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+khf[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+khf[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+khf[i].ID;
						if(khf[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+khf[i].hmodul+"&modulertele="+khf[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(khf[i].aciklama);
						$("#aciklamabas").html(khf[i].hftMulti+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==khf[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+khf[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=khf[i].hmodul;
						var hmodulid=khf[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(ktp!=null){
					console.log("ktp");
					ses('destek',1);
					for (var i = 0; i < ktp.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+ktp[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(ktp[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+ktp[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+ktp[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+ktp[i].ID;
						if(ktp[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+ktp[i].hmodul+"&modulertele="+ktp[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(ktp[i].aciklama);
						$("#aciklamabas").html(ktp[i].tarihMulti+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==ktp[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+ktp[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=ktp[i].hmodul;
						var hmodulid=ktp[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(tk!=null){
					console.log("tk");
					ses('destek',1);
					for (var i = 0; i < tk.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+tk[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(tk[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+tk[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+tk[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+tk[i].ID;
						if(tk[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+tk[i].hmodul+"&modulertele="+tk[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(tk[i].aciklama);
						$("#aciklamabas").html(tk[i].sanalTarih+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==tk[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+tk[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=tk[i].hmodul;
						var hmodulid=tk[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(hf!=null){
					console.log("hf");
					ses('destek',1);
					for (var i = 0; i < hf.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+hf[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(hf[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+hf[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+hf[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+hf[i].ID;
						if(hf[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+hf[i].hmodul+"&modulertele="+hf[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(hf[i].aciklama);
						$("#aciklamabas").html(hf[i].hftMulti+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==hf[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+hf[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=hf[i].hmodul;
						var hmodulid=hf[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(ay!=null){
					console.log("ay");
					ses('destek',1);
					for (var i = 0; i < ay.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+ay[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(ay[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+ay[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+ay[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+ay[i].ID;
						if(ay[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+ay[i].hmodul+"&modulertele="+ay[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(ay[i].aciklama);
						$("#aciklamabas").html(ay[i].sanalTarih+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==ay[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+ay[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=ay[i].hmodul;
						var hmodulid=ay[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(yl!=null){
					console.log("yl");
					ses('destek',1);
					for (var i = 0; i < yl.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+yl[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(yl[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+yl[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+yl[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+yl[i].ID;
						if(yl[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+yl[i].hmodul+"&modulertele="+yl[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(yl[i].aciklama);
						$("#aciklamabas").html(yl[i].sanalTarih+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==yl[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+yl[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=yl[i].hmodul;
						var hmodulid=yl[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
				else if(tp!=null){
					console.log("tp");
					ses('destek',1);
					for (var i = 0; i < tp.length; i++) {
						$(".gizli-forms").attr("class","gizli-forms pencere gizlitab erteleme"+tp[i].ID);
						$(".pencerekarart").show();
						$(".gizlitab").show();
						$(document).click(function(e) {
							if (!$(e.target).is('.gizli-forms, .gizli-forms *')) {
								$(".gizli-forms").hide();
								$(".pencerekarart").hide();
								if($('#erteletoplu').length>0)
									document.querySelector('#erteletoplu').click();
							}
						});
						//console.log(tp[i].ID);
						var ertid= "?s=hatirlatici&a=listele&ertele="+tp[i].ID;
						var okid= "?s=hatirlatici&a=listele&okundu="+tp[i].ID;
						var dznid= "?s=hatirlatici&a=duzenle&id="+tp[i].ID;
						if(tp[i].hmodul_ID!=0){
							var mdlid= "?s=hatirlatici&a=hatirlatici-modal&modultbl="+tp[i].hmodul+"&modulertele="+tp[i].hmodul_ID;
							$("#iliskiliaciklama").html("Hatırlatıcının aktif olduğu modüle gitmek için tıklayınız");
							$("#iliskiliaciklama").attr("href",mdlid);
						}
						$("#baslikbas").html(tp[i].aciklama);
						$("#aciklamabas").html(tp[i].tarihMulti+" takviminde hatırlatıcınız mevcuttur.");
						var ad="";
						for (var p = 0; p < personel.length; p++) {
							var persid = personel[p].ID;
							if(persid==tp[i].personel_ID){
								var ad=personel[p].ad;
							}
						}
						if(ad!=""){
							$("#detaybas").html('<a href="?s=personel&a=duzenle&id='+tp[i].personel_ID+'">'+ad+'</a>  adlı personel bu hatırlatıcıyı oluşturmuştur.');
						}
						var hmodul=tp[i].hmodul;
						var hmodulid=tp[i].hmodul_ID;
						var hatirlatici="";
						var firmaad="";
						var firmaidd="";
						if(hmodul=="musteritakip"){
							for (var p = 0; p < musteritakip.length; p++) {
								var iliskiliid = musteritakip[p].ID;
								var iliskilifirmaid = musteritakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="istakip"){
							for (var p = 0; p < istakip.length; p++) {
								var iliskiliid = istakip[p].ID;
								var iliskilifirmaid = istakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="siparistakip"){
							for (var p = 0; p < siparistakip.length; p++) {
								var iliskiliid = siparistakip[p].ID;
								var iliskilifirmaid = siparistakip[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						} else if(hmodul=="teklif"){
							for (var p = 0; p < teklif.length; p++) {
								var iliskiliid = teklif[p].ID;
								var iliskilifirmaid = teklif[p].firma_ID;
								if(iliskiliid==hmodulid){
									for (var f = 0; f < firma.length; f++) {
										var firmaid = firma[f].ID;
										if(firmaid==iliskilifirmaid){
											var firmaad=firma[f].ad;
											var firmaidd=firma[f].ID;
										}
									}
								}
							}
						}
						if(firmaad!=""){
							$("#iliskibas").html('<a href="?s=firma&a=duzenle&id='+firmaidd+'">'+firmaad+'</a>  adlı kuruma bu hatırlatıcı oluşturulmuştur.');
						}
						$("#ertele").attr("href",ertid);
						$("#okundu").attr("href",okid);
						$("#dznleme").attr("href",dznid);
					}
				}
			} else {
				//console.log('Hatırlatıcı okuma başarısız');
			}
		}
	});

	//console.log("Hatırlatıcı kontrol");
	//setTimeout(hatirlaticiKontrol,17000);
}
$(document).ready(function(e){
	//setTimeout(hatirlaticiKontrol,6000);
});