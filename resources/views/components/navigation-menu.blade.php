 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">inicio</div>
                            <a class="nav-link" href="{{route('panel')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                panel
                            </a>
                           <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> --->
                            <div class="sb-sidenav-menu-heading">modulos</div>
                            <a class="nav-link" href="{{route('barberia.inicio')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-home"></i></div>
                                Ver Sitio Web
                            </a>
                            
                            @if(session('user_type') == 'administrador')
                                <!-- Solo administradores pueden ver usuarios -->
                                <a class="nav-link" href="{{route('usuarios.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                    Usuarios
                                </a>
                                
                                <!-- Solo administradores pueden ver solicitudes -->
                                <a class="nav-link" href="{{route('solicitudes.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                    Solicitudes
                                </a>
                                
                                <!-- Solo administradores pueden ver ventas -->
                                <a class="nav-link" href="{{route('ventas.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                    Ventas
                                </a>
                                
                                <!-- Solo administradores pueden ver comprobantes -->
                                <a class="nav-link" href="{{route('comprobantes.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-receipt"></i></div>
                                    Comprobantes
                                </a>
                                
                                <!-- Solo administradores pueden ver tipos de pago -->
                                <a class="nav-link" href="{{route('tipo-pagos.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                    Tipos de Pago
                                </a>
                            @endif
                            
                            @if(in_array(session('user_type'), ['administrador', 'barbero']))
                                <!-- Administradores y barberos pueden ver servicios -->
                                <a class="nav-link" href="{{route('servicios.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-cut"></i></div>
                                    Servicios
                                </a>
                                
                                <!-- Administradores y barberos pueden ver citas -->
                                <a class="nav-link" href="{{route('citas.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                                    Citas
                                </a>
                                
                                <!-- Solo barberos pueden ver disponibilidad -->
                                @if(session('user_type') == 'barbero')
                                    <a class="nav-link" href="{{route('disponibilidades.index')}}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                                        Mi Disponibilidad
                                    </a>
                                @endif
                            @endif
                            
                            <!-- Los clientes no tienen acceso al sistema administrativo -->
                            <!-- Solo pueden usar el formulario público de la página web -->
                               </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        @if(session('user_type'))
                            <div class="small">Bienvenido, {{ session('user_name', 'Usuario') }}</div>
                            <div class="small text-muted">{{ ucfirst(session('user_type', 'usuario')) }}</div>
                            <div class="mt-2">
                                <a href="{{ route('barberia.inicio') }}" class="btn btn-outline-light btn-sm me-1">Ver Sitio Web</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar Sesión</button>
                                </form>
                            </div>
                        @else
                            <div class="small">bienvenido</div>
                            <a href="{{ route('barberia.inicio') }}" class="btn btn-outline-light btn-sm">Ver Sitio Web</a>
                        @endif
                    </div>
                </nav>
            </div>