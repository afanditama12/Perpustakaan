<?php
/*
language : Indonesian
*/
return [
    'title' => [
        'index' => "Daftar Perpustakaan",
        'create'=> "Tambah Perpustakaan",
        'edit'  => "Edit Perpustakaan",
        'copyright' => "Hak Cipta"
    ],
    'table' => [
        'tablename' => "Data Profil Perpustakaan",
        'aksi'      => "Aksi",
        'modaltitle'=> "Detail Profil Perpustakaan",
    ],
    'form_control' => [
        'input' => [
            'nmlembaga' => [
                'label' => 'Lembaga',
                'placeholder' => 'Masukkan nama lembaga',
                'attribute' => 'Lembaga'
            ],
            'pj' => [
                'label' => 'Penanggung Jawab',
                'placeholder' => 'Masukkan nama penanggung jawab',
                'attribute' => 'Penanggung Jawab'
            ],
            'jambuka' => [
                'label' => 'Jam Layanan',
                'placeholder' => 'ex: 07.00 - 14.00',
                'attribute' => 'Jam Layanan'
            ],
            'pengelola' => [
                'label' => 'Pengelola',
                'placeholder' => 'Masukkan nama pengelola',
                'attribute' => 'Pengelola'
            ],
            'skp' => [
                'label' => 'SK Pendirian',
                'placeholder' => 'Masukkan nomor surat keterangan pendirian',
                'attribute' => 'SK Pendirian',
                'button' => 'Pilih'
            ],'alamat' => [
                'label' => 'Alamat',
                'placeholder' => 'Masukkan alamat',
                'attribute' => 'Alamat'
            ],
            'telepon' => [
                'label' => 'Nomer Telepon',
                'placeholder' => 'Masukkan nomor telepon',
                'attribute' => 'telepon '
            ],
            'media' => [
                'label' => 'Sosial Media (Optional)'
            ],
            'logo' => [
                'label' => 'Logo (Optional)',
                'placeholder' => 'Masukkan gambar logo instansi',
                'button' => 'Pilih'
            ],
            'deskripsi' => [
                'label' => 'Deskripsi Perpustakaan',
                'placeholder' => 'Masukkkan tentang perpustakaanmu',
                'attribute' => 'Deskripsi Perpustakaan'
            ]
        ]
    ],
    'fitur' => [
        'search' => "Cari nama institusi"
    ],
    'button' => [
        'create' => "Tambah",
        'edit'   => "Edit",
        'delete' => "Hapus",
        'back' => "Kembali",
        'close' => "Tutup",
        'cancel' => "Batal"
    ],
    'alert' => [
        'create' => [
            'title' => "Tambah Perpustakaan",
            'message' => [
                'success' => "Data perpustakaan berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan data. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah Perpustakaan',
            'message' => [
                'success' => "Data perpustakaan berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui data. :error",
                'warning' => "Maaf anda tidak memiliki wewenang atas data :name"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Perpustakaan',
            'message' => [
                'confirm' => "Yakin akan menghapus Data ini?, anda akan kehilangan semua data rekap perpustakaan :title",
                'success' => "Data perpustakaan berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus data. :error",
                'warning' => "Maaf anda tidak memiliki wewenang atas data :name"
            ]
        ],
    ],
    'pagination' => [
        'previous' => 'Sebelumnya',
        'next' => 'Berikunya',
        'show' => 'Memperlihatkan',
        'to' => 'Sampai',
        'of' => 'dari',
        'data' => 'Data Entri'
    ]
];