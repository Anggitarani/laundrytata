    <?php 
    if ($_SESSION['role']!=="admin") {
        echo "<script>document.location.href='index.php'</script>";
    }
 $user=mysqli_query($koneksi,"SELECT * FROM tb_user");
 if (isset($_POST['add'])) {
     if (RegPengguna($_POST)>0) {
         echo "<script>
        alert('Berhasil Menambahkan Data Pengguna')
        document.location.href='index.php?user'
        </script>";
     }else{
        echo "<script>
        alert('Berhasil Menambahkan Data Pengguna')
        document.location.href='index.php?user'
        </script>";
     }
 }
  ?>  
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Status</th>  
                                            <th>Action</th>                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user as $usrr): ?>                                          
                                        <tr class="odd gradeA">
                                            <td><?php echo $usrr['nama'] ?></td>
                                            <td><?php echo $usrr['username'] ?></td>
                                            <td><?php echo $usrr['password'] ?></td>
                                            <td><?php echo $usrr['role'] ?></td>  
                                            <td>
                                                 <form method="GET" style="float: left;">
                                                    <input type="hidden" value="<?php echo $usrr['id_user'] ?>" name="id_user">
                                                    <a href="index.php?ubahPengguna=<?php echo $usrr['id_user'] ?>" class="btn btn-sm btn-warning"><i class="icon-edit"></i></a>
                                                </form>                                                
                                                <form method="POST" style="float: right;">
                                                    <input type="hidden" value="<?php echo $usrr['id_user'] ?>" name="id_user">
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus Data Pengguna <?php echo $usrr['nama'] ?>?')" value="Hapus" name="hapus"><i class="icon-trash"></i></button>
                                                </form>
                                                 <?php 
                                                if (isset($_POST['hapus'])) {
                                                    $delete=mysqli_query($koneksi,"DELETE FROM tb_user WHERE id_user='$_POST[id_user]'");
                                                    if ($delete) {
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?user'
                                                        </script>";
                                                    }else{
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?user'
                                                        </script>";

                                                    }
                                                }
                                                 ?>
                                            </td>                                                
                                        </tr>    
                                        <?php endforeach ?>                                                               
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-sm btn-success" data-toggle="modal"  data-target="#newReg">Tambah Data Pengguna</button>

            <div class="col-lg-12">
                        <div class="modal fade" id="newReg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H4"> New Registration</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form role="form" method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" />                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" />                                            
                                        </div>
                                       <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" />                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Status User</label>
                                            <select class="form-control" name="role">
                                                <option value="admin">Admin</option>
                                                <option value="kasir">Kasir</option>
                                                <option value="owner">Owner</option>
                                            </select>                                           
                                        </div>
                                                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="add" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>