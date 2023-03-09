<?php
/*
language : Indonesian
*/
return [
    'title' => [
        'index' => "Rekap Buku",
        'create' => "Tambah Rekap Buku",
        'edit' => "Edit Rekap Buku"
    ],

    'option' => "Semua Perpustakaan",

    'table' => [
        'tableName' => "Daftar Jumlah Buku Perpustakaan",
        'library' => "Perpustakaan",
        'year' => "Tahun",
        'judul' => "Judul",
        'eksemplar' => "Eksemplar",
        'action' => "Aksi",
    ],

    'button' => [
        'add' => "Tambah",
        "back" => "Kembali",
        "edit" => "Edit",
        "cancel" => "kembali",
        "delete" => "Hapus"
    ],

    'alert' => [
        'create' => [
            'title' => "Tambah Rekap Buku",
            'message' => [
                'success' => "Data Rekap Buku berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan data. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah Data Rekap Buku',
            'message' => [
                'success' => "Data Rekap Buku berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui data. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Data Rekap Buku',
            'message' => [
                'confirm' => "Yakin akan menghapus Data Rekap Buku tahun :title pada tanggal :time ?",
                'success' => "Data Rekap Buku berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus data. :error"
            ]
        ],
    ],

    'form-input' => [
        'label' => [
            'library' => "Perpustakaan",
            'title' => "Jumlah Judul",
            'exemplar' => "Jumlah Eksemplar",
            'year' => "Tahun",
        ],
        'input' => [
            'library' => "Pilih Perpustakaan...",
            'title' => "Masukkan jumlah judul",
            'exemplar' => "Masukkan jumlah eksemplar",
            'year' => "Masukkan Tahun"
        ],
        'attribute' => [
            'library' => "Perpustakaan",
            'title' => "Jumlah Judul",
            'exemplar' => "Jumlah Eksemplar",
            'year' => "Tahun",
        ]
    ],

    'modal_info' => [
        'modal-title' => 'Detail Rekap Buku',
        
        'modal-body' => [
            'label'=> [
                'library' => 'Perpustakaan',
                'title' => "Judul",
                'exemplar' => "Eksemplar",
                'year' => 'tahun',
                'created_at' => 'Dibuat',
                'updated_at' => 'Diubah',
            ]
        ]
    ]
];