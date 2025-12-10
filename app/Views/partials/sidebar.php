<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menú Principal</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="/">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Inicio</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarReservas" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarReservas">
                        <i class="ri-calendar-check-line"></i> <span data-key="t-apps">Reservas y Citas</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarReservas">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/reservas/nueva" class="nav-link"> Nueva Reserva </a>
                            </li>
                            <li class="nav-item">
                                <a href="/reservas/mis-reservas" class="nav-link"> Mis Reservas </a>
                            </li>
                            <?php if (session()->get('rol') == 'ADMINISTRADOR'): ?>
                                <li class="nav-item">
                                    <a href="/reservas/gestion" class="nav-link"> Gestionar Todas </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTaller" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTaller">
                        <i class="ri-roadster-line"></i> <span data-key="t-layouts">Taller</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTaller">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/vehiculos" class="nav-link"> Mis Vehículos </a>
                            </li>
                            <li class="nav-item">
                                <a href="/servicios/catalogo" class="nav-link"> Catálogo Servicios </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <?php if (session()->get('rol') == 'ADMINISTRADOR'): ?>
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Administración</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarAdmin" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdmin">
                            <i class="ri-admin-line"></i> <span data-key="t-pages">Gestión Interna</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAdmin">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/inventario" class="nav-link"> Inventario (Insumos) </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/personal" class="nav-link"> Personal </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/ordenes" class="nav-link"> Órdenes de Trabajo </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/facturacion" class="nav-link"> Facturación </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarIcons">
                <i class="ri-compasses-2-line"></i> <span data-key="t-icons">Icons</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarIcons">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="icons-remix" class="nav-link"><span data-key="t-remix">Remix</span> <span
                                class="badge badge-pill bg-info">v4.3</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="icons-boxicons" class="nav-link"><span data-key="t-boxicons">Boxicons</span>
                            <span class="badge badge-pill bg-info">v2.1.4</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="icons-materialdesign" class="nav-link"><span data-key="t-material-design">Material
                                Design</span> <span class="badge badge-pill bg-info">v7.2.96</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="icons-lineawesome" class="nav-link" data-key="t-line-awesome">Line Awesome</a>
                    </li>
                    <li class="nav-item">
                        <a href="icons-feather" class="nav-link"><span data-key="t-feather">Feather</span> <span
                                class="badge badge-pill bg-info">v4.29.2</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="icons-crypto" class="nav-link"> <span data-key="t-crypto-svg">Crypto
                                SVG</span></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarMaps">
                <i class="ri-map-pin-line"></i> <span data-key="t-maps">Maps</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarMaps">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="maps-google" class="nav-link" data-key="t-google">
                            Google
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="maps-vector" class="nav-link" data-key="t-vector">
                            Vector
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="maps-leaflet" class="nav-link" data-key="t-leaflet">
                            Leaflet
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarMultilevel">
                <i class="ri-share-line"></i> <span data-key="t-multi-level">Multi Level</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarMultilevel">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                    </li>
                    <li class="nav-item">
                        <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level
                            1.2
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAccount">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="sidebarCrm" data-key="t-level-2.2"> Level
                                        2.2
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarCrm">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link" data-key="t-level-3.1"> Level 3.1
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link" data-key="t-level-3.2"> Level 3.2
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>