<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- Jika Anda ingin membuat breadcrumb, tambahkan di sini -->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Cepat</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?= form_open_multipart('user/edit'); ?>
<div class="card-body">
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" value="<?= isset($user['email']) ? $user['email'] : ''; ?>" <?= isset($some_condition) && $some_condition ? 'readonly' : ''; ?>>
    </div>
    
    <div class="form-group">
    <label for="name">Nama Lengkap</label>
    <input type="text" class="form-control" name="name" id="name" value="<?= isset($user['name']) ? $user['name'] : ''; ?>">
    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
</div>

        <?php
$some_condition = true; // Mendefinisikan variabel some_condition

// Selanjutnya, Anda dapat menggunakannya dalam elemen input
?>


    <div class="form-group">
    <label for="image">Foto profil</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
<?= form_close(); ?>
