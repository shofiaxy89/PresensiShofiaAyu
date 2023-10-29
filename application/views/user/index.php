<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Menampilkan pesan sukses atau notifikasi lainnya jika diperlukan -->
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="<?= base_url('assets/img/profile/default.png'); ?>"
                                         alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">Shofia Ayu Permatasari</h3>
                                <p class="text-muted text-center">shofiapermatasari@gmail.com</p>
                                <p class="text-muted text-center">Anggota Sejak 14 Oktober 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
