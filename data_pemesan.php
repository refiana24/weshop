<?php

    $pesanan_id = isset($_GET['pesanan_id']) ? $_GET['pesanan_id'] : false;
    //$kota_id = "";
    //$user_id = "";
    //$nama_penerima = "";
    //$nomor_telepon = "";
    //$alamat = "";
    //$tgl_pemesanan = "";
    //$status = "";
    //$button = "";


    //$kota_id = $_POST['kota_id'];
    //$user_id = $_POST['user_id'];

?>

<div id='frame-data-pengiriman'>
    <h3>Data Pengiriman barang</h3>
    <div id='frame-form-pengiriman'>
        <form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
            <div class="element-form">
                <label>Nama Penerima</label>
                    <span>
                        <input type="text" name="nama_penerima" value="" />
                    </span>
            </div>

            <div class="element-form">
                <label>Nomor Telepon</label>
                    <span>
                        <input type="text" name="nomor_telepon" value="" />
                    </span>
            </div>

            <div class="element-form">
                <label>Alamat Pengiriman</label>
                    <span>
                        <textarea name="alamat" value=""> </textarea>
                    </span>
            </div>

            <div class="element-form">
                <label>Kota</label>
                    <span>
                    <select name="kota">
                        <?php
                            $query = mysqli_query($connect, "SELECT *FROM kota");
                                while ($row = mysqli_fetch_assoc($query)){
                                    echo "<option value='$row [kota_id]'>$row[kota]</option>";
                                }
                        ?>
                    </select>
                </span>   
            </div>
            
            <div class="element-form">
                <span>
                    <input type="submit"  value="submit" />
                </span>
            </div>
        </form>
    </div>
</div>

<hr>

<div id="frame-data-detail">
    <h3>Detail Order</h3>
    <div id="frame-detail-order">
        <table class="table-list">
            <tr>
                <th class="kiri">Nama Barang</th>
                <th class="tengah">Qty</th>
                <th class="kanan">Total</th>
            </tr>
            
            <?php

                $subtotal = 0;

                foreach($keranjang AS $key => $value){
                    $barang_id = $key;
                    $nama_barang = $value['nama_barang'];
                    $harga = $value['harga'];
                    $quantity = $value['quantity'];
                    $total = $quantity * $harga;
                    $subtotal = $subtotal + $total;

                    echo "<tr>
                            <td class='kiri'>$nama_barang</td>
                            <td class='tengah'>$quantity</td>
                            <td class='kanan'>".rupiah($total)."</td>
                            </tr>";
                }

                    echo "<tr>
                            <td class='kanan' colspan='2'><b>Sub Total</b></td>
                            <td class='kanan'><b>".rupiah($subtotal)."</b></td>
                          </tr>";
            ?>
        </table>
            
    </div>
</div>