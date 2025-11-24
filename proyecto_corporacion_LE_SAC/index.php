<!DOCTYPE php>
<php lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.jpeg" type="image/jpeg">
    <meta name="description" content="Corporación L&E SAC - Agua Mineral de alta calidad. Nuestras marcas: Agua Fresh, San Gregorio, Agua Crush.">
    <meta name="keywords" content="Agua Mineral, Agua Fresh, San Gregorio, Agua tratada, Agua Manantial, Agua Natural">
    <title>Corporación L&E SAC - Agua Mineral</title>
    <link rel="stylesheet" href="styles/main.css">
    
</head>
<body>
<?php session_start(); ?>
<video autoplay muted loop playsinline id="page-background-video">
    <source src="https://cdn.pixabay.com/video/2025/02/17/258993_tiny.mp4" type="video/mp4">
    Tu navegador no soporta videos en HTML5.
</video>
<header class="hero-header">

    <div class="hero-content">
        <img src="assets/logo.jpeg" alt="Logo Corporación L&E SAC" class="main-logo">
        <h1>CORPORACION L&E SAC</h1>
        <p>¡No tomes cualquier agua, toma la mejor!
            El agua que tu cuerpo pide, Agua Fresh.
        Disfruta de la pureza que viene de la naturaleza.</p>
        <div class="social-links">
            <a href="https://www.facebook.com/" target="_blank" title="Facebook">
                <img src="assets/facebook.png" alt="Facebook" class="social-icon">
            </a>
            <a href="https://www.instagram.com/" target="_blank" title="Instagram">
                <img src="assets/instagram.png" alt="Instagram" class="social-icon">
            </a>
            <a href="https://www.tiktok.com/" target="_blank" title="tiktok">
                <img src="assets/tiktok.png" alt="tiktok" class="social-icon">
            </a>
        </div>
    </div>
</header>
<nav id="main-nav">
    <div class="nav-container">
        <ul id="nav-links">
            <li><a href="#marcas">Marcas</a></li>
            <li><a href="#nosotros">Nosotros</a></li>
            <li><a href="#mision-vision">Misión/Visión</a></li>
            <li><a href="#equipo">Equipo</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
        <div class="nav-actions">
            <div id="cart-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px" height="24px">
                    <path d="M17.21 9l-4.38-6.59c-.19-.28-.51-.41-.83-.41s-.64.13-.83.41L6.79 9H2c-.55 0-1 .45-1 1s.45 1 1 1h1l3.6 7.59c.38.8.97 1.49 1.75 1.95.78.46 1.66.71 2.55.71h4c.89 0 1.77-.25 2.55-.71.78-.46 1.37-1.15 1.75-1.95L21 11h1c.55 0 1-.45 1-1s-.45-1-1-1h-4.79zM9.5 19c-.83 0-1.5-.67-1.5-1.5S8.67 16 9.5 16s1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm5 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM7.17 9L12 3.98 16.83 9H7.17z"/>
                </svg>
                <span id="cart-count">0</span>
            </div>
            <div class="auth-buttons">
                <?php if (isset($_SESSION['cliente_id'])): ?>
                    <a href="dashboard.php" class="btn-dashboard">📊 Mi Panel</a>
                <?php else: ?>
                    <a href="login.php" class="btn-login-nav">Iniciar Sesión</a>
                    <a href="registro.php" class="btn-registro-nav">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<main>
    <section id="marcas">
        <h2>Nuestras Marcas</h2>
        <div class="brand-list">
            <div class="brand">
                <img src="assets/agua-fresh.jpeg" alt="Agua Fresh" class="brand-img">
                <h3>Agua Fresh</h3>
                <p>Refrescante y pura, ideal para tu día a día.</p>
            </div>
            <div class="brand">
                <img src="assets/san-gregorio.jpeg" alt="San Gregorio" class="brand-img">
                <h3>San Gregorio</h3>
                <p>Agua mineral natural, cuidando tu salud.</p>
            </div>
            <div class="brand">
                <img src="assets/agua-crush.jpeg" alt="Agua Crush" class="brand-img">
                <h3>Agua Crush</h3>
                <p>La energía y frescura que necesitas.</p>
            </div>
        </div>
    </section>
    <section id="nosotros">
        <h2>Sobre Nosotros</h2>
        <div class="about-container">
            <div class="about-image">
                <img src="assets/plantaaguamineral.jpeg" alt="Planta de Agua Mineral" class="about-img">
            </div>
            <div class="about-text">
                Corporación L&E SAC es una empresa peruana ubicada en el departamento de Cajamarca, provincia de San Miguel, distrito de San Gregorio, centro poblado Casa Blanca, dedicada a la producción y distribución de agua mineral de alta calidad. Nuestro compromiso es brindar productos saludables y refrescantes para todos nuestros clientes, garantizando procesos responsables y sostenibles.
            </div>
        </div>
    </section>
    <section id="valores">
        <h2>Valores</h2>
        <ul class="valores-list">
            <li style="--i:1;">Calidad</li>
            <li style="--i:2;">Integridad</li>
            <li style="--i:3;">Responsabilidad</li>
            <li style="--i:4;">Respeto Ambiental</li>
            <li style="--i:5;">Compromiso Social</li>
        </ul>
    </section>
    <section id="contacto">
        <h2>Contacto</h2>
        <form class="contact-form" method="POST" action="guardar_contacto.php">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>

    <label>Correo electrónico:</label>
    <input type="email" name="correo" required>

    <label>Mensaje:</label>
    <textarea name="mensaje" required></textarea>

    <button type="submit">Enviar</button>
</form>
        <div class="contact-info">
            <p><strong>Correo:</strong> aguavipfreshperu@hotmail.com</p>
            <p><strong>Teléfono:</strong> +51 953473660</p>
            <p>
                <a href="https://wa.me/51953473660" target="_blank" style="display: inline-flex; align-items: center; text-decoration: none; color: inherit;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width:24px; height:24px; margin-right: 8px;"> WhatsApp
                </a>
                |
                <a href="mailto:aguavipfreshperu@hotmail.com">Enviar correo</a>
            </p>
        </div>
    </section>
    <section id="ubicacion">
        <h2>Ubicación</h2>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps?q=San+Gregorio,+San+Miguel,+Cajamarca,+Peru&output=embed"
                width="100%" height="250" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
    <section id="testimonios">
        <h2>Testimonios</h2>
        <div class="testimonios-list">
            <div class="testimonio">
                <img src="assets/clientes_satisfechoss.jpg" alt="Cliente Satisfecho" class="testimonio-img">
                <p>"El agua Fresh es la mejor opción para mi familia, siempre pura y deliciosa."</p>
                <span>- Cliente Satisfecho</span>
            </div>
            <div class="testimonio">
                <img src="assets/clientes_satisfechos.png" alt="Cliente Corporativo" class="testimonio-img">
                <p>"San Gregorio me da confianza por su origen natural y compromiso ambiental."</p>
                <span>- Cliente Corporativo</span>
            </div>
        </div>
    </section>
    <section id="video-publicidad">
        <h2>Proceso de Envasado</h2>
        <p>Conoce cómo garantizamos la calidad y pureza de nuestro agua mineral a través de nuestro proceso de envasado.</p>
        <div class="video-container" style="text-align:center;">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/iHL7TB1mUC8"
                title="Proceso de Envasado de Agua Mineral" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </section>
    <section id="agua-fresh-info">
        <h2>Agua Fresh</h2>

        <p>
            Agua Fresh es una empresa dedicada a la distribución de agua mineral en bidones de 20 litros. Actualmente opera en la región de Cajamarca, Perú, con planes de expandirse a nivel nacional. Su sede se encuentra en San Gregorio, Cajamarca.
        </p>
        <div id="mision-vision" class="mision-vision-separado">
            <div class="mision animated-card">
                <h3>Misión</h3>
                <p>
                    Refrescar la vida de hogares, tiendas y empresas en la región de Cajamarca y, próximamente, en todo el Perú. Esto se logra ofreciendo agua mineral de alta calidad y pureza, distribuida de manera eficiente y sostenible para garantizar el acceso a una hidratación saludable.
                </p>
            </div>
            <div class="vision animated-card">
                <h3>Visión</h3>
                <p>
                    Ser el distribuidor líder y de mayor confianza de agua mineral en bidones de 20 litros en la región de Cajamarca, con una expansión progresiva a nivel nacional. La empresa busca ser reconocida por su excelencia operativa, calidad, responsabilidad ambiental y contribución al desarrollo de sus comunidades.
                </p>
            </div>
        </div>
    </section>
    <section id="equipo">
        <h2>Nuestro Equipo</h2>
        <div class="organigrama-horizontal">
            <div class="org-card">
                <img src="https://i.pravatar.cc/150?u=gerente" alt="Saulo Liza Espinoza" class="org-img">
                <div>
                    <strong>Gerente General</strong>
                    <p>Saulo Liza Espinoza</p>
                </div>
            </div>
            <div class="org-connector"></div>
            <div class="org-card">
                <img src="https://i.pravatar.cc/150?u=finanzas" alt="Alberto Santa Cruz Reyes" class="org-img">
                <div>
                    <strong>Adm. y Finanzas</strong>
                    <p>Alberto Santa Cruz Reyes</p>
                </div>
            </div>
            <div class="org-card">
                <img src="https://i.pravatar.cc/150?u=operaciones" alt="Carlos Ríos" class="org-img">
                <div>
                    <strong>Operaciones</strong>
                    <p>Carlos Ríos</p>
                </div>
            </div>
            <div class="org-card">
                <img src="https://i.pravatar.cc/150?u=marketing" alt="Sofía Mendoza" class="org-img">
                <div>
                    <strong>Ventas y Marketing</strong>
                    <p>Sofía Mendoza</p>
                </div>
            </div>
        </div>
    </section>
    <section id="tabla-productos">
        <h2>Presentación y Precios de Agua Mineral</h2>
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Presentación</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Agua Fresh</td>
                    <td>Bidón 20 litros</td>
                    <td>S/ 10.00</td>
                    <td><button class="product-buy-btn">Comprar</button></td>
                </tr>
                <tr>
                    <td>Agua Fresh</td>
                    <td>Botella 7 litros</td>
                    <td>S/ 7.00</td>
                    <td><button class="product-buy-btn">Comprar</button></td>
                </tr>
                <tr>
                    <td>San Gregorio</td>
                    <td>Bidón 20 litros</td>
                    <td>S/ 10.00</td>
                    <td><button class="product-buy-btn">Comprar</button></td>
                </tr>
                <tr>
                    <td>San Gregorio</td>
                    <td>Botella 7 litros</td>
                    <td>S/ 7.00</td>
                    <td><button class="product-buy-btn">Comprar</button></td>
                </tr>
                <tr>
                    <td>Agua Crush</td>
                    <td>Bidón 20 litros</td>
                    <td>S/ 10.00</td>
                    <td><button class="product-buy-btn">Comprar</button></td>
                </tr>
                <tr>
                    <td>Agua Crush</td>
                    <td>Botella 7 litros</td>
                    <td>S/ 7.00</td>
                    <td><button class="product-buy-btn">Comprar</button></td>
                </tr>
            </tbody>
        </table>
    </section>
</main>
<footer>
    <p>&copy; 2025 Corporación L&E SAC. Todos los derechos reservados.</p>
</footer>
<div id="cart-container" class="hidden">
    <div id="cart-header">
        <h3>🛒 Carrito de Compras</h3>
        <button id="close-btn" class="close-btn" type="button">✕</button>
    </div>
    <div id="cart-items" class="cart-items-container">
        <!-- Cart items will be added here by JavaScript -->
    </div>
    <div id="cart-footer">
        <div class="cart-summary">
            <div class="summary-item">
                <span>Subtotal:</span>
                <span id="cart-subtotal">S/ 0.00</span>
            </div>
            <div class="summary-item">
                <span>IGV (18%):</span>
                <span id="cart-igv">S/ 0.00</span>
            </div>
            <div class="summary-total">
                <span>Total:</span>
                <span id="cart-total">S/ 0.00</span>
            </div>
        </div>
        <button id="checkout-btn" class="checkout-btn-main" type="button">Ir a Pagar</button>
    </div>
</div>

<!-- Modal de Pago con Yape y Plin -->
<div id="payment-modal" class="payment-modal hidden">
    <div class="payment-modal-content">
        <button id="close-payment" class="close-payment-btn" type="button">✕</button>
        <h2>🔒 Selecciona tu Método de Pago</h2>
        
        <div id="payment-options" class="payment-methods">
            <!-- Método Yape -->
            <div class="payment-method yape-method" id="yape-option">
                <div class="payment-method-icon">
                    <svg width="60" height="60" viewBox="0 0 100 100">
                        <rect fill="#FF6B35" width="100" height="100" rx="15"/>
                        <text x="50" y="60" font-size="40" font-weight="bold" text-anchor="middle" fill="white">Y</text>
                    </svg>
                </div>
                <h3>Yape</h3>
                <p>Pago rápido y seguro</p>
                <span class="payment-badge">Recomendado</span>
            </div>
            
            <!-- Método Plin -->
            <div class="payment-method plin-method" id="plin-option">
                <div class="payment-method-icon">
                    <svg width="60" height="60" viewBox="0 0 100 100">
                        <rect fill="#00A8E8" width="100" height="100" rx="15"/>
                        <text x="50" y="60" font-size="40" font-weight="bold" text-anchor="middle" fill="white">P</text>
                    </svg>
                </div>
                <h3>Plin</h3>
                <p>Transferencia instantánea</p>
                <span class="payment-badge">Disponible</span>
            </div>
        </div>
        
        <div id="payment-details" class="payment-details hidden">
            <h3 id="payment-method-title"></h3>
            <div class="payment-info">
                <p>Total a pagar:</p>
                <h2 id="payment-amount">S/ 0.00</h2>
            </div>
            
            <div id="yape-details" class="payment-detail-section hidden">
                <h4>Datos para transferencia Yape:</h4>
                <div class="payment-code">
                    <p><strong>Número Yape:</strong> +51 987654321</p>
                    <button class="copy-btn" onclick="copyToClipboard('+51 987654321')">Copiar</button>
                </div>
                <p class="payment-instruction">1. Abre tu app de Yape</p>
                <p class="payment-instruction">2. Selecciona "Enviar dinero"</p>
                <p class="payment-instruction">3. Ingresa el número de teléfono</p>
                <p class="payment-instruction">4. Ingresa el monto exacto</p>
            </div>
            
            <div id="plin-details" class="payment-detail-section hidden">
                <h4>Datos para transferencia Plin:</h4>
                <div class="payment-code">
                    <p><strong>Número Plin:</strong> +51 987654321</p>
                    <button class="copy-btn" onclick="copyToClipboard('+51 987654321')">Copiar</button>
                </div>
                <p class="payment-instruction">1. Abre tu banco o app Plin</p>
                <p class="payment-instruction">2. Selecciona "Transferir dinero"</p>
                <p class="payment-instruction">3. Ingresa el número de teléfono</p>
                <p class="payment-instruction">4. Verifica y confirma el monto</p>
            </div>
            
            <div class="payment-reference">
                <label for="transaction-ref">Referencia de la transferencia:</label>
                <input type="text" id="transaction-ref" placeholder="Ej: 123456789" maxlength="20">
            </div>
            
            <button id="confirm-payment-btn" class="confirm-payment-btn" type="button">Confirmar Compra</button>
            <button id="back-payment-btn" class="back-payment-btn" type="button">Atrás</button>
        </div>
    </div>
</div>
<script>
// Observador de intersección para animaciones al scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'slideInUp 0.8s ease-out forwards';
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observar todas las secciones
document.querySelectorAll('section').forEach(section => {
    observer.observe(section);
});

// Efecto de parallax suave al scrollear
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.hero-header');
    if (hero) {
        hero.style.backgroundPosition = `0% ${scrolled * 0.5}%`;
    }
});

// Agregar clase al hacer scroll
window.addEventListener('scroll', () => {
    const nav = document.getElementById('main-nav');
    if (window.scrollY > 100) {
        nav.style.boxShadow = '0 8px 30px rgba(102, 126, 234, 0.4)';
    } else {
        nav.style.boxShadow = '0 8px 25px rgba(102, 126, 234, 0.3)';
    }
});

// Animación de contador de valores
const animateCounter = (element, target, duration = 2000) => {
    let current = 0;
    const increment = target / (duration / 16);
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.ceil(current);
        }
    }, 16);
};

// Agregar más burbujas dinámicamente
const createBubbles = () => {
    const headerContainer = document.querySelector('.hero-header');
    for (let i = 0; i < 5; i++) {
        const bubble = document.createElement('div');
        bubble.className = 'bubble';
        bubble.style.left = Math.random() * 100 + '%';
        bubble.style.width = (Math.random() * 30 + 20) + 'px';
        bubble.style.height = bubble.style.width;
        headerContainer.appendChild(bubble);
    }
};

// Llamar la función cuando el DOM está listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', createBubbles);
} else {
    createBubbles();
}
</script>
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('#nav-links a');
        const navHeight = document.getElementById('main-nav').offsetHeight;

        function changeLinkState() {
            let index = sections.length;

            while(--index && window.scrollY + navHeight < sections[index].offsetTop) {}
            
            navLinks.forEach((link) => link.classList.remove('active'));
            
            // Asegurarse de que el enlace exista antes de añadir la clase
            const activeLink = document.querySelector(`#nav-links a[href="#${sections[index].id}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }

        // Ejecutar al cargar y al hacer scroll
        changeLinkState();
        window.addEventListener('scroll', changeLinkState);
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const cartIcon = document.getElementById('cart-icon');
    const cartContainer = document.getElementById('cart-container');
    const closeCartBtn = document.getElementById('close-btn');
    const buyButtons = document.querySelectorAll('.product-buy-btn');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartCount = document.getElementById('cart-count');
    const cartTotal = document.getElementById('cart-total');
    const cartSubtotal = document.getElementById('cart-subtotal');
    const cartIgv = document.getElementById('cart-igv');
    const checkoutBtn = document.getElementById('checkout-btn');
    
    // Payment Modal Elements
    const paymentModal = document.getElementById('payment-modal');
    const closePaymentBtn = document.getElementById('close-payment');
    const paymentAmount = document.getElementById('payment-amount');
    const yapeOption = document.getElementById('yape-option');
    const plinOption = document.getElementById('plin-option');
    const paymentDetails = document.getElementById('payment-details');
    const yapeDetails = document.getElementById('yape-details');
    const plinDetails = document.getElementById('plin-details');
    const paymentMethodTitle = document.getElementById('payment-method-title');
    const confirmPaymentBtn = document.getElementById('confirm-payment-btn');
    const backPaymentBtn = document.getElementById('back-payment-btn');
    const transactionRef = document.getElementById('transaction-ref');

    let cart = [];
    let selectedPaymentMethod = null;

    // Show/hide cart
    cartIcon.addEventListener('click', () => {
        cartContainer.classList.remove('hidden');
        cartContainer.classList.toggle('visible');
    });

    closeCartBtn.addEventListener('click', () => {
        cartContainer.classList.remove('visible');
        cartContainer.classList.add('hidden');
    });

    // Add to cart
    buyButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const productRow = e.target.closest('tr');
            const brand = productRow.querySelector('td:nth-child(1)').innerText;
            const presentation = productRow.querySelector('td:nth-child(2)').innerText;
            const priceText = productRow.querySelector('td:nth-child(3)').innerText;
            const price = parseFloat(priceText.replace('S/ ', ''));

            const product = {
                brand,
                presentation,
                price,
                quantity: 1
            };

            addToCart(product);
            
            // Mostrar notificación
            showNotification('✓ Producto añadido al carrito');
        });
    });

    function addToCart(product) {
        const existingProductIndex = cart.findIndex(item => 
            item.brand === product.brand && item.presentation === product.presentation
        );

        if (existingProductIndex > -1) {
            cart[existingProductIndex].quantity++;
        } else {
            cart.push(product);
        }

        updateCart();
    }

    function updateCart() {
        cartItemsContainer.innerHTML = '';
        let subtotal = 0;
        let count = 0;

        cart.forEach((item, index) => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('cart-item');
            const itemTotal = item.price * item.quantity;
            itemElement.innerHTML = `
                <div class="cart-item-details">
                    <h4>${item.brand}</h4>
                    <p>${item.presentation}</p>
                    <p style="color: #667eea; font-weight: 600; margin-top: 0.5rem;">
                        S/ ${item.price.toFixed(2)} x ${item.quantity} = S/ ${itemTotal.toFixed(2)}
                    </p>
                </div>
                <button class="cart-item-remove" data-index="${index}">✕</button>
            `;
            cartItemsContainer.appendChild(itemElement);
            subtotal += itemTotal;
            count += item.quantity;
        });

        const igv = subtotal * 0.18;
        const total = subtotal + igv;

        cartSubtotal.innerText = `S/ ${subtotal.toFixed(2)}`;
        cartIgv.innerText = `S/ ${igv.toFixed(2)}`;
        cartTotal.innerText = `S/ ${total.toFixed(2)}`;
        cartCount.innerText = count;

        // Add event listeners to remove buttons
        document.querySelectorAll('.cart-item-remove').forEach(button => {
            button.addEventListener('click', (e) => {
                const index = e.target.dataset.index;
                removeFromCart(index);
                showNotification('Producto removido del carrito');
            });
        });
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        updateCart();
    }

    // Checkout
    checkoutBtn.addEventListener('click', () => {
        if (cart.length === 0) {
            showNotification('El carrito está vacío', 'error');
            return;
        }
        
        const subtotal = parseFloat(cartSubtotal.innerText.replace('S/ ', ''));
        const total = parseFloat(cartTotal.innerText.replace('S/ ', ''));
        
        paymentAmount.innerText = `S/ ${total.toFixed(2)}`;
        paymentModal.classList.remove('hidden');
        paymentModal.classList.add('visible');
        cartContainer.classList.remove('visible');
        cartContainer.classList.add('hidden');
    });

    // Payment Method Selection
    yapeOption.addEventListener('click', () => {
        selectedPaymentMethod = 'yape';
        showPaymentDetails('yape');
    });

    plinOption.addEventListener('click', () => {
        selectedPaymentMethod = 'plin';
        showPaymentDetails('plin');
    });

    function showPaymentDetails(method) {
        document.getElementById('payment-options').classList.add('hidden');
        paymentDetails.classList.remove('hidden');
        yapeDetails.classList.add('hidden');
        plinDetails.classList.add('hidden');
        
        if (method === 'yape') {
            yapeDetails.classList.remove('hidden');
            paymentMethodTitle.innerText = 'Yape - Pago Rápido y Seguro';
        } else if (method === 'plin') {
            plinDetails.classList.remove('hidden');
            paymentMethodTitle.innerText = 'Plin - Transferencia Instantánea';
        }
    }

    // Close Payment Modal
    closePaymentBtn.addEventListener('click', () => {
        paymentModal.classList.remove('visible');
        paymentModal.classList.add('hidden');
        paymentDetails.classList.add('hidden');
        selectedPaymentMethod = null;
        transactionRef.value = '';
    });

    backPaymentBtn.addEventListener('click', () => {
        document.getElementById('payment-options').classList.remove('hidden');
        paymentDetails.classList.add('hidden');
        yapeDetails.classList.add('hidden');
        plinDetails.classList.add('hidden');
        selectedPaymentMethod = null;
        transactionRef.value = '';
    });

    // Confirm Payment
    confirmPaymentBtn.addEventListener('click', () => {
        if (!transactionRef.value.trim()) {
            showNotification('Por favor ingresa la referencia de la transferencia', 'error');
            return;
        }
        
        const total = parseFloat(cartTotal.innerText.replace('S/ ', ''));
        const message = `Compra completada!\\nMétodo: ${selectedPaymentMethod.toUpperCase()}\\nMonto: S/ ${total.toFixed(2)}\\nReferencia: ${transactionRef.value}`;
        
        showNotification('✓ Compra confirmada. Gracias por tu compra!');
        
        // Reset
        setTimeout(() => {
            paymentModal.classList.remove('visible');
            cart = [];
            updateCart();
            transactionRef.value = '';
            selectedPaymentMethod = null;
            paymentDetails.classList.add('hidden');
        }, 2000);
    });

    // Notification
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 80px;
            right: 20px;
            background: ${type === 'error' ? '#f5576c' : '#667eea'};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            animation: slideInRight 0.3s ease-out;
            z-index: 5000;
        `;
        notification.innerText = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideInLeft 0.3s ease-in';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }
});

// Función para copiar al portapapeles
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        const event = new CustomEvent('clipboardCopied');
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 80px;
            right: 20px;
            background: #43a047;
            color: white;
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 5000;
        `;
        notification.innerText = '✓ Copiado al portapapeles';
        document.body.appendChild(notification);
        
        setTimeout(() => notification.remove(), 1500);
    });
}
</script>
<script src="styles/scripts/main.js"></script>
</body>
</html>
<style>
body {
    background-color: #e8e6ff; /* Color de respaldo si el video no carga */
    min-height: 100vh;
    margin: 0;
    font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif;
    overflow-x: hidden;
    position: relative;
}

/* --- Estilos para el video de fondo de toda la página --- */
#page-background-video {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    object-fit: cover; /* Asegura que el video cubra todo el espacio */
    filter: brightness(0.6) blur(3px); /* Oscurece y desenfoca más el video */
}

/* --- Estilos para las secciones sobre el video de fondo --- */
main > section {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 25px;
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.2);
    padding: 2.5rem;
    margin: 2rem auto;
    max-width: 1100px;
    transition: all 0.3s ease;
    border: 1px solid rgba(240, 147, 251, 0.2);
}



.org-card {
    background-color: #ffffff; /* Aseguramos que las tarjetas internas sean blancas */
}

/* --- Estilos para el fondo de video del encabezado --- */
.hero-header {
    position: relative;
    height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
    color: white;
    background: linear-gradient(135deg, #00d4ff 0%, #0099ff 25%, #0066ff 50%, #00d4ff 75%, #00ccff 100%);
    background-size: 400% 400%;
    animation: water-wave 15s ease infinite;
}

@keyframes water-wave {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.hero-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(0, 150, 255, 0.2) 0%, transparent 50%),
        radial-gradient(circle at 40% 0%, rgba(0, 200, 255, 0.15) 0%, transparent 60%);
    animation: wave-motion 20s ease-in-out infinite;
    z-index: 1;
}

.hero-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 120px;
    background: linear-gradient(to bottom, rgba(0, 212, 255, 0.3), rgba(0, 212, 255, 0.1), transparent);
    animation: wave-bottom 5s ease-in-out infinite;
    z-index: 1;
}

@keyframes wave-bottom {
    0%, 100% { transform: translateY(0) scaleX(1); }
    50% { transform: translateY(-15px) scaleX(1.05); }
}

@keyframes wave-motion {
    0%, 100% {
        transform: translateY(0) translateX(0);
    }
    25% {
        transform: translateY(-10px) translateX(10px);
    }
    50% {
        transform: translateY(0) translateX(20px);
    }
    75% {
        transform: translateY(-5px) translateX(10px);
    }
}

.hero-content {
    position: relative;
    z-index: 2; /* Asegura que el contenido esté sobre el video */
    padding: 2rem;
}

.hero-header h1 {
    text-shadow: 3px 3px 10px rgba(0,0,0,0.4);
    font-size: 4rem;
    background: linear-gradient(90deg, #ffffff 0%, #e0f7ff 50%, #ffffff 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: shimmer 8s ease-in-out infinite;
    background-size: 200% 200%;
    position: relative;
    z-index: 2;
}

@keyframes shimmer {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes water-flow {
  from {
    background-position: 0% 50%;
  }
  to {
    background-position: 200% 50%;
  }
}

.hero-header p {
    text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
    font-size: 1.5rem;
}

.main-logo {
    width: 250px;
    height: auto;
    margin-bottom: 1.5rem;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    padding: 10px;
    box-shadow: 0 0 40px rgba(0, 212, 255, 0.6), inset 0 0 20px rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease;
    animation: float-up 3s ease-in-out infinite;
}

@keyframes float-up {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

.main-logo:hover { 
    transform: scale(1.12) rotateZ(10deg);
    box-shadow: 0 0 50px rgba(0, 212, 255, 0.8), inset 0 0 30px rgba(255, 255, 255, 0.3);
    animation: none;
}

/* Estilos de la barra de navegación */
#main-nav {
    position: fixed; /* Barra de menú fija en la parte superior */
    top: 20px; /* Espacio desde la parte superior */
    left: 50%;
    transform: translateX(-50%); /* Truco para centrar perfectamente */
    width: auto; /* Ancho automático según el contenido */
    z-index: 100;
    background: rgba(102, 126, 234, 0.9); /* Azul vibrante semitransparente */
    backdrop-filter: blur(10px); /* Efecto de desenfoque para el fondo */
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    transition: all 0.3s ease;
    border-radius: 50px; /* Bordes redondeados para un look de "píldora" */
    padding: 0.6rem 1.2rem; /* Ajustamos el padding para el nuevo diseño */
}

.nav-container {
    display: flex;
    justify-content: center; /* Centra los enlaces del menú */
    align-items: center;
    max-width: 1200px;
    margin: 0;
    padding: 0 2rem;
}

#nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 2rem;
}

#nav-links a {
    text-decoration: none;
    color: white; /* Color inicial del texto */
    font-weight: 700;
    font-size: 1.1rem;
    padding: 0.8rem 0.5rem;
    margin: 0 1rem; /* Añadimos margen para separar los enlaces */
    position: relative;
    transition: color 0.3s ease;
}

/* Nueva animación de subrayado */
#nav-links a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #ffd700, #f093fb);
    bottom: -5px;
    left: 50%;
    transform: translateX(-50%);
    transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
}

#nav-links a:hover {
    color: #ffd700; /* Un amarillo dorado para el hover */
}

#nav-links a:hover::after,
#nav-links a.active::after {
    width: 100%;
}

/* --- Nuevos estilos para la sección de Valores --- */
#valores {
    /* background: transparent; */ /* Se elimina para aplicar el color de la paleta */
    border: none;
    box-shadow: none;
}

.valores-list li {
    list-style: none;
    opacity: 0;
    animation: appear 0.5s cubic-bezier(0.25, 0.8, 0.25, 1) forwards;
    animation-delay: calc(var(--i) * 0.1s);
    background: linear-gradient(135deg, #0052D4, #0077FF); /* Gradiente azul vibrante */
    color: white;
    padding: 1.5rem;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1.2rem;
    box-shadow: 0 10px 25px rgba(0, 82, 212, 0.2);
    text-align: center;
    min-width: 200px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.valores-list li:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 15px 30px rgba(0, 82, 212, 0.3);
}

@keyframes appear {
    to {
        opacity: 1;
    }
}

.valores-list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 2rem;
    padding: 0;
    margin-top: 2rem;
}
/* --- Fin de nuevos estilos para Valores --- */


#contact-form {
    animation: slideInUp 0.8s ease-out;
}

.contact-form label {
    color: #333;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
}

/* Efecto hover en enlaces */
.contact-info a {
    position: relative;
    display: inline-block;
}

.contact-info a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #667eea, #f093fb);
    bottom: -5px;
    left: 0;
    transition: width 0.3s ease;
}

.contact-info a:hover::after {
    width: 100%;
}

/* Animación para las tarjetas de organigrama */
.org-card strong {
    animation: bounce 2s ease-in-out infinite;
}

/* Efecto de ondulación en el header */
.hero-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100px;
    background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.1));
    animation: wave 4s ease-in-out infinite;
}

@keyframes wave {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Efecto de sombra flotante */
.brand {
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.25), 
                0 0 20px rgba(102, 126, 234, 0.1);
}

.testimonio {
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.25), 
                0 0 20px rgba(102, 126, 234, 0.1);
}

/* Transición suave para todos los links */
a {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

/* Efecto de entrada para textos */
.about-text {
    animation: slideInRight 0.8s ease-out;
    line-height: 1.8;
    font-size: 1.05rem;
}

section h3 {
    color: #333;
    font-weight: 700;
    margin-top: 1.5rem;
    margin-bottom: 0.7rem;
}

/* Animaciones para la tabla */
.tabla-productos {
    overflow: hidden;
}

.tabla-productos th {
    animation: slideInDown 0.6s ease-out;
}

@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Efecto de card flotante */
@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

.org-card {
    animation: float 3s ease-in-out infinite;
}

.org-card:nth-child(1) { animation-delay: 0s; }
.org-card:nth-child(2) { animation-delay: 0.3s; }
.org-card:nth-child(3) { animation-delay: 0.6s; }
.org-card:nth-child(4) { animation-delay: 0.9s; }

/* Efecto brillo en inputs */
.contact-form input, .contact-form textarea {
    background: linear-gradient(135deg, #f8f9ff, #ffffff);
}

.contact-form input:focus, .contact-form textarea:focus {
    background: linear-gradient(135deg, #ffffff, #f0f4ff);
    box-shadow: 0 0 20px rgba(102, 126, 234, 0.3), inset 0 0 10px rgba(102, 126, 234, 0.1);
}

/* Animación suave para scroll */
html {
    scroll-behavior: smooth;
}

/* Efecto para video container */
.video-container iframe {
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(102, 126, 234, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.video-container:hover iframe {
    transform: scale(1.02);
    box-shadow: 0 15px 50px rgba(102, 126, 234, 0.3);
}

/* Texto con efecto gradiente animado */
section h2 {
    background-size: 200% 100%;
    animation: gradient-shift 6s ease infinite;
}

@keyframes gradient-shift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

/* Eliminamos estilos del menú lateral anterior */
.drop, #menu-toggle, nav.open, #main-nav.scrolled {
    display: none;
}

.brand-img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    border-radius: 16px;
    margin-bottom: 12px;
}

.about-img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 16px;
}

.testimonio-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 10px;
}

.org-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 1rem;
    border: 3px solid #0077FF; /* Borde azul vibrante */
}

.animated-card {
    transition: transform 0.3s;
}

.animated-card:hover {
    transform: translateY(-5px);
}

.organigrama-horizontal {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-top: 16px;
}

.org-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.15);
    padding: 1.5rem 1.2rem;
    margin: 8px;
    text-align: center;
    flex: 1 1 200px;
    position: relative;
    transition: all 0.3s ease;
    border: 1px solid rgba(240, 147, 251, 0.2);
}

.org-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
}

.org-card p {
    color: #555;
}

.map-container {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 82, 212, 0.1);
    margin-top: 1rem;
}

/* --- Estilos para la sección de Agua Fresh --- */
#agua-fresh-info {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    animation: water-flow 10s infinite linear;
    background-size: 200% 200%;
    color: white;
    position: relative;
    overflow: hidden;
}

#agua-fresh-info h2, #agua-fresh-info p, #agua-fresh-info h3 {
    position: relative;
    z-index: 2;
    text-shadow: 1px 1px 6px rgba(0,0,0,0.7);
    color: white;
}

/* --- Estilos para las nuevas tarjetas de productos --- */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.product-card {
    background: #ffffff;
box-shadow: 0 10px 30px rgba(0, 82, 212, 0.15);
    text-align: center;
    padding: 1.5rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    position: relative;
}

.product-card:hover {
box-shadow: 0 12px 40px rgba(0, 82, 212, 0.25);
}

.product-card-img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 1rem;
}

.product-brand {
    font-size: 1.4rem;
    font-weight: 700;
    color: #333;
    margin: 0.5rem 0;
}

.product-presentation {
    font-size: 1rem;
    color: #666;
    margin-bottom: 1rem;
}

.product-price {
    font-size: 1.8rem;
    font-weight: 800;
    color: #0052D4; /* Azul vibrante */
    margin-bottom: 1.5rem;
}

.product-buy-btn {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 0.9rem 2.2rem;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 6px 20px rgba(240, 147, 251, 0.4);
}

.product-buy-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(240, 147, 251, 0.6);
}

/* --- Estilo de texto con fondo animado para los títulos --- */
@keyframes animated-gradient-text {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

main section > h2 {
    font-size: 2.5rem; /* Aumentamos un poco el tamaño para que el efecto luzca más */
    font-weight: 800;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea);
    background-size: 300% 100%;
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: animated-gradient-text 12s ease-in-out infinite;
}

/* --- Estilos para los íconos de redes sociales animados --- */
.social-links {
    margin-top: 2rem;
    display: flex;
    gap: 1.5rem;
    justify-content: center;
}

.social-icon {
    width: 40px; /* Aumentamos el tamaño */
    height: 40px;
    transition: transform 0.3s ease;
    animation: pulse 3s infinite ease-in-out;
}

.social-icon:hover {
    transform: scale(1.2); /* Efecto al pasar el mouse */
    animation-play-state: paused; /* Pausamos la animación de pulso en hover */
}

.social-links {
    margin-top: 2rem;
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.social-icon {
    width: 40px;
    height: 40px;
    transition: transform 0.3s ease;
    animation: pulse-water 3s infinite ease-in-out;
    filter: drop-shadow(0 0 8px rgba(0, 212, 255, 0.6));
}

.social-icon:hover {
    transform: scale(1.25);
    animation-play-state: paused;
    filter: drop-shadow(0 0 15px rgba(0, 212, 255, 1));
}

.social-links a:nth-child(2) .social-icon {
    animation-delay: 0.5s;
}
.social-links a:nth-child(3) .social-icon {
    animation-delay: 1s;
}

@keyframes pulse-water {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.contact-form input,
.contact-form textarea {
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    background: #f8f9fa;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
    outline: none;
}

#tabla-productos table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 2rem;
}

#tabla-productos th, #tabla-productos td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

#tabla-productos th {
    background-color: #f2f2f2;
    font-weight: bold;
}

#tabla-productos tr:nth-child(even) {
    background-color: #f9f9f9;
}

#tabla-productos tr:hover {
    background-color: #f1f1f1;
}

@media (max-width: 768px) {
    .hero-header h1 {
        font-size: 2.5rem;
    }

    .hero-header p {
        font-size: 1.2rem;
    }

    .main-logo {
        width: 150px;
    }

    #nav-links {
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    #nav-links a {
        font-size: 1rem;
        margin: 0 0.5rem;
    }

    .brand-list, .testimonios-list, .organigrama-horizontal {
        flex-direction: column;
        align-items: center;
    }

    #tabla-productos {
        overflow-x: auto;
    }
}

#cart-container {
    position: fixed;
    top: 0;
    right: 0;
    width: 500px;
    max-width: 90%;
    height: 100%;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
    box-shadow: -8px 0 25px rgba(0,0,0,0.15);
    z-index: 1000;
    transform: translateX(100%);
    transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: flex;
    flex-direction: column;
    border-radius: 20px 0 0 20px;
    border-left: 2px solid rgba(102, 126, 234, 0.2);
}

#cart-container.visible {
    transform: translateX(0);
    animation: slideCartIn 0.4s ease-out;
}

@keyframes slideCartIn {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}

#cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 20px 0 0 0;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
}

#cart-header h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 700;
}

.close-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0.3rem 0.7rem;
    border-radius: 50%;
    transition: all 0.3s;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.close-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
}

.cart-items-container {
    flex: 1;
    overflow-y: auto;
    padding: 1rem;
}

.cart-item {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 0.5rem;
    background: white;
    padding: 1.2rem;
    border-radius: 12px;
    margin-bottom: 0.8rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border-left: 4px solid #667eea;
    animation: slideInLeft 0.3s ease-out;
    transition: all 0.3s;
}

.cart-item:hover {
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.15);
    transform: translateX(5px);
}

.cart-item-details {
    flex-grow: 1;
    min-width: 0;
}

.cart-item-details h4 {
    margin: 0 0 0.5rem 0;
    color: #333;
    font-size: 1.05rem;
    word-break: break-word;
}

.cart-item-details p {
    margin: 0.2rem 0;
    color: #666;
    font-size: 0.9rem;
    word-break: break-word;
}
    margin: 0;
    color: #666;
    font-size: 0.9rem;
}

.cart-item-remove {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    border: none;
    color: white;
    cursor: pointer;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    font-weight: bold;
    transition: all 0.3s;
}

.cart-item-remove:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(240, 147, 251, 0.4);
}

#cart-footer {
    padding: 1.5rem;
    background: rgba(240, 247, 255, 0.8);
    border-radius: 0 0 0 20px;
    border-top: 2px solid rgba(102, 126, 234, 0.1);
}

.cart-summary {
    margin-bottom: 1.2rem;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.6rem;
    color: #666;
    font-size: 0.95rem;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    margin-top: 0.8rem;
    padding-top: 0.8rem;
    border-top: 2px solid rgba(102, 126, 234, 0.2);
    font-weight: 700;
    font-size: 1.1rem;
    color: #333;
}

.checkout-btn-main {
    width: 100%;
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    border: none;
    padding: 1rem;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
}

.checkout-btn-main:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
}

.payment-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    pointer-events: none;
}

.payment-modal.hidden {
    display: none !important;
}

.payment-modal.visible {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

.payment-modal-content {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
    border-radius: 25px;
    padding: 2.5rem;
    max-width: 600px;
    width: 90%;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: modalSlideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    position: relative;
    pointer-events: auto;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: scale(0.9) translateY(30px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.close-payment-btn {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    background: rgba(102, 126, 234, 0.1);
    border: none;
    color: #667eea;
    font-size: 1.8rem;
    cursor: pointer;
    padding: 0.3rem 0.7rem;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
}

.close-payment-btn:hover {
    background: rgba(102, 126, 234, 0.2);
    transform: rotate(90deg);
}

.payment-modal-content h2 {
    margin: 0 0 2rem 0;
    color: #333;
    font-size: 1.8rem;
    text-align: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.payment-methods {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.payment-method {
    background: white;
    border: 2px solid rgba(102, 126, 234, 0.2);
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
    position: relative;
    overflow: hidden;
}

.payment-method::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0), rgba(102, 126, 234, 0.1));
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 1;
}

.payment-method:hover {
    border-color: #667eea;
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(102, 126, 234, 0.2);
}

.payment-method-icon {
    margin-bottom: 1rem;
    animation: bounceIn 0.6s ease-out;
}

.payment-method h3 {
    margin: 0 0 0.5rem 0;
    font-size: 1.3rem;
    color: #333;
}

.payment-method p {
    margin: 0.5rem 0 1rem 0;
    color: #666;
    font-size: 0.9rem;
}

.payment-badge {
    display: inline-block;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

@keyframes bounceIn {
    from { transform: scale(0) rotate(-180deg); }
    to { transform: scale(1) rotate(0); }
}

.payment-details {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    animation: slideInUp 0.4s ease-out;
}

.payment-details h3 {
    color: #333;
    margin: 0 0 1rem 0;
    font-size: 1.2rem;
}

.payment-info {
    text-align: center;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: rgba(102, 126, 234, 0.05);
    border-radius: 10px;
}

.payment-info h2 {
    margin: 0;
    color: #f5576c;
    font-size: 2rem;
}

.payment-detail-section {
    margin-bottom: 1.5rem;
}

.payment-detail-section h4 {
    color: #667eea;
    margin-bottom: 1rem;
}

.payment-code {
    background: #f8f9ff;
    border-left: 4px solid #667eea;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.payment-code p {
    margin: 0;
    color: #333;
}

.copy-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s;
    white-space: nowrap;
}

.copy-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.payment-instruction {
    margin: 0.5rem 0;
    color: #555;
    font-size: 0.95rem;
    padding-left: 1rem;
    border-left: 3px solid #ffd700;
}

.payment-reference {
    margin-bottom: 1.5rem;
}

.payment-reference label {
    display: block;
    margin-bottom: 0.5rem;
    color: #333;
    font-weight: 600;
}

.payment-reference input {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid rgba(102, 126, 234, 0.2);
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s;
}

.payment-reference input:focus {
    border-color: #667eea;
    outline: none;
    box-shadow: 0 0 15px rgba(102, 126, 234, 0.2);
}

.confirm-payment-btn, .back-payment-btn {
    width: 100%;
    padding: 1rem;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    margin-bottom: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.confirm-payment-btn {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
}

.confirm-payment-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
}

.back-payment-btn {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
    border: 2px solid #667eea;
}

.back-payment-btn:hover {
    background: #667eea;
    color: white;
}

@media (max-width: 768px) {
    #cart-container {
        width: 100%;
        border-radius: 20px 20px 0 0;
    }
    
    .payment-modal-content {
        border-radius: 20px;
        padding: 1.5rem;
        width: 95%;
    }
    
    .payment-methods {
        grid-template-columns: 1fr;
    }
}

#cart-container.visible {
    transform: translateX(0);
}
    overflow-y: auto;
    height: calc(100% - 150px);
}

.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.cart-item-details {
    flex-grow: 1;
    margin-left: 1rem;
}

.cart-item-details h4 {
    margin: 0;
}

.cart-item img {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

.cart-item-remove {
    background: none;
    border: none;
    color: red;
    cursor: pointer;
}

#cart-footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 1rem;
    border-top: 1px solid #ddd;
}

footer {
    text-align: center;
    padding: 2rem;
    margin-top: 2rem;
    background-color: rgba(240, 245, 249, 0.9);
    color: #333;
}
</style>