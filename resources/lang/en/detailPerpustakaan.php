<?php
/*
language : English
*/
return [
    'title' => [
        'index' => "Data Recap",
        'create' => "Add Recap",
        'edit' => "Edit Recap",
        'export' => "Export Data"
    ],

    'option' => "All Library",

    'table' => [
        'tableName' => "Detail Library List",
        'library' => "Library",
        'visitor' => "Visitor",
        'member' => "Member",
        'borrower' => "Borrower",
        'title_book' => "Title",
        'eksemplar' => "Exemplar",
        'year' => "Year",
        'action' => "Action",
    ],

    'button' => [
        'add' => "Add",
        "back" => "Back",
        "edit" => "Edit",
        "export" => "Export",
        "cancel" => "Cancel",
        "delete" => "Delete"
    ],

    'alert' => [
        'create' => [
            'title' => 'Add Recap',
            'message' => [
                'success' => "Recap data saved successfully.",
                'error' => "An error occurred while saving the  Recap data. :error"
            ]
        ],
        'update' => [
            'title' => 'Edit Data',
            'message' => [
                'success' => "Recap data updated successfully.",
                'error' => "An error occurred while updating the Recap data. :error",
                'warning' => "Sorry you do not have authority over the data :name"
            ]
        ],
        'delete' => [
            'title' => 'Delete Recap Data',
            'message' => [
                'confirm' => "Are you sure you want to delete the year :title  Recap data on :time ?",
                'success' => "Recap data deleted successfully.",
                'error' => "An error occurred while deleting the Recap data. :error",
                'warning' => "Sorry you do not have authority over the data :name"
            ]
        ],
    ],

    'form-input' => [
        'label' => [
            'library' => "Library",
            'visitor' => "Total Visitor",
            'member' => "Total Member",
            'borrower' => "Total Borrower",
            'title_book' => "Total Title",
            'exemplar' => "Total Exemplar",
            'year' => "Year"
        ],
        'placeholder' => [
            'library' => "Select library...",
            'visitor' => "Enter total visitor",
            'member' => "Enter total member",
            'borrower' => "Enter total borrower",
            'title_book' => "Enter total title",
            'exemplar' => "Enter the total of exemplar of the overall title",
            'year' => "Enter year"
        ],
        'attribute' => [
            'library' => "Library",
            'visitor' => "Total Visitor",
            'member' => "Total Member",
            'borrower' => "Total Borrower",
            'title_book' => "Total Title",
            'exemplar' => "Total Exemplar",
            'year' => "Year"
        ]
    ],

    'modal_info' => [
        'modal-title' => 'Recap Detail',
        
        'modal-body' => [
            'label'=> [
                'library' => 'Library',
                'visitor' => 'Visitor',
                'member' => 'Member',
                'borrower' => 'Borrower',
                'title_book' => "Title",
                'eksemplar' => "Exemplar",
                'year' => "Year",
                'created_at' => 'Created at',
                'updated_at' => 'Updated at',
            ]
        ]
    ]
];