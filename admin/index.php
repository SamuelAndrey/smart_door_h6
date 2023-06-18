<?php require_once __DIR__ . "/header.php"; ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    
      <div class="row">
        <div class="col-xl-6">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-area me-1"></i>
              Area Chart Example
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-bar me-1"></i>
              Bar Chart Example
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
          </div>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Log access
        </div>
        <div class="card-body">
          <table id="datatablesSimple" class="tableID">
            <thead>
              <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Waktu</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Waktu</th>
                <th>Status</th>
              </tr>
            </tfoot>
            <tbody>

              <?php
              # menampilkan data log akses
              $data = query("SELECT a.id, a.kode, b.nama as nm_mhs, c.nama as nm_staf, a.waktu, a.status
                              FROM log_akses a
                              LEFT JOIN mahasiswa b ON b.nim = a.kode
                              LEFT JOIN staf c ON c.npp = a.kode
                              ORDER BY a.id DESC");
              foreach ($data as $row) : ?>
                <tr>
                  <td><?= $row['id'] ?></td>
                  <td><?= $row['kode'] ?></td>
                  <td><?= ($row['nm_mhs']) ? $row['nm_mhs'] : $row['nm_staf'] ?></td>
                  <td><?= $row['waktu'] ?></td>
                  <td><?= $row['status'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

</body>

</html>