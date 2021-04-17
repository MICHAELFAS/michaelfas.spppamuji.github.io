<?php
// menghubungkan dengan koneksi
require_once '../database.php';
$db = new Database();

if(isset($_GET['hal'])){
	$hal=$_GET['hal']; 
	}
	 
  ?>
	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data <?php echo $hal; ?></h3>
              </div>
<?php
	 
switch ($hal) {
  case "spp":
  		echo '<form role="form" method="POST" action="proses.php?aksi=tambahspp" id="quickForm"  >
                <div class="card-body">
                  <div class="form-group">
                    <label  >Tahun SPP</label>
                    <input type="text" name="tahun" class="form-control" id="exampleInputEmail1" placeholder="Tahun pembayaran SPP">
                  </div>
                  <div class="form-group">
                    <label >Nominal</label>
                    <input type="number" name="nominal" class="form-control" id="exampleInputPassword1" placeholder="Nominal">
                  </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"   class="btn btn-primary">Submit</button>
                </div>
              </form>
			  ';
			  
			  	break;
  case "pembayaran":
   // echo "Modul pembayaran";
   
  
   echo '    <form role="form" method="POST" 	action="proses.php?aksi=tambahtransaksi" id="quickForm"  >
                <div class="card-body"> 
				
				<input type="hidden" name="id_pet" value="'.$_SESSION['id_petugas'].'">			
				 <div class="form-group">
                  <label>NISN</label>
                  <select class="form-control select2" name="nisn">
				   ';
				  $no = 1;
					foreach($db->tampil_data("siswa","nisn") as $x){
					echo '
                    <option value="'.$x['nisn'].'">'.$x['nisn'].'</option>
                    ';
					}
				echo '</select>
                </div> 
 
                  <div class="form-group">
                    <label >Tanggal Bayar</label>
                    <input type="date" name="tgl" class="form-control"  placeholder="tanggal bayar" required>
                  </div> 

                  <div class="form-group">
                    
				  <label >Bulan dibayar</label>
				  <select class="form-control" name="bulan">
				  <option value="Januari" selected="selected">Januari</option>
				  <option value="Februari" >Februari</option>
				  <option value="Maret" >Maret</option>
				  <option value="April" >April</option>
				  <option value="Mei" >Mei</option>
				  <option value="Juni" >Juni</option>
				  <option value="Juli" >Juli</option>
				  <option value="Agustus" >Agustus</option>
				  <option value="September" >September</option>
				  <option value="Oktober" >Oktober</option>
				  <option value="November" >November</option>
				  <option value="Desember" >Desember</option>
				  </select>
				  </div> 

                  <div class="form-group">
                    <label >Tahun dibayar</label>
              <select class="form-control select2" name="tahun">
				   ';
				  $no = 1;
					foreach($db->tampil_data("spp","id_spp") as $x){
					echo '
                    <option value="'.$x['tahun'].'">'.$x['tahun'].'</option>
                    ';
					}
				echo '</select> </div> 

                  <div class="form-group">
                    <label >Jumlah Bayar</label>
                    <input type="number" name="jumlah" class="form-control"  placeholder="Jumlah bayar" required>
                  </div> 

				  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"   class="btn btn-primary">Submit</button>
                </div>
              </form>
			  ';
    break;
	
	
  case "kelas":
		echo '
        <form role="form" method="POST" action="proses.php?aksi=tambahkelas" id="quickForm"  >
                <div class="card-body">
                  <div class="form-group">
                    <label  >Nama kelas</label>
                    <input type="text" name="namakelas" class="form-control" id="exampleInputEmail1" placeholder="Nama kelas">
                  </div>
                  <div class="form-group">
                    <label >Kom. Keahlian</label>
                    <input type="text" name="jurusan" class="form-control" id="exampleInputPassword1" placeholder="Kom. Keahlian">
                  </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"   class="btn btn-primary">Submit</button>
                </div>
              </form>
			  
			  '; 
    break;
  case "petugas":
   // echo "Your favorite color is green!";
    echo '         
              <form role="form" method="POST" action="proses.php?aksi=tambahpetugas" id="quickForm"  >
                <div class="card-body">
                  <div class="form-group">
                    <label  >Username</label>
                    <input type="text" name="username" class="form-control"  placeholder="ID Petugas">
                  </div>
                  <div class="form-group">
                    <label >Nama Petugas</label>
                    <input type="text" name="nama" class="form-control"  placeholder="Nama Petugas">
                  </div> 

                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" name="pass" class="form-control"  placeholder="Password">
                  </div> 

                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level">
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option> 
                  </select>
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"   class="btn btn-primary">Submit</button>
                </div>
              </form>
			  ';
    break;
  case "siswa":
   echo '         
              <form role="form" method="POST" action="proses.php?aksi=tambahsiswa" id="quickForm"  >
                <div class="card-body">
                  <div class="form-group">
                    <label  >NISN</label>
                    <input type="number" name="nisn" class="form-control"  placeholder="NISN">
                  </div>
                  
				  <div class="form-group">
                    <label >NIS</label>
                    <input type="number" name="nis" class="form-control"  placeholder="NIS">
                  </div> 

                  <div class="form-group">
                    <label >Nama</label>
                    <input type="text" name="nama" class="form-control"  placeholder="nama siswa">
                  </div> 

                <div class="form-group">
                  <label>Kelas</label>
                  <select class="form-control" name="id_kelas">';
				  	$no = 1;
					foreach($db->tampil_data("kelas","id_kelas") as $x){
					echo '
                    <option value="'.$x['id_kelas'].'">'.$x['nama_kelas'].'</option>
                    ';
					}
					echo '    
                  </select>
                </div>
				
                <div class="form-group">
                  <label>Tahun SPP</label>
                  <select class="form-control" name="id_spp">
                    <option value="">pilih</option>';
				$no = 1;
				foreach($db->tampil_data("spp","id_spp") as $x){
				echo '
				<option value="'.$x['id_spp'].'">'.$x['tahun'].'</option>
								';
				}
				echo ' </select>
                </div>
				
				  <div class="form-group">
                    <label >Alamat</label>
                    <input type="text" name="alamat" class="form-control"  placeholder="Alamat Siswa">
                  </div> 
				  
          <div class="form-group">
                    <label >Password</label>
                    <input type="text" name="password" class="form-control"  placeholder="password">
                  </div> 
				  
				  <div class="form-group">
                    <label >No Telp</label>
                    <input type="number" name="notelp" class="form-control"  placeholder="No HP Siswa">
                  </div> 
				  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"   class="btn btn-primary">Submit</button>
                </div>
              </form>
			  ';
   
    break;
  default:
    echo "<b>404!! <br/> Modul tidak ditemukan.</b>";
}
			  ?>
            </div>
 