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
            
             
        foreach($keranjang AS $key => $value){
            $barang_id = $key;

            $nama_barang = $value ["nama_barang"];
            $gambar = $value ["gambar"];
            $quantity = $value ["quantity"];
            $harga = $value ["harga"];
            $total = $quantity * $harga;

        echo "<tr>
                <td class='tengah'>$no</td>
                <td class='kiri'><img src='".BASE_URL."images/barang/$gambar' height='100px' /></td>
                <td class='kiri'>$nama_barang</td>
                <td class='tengah'><input type='text' name='$barang_id' value='$quantity' class='update-quantity' /></td>
                <td class='kanan'>".rupiah($harga)."</td>
                <td class='kanan'>".rupiah($total)."</td>
              </tr>";

            $no++;
        }
        echo "</table>";
    }
?>