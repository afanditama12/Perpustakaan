<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// ========== perpus
// Library
Breadcrumbs::for('perpus', function ($trail) {
    $trail->push('Library', route('perpus.home'));
});

// Library > Home
Breadcrumbs::for('perpus_home', function ($trail) {
    $trail->parent('perpus');
    $trail->push('Home', route('perpus.home'));
});

//Library > Home > Detail > [name]
Breadcrumbs::for('profil_perpus', function ($trail, $profil_perpustakaan) {
    $trail->parent('perpus');
    $trail->push('Profil', route('perpus.profil', ['profil_perpustakaan' => $profil_perpustakaan]));
    $trail->push($profil_perpustakaan->nmlembaga, route('perpus.profil', ['profil_perpustakaan' => $profil_perpustakaan]));
});

// Library > Search
Breadcrumbs::for('perpus_search', function ($trail,$keyword) {
    $trail->parent('perpus');
    $trail->push('Search', route('perpus.search'));
    $trail->push($keyword, route('perpus.search'));
});


// ========== dashboard
// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Dashboard > Library List
Breadcrumbs::for('Library', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Library List', route('listperpustakaan.index'));
});

// Dashboard > Library List > Add
Breadcrumbs::for('Add_library', function ($trail) {
    $trail->parent('Library');
    $trail->push('Add', route('listperpustakaan.create'));
});

// Dashboard > Library List > Edit
Breadcrumbs::for('edit_library', function ($trail, $listperpustakaan) {
    $trail->parent('Library');
    $trail->push('Edit', route('listperpustakaan.edit', ['listperpustakaan' => $listperpustakaan]));
});

// Dashboard > Library List > Edit > {title}
Breadcrumbs::for('edit_library_title', function ($trail, $listperpustakaan) {
    $trail->parent('edit_library', $listperpustakaan);
    $trail->push($listperpustakaan->nmlembaga, route('listperpustakaan.edit', ['listperpustakaan' =>$listperpustakaan]));
});

// Dashboard > Data Recap List
Breadcrumbs::for('recap_list', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Data Recap List', route('detail-perpustakaan.index'));
});

// Dashboard > Data Recap List > Add
Breadcrumbs::for('add_recap', function ($trail) {
    $trail->parent('recap_list');
    $trail->push('Add', route('detail-perpustakaan.create'));
});

// Dashboard > Data Recap List > export
Breadcrumbs::for('export', function ($trail) {
    $trail->parent('recap_list');
    $trail->push('Export', route('detail-perpustakaan.export'));
});

// Dashboard > Data Recap List > Edit
Breadcrumbs::for('edit_recap', function ($trail, $detail_perpustakaan) {
    $trail->parent('recap_list');
    $trail->push('Edit', route('detail-perpustakaan.edit', ['detail_perpustakaan' => $detail_perpustakaan]));
});

// Dashboard > Data Recap List > Edit > {title}
Breadcrumbs::for('edit_recap_title', function ($trail, $detail_perpustakaan) {
    $trail->parent('edit_recap', $detail_perpustakaan);
    $trail->push($detail_perpustakaan->profil->nmlembaga, route('detail-perpustakaan.edit', ['detail_perpustakaan' =>$detail_perpustakaan]));
});

//Dashboard > Book Recap List
Breadcrumbs::for('book_list', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Book Recap List', route('rekap-buku.index'));
});

//Dashboard > Book Recap List > Add
Breadcrumbs::for('add_book', function ($trail) {
    $trail->parent('book_list');
    $trail->push('Add Recap List', route('rekap-buku.create'));
});

// Dashboard > Book Recap List > Edit
Breadcrumbs::for('edit_book', function ($trail, $rekap_buku) {
    $trail->parent('book_list');
    $trail->push('Edit', route('rekap-buku.edit', ['rekap_buku' => $rekap_buku]));
});

// Dashboard > Book Recap List > Edit > {title}
Breadcrumbs::for('edit_book_title', function ($trail, $rekap_buku) {
    $trail->parent('edit_book', $rekap_buku);
    $trail->push($rekap_buku->profil->nmlembaga, route('rekap-buku.edit', ['rekap_buku' =>$rekap_buku]));
});

//Dashboard > Roles
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

//Dashboard > Roles > Add
Breadcrumbs::for('add_role', function ($trail) {
    $trail->parent('roles');
    $trail->push('Add', route('roles.create'));
});

//Dashboard > Roles > Detail > [name]
Breadcrumbs::for('detail_role', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push('Detail', route('roles.show', ['role' => $role]));
    $trail->push($role->name, route('roles.show', ['role' => $role]));
});

//Dashboard > Roles > Edit > [name]
Breadcrumbs::for('edit_role', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push('Edit', route('roles.edit', ['role' => $role]));
    $trail->push($role->name, route('roles.edit', ['role' => $role]));
});

//Dashboard > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});

//Dashboard > users > Add
Breadcrumbs::for('add_user', function ($trail) {
    $trail->parent('users');
    $trail->push('Add', route('users.create'));
});

//Dashboard > users > Edit > [name]
Breadcrumbs::for('edit_user', function ($trail, $user) {
    $trail->parent('users');
    $trail->push('Edit', route('users.edit', ['user' => $user]));
    $trail->push($user->name, route('users.edit', ['user' => $user]));
});

