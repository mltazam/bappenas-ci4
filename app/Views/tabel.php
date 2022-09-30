<table class="table table-responsive" id="dataTable">
  <thead>
    <tr>
      <th width="10px">No</th>
      <th>Nama</th>
      <th>E-mail</th>
      <th>Posisi</th>
      <th>Alamat</th>
      <th width="50px">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no=1;
    foreach ($allData as $row) {?>
      <tr>
        <th><?php echo $no++; ?></th>
        <td><?php echo $row['nama'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['posisi'] ?></td>
        <td><?php echo $row['alamat'] ?></td>
        <td>
          <button type="button" id="<?php echo $row['id_data'] ?>" class="edit btn btn-warning btn-sm">
            <i class="fas fa-edit"></i>
          </button>
          <button type="button" id="<?php echo $row['id_data'] ?>" class="hapus btn btn-danger btn-sm">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    <?php 
      }
    ?>
  </tbody>
</table>

<!--Modal-->
 <div id="dataModal" class="modal fade">  
    <div class="modal-dialog">  
      <div class="modal-content">  
        <div class="modal-header">
          <h3 class="fw-bolder">Edit Data</h3>   
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button> 
        </div>
        <div id="detail"></div>
      </div>  
    </div>
  </div>
<!--Modal-->

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
    
    $('.hapus').click(function(){
      var getID = $(this).attr("id");
      $.ajax({
          type: 'POST',
          url: "<?php echo base_url('crud/hapus'); ?>",
          cache: false,
          data: {id_data:getID},
          success: function() {
              $("#tampil").load("<?php echo base_url('home/tabel'); ?>");
                       DataTable.ajax.reload();
          }
      });
      $("#alert-hapus").show();
      $("#alert-tambah").hide();
      $("#alert-edit").hide();
    });

    $('.edit').click(function(){
       var id_data = $(this).attr("id");  
       $.ajax({  
            url:"<?php echo base_url('home/edit'); ?>",  
            method:"post",  
            data:{id_data:id_data},  
            success:function(data){  
                 $('#detail').html(data);  
                 $('#dataModal').modal("show");  
            }  
       });  
    }); 
</script>