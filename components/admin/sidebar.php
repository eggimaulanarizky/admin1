<div class="sidebar">

    <div class="sidebar-header">

        <div class="logo-area">
  <img src="/konstanta/assets/img/logo.PNG" class="logo-konstanta" alt="Logo">

            <div class="logo-text">
                <h2>KONSTANTA</h2>
                <p>KONTRAK PETUGAS DAN<br>BERITA ACARA</p>
            </div>
        </div>

        <hr>

    </div>

<a href="/konstanta/admin/dashboard.php">
    <i class="fas fa-house"></i>
    <span>Dashboard</span>
</a>

<a href="/konstanta/admin/pengguna/index.php">
    <i class="fas fa-user"></i>
    <span>Pengguna</span>
</a>

<a href="/konstanta/admin/dipa/index.php">
    <i class="fas fa-shield-halved"></i>
    <span>DIPA dan Pengelola Keuangan</span>
</a>

<a href="/konstanta/admin/peserta/index.php">
    <i class="fas fa-user-plus"></i>
    <span>Petugas</span>

</a>
<div class="menu-toggle" onclick="toggleMenu()">

    <span>
        <i class="fas fa-square-check"></i>
        Kelola Master 
    </span>
    

</div>

    <div id="submenu-master" class="submenu-container">

        <div class="submenu-parent" onclick="toggleSubAnggaran()">
            <span>Master Anggaran</span>
            <span class="arrow">⌄</span>
        </div>

        <div id="submenu-anggaran" class="submenu-child">

            <a href="/konstanta/admin/kelola_master/program/index.php">Program</a>
            <a href="/konstanta/admin/kelola_master/kegiatan/index.php">Kegiatan</a>
            <a href="/konstanta/admin/kelola_master/output/index.php">Output</a>
            <a href="/konstanta/admin/kelola_master/sub_output/index.php">Sub Output</a>
            <a href="/konstanta/admin/kelola_master/komponen/index.php">Komponen</a>
            <a href="/konstanta/admin/kelola_master/sub_komponen/index.php">Sub Komponen</a>
            <a href="/konstanta/admin/kelola_master/akun/index.php">Akun</a>
            <a href="/konstanta/admin/kelola_master/detil/index.php">Detil</a>

        </div>

        <a href="/konstanta/admin/kelola_master/satuan/index.php" class="submenu-link">
            Master Satuan
        </a>

        <a href="/konstanta/admin/kelola_master/team/index.php" class="submenu-link">
            Master Team
        </a>

        <a href="/konstanta/admin/kelola_master/jabatan/index.php" class="submenu-link">
            Master Jabatan
        </a>

        <a href="/konstanta/admin/kelola_master/template/index.php" class="submenu-link">
            Master Template
        </a>

    </div>

    <a href="/konstanta/admin/download.php">
    <i class="fas fa-download"></i>
    <span>Download</span>

<div class="sidebar-logout">
    <a href="../logout.php">
        <i class="fas fa-right-from-bracket"></i>
        <span>Logout</span>
    </a>
</div>

<div class="bps-box">
    <img src="/konstanta/assets/img/bps.png"
         class="footer-logo"
         alt="BPS">

    <div class="bps-text">
        <h4>BADAN PUSAT STATISTIK</h4>
        <p>KOTA SUKABUMI</p>
    </div>
</div>
</div>

</div>

</div>
<script>
function toggleMenu(){

    let menu = document.getElementById('submenu-master');
    let arrow = document.getElementById('arrow-master');

    if(menu.style.display === 'block'){
        menu.style.display = 'none';
        arrow.classList.remove('active');
    }else{
        menu.style.display = 'block';
        arrow.classList.add('active');
    }
}

function toggleSubAnggaran(){

    let menu = document.getElementById('submenu-anggaran');

    if(menu.style.display === 'block'){
        menu.style.display = 'none';
    }else{
        menu.style.display = 'block';
    }
}
</script>