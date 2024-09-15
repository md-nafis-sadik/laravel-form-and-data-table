import './bootstrap';
import Alpine from 'alpinejs';
import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4'; // DataTables with Bootstrap 4 styling

window.Alpine = Alpine;

Alpine.start();

// Initialize DataTables on tables with class 'datatable'
$(document).ready(function() {
    $('.datatable').DataTable();
});
