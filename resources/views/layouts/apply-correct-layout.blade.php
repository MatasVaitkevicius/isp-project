@php
if(Auth::user()->user_role === 'worker') {
$layout = 'layouts.worker';
} elseif (Auth::user()->user_role === 'buyer') {
$layout = 'layouts.buyer';
} elseif (Auth::user()->user_role === 'seller') {
$layout = 'layouts.seller';
} else {
$layout = 'layouts.admin';
}
@endphp
@extends($layout)