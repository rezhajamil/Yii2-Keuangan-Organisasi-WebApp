<form method="post">
				<div>Tanggal Transaksi</div>
				<div>
						<input type="date" name="Transaksi[tgl_transaksi]" 
						value="<?php echo $objModel->tgl_transaksi; ?>"required/> <!-- class="input-tanggal" -->
				</div>
				<div>Pemberi</div>
				<div>
						<input type="text" name="Transaksi[pemberi]" 
						value="<?php echo $objModel->pemberi; ?>"required/>
				</div>
				<div>Penerima</div>
				<div>
						<input type="text" name="Transaksi[penerima]" 
						value="<?php echo $objModel->penerima; ?>"required/>
				</div>
				<div>Jumlah Uang</div>
				<div>
						<input type="text" name="Transaksi[jumlah]" 
						value="<?php echo $objModel->jumlah; ?>"required onkeypress="return hanyaAngka(event)"/>
				</div>				
				<div style="margin-top: 5px;"><input type="submit" value="Simpan"/></div>
			</form>
			<div class="container">
			<div style="display: inline-block;margin-top: 10px;margin-left: -12px;">
			<?php 
			/* Siapkan jalan kembali */ 
			echo $this->createUrl('index','Kembali');  ?></div></div>

			<script>
			function hanyaAngka(evt) {
			  var charCode = (evt.which) ? evt.which : event.keyCode
			   if (charCode > 31 && (charCode < 48 || charCode > 57))
	 
			    return false;
			  return true;
			}
			</script>

		<!-- 	<script type="text/javascript">
			$(document).ready(function(){
			$('.input-tanggal').datepicker();		
			});
		</script> -->