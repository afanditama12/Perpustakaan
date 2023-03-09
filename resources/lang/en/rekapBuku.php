<?php
/*
language : English
*/
return [
    'title' => [
        'index' => "Book Recap",
        'create' => "Add Book Recap",
        'edit' => "Edit Book Recap"
    ],

    'option' => "All Library",

    'table' => [
        'tableName' => "List Total of Library Books",
        'library' => "Library",
        'year' => "Year",
        'judul' => "Title",
        'eksemplar' => "Exemplar",
        'action' => "Action",
    ],

    'button' => [
        'add' => "Add",
        "back" => "Back",
        "edit" => "Edit",
        "cancel" => "Cancel",
        "delete" => "Delete"
    ],

    'alert' => [
        'create' => [
            'title' => 'Add Book Recap',
            'message' => [
                'success' => "Book Recap data saved successfully.",
                'error' => "An error occurred while saving the Book Recap data. :error"
            ]
        ],
        'update' => [
            'title' => 'Edit Book Data',
            'message' => [
                'success' => "Book Recap data updated successfully.",
                'error' => "An error occurred while updating the Book Recap data. :error"
            ]
        ],
        'delete' => [
            'title' => 'Delete Book Recap Data',
            'message' => [
                'confirm' => "Are you sure you want to delete the :title Book Recap data on :time ?",
                'success' => "Book Recap data deleted successfully.",
                'error' => "An error occurred while deleting the Book Recap data. :error"
            ]
        ],
    ],

    'form-input' => [
        'label' => [
            'library' => "Library",
            'title' => "Total Title",
            'exemplar' => "Total Exemplar",
            'year' => "Year",
        ],
        'placeholder' => [
            'library' => "Select library...",
            'title' => "Enter total title",
            'exemplar' => "Enter total exemplar",
            'year' => "Enter year",
        ],
        'attribute' => [
            'library' => "Library",
            'title' => "Total Title",
            'exemplar' => "Total Exemplar",
            'year' => "Year",
        ]
    ],

    'modal_info' => [
        'modal-title' => 'Book Recap Detail',
        
        'modal-body' => [
            'label'=> [
                'library' => 'Library',
                'title' => "Title",
                'exemplar' => "Exemplar",
                'year' => 'Year',
                'created_at' => 'Created at',
                'updated_at' => 'Updated at',
            ]
        ]
    ]
];