<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row"> 
    <div class="col-sm-12">
    <?php echo form_open('belanja/update'); ?>

<table class="table" cellpadding="6" cellspacing="1" style="width:100%">

<tr>
        <th width="85px">QTY</th>
        <th>Nama Barang</th>
        <th style="text-align:right">Harga</th>
        <th style="text-align:right">Sub-Total</th>
        <th class="text-center">Action</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>



        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '0', 'size' => '5',
            'type' => 'number', 'class' => 'form_control' )); ?></td>
                <td>
                        <?php echo $items['name']; ?>
                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                <td class="text-center">
                    <a href="<?= base_url('belanja/delete/'.$items['rowid']) ?>" class="btn btn-danger btn-sm"><i class ="fa fa-trash"</a>
                </td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right"><strong>Rp.<?php echo $this->cart->format_number($this->cart->total()); ?><strong></td>
</tr>

</table>


<button  type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update Cart</button>
<a href="<?= base_url('belanja/clear') ?>" class="btn btn-success btn-flat"><i class="fa fa-check-square"></i>Delete Cart</a>
<a href="#" class="btn btn-success btn-flat"><i class="fa fa-check-square"></i>Check Out</a>
<?php echo form_close(); ?> 
<p>
    </div>
  </div>
  </div>
</div>