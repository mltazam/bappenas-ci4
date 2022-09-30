<form method="post" id="getDataEdit">
  <div class="modal-body">
    <input type="hidden" value="<?php echo $detail['id_data'] ?>" name="id_data">  
    <tr> 
    <div class="form-group">
      <div class="form-group row my-3">
        <label class="col-sm-3">Nama<span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama'] ?>" required>
        </div>
      </div>
      <div class="form-group row my-3">
        <label class="col-sm-3">E-mail<span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <input type="email" class="form-control" name="email" value="<?php echo $detail['email'] ?>" required>
        </div>
      </div>
      <div class="form-group row my-3">
        <label class="col-sm-3">Posisi<span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <select class="form-control" name="posisi" required>
          <option value="<?php echo $detail['posisi'] ?>"><?php echo $detail['posisi'] ?></option>
          <?php 
          $getData = json_decode(file_get_contents("https://api.npoint.io/10507474409721a064a1"));
          foreach($getData as $showData){
            if ($showData!=$detail['posisi']) {
              echo "<option value='".$showData."'>".$showData."</option>";
            }
          }  
          ?>
        </select>
        </div>
      </div>
      <div class="form-group row my-3">
        <label class="col-sm-3">Alamat<span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <textarea class="form-control" rows="3" placeholder="Alamat Tempat Tinggal" name="alamat" required><?php echo $detail['alamat'] ?></textarea>
        </div>
      </div>

      <div class="form-group row my-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
          <button type="button" data-bs-dismiss="modal" class="btn btn-success" onclick="edit()">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  function edit(){
    var data = $("#getDataEdit").serialize();
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url('crud/edit'); ?>",
        cache: false,
        data: data,
        success: function() {
            $("#tampil").load("<?php echo base_url('home/tabel'); ?>");
        }
    });
    $("#alert-edit").show();
    $("#alert-tambah").hide();
    $("#alert-hapus").hide();
  }
</script>