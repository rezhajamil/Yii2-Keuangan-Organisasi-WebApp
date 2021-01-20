<ul class="group-list">
	<li><div class="row"><div class="cell-1">Tanggal Transaksi</div><div class="cell-9"> : <?php echo $objModel->tgl_transaksi; ?></div></div></li>
	<li><div class="row"><div class="cell-1">Pemberi</div><div class="cell-9"> : <?php echo $objModel->pemberi;?></div></div></li>
	<li><div class="row"><div class="cell-1">Penerima</div><div class="cell-9"> : <?php echo $objModel->penerima; ?></div></div></li>
	<li><div class="row"><div class="cell-1">Jumlah Uang</div><div class="cell-9">: Rp.<?php echo $objModel->jumlah; ?></div></div></li>
</ul>
<div class="container">
	<div style="display: inline-block;margin-top: 10px;margin-left: -12px;">
<?php	/* Siapkan jalan kembali */ 
echo $this->createUrl('index','Kembali'); ?></div></div>