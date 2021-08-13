<?php

    if($level == 'superadmin'){
        $queryPesanan = mysqli_query($connect, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
    }else{
        $queryPesanan = mysqli_query($connect, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
    }
    
    if(mysqli_num_rows($queryPesanan) == 0){
        echo "<h3>Belum Ada Daftar Pesanan</h3>";
    }else{
       echo "<table class='table-list'>
                <tr class='baris-title'>
                    <th class='kiri'> Nomor Pesanan </th>
                    <th class='kiri'> Status </th>
                    <th class='kiri'> Nama </th>
                    <th class='kiri'> Action </th>
                </tr>";

        while($row = mysqli_fetch_assoc($queryPesanan)){

            $adminbutton = "";
            $status = $row['status'];
            
            if($level == 'superadmin'){
                $adminbutton = "<a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Status Update</a>";
            }
            echo "<tr>
                    <td class='kiri'>$row[pesanan_id]</td>
                    <td class='kiri'>$ArraystatusPesanan[$status]</td>
                    <td class='kiri'>$row[nama]</td>
                    <td class='kiri'>
                    <a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail</a>$adminbutton</td>
                  </tr>";
        }
        echo "</table>";
    }
?>