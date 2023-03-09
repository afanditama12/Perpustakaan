<?php
/*
language : English
*/
return [
    'title' => [
        'index' => "Library List",
        'create'=> "Add Library",
        'edit'  => "Edit Library",
        'copyright' => "Copyright"
    ],
    'table' => [
        'tablename' => "Library Profile Data",
        'nmlembaga' => "Institution",
        'pj'        => "Responsible Person",
        'jambuka'   => "Service Hours",
        'aksi'      => "Action",
        'modaltitle'=> "Library Profile Details",
        'pengelola' => "Administrator",
        'skp'       => "Certificate of Establishment",
        'alamat'    => "Address",
    ],
    'form_control' => [
        'input' => [
            'nmlembaga' => [
                'label' => 'Institution',
                'placeholder' => 'Enter institution',
                'attribute' => 'Institution'
            ],
            'pj' => [
                'label' => 'Responsible Person',
                'placeholder' => 'Enter responsible person',
                'attribute' => 'Responsible Person'
            ],
            'jambuka' => [
                'label' => 'Service Hours',
                'placeholder' => 'ex: 07.00 - 14.00',
                'attribute' => 'Service Hours'
            ],
            'pengelola' => [
                'label' => 'Administrator',
                'placeholder' => 'Enter administration',
                'attribute' => 'Administrator'
            ],
            'skp' => [
                'label' => 'Certificate of Establishment',
                'placeholder' => 'Enter certificate of establishment number',
                'attribute' => 'Certificate of Establishment',
                'button' => 'Choose'
            ],'alamat' => [
                'label' => 'Address',
                'placeholder' => 'Enter address',
                'attribute' => 'Address'
            ],
            'telepon' => [
                'label' => 'Phone Number',
                'placeholder' => 'Enter phone number',
                'attribute' => 'Phone Number '
            ],
            'media' => [
                'label' => 'Social Media (Optional)'
            ],
            'logo' => [
                'label' => 'Logo (Optional)',
                'placeholder' => 'Enter the institution logo image',
                'button' => 'Choose'
            ],
            'deskripsi' => [
                'label' => 'Library Description',
                'placeholder' => 'Enter about your library',
                'attribute' => 'Library Description'
            ]
        ]
    ],
    'fitur' => [
        'search' => "Search for institution"
    ],
    'button' => [
        'create' => "Add",
        'edit'   => "Edit",
        'delete' => "Delete",
        'back' => "Back",
        'close' => "Close",
        'cancel' => "Batal"
    ],
    'alert' => [
        'create' => [
            'title' => 'Add library',
            'message' => [
                'success' => "Library data saved successfully.",
                'error' => "An error occurred while saving the Library data. :error"
            ]
        ],
        'update' => [
            'title' => 'Edit library',
            'message' => [
                'success' => "Library data updated successfully.",
                'error' => "An error occurred while updating the Library data. :error",
                'warning' => "Sorry you do not have authority over the data :name"
            ]
        ],
        'delete' => [
            'title' => 'Delete library',
            'message' => [
                'confirm' => "Are you sure you want to delete this data?, you will lose all library recap data :title",
                'success' => "Library data deleted successfully.",
                'error' => "An error occurred while deleting the Library data. :error",
                'warning' => "Sorry you do not have authority over the data :name"
            ]
        ],
    ],
    'pagination' => [
        'previous' => 'Previous',
        'next' => 'Next',
        'show' => 'Showing',
        'to' => 'to',
        'of' => 'of',
        'data' => 'entries data'
    ]
];