            <p></p>
            <div class="item-inner">
              <div class="item-title" style="line-height: 40px;">Hatırlatma Ekleyin </div>
              <div class="item-input" style="vertical-align: top;">
                <label class="label-switch">
                  <input type="checkbox" class="chck-hatirlatici-ekle" name="hatirlatici[hatirlaticiAnahtar]" onchange="return gizleGoster(this,'.hatirlatici-kutu');">
                  <div class="checkbox"></div>
                </label>
              </div>
            </div>


            <!-- Hatirlatici Kutu -->
            <div class="hatirlatici-kutu" style="display: none;">

              <label style="margin-top: 4px;">Süre</label>
  
                <?php /*/ ?>
                <select 
                 name="hatirlatici[sure_secimi]" classs="form_input" style="padding: 10px 6px; border:1px solid #ddd; box-sizing: border-box; width: 100%; " onchange="return gizleGoster(this,'.ozel-tarih-kutu','ozel_tarih');" 
                  >
                <?php /*/ ?>

              <div class="selector_overlay">
                <select name="hatirlatici[sure_secimi]" class="cs-select cs-skin-overlay selectoptions hatirlatici-sure-select" onchange="return gizleGoster(this,'.ozel-tarih-kutu','ozel_tarih');" >
                  <optgroup label="Dakika Seçin">
                    <option value="15_dk">15 Dakika Sonra</option>
                    <option value="30_dk">30 Dakika Sonra</option>
                    <option value="45_dk">45 Dakika Sonra</option>
                  </optgroup>
                  <optgroup label="Saat Seçin">
                    <option value="60_dk" selected="selected">1 Saat Sonra</option>
                    <option value="120_dk">2 Saat Sonra</option>
                    <option value="180_dk">3 Saat Sonra</option>
                  </optgroup>
                  <optgroup label="Belirli Zaman">
                    <option value="ogleden_sonra">Öğleden Sonra</option>
                    <option value="mesai_bitisi">Mesai Bitişinde</option>
                    <option value="aksam_8">Akşam 8'de</option>
                  </optgroup>
                  <optgroup label="Günlük">
                    <option value="mesai_baslangici">Yarın Mesai Başlangıcında</option>
                    <option value="yarin_bu_saatte">Yarın Bu Saatte</option>
                    <option value="her_gun_mesai_baslangici">Her Gün Mesai Başlangıcında</option>
                    <option value="her_gun_mesai_bitisi">Her Gün Mesai Bitişi</option>
                  </optgroup>
                  <optgroup label="Haftalık">
                    <option value="hafta_basi">Önümüzdeki Hafta Başı</option>
                    <option value="her_hafta_basi">Her Hafta Başı</option>
                    <option value="haftaya_bugun">Haftaya Bu Gün</option>
                    <option value="her_hafta_sonu">Her Hafta Sonu</option>
                  </optgroup>
                  <optgroup label="Özel Tarih">
                    <option value="ozel_tarih">Elle Seçeyim</option>
                  </optgroup>
                </select>
              </div>

              <div class="ozel-tarih-kutu" style="display: none;">
                <label>Hatırlatma Tarihi Seçin</label>
                <input type="text" name="hatirlatici[tarihHatirlatici]" value="" placeholder="" class="form_input jstarihsaat" autocomplete="off" />
              </div>


              <label>Kimlere Hatırlatılsın?</label>
              <label class="label-checkbox item-content">
                <input type="checkbox" name="hatirlatici[personel_ID][]" value="<?php echo $bnmID ?>" checked="checked">
                <div class="item-media">
                  <i class="icon icon-form-checkbox"></i>
                </div>
                <div class="item-inner">
                  <div class="item-title">Bana (<?php echo z('lgn','ad').' '.z('lgn','soyad') ?>)</div>
                </div>
              </label>
              <?php $_Personel=z(1,'','','personel'); ?>
              <?php foreach ($_Personel as $personel) if($bnmID!=$personel['ID']){ ?>
              <label class="label-checkbox item-content">
                <input type="checkbox" name="hatirlatici[personel_ID][]" value="<?php echo $personel['ID']; ?>">
                <div class="item-media">
                  <i class="icon icon-form-checkbox"></i>
                </div>
                <div class="item-inner">
                  <div class="item-title"><?php echo $personel['ad'].(!empty($personel['soyad'])?' '.$personel['soyad']:''); ?></div>
                </div>
              </label>
              <?php } ?>


            </div>
            <!-- Hatirlatici Kutu END -->