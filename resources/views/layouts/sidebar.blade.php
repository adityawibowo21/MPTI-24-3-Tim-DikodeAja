<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width:50px;">
        </div>
        <div class="sidebar-brand-text mx-2">Platform Keuangan
            <div class="sidebar-subtext">Madrasah Diniyah Darussalam</div>
        </div>
        

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="{{ route ('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route ('infaq') }}">
            <i><span class="material-symbols-outlined" style="font-size: 21px;vertical-align: middle; align-items: center;">group</span></i>
            <span>Manajemen Infaq</span></a>
    </li>
 
    <li class="nav-item ">
        <a class="nav-link" href="{{ route ('siswa') }}">
            <i><span class="material-symbols-outlined" style="font-size: 21px;vertical-align: middle; align-items: center;">group</span></i>
            <span>Daftar Siswa</span></a>
    </li>
    
    <li class="nav-item ">
        <a class="nav-link" href="{{ route ('bendahara') }}">
            <i><span class="material-symbols-outlined" style="font-size: 21px;vertical-align: middle; align-items: center;">group</span></i>
            <span>Daftar Bendahara</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route ('donatur') }}">
            <i><span class="material-symbols-outlined" style="font-size: 21px;vertical-align: middle; align-items: center;">volunteer_activism</span></i>
            <span>Daftar Donatur</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->

</ul>