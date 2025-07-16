<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'regester'         => (new HomeController)->check(),
    'login'         => (new HomeController)->login(),
    'detail'         => (new HomeController)->get(),
    'category'         => (new HomeController)->index(),
};