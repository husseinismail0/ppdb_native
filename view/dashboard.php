<table class="table table-hover table-bordered mt-5">
    <thead class="table-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Alamat Lengkap</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Agama</th>
            <th scope="col">Asal SMP</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $no = 0;
    foreach ($results as $data) {
        $no ++;
    ?>
    <tr class="text-center">
        <th scope="row"><?php echo $no ?></th>
        <td><?= $data['nama_lengkap'] ?></td>
        <td><?= $data['alamat_lengkap'] ?></td>
        <td><?= (int)$data['jk'] ? 'Laki-Laki' : 'Perempuan' ?></td>
        <td><?= $data['agama'] ?></td>
        <td><?= $data['asal_smp'] ?></td>
        <td><?= $data['jurusan'] ?></td>
        <td class="d-flex justify-content-around">
            <a href="?page=edit&id=<?= $data['no_daftar'] ?>" class="btn btn-secondary">Edit</a>
            <form method="post">
                <input type="hidden" name="student-id" value="<?= $data['no_daftar'] ?>">
                <button class="btn btn-danger" type="submit" name="delete" onclick="return confirm('hapus data?')">Hapus</button>
            </form>
            <a href="?page=print&id=<?= $data['no_daftar'] ?>" class="btn btn-success">Cetak</a>
        </td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>