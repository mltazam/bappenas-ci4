<main class="flex-shrink-0">
  <div class="container">

    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-between mb-5">
          <h2 class="fw-bolder">
            Dokumentasi API
          </h2>
        </div>
        <p>        
          Berikut merupakan informasi dokumentasi API (<i>Application Programming Interface</i>) untuk sistem ini,        Uji coba REST API bisa menggunakan Postman. JSON Attribute yang dimiliki oleh data adalah "nama", "email", "posisi", dan "alamat".
        </p>

        <table class="table table-borderless">
          <tr>
            <td width="200px">Menampilkan semua data</td>
            <td><span class="badge bg-success">GET</span> http://localhost:8080/api/all <a href="http://localhost:8080/api/all" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
          </tr>
          <tr>
            <td width="200px">Menampilkan single data</td>
            <td><span class="badge bg-success">GET</span> http://localhost:8080/api/detail{id} </td>
          </tr>
          <tr>
            <td width="200px">Menambah data baru</td>
            <td><span class="badge bg-success">GET</span> http://localhost:8080/api/create </td>
          </tr>
          <tr>
            <td width="200px">Mengedit data</td>
            <td><span class="badge bg-success">GET</span> http://localhost:8080/api/update{id} </td>
          </tr>
          <tr>
            <td width="200px">Menghapus data</td>
            <td><span class="badge bg-success">GET</span> http://localhost:8080/api/delate{id} </td>
          </tr>
        </table>

        <p>
          <b>Note</b> API yang dikembangkan dapat diakses langsung tanpa menggunakan Authorization.   
        </p>
      </div>
    </div>
  </div>
</main>