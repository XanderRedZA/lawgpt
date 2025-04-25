<nav class="navbar navbar-expand-md navbar-light bg-body-tertiary shadow-sm">
    <div class="container">
        <span class="navbar-brand fw-semibold text-success">
            {{ auth()->user()->name }}
            <small class="text-secondary d-block">{{ auth()->user()->email }}</small>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-danger text-black" href="{{ url('logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@extends('layouts.app')
@section('title', 'Welcome')
