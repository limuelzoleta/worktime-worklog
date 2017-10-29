
const elixir = require('laravel-elixir');

var bower_path = 'public/assets/bower';
var js_path = 'public/js';
elixir(function(mix) {

mix.copy(bower_path + '/wickedpicker/dist/wickedpicker.min.js', js_path);
});