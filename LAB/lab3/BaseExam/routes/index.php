<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'regester'         => (new ClientController)->regester(),
    'check'         => (new ClientController)->check(),
    'login'         => (new ClientController)->login(),
    'add'         => (new ClientController)->add(),
    'detail'         => (new HomeController)->get(),
    'category'         => (new HomeController)->index(),
};