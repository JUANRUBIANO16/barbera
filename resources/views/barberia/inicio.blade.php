<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Barbería Vikings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('estilos/estilos2.css') }}">
    <style>
        /* Estilos para la sección de servicios mejorada */
        .servicios-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .servicios-grid .servicio-box {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%) !important;
            border-radius: 15px !important;
            padding: 2rem !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease !important;
            border: 2px solid #d4af37 !important;
            height: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            color: #d4af37 !important;
            position: relative !important;
            overflow: hidden !important;
        }
        
        .servicios-grid .servicio-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(212, 175, 55, 0.1) 0%, rgba(212, 175, 55, 0.05) 100%);
            pointer-events: none;
        }
        
        .servicios-grid .servicio-box:hover {
            transform: translateY(-8px) !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6) !important;
            background: linear-gradient(135deg, #0d0d0d 0%, #1a1a1a 100%) !important;
            border-color: #f4d03f !important;
        }
        
        .servicio-icono {
            text-align: center;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }
        
        .servicio-icono img {
            filter: brightness(0) saturate(100%) invert(70%) sepia(100%) saturate(1000%) hue-rotate(45deg);
            transition: transform 0.3s ease;
        }
        
        .servicio-box:hover .servicio-icono img {
            transform: scale(1.1);
            filter: brightness(0) saturate(100%) invert(80%) sepia(100%) saturate(1000%) hue-rotate(45deg);
        }
        
        .servicios-grid .servicio-box h3 {
            color: #d4af37 !important;
            font-size: 1.4rem !important;
            margin-bottom: 1rem !important;
            text-align: center !important;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5) !important;
            position: relative !important;
            z-index: 1 !important;
        }
        
        .servicios-grid .servicio-descripcion {
            color: rgba(212, 175, 55, 0.9) !important;
            line-height: 1.6 !important;
            margin-bottom: 1.5rem !important;
            text-align: center !important;
            position: relative !important;
            z-index: 1 !important;
        }
        
        .servicios-grid .servicio-footer {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            padding-top: 1rem !important;
            border-top: 2px solid rgba(212, 175, 55, 0.3) !important;
            margin-top: auto !important;
            position: relative !important;
            z-index: 1 !important;
        }
        
        .servicios-grid .precio-servicio {
            font-size: 1.3rem !important;
            color: #d4af37 !important;
            font-weight: bold !important;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5) !important;
        }
        
        .servicios-grid .categoria-servicio .badge {
            background: rgba(212, 175, 55, 0.2) !important;
            color: #d4af37 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 20px !important;
            font-size: 0.8rem !important;
            border: 1px solid rgba(212, 175, 55, 0.4) !important;
            backdrop-filter: blur(10px) !important;
        }
        
        .titulo-servicios {
            text-align: center;
            font-size: 2.5rem;
            color: #d4af37;
            margin-bottom: 1rem;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            position: relative;
        }
        
        .titulo-servicios::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(45deg, #d4af37, #f4d03f);
            border-radius: 2px;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .servicios-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .servicios-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .servicio-box {
                padding: 1.5rem;
            }
            
            .servicio-footer {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
        
        @media (max-width: 480px) {
            .servicios-grid {
                gap: 1rem;
            }
            
            .servicio-box {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('imagenes/jj2.jpg') }}" alt="Logo Barbería" class="logo">
        <nav>
            <a href="#inicio">Inicio</a>
            <a href="#sobre-nosotros">Sobre nosotros</a>
            <a href="#servicios">Servicio</a>
            <a href="#agenda">Reservar</a>
            <a href="#ubicacion">Ubícanos</a>
            <a href="{{ route('login') }}">Admin</a>
        </nav>
    </header>
    <section id="inicio" class="hero">
        <div class="hero-content">
            <h1>Ragnarok Barber Shop</h1>
            <div class="decoracion-hero">
                <hr>
                <img src="{{ asset('imagenes/jj2.jpg') }}" alt="icono" width="300">
                <hr>
            </div>
        </div>
    </section>
    <section id="sobre-nosotros" class="sobre-nosotros">
        <div class="sobre-contenido">
            <img src="{{ asset('imagenes/jj2.jpg') }}" alt="Icono Vikings" class="sobre-icono">
            <h2>Sobre Ragnarok Barber Shop</h2>
            <hr class="decorativo">
            <p>
                Ragnarok Barber Shop es un espacio moderno de la barbería donde entendemos las inquietudes y necesidades del hombre contemporáneo para ofrecerle una imagen actual y el estilo que mejor refleja su personalidad. Además, somos uno de los pocos lugares en que aún hoy ofrece a sus clientes el servicio de barbería, con la técnica tradicional de la navaja y el uso de productos de la más alta calidad.
            </p>
        </div>
    </section>
    <section id="servicios" class="nuestros-servicios">
        <h2 class="titulo-servicios">Nuestros Servicios</h2>
        <div class="servicios-grid">
            @if($servicios->count() > 0)
                @foreach($servicios as $servicio)
                    <div class="servicio-box">
                        <div class="servicio-icono">
                            <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" alt="Icono servicio" width="40">
                        </div>
                        <h3>— <span>{{ $servicio->nombre }}</span></h3>
                        <div class="servicio-descripcion">
                            {{ $servicio->descripcion }}
                        </div>
                        <div class="servicio-footer">
                            <div class="precio-servicio">
                                <strong>${{ number_format($servicio->precio, 0, ',', '.') }}</strong>
                            </div>
                            <div class="categoria-servicio">
                                <span class="badge">{{ $servicio->categoria ?? 'Servicio' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Servicios por defecto si no hay servicios en la BD -->
                <div class="servicio-box">
                    <div class="servicio-icono">
                        <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" alt="Icono servicio" width="40">
                    </div>
                    <h3>— <span>Corte de Cabello Premium</span></h3>
                    <div class="servicio-descripcion">
                        Estilos modernos y clásicos con asesoría personalizada y acabado profesional. 
                        Utilizamos las mejores técnicas y productos de alta calidad para garantizar tu satisfacción.
                    </div>
                    <div class="servicio-footer">
                        <div class="precio-servicio">
                            <strong>$25.000</strong>
                        </div>
                        <div class="categoria-servicio">
                            <span class="badge">Corte</span>
                        </div>
                    </div>
                </div>
                
                <div class="servicio-box">
                    <div class="servicio-icono">
                        <img src="https://cdn-icons-png.flaticon.com/512/3062/3062632.png" alt="Icono servicio" width="40">
                    </div>
                    <h3>— <span>Barba y Afeitado</span></h3>
                    <div class="servicio-descripcion">
                        Diseño, perfilado y afeitado tradicional con toalla caliente. 
                        Técnicas clásicas de barbería para un acabado perfecto.
                    </div>
                    <div class="servicio-footer">
                        <div class="precio-servicio">
                            <strong>$20.000</strong>
                        </div>
                        <div class="categoria-servicio">
                            <span class="badge">Barba</span>
                        </div>
                    </div>
                </div>
                
                <div class="servicio-box">
                    <div class="servicio-icono">
                        <img src="https://cdn-icons-png.flaticon.com/512/3062/3062636.png" alt="Icono servicio" width="40">
                    </div>
                    <h3>— <span>Tratamiento Facial</span></h3>
                    <div class="servicio-descripcion">
                        Limpieza facial profunda con mascarilla hidratante. 
                        Tratamientos para el rostro y piel, limpieza y revitalización completa.
                    </div>
                    <div class="servicio-footer">
                        <div class="precio-servicio">
                            <strong>$35.000</strong>
                        </div>
                        <div class="categoria-servicio">
                            <span class="badge">Facial</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <section class="testimonios">
        <h2 class="titulo-testimonios">Que dicen nuestros clientes:</h2>
        <div class="decoracion-testimonios">
            <hr>
            <span>✂</span>
            <hr>
        </div>
        <div class="contenedor-testimonios">
            <div class="testimonio-box">
                <p>
                    La calidad del servicio en Vikings Barber es insuperable, desde el trato amigable hasta la atención meticulosa de los barberos, siempre me siento como un VIP. Además la limpieza facial es un toque que realmente destaca. 
                    Recomiendo Vikings Barbers a todos los hombres que buscan más que un corte de barba, buscan una experiencia completa de cuidado y estilo.
                </p>
                <div class="testimonio-usuario">
                    <img src="{{ asset('imagenes/andres.jpg') }}" alt="Andrés Gómez">
                    <span class="nombre-testimonio">Andrés Gómez</span>
                </div>
                <div class="estrellas">★★★★★</div>
            </div>
            <div class="testimonio-box">
                <p>
                    Vikings Barbers es simplemente excepcional, cada vez que entro sé que saldré con un corte de barba impecable, que se adapta perfectamente a mi estilo.
                </p>
                <div class="testimonio-usuario">
                    <img src="{{ asset('imagenes/juan.jpg') }}" alt="Juan Carlos">
                    <span class="nombre-testimonio">Juan Carlos</span>
                </div>
                <div class="estrellas">★★★★★</div>
            </div>
            <div class="testimonio-box">
                <p>
                    Nunca pensé que un corte de barba pudiera hacer una gran diferencia, hasta que descubrí Vikings Barber, cada visita es una mezcla perfecta de tradición y modernidad, tiene una vibra única y los barberos realmente entienden como resaltar lo mejor de tu barba.
                </p>
                <div class="testimonio-usuario">
                    <img src="{{ asset('imagenes/daniel.jpg') }}" alt="Daniel Ramírez">
                    <span class="nombre-testimonio">Daniel Ramírez</span>
                </div>
                <div class="estrellas">★★★★★</div>
            </div>
        </div>
    </section>
    <section id="agenda" class="agenda-servicio">
        <div class="agenda-contenido">
            <div class="agenda-info">
                <h2>AGENDA TU<br>SERVICIO</h2>
                <p>Rellena el formulario y contactanos.</p>
                <div class="decoracion-agenda">
                    <hr>
                    <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" alt="icono" width="40">
                    <hr>
                </div>
            </div>
            <form class="agenda-formulario" id="formulario-cita">
                @csrf
                <div class="agenda-inputs">
                    <input type="text" name="nombre" placeholder="Tu nombre" required>
                    <input type="text" name="telefono" placeholder="Num contacto" required>
                </div>
                <input type="email" name="email" placeholder="Email" required>
                <label for="servicio" class="agenda-label">Selecciona el servicio</label>
                <select id="servicio" name="servicio" required>
                    <option value="">Selecciona...</option>
                    @if($servicios->count() > 0)
                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->nombre }}">{{ $servicio->nombre }} - ${{ number_format($servicio->precio, 0, ',', '.') }}</option>
                        @endforeach
                    @else
                        <option value="Corte de cabello">Corte de cabello</option>
                        <option value="Barba y afeitado">Barba y afeitado</option>
                        <option value="Cuidado facial">Cuidado facial</option>
                    @endif
                </select>
                <textarea name="mensaje" placeholder="Mensaje adicional (opcional)" rows="3"></textarea>
                <button type="submit">Enviar Solicitud</button>
            </form>
        </div>
    </section>
    <section id="ubicacion" class="ubicacion">
        <h2 class="titulo-ubicacion"><span>¿Dónde nos puedes ubicar?</span></h2>
        <div class="decoracion-ubicacion">
            <hr>
        </div>
        <div class="mapa-ubicacion">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.682233497227!2d-74.05549782578515!3d4.670353342181274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a2e7e6e8b2f%3A0x6b2f7c7e2b7c7e2b!2sCra.%2015%20%2384-18%2C%20Chapinero%2C%20Bogot%C3%A1%2C%20Cundinamarca!5e0!3m2!1ses!2sco!4v1720612345678!5m2!1ses!2sco" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
    <footer class="footer-vikings">
        <div class="footer-logo">
            <img src="{{ asset('imagenes/jj2.jpg') }}" alt="Vikings Barber Shop" width="220">
            <h2>VIKINGS<br><span>BARBER SHOP</span></h2>
            <div class="footer-stars">★★★★★</div>
        </div>
        <div class="footer-social">
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" width="28"></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" width="28"></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email" width="28"></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube" width="28"></a>
        </div>
        <div class="footer-copy">
            <b>Todos los derechos reservados - Vikingsbarber.com</b>
        </div>
    </footer>
    <script>
    // Ocultar/mostrar header según scroll
    let lastScroll = 0;
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll > lastScroll && currentScroll > 80) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScroll = currentScroll;

        // Sombra al hacer scroll
        if (window.scrollY > 10) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Resaltar el menú activo según la sección visible
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('nav a');
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            if (window.scrollY >= sectionTop) {
                current = section.getAttribute('id');
            }
        });
        navLinks.forEach(link => {
            link.classList.remove('activo');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('activo');
            }
        });
    });

    // Manejo del formulario de cita
    document.getElementById('formulario-cita').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        // Mostrar loading
        submitBtn.textContent = 'Enviando...';
        submitBtn.disabled = true;
        
        fetch('{{ route("solicitud.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mostrar mensaje de éxito
                alert('¡Solicitud enviada correctamente! Te contactaremos pronto.');
                this.reset();
            } else {
                alert('Error al enviar la solicitud. Inténtalo de nuevo.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al enviar la solicitud. Inténtalo de nuevo.');
        })
        .finally(() => {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    });
    </script>
    <script src="{{ asset('estilos/estilo.js') }}"></script>
</body>
</html>