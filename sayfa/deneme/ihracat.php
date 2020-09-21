<style type="text/css">
	body{
		background: white;
	}
	.dtysayfa{
		max-width: 1200px;
		padding: 20px;
		box-sizing: border-box;
		margin:auto;
		margin-top: 20px;
		background: white;
		border-radius: 24px;
		border: 1px solid #fff;
		overflow: hidden;
		-webkit-box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
		-moz-box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
		box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
	}

    .content-wrapper{
        background:white;
    }

    .mtgenel{
        border:1px solid;
        border-bottom:none;
        padding:0px;
    }

    .mtsaglop{
        padding:0px;
        border-right: 1px solid;
        border-bottom: 1px solid;
        text-align:center;
    }

    .mtsollop{
        padding:0px;
        border-bottom: 1px solid;
        text-align:center;
    }

    .formduzenleme{
        background: #14eed0;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 50px;
        display: block;
        text-align: center;
        color: #433c3c;
        font-weight: bold;
        font-size: 16px;
    }
	.tasiyici{
		width: 100%;
		height: auto;
		padding:4px;
		overflow: hidden;
	}
	.tasiyici1{
		width: 50%;
		float: left;
		padding-top:8px;
		padding-right: 22px;
	}
	.tasiyici2{
		width: 50%;
		float: left;
		padding-left: 4px;
	}
	.dtybaslik{
		text-decoration: underline;
		font-size: 10px;
		margin-top: 8px;
	}
	.dtyaciklama{
		margin-top: 2px;
		font-size: 14px;
		padding: 11px 12px 11px 20px;
	}
	.divblock{
		width: 100%;
		float: left;
		margin-top: 8px;
	}
	.dtyborder{
		background: #f8f8f8;
		font-size: 12px;
		letter-spacing: 1px;
		text-decoration: none;
		font-weight: 700;
		border-radius: 12px;
		padding-right: 10px;
		padding-left: 10px;
		color: #666;
		padding: 0.4em 0.4em 0.4em 1em;
		text-transform: uppercase;
	}
	.dtytable{
		margin-top:10px;
		float: left;
		border: none;
	}
	.dtytr td{
		background: #f07f0c;
		color:white;
	}
	.dtydurum{
		border-radius: 12px;
		border: 1px solid #f0f0f0;
		padding-left: 10px;
		padding-right: 10px;
	}
	.dtytext{
		font-size: 10px;
	}
	.dtybaslik2{
		font-weight: normal;
	}
    .kaytekslogosu{
        width:80%;
    }
    .mtbilgi{
        text-align:center;
        border:1px solid;
        margin-top:10px;
    }
	@media only screen and (max-width: 978px) {
		.tasiyici1 {
			width:100%;
		}
		.tasiyici2 {
			width:100%;
			margin-top: 20px;
		}
	}
    @media print {
        .printx{
            display:none;
        }
    }
</style>

<?php 
$id=z(8,'id');
//z('git','?s='.$tbl.'&a=duzenle&id='.$id);
$vt=z(1,$id,'',$tbl);
?>
<?php if(!empty($vt)&&$vt['arsiv']!='-1'){ ?>
<div class="row">
    <div class="col-6 ">
        <img src="./upload/kayteksmarka.png" class="img-fluid kaytekslogosu" alt="">
    </div>
    <div class="col-6 p-2">
        <div class="col-12 row mtgenel">
            <div class="col-6 mtsaglop"><b>Döküman No:</b></div>
            <div class="col-6 mtsollop">F.53</div>
            <div class="col-6 mtsaglop"><b>Yayın Tarihi:</b></div>
            <div class="col-6 mtsollop">01.03.2010</div>
            <div class="col-6 mtsaglop"><b>Rev. No/Tarihi:</b></div>
            <div class="col-6 mtsollop">00/00</div>
            <div class="col-6 mtsaglop"><b>Tarih:</b></div>
            <div class="col-6 mtsollop">29.09.2010</div>
        </div>
    </div>
    <div class="col-12">
        <h2 class="mtbilgi">GENEL SİPARİŞ DETAYI</h2>
    </div>
</div>
<?php } else { echo '<h1>Seçilen detay silindiği için bu veri görüntülenemiyor.</h1>'; } ?>


        