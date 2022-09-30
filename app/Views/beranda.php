<main class="flex-shrink-0">
  <div class="container">
    <div id="alert-tambah" style="display: none;">
      <div class="alert alert-success alert-dismissible fade show" role="alert" >
        Data baru telah <strong>sukses ditambahkan</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>

    <div id="alert-edit" style="display: none;">
      <div class="alert alert-primary alert-dismissible fade show" role="alert" >
        Data telah <strong>sukses diubah</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>

    <div id="alert-hapus" style="display: none;">
      <div class="alert alert-danger alert-dismissible fade show" role="alert" >
        Data baru telah <strong>sukses dihapuskan</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-between mb-5">
          <h2 class="fw-bolder">
            Data Calon Pegawai
          </h2>
          <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa-solid fa-circle-plus"></i>  Tambah Data
            </button>
          </div>
        </div>

        <div id="tampil"></div>
        <div align="center">
            <div id='ajax-wait'>
                <img alt='loading...' src='/gambar/load.png'/>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>


<!-- Modal Tambah Data-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bolder" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" id="getData">  
              <div class="form-group">
                <div class="form-group row my-3">
                  <label class="col-sm-3">Nama<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                  </div>
                </div>
                <div class="form-group row my-3">
                  <label class="col-sm-3">E-mail<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <input type="mail" class="form-control" id="cekEmail" name="email" placeholder="Alamat E-mail" required>
                  </div>
                </div>
                <div class="form-group row my-3">
                  <label class="col-sm-3">Posisi<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <select class="form-control" name="posisi" required>
                    <option selected>--Pilih Posisi--</option>
                    <?php 
                    $getData = json_decode(file_get_contents("https://api.npoint.io/10507474409721a064a1"));
                    foreach($getData as $showData){
                      echo "<option value='".$showData."'>".$showData."</option>";
                    }  
                    ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row my-3">
                  <label class="col-sm-3">Alamat<span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" placeholder="Alamat Tempat Tinggal" name="alamat" required></textarea>
                  </div>
                </div>
              </div>
            </form>
            <div class="form-group row my-3">
              <div class="col-sm-3"></div>
              <div class="col-sm-9">
                <button type="button" class="btn btn-success" onclick="tambah()">
                  <i class="fa fa-save"></i> Simpan
                </button>
              </div>
            </div>
        </div>

      </div>
    </div>
  </div>
<!-- Modal Tambah Data-->


<!-- JavaScript-->  
  <script>
    function tambah(e){
      if ($("input#nama").val() == "" || $("input#job").val() == "" || $("textarea").val()=="") {
        alert('Silahkan lengkapi formulir isian data');
        $("#alert-tambah").hide();
        $("#alert-hapus").hide();
        $("#alert-edit").hide();
      }else{
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (emailReg.test($("#cekEmail").val())!=true) {
          alert('Format alamat E-mail Salah');
        }else{
          var data = $("#getData").serialize();
          $.ajax({
              type: 'POST',
              url: "<?php echo base_url('crud/tambah'); ?>",
              cache: false,
              data: data,
              success: function() {
                  $("#tampil").load("<?php echo base_url('home/tabel'); ?>");
              }
          });
          $('#exampleModal').modal('hide'); 
          $('body').removeClass('modal-open'); 
          $('.modal-backdrop').remove();
          setTimeout(function() { $("body").css("overflow", "auto");;}, 500);

          $("#getData").trigger('reset');
          $("#alert-tambah").show();
          $("#alert-hapus").hide();
          $("#alert-edit").hide();
        }
      }
    }

 $('#button').submit(function(e) {
    // Coding
    $('#IDModal').modal('toggle'); //or  $('#IDModal').modal('hide');
    return false;
});

    $("#tampil").load("<?php echo base_url('home/tabel'); ?>");
    $(document).ajaxStart(function() {
        $("#ajax-wait").css({
            left: ($(window).width() - 32) / 2 + "px", // 32 = lebar gambar
            top: ($(window).height() - 32) / 2 + "px", // 32 = tinggi gambar
            display: "block"
        })
    }).ajaxComplete(function() {
        $("#ajax-wait").fadeOut();
    });
  </script>
<!-- JavaScript Bundle with Popper -->