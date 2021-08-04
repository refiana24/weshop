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
                    <select name="kota">
                    <span>
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