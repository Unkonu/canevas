/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

// Bibliotheque Datatable
import 'datatables.net'
import 'datatables.net-dt'


require('datatables.net/js/jquery.dataTables');
require('datatables-bootstrap/js/dataTables.bootstrap');

// Bibliotheque Kendo
// import 'kendo-ui-core';
// import '@progress/kendo-ui'

require('@progress/kendo-ui/js/kendo.grid')
require('@progress/kendo-ui/js/kendo.all.min')
// require('@progress/kendo-ui/js/kendo.dropdownlist')

// import $ from 'jquery';
const $ = require('jquery');

// create global $ and jQuery variables
global.$ = global.jQuery = $;

// var dt = require( 'datatables.net' )();