<?php
    if($totalBarang == 0){
        echo "<h2>Keranjang Masih Kosong, Silahkan Berbelanja</h2>";
    }else{
        $no = 1;
        echo "<table class='table-list'>
                <tr class='baris-title'>
                    <th class='tengah'>No</th>
                    <th class='kiri'>Image</th>
                    <th class='kiri'>Nama Barang</th>
                    <th class='tengah'>Qty</th>
                    <th class='kanan'>Harga Satuan</th>
                    <th class='kanan'>Total Harga</th>
                </tr>";
            
         $subtotal = 0;    
        foreach($keranjang AS $key => $value){
            $barang_id = $key;

            $nama_barang = $value ["nama_barang"];
            $gambar = $value ["gambar"];
            $quantity = $value ["quantity"];
            $harga = $value ["harga"];
            $total = $quantity * $harga;
            $subtotal = $subtotal + $total;

        echo "<tr>
                <td class='tengah'>$no</td>
                <td class='kiri'><img src='".BASE_URL."images/barang/$gambar' height='100px' /></td>
                <td class='kiri'>$nama_barang</td>
                <td class='tengah'><input type='text' name='$barang_id' value='$quantity' class='update-quantity' /></td>
                <td class='kanan'>".rupiah($harga)."</td>
                <td class='kanan hapus_item'>".rupiah($total)."<a href='".BASE_URL."hapus_item.php?barang_id=$barang_id'>X</a></td>
              </tr>";

            $no++;
        }
        echo "<tr>
                <td colspan='5px' class='kanan'><b>Sub Total</b></td>
                <td class='kanan'><b>".rupiah($subtotal)."</b></td>";
        echo "</table>";
    }
?>

<script> //AJAX update keranjang

    $(".update-quantity").on("input", function(e){
        var barang_id = $(this).attr("name");
        var value = $(this).val();

        $.ajax({
            method : "POST",
            url : "update_keranjang.php",
            data : "barang_id="+barang_id+"&value="+value
        })
        .done(function(data){
            location.reload();
        });
    });
</script>