<?php
/*
language : Indonesian
*/
return [
    'title' => [
        'index' => "Rekap Data",
        'create' => "Tambah Rekap",
        'edit' => "Edit Rekap",
        'export' => "Ekspor Data"
    ],

    'option' => "Semua Perpustakaan",

    'table' => [
        'tableName' => "Daftar Detail Perpustakaan",
        'library' => "Perpustakaan",
        'visitor' => "Pengunjung",
        'member' => "Anggota",
        'borrower' => "Peminjam",
        'title_book' => "Judul",
        'eksemplar' => "Eksemplar",
        'year' => "Tahun",
        'action' => "Aksi",
    ],

    'button' => [
        'add' => "Tambah",
        "back" => "Kembali",
        "edit" => "Edit",
        "export" => "Export",
        "cancel" => "kembali",
        "delete" => "Hapus"
    ],

    'alert' => [
        'create' => [
            'title' => "Tambah Rekap",
            'message' => [
                'success' => "Data Rekap berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan data. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah Data Rekap',
            'message' => [
                'success' => "Data Rekap berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui data. :error",
                'warning' => "Maaf anda tidak memiliki wewenang atas data :name"
            ]
        ],
        'delete' => [
            'title' => 'Hapus Data Rekap',
            'message' => [
                'confirm' => "Yakin akan menghapus Data Rekap tahun :title pada tanggal :time ?",
                'success' => "Data Rekap berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus data. :error",
                'warning' => "Maaf anda tidak memiliki wewenang atas data :name"
            ]
        ],
    ],

    'form-input' => [
        'label' => [
            'library' => "Perpustakaan",
            'visitor' => "Jumlah Pengunjung",
            'member' => "Jumlah Anggota",
            'borrower' => "Jumlah Peminjam",
            'title_book' => "Jumlah Judul",
            'exemplar' => "Jumlah Eksemplar",
            'year' => "Tahun"
        ],
        'placeholder' => [
            'library' => "Pilih perpustakaan...",
            'visitor' => "Masukkan jumlah pengunjung",
            'member' => "Masukkan jumlah anggota",
            'borrower' => "Masukkan jumlah peminjam",
            'title_book' => "Masukkan jumlah judul",
            'exemplar' => "Masukkan jumlah eksemplar dari judul keseluruhan",
            'year' => "Masukkan tahun"
        ],
        'attribute' => [
            'library' => "Perpustakaan",
            'visitor' => "Jumlah Pengunjung",
            'member' => "Jumlah Anggota",
            'borrower' => "Jumlah Peminjam",
            'title_book' => "Jumlah Judul",
            'exemplar' => "Jumlah Eksemplar",
            'year' => "Tahun"
        ]
    ],

    'modal_info' => [
        'modal-title' => 'Detail Rekap',
        
        'modal-body' => [
            'label'=> [
                'library' => 'Perpustakaan',
                'visitor' => 'Pengunjung',
                'member' => 'Anggota',
                'borrower' => 'Peminjaman',
                'title_book' => "Judul",
                'eksemplar' => "Eksemplar",
                'year' => "Tahun",
                'created_at' => 'Dibuat',
                'updated_at' => 'Diubah',
            ]
        ]
    ]
];