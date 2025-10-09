<?php
// Example #41: Comments - Using PHP comments for clarity
// Database configuration for LAMP stack (MySQL)
define('DB_HOST', 'db');
define('DB_USER', 'usuari');
define('DB_PASS', 'contrasenya');
define('DB_NAME', 'exemple');

// Set content type and charset
header('Content-Type: text/html; charset=utf-8');

// Start output buffering
ob_start();

// Start session for user authentication
session_start();

try {
    // Create database connection (Example #5: Switching between PHP and HTML)
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to UTF-8
    $conn->set_charset("utf8mb4");

    // Determine which page to display
    $page = isset($_GET['page']) ? $_GET['page'] : 'inici';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Senzill - <?php echo ucfirst($page); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Glassmorphism effect */
        .glass {
            background: rgba(31, 41, 55, 0.2);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        /* Hamburger menu animation */
        .hamburger div {
            transition: all 0.3s ease;
        }
        .hamburger.active .line1 {
            transform: rotate(45deg) translate(6px, 6px);
        }
        .hamburger.active .line2 {
            opacity: 0;
        }
        .hamburger.active .line3 {
            transform: rotate(-45deg) translate(6px, -6px);
        }
        .mobile-menu {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(100%);
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
        /* Content animation */
        .slide-in {
            animation: slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Hover effects for nav links */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: #9ca3af;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        /* Gray and black gradient */
        .gradient-bg {
            background: linear-gradient(135deg, #374151 0%, #111827 100%);
        }
        /* Hero background */
        .hero-bg {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }
        /* Button hover effect */
        .btn {
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        /* Sticky footer */
        html, body {
            height: 100%;
        }
        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1f2937;
        }
        ::-webkit-scrollbar-thumb {
            background: #9ca3af;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-gray-900 text-white font-poppins">
    <div id="app">
        <!-- Header -->
        <header class="gradient-bg glass shadow-lg sticky top-0 z-30">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <a href="index.php?page=inici" class="text-2xl sm:text-3xl font-bold tracking-tight text-white">Sistema Senzill</a>
                <!-- Hamburger Button (Mobile/Tablet) -->
                <button class="hamburger md:hidden focus:outline-none" onclick="toggleMenu()">
                    <div class="line1 w-8 h-1 bg-gray-300 rounded-full mb-1.5"></div>
                    <div class="line2 w-8 h-1 bg-gray-300 rounded-full mb-1.5"></div>
                    <div class="line3 w-8 h-1 bg-gray-300 rounded-full"></div>
                </button>
                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-4 lg:space-x-8">
                    <a href="index.php?page=inici" class="nav-link text-gray-300 font-semibold text-base lg:text-lg hover:text-white">Inici</a>
                    <a href="index.php?page=about" class="nav-link text-gray-300 font-semibold text-base lg:text-lg hover:text-white">Sobre Nosaltres</a>
                    <a href="index.php?page=services" class="nav-link text-gray-300 font-semibold text-base lg:text-lg hover:text-white">Serveis</a>
                    <a href="index.php?page=contact" class="nav-link text-gray-300 font-semibold text-base lg:text-lg hover:text-white">Contacte</a>
                    <?php
                    // Example #5: Switching between PHP and HTML for dynamic navigation
                    if (isset($_SESSION['user_id'])) {
                        echo '<a href="index.php?page=profile" class="nav-link text-gray-300 font-semibold text-base lg:text-lg hover:text-white">Perfil</a>';
                        echo '<a href="index.php?page=logout" class="nav-link text-gray-300 font-semibold text-base lg:text-lg hover:text-white">Tancar Sessió</a>';
                    } else {
                        echo '<a href="index.php?page=login" class="nav-link text-gray-300 font-semibold text-base lg:text-lg hover:text-white">Iniciar Sessió</a>';
                    }
                    ?>
                </nav>
            </div>
        </header>

        <!-- Mobile Menu (Slides from Right) -->
        <div class="mobile-menu fixed top-0 right-0 w-3/4 sm:w-2/3 max-w-sm h-full glass z-40">
            <div class="p-6 sm:p-8">
                <div class="flex justify-between items-center mb-8 sm:mb-10">
                    <h2 class="text-xl sm:text-2xl font-bold text-white">Menú</h2>
                    <button class="text-gray-300 focus:outline-none" onclick="toggleMenu()">
                        <svg class="w-6 sm:w-8 h-6 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav class="flex flex-col space-y-4 sm:space-y-6">
                    <a href="index.php?page=inici" class="nav-link text-gray-300 font-semibold text-lg sm:text-xl hover:text-white">Inici</a>
                    <a href="index.php?page=about" class="nav-link text-gray-300 font-semibold text-lg sm:text-xl hover:text-white">Sobre Nosaltres</a>
                    <a href="index.php?page=services" class="nav-link text-gray-300 font-semibold text-lg sm:text-xl hover:text-white">Serveis</a>
                    <a href="index.php?page=contact" class="nav-link text-gray-300 font-semibold text-lg sm:text-xl hover:text-white">Contacte</a>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<a href="index.php?page=profile" class="nav-link text-gray-300 font-semibold text-lg sm:text-xl hover:text-white">Perfil</a>';
                        echo '<a href="index.php?page=logout" class="nav-link text-gray-300 font-semibold text-lg sm:text-xl hover:text-white">Tancar Sessió</a>';
                    } else {
                        echo '<a href="index.php?page=login" class="nav-link text-gray-300 font-semibold text-lg sm:text-xl hover:text-white">Iniciar Sessió</a>';
                    }
                    ?>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 lg:py-12">
            <?php
            // Example #35: PHP opening and closing tags
            switch ($page) {
                case 'inici':
                    ?>
                    <!-- Inici Page -->
                    <section class="hero-bg glass rounded-2xl shadow-2xl p-6 sm:p-8 lg:p-10 mb-6 sm:mb-8 slide-in">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Benvingut a Sistema Senzill</h1>
                        <p class="text-base sm:text-lg lg:text-xl text-gray-300 mb-6">Potencia les teves aplicacions amb la robustesa del LAMP stack: Linux, Apache, MySQL i PHP. Gestiona dades de manera eficient i amb un disseny modern.</p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="index.php?page=services" class="btn inline-block bg-gray-700 text-white font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-gray-600 text-base sm:text-lg">Explora Serveis</a>
                            <?php if (!isset($_SESSION['user_id'])): ?>
                                <a href="index.php?page=login" class="btn inline-block bg-gray-600 text-white font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-gray-500 text-base sm:text-lg">Iniciar Sessió</a>
                            <?php endif; ?>
                        </div>
                    </section>
                    <section class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 mb-6 sm:mb-8">
                        <div class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in">
                            <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Estat del LAMP Stack</h2>
                            <!-- Example #2: Retrieving system information -->
                            <div class="bg-green-500/10 border-l-4 border-green-400 text-green-100 p-4 rounded-lg">
                                <p class="text-base sm:text-lg">Connexió a MySQL ('<?php echo htmlspecialchars(DB_NAME); ?>') establerta amb èxit!</p>
                                <p class="text-base sm:text-lg mt-2">PHP Versió: <?php echo phpversion(); ?></p>
                                <p class="text-base sm:text-lg">Servidor Apache: <?php echo isset($_SERVER['SERVER_SOFTWARE']) ? htmlspecialchars($_SERVER['SERVER_SOFTWARE']) : 'No disponible'; ?></p>
                                <p class="text-base sm:text-lg">MySQL Versió: <?php echo $conn->server_info; ?></p>
                            </div>
                        </div>
                        <div class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in">
                            <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Gestió de Dades</h2>
                            <!-- Example #6 and #7: Simple HTML form and displaying form data -->
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sample_data'])) {
                                $sample_data = $conn->real_escape_string($_POST['sample_data']);
                                $sql = "INSERT INTO sample_table (data) VALUES ('$sample_data')";
                                if ($conn->query($sql) === TRUE) {
                                    echo '<div class="bg-green-500/10 border-l-4 border-green-400 text-green-100 p-4 rounded-lg mb-4">';
                                    echo '<p class="text-base sm:text-lg">Dada afegida amb èxit!</p>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="bg-red-500/10 border-l-4 border-red-400 text-red-100 p-4 rounded-lg mb-4">';
                                    echo '<p class="text-base sm:text-lg">Error: ' . htmlspecialchars($conn->error) . '</p>';
                                    echo '</div>';
                                }
                            }
                            ?>
                            <form method="POST" class="space-y-4">
                                <input type="text" name="sample_data" placeholder="Introdueix una dada" class="w-full p-3 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 text-base sm:text-lg" required>
                                <button type="submit" class="btn bg-gray-700 text-white font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-gray-600 text-base sm:text-lg">Afegir Dada</button>
                            </form>
                        </div>
                    </section>
                    <section class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Dades Emmagatzemades</h2>
                        <?php
                        $sql = "SELECT data FROM sample_table LIMIT 5";
                        if ($result = $conn->query($sql)) {
                            if ($result->num_rows > 0) {
                                echo '<div class="overflow-x-auto">';
                                echo '<table class="w-full border border-gray-700/50 rounded-lg">';
                                echo '<thead class="bg-gray-800/50"><tr><th class="p-3 sm:p-4 text-left text-white text-base sm:text-lg">Dada</th></tr></thead>';
                                echo '<tbody class="bg-transparent">';
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr><td class="p-3 sm:p-4 text-gray-100 text-base sm:text-lg">' . htmlspecialchars($row['data']) . '</td></tr>';
                                }
                                echo '</tbody></table>';
                                echo '</div>';
                            } else {
                                echo '<div class="bg-gray-800/50 p-4 rounded-lg">';
                                echo '<p class="text-base sm:text-lg text-gray-300">No hi ha dades disponibles.</p>';
                                echo '</div>';
                            }
                            $result->free();
                        } else {
                            echo '<div class="bg-red-500/10 border-l-4 border-red-400 text-red-100 p-4 rounded-lg">';
                            echo '<p class="text-base sm:text-lg">Error: ' . htmlspecialchars($conn->error) . '</p>';
                            echo '</div>';
                        }
                        ?>
                    </section>
                    <!-- Example #73 and #80: Simple array and accessing array elements -->
                    <section class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in mt-6 sm:mt-8">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Exemple d'Array Simple</h2>
                        <?php
                        // Example #73: A simple array
                        $lamp_components = ['Linux', 'Apache', 'MySQL', 'PHP'];
                        // Example #80: Accessing array elements
                        echo '<div class="bg-gray-800/50 p-4 rounded-lg">';
                        echo '<p class="text-base sm:text-lg text-gray-300">Components del LAMP Stack:</p>';
                        echo '<ul class="list-disc list-inside text-base sm:text-lg text-gray-100">';
                        foreach ($lamp_components as $component) {
                            echo '<li>' . htmlspecialchars($component) . '</li>';
                        }
                        echo '</ul>';
                        echo '<p class="text-base sm:text-lg text-gray-300 mt-2">Primer component: ' . htmlspecialchars($lamp_components[0]) . '</p>';
                        echo '</div>';
                        ?>
                    </section>
                    <!-- Example #29: phpinfo (restricted for security) -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <section class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in mt-6 sm:mt-8">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Informació del Sistema (phpinfo)</h2>
                        <div class="bg-gray-800/50 p-4 rounded-lg">
                            <p class="text-base sm:text-lg text-gray-300">Accés restringit: Informació detallada del sistema PHP.</p>
                            <?php
                            // Output limited phpinfo for security
                            phpinfo(INFO_GENERAL | INFO_ENVIRONMENT);
                            ?>
                        </div>
                    </section>
                    <?php endif; ?>
                    <?php
                    break;

                case 'about':
                    ?>
                    <!-- Sobre Nosaltres Page -->
                    <section class="hero-bg glass rounded-2xl shadow-2xl p-6 sm:p-8 lg:p-10 mb-6 sm:mb-8 slide-in">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Sobre Nosaltres</h1>
                        <p class="text-base sm:text-lg lg:text-xl text-gray-300 mb-6">Som un equip dedicat a desenvolupar solucions modernes utilitzant el LAMP stack. La nostra missió és oferir eines robustes i fàcils d’utilitzar per gestionar dades amb eficiència.</p>
                        <a href="index.php?page=contact" class="btn inline-block bg-gray-700 text-white font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-gray-600 text-base sm:text-lg">Contacta’ns</a>
                    </section>
                    <section class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">El Nostre LAMP Stack</h2>
                        <!-- Example #2: System information -->
                        <div class="bg-green-500/10 border-l-4 border-green-400 text-green-100 p-4 rounded-lg">
                            <p class="text-base sm:text-lg">Connexió a MySQL ('<?php echo htmlspecialchars(DB_NAME); ?>') establerta amb èxit!</p>
                            <p class="text-base sm:text-lg mt-2">PHP Versió: <?php echo phpversion(); ?></p>
                        </div>
                    </section>
                    <?php
                    break;

                case 'services':
                    ?>
                    <!-- Serveis Page -->
                    <section class="hero-bg glass rounded-2xl shadow-2xl p-6 sm:p-8 lg:p-10 mb-6 sm:mb-8 slide-in">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Els Nostres Serveis</h1>
                        <p class="text-base sm:text-lg lg:text-xl text-gray-300 mb-6">Oferim serveis de desenvolupament web, gestió de bases de dades i suport tècnic basats en el LAMP stack per garantir solucions escalables i segures.</p>
                        <a href="index.php?page=contact" class="btn inline-block bg-gray-700 text-white font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-gray-600 text-base sm:text-lg">Demana Més Informació</a>
                    </section>
                    <section class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Estat del Servidor</h2>
                        <!-- Example #2: System information -->
                        <div class="bg-green-500/10 border-l-4 border-green-400 text-green-100 p-4 rounded-lg">
                            <p class="text-base sm:text-lg">Connexió a MySQL ('<?php echo htmlspecialchars(DB_NAME); ?>') establerta amb èxit!</p>
                            <p class="text-base sm:text-lg mt-2">Servidor Apache: <?php echo isset($_SERVER['SERVER_SOFTWARE']) ? htmlspecialchars($_SERVER['SERVER_SOFTWARE']) : 'No disponible'; ?></p>
                        </div>
                    </section>
                    <?php
                    break;

                case 'contact':
                    ?>
                    <!-- Contacte Page -->
                    <section class="hero-bg glass rounded-2xl shadow-2xl p-6 sm:p-8 lg:p-10 mb-6 sm:mb-8 slide-in">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Contacte</h1>
                        <p class="text-base sm:text-lg lg:text-xl text-gray-300 mb-6">Posa’t en contacte amb nosaltres per qualsevol consulta o suport relacionat amb el nostre sistema LAMP.</p>
                    </section>
                    <section class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Envia’ns un Missatge</h2>
                        <!-- Example #6 and #7: Simple HTML form and displaying form data -->
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_name']) && isset($_POST['contact_message'])) {
                            $name = $conn->real_escape_string($_POST['contact_name']);
                            $message = $conn->real_escape_string($_POST['contact_message']);
                            $sql = "INSERT INTO contact_messages (name, message) VALUES ('$name', '$message')";
                            if ($conn->query($sql) === TRUE) {
                                echo '<div class="bg-green-500/10 border-l-4 border-green-400 text-green-100 p-4 rounded-lg mb-4">';
                                echo '<p class="text-base sm:text-lg">Missatge enviat amb èxit!</p>';
                                echo '</div>';
                            } else {
                                echo '<div class="bg-red-500/10 border-l-4 border-red-400 text-red-100 p-4 rounded-lg mb-4">';
                                echo '<p class="text-base sm:text-lg">Error: ' . htmlspecialchars($conn->error) . '</p>';
                                echo '</div>';
                            }
                        }
                        ?>
                        <form method="POST" class="space-y-4">
                            <input type="text" name="contact_name" placeholder="El teu nom" class="w-full p-3 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 text-base sm:text-lg" required>
                            <textarea name="contact_message" placeholder="El teu missatge" class="w-full p-3 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 text-base sm:text-lg" rows="4" required></textarea>
                            <button type="submit" class="btn bg-gray-700 text-white font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-gray-600 text-base sm:text-lg">Enviar Missatge</button>
                        </form>
                    </section>
                    <?php
                    break;

                case 'login':
                    ?>
                    <!-- Iniciar Sessió Page -->
                    <section class="hero-bg glass rounded-2xl shadow-2xl p-6 sm:p-8 lg:p-10 mb-6 sm:mb-8 slide-in">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Iniciar Sessió</h1>
                        <p class="text-base sm:text-lg lg:text-xl text-gray-300 mb-6">Accedeix al teu compte per gestionar les teves dades en el nostre sistema LAMP.</p>
                    </section>
                    <section class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Accés al Sistema</h2>
                        <!-- Example #6 and #7: Simple HTML form and displaying form data -->
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
                            // Placeholder login logic (replace with secure authentication)
                            $username = $conn->real_escape_string($_POST['username']);
                            $password = $conn->real_escape_string($_POST['password']);
                            $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                $_SESSION['user_id'] = $result->fetch_assoc()['id'];
                                echo '<div class="bg-green-500/10 border-l-4 border-green-400 text-green-100 p-4 rounded-lg mb-4">';
                                echo '<p class="text-base sm:text-lg">Inici de sessió amb èxit!</p>';
                                echo '</div>';
                            } else {
                                echo '<div class="bg-red-500/10 border-l-4 border-red-400 text-red-100 p-4 rounded-lg mb-4">';
                                echo '<p class="text-base sm:text-lg">Error: Usuari o contrasenya incorrectes.</p>';
                                echo '</div>';
                            }
                        }
                        ?>
                        <form method="POST" class="space-y-4">
                            <input type="text" name="username" placeholder="Nom d’usuari" class="w-full p-3 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 text-base sm:text-lg" required>
                            <input type="password" name="password" placeholder="Contrasenya" class="w-full p-3 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 text-base sm:text-lg" required>
                            <button type="submit" class="btn bg-gray-700 text-white font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-gray-600 text-base sm:text-lg">Iniciar Sessió</button>
                        </form>
                    </section>
                    <?php
                    break;

                case 'profile':
                    if (!isset($_SESSION['user_id'])) {
                        header("Location: index.php?page=login");
                        exit;
                    }
                    ?>
                    <!-- Perfil Page -->
                    <section class="hero-bg glass rounded-2xl shadow-2xl p-6 sm:p-8 lg:p-10 mb-6 sm:mb-8 slide-in">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">El Teu Perfil</h1>
                        <p class="text-base sm:text-lg lg:text-xl text-gray-300 mb-6">Gestiona les teves dades i configuracions en el nostre sistema LAMP.</p>
                    </section>
                    <section class="glass rounded-2xl shadow-2xl p-6 sm:p-8 slide-in">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4">Informació del Perfil</h2>
                        <!-- Example #2: System information -->
                        <div class="bg-green-500/10 border-l-4 border-green-400 text-green-100 p-4 rounded-lg">
                            <p class="text-base sm:text-lg">Connexió a MySQL ('<?php echo htmlspecialchars(DB_NAME); ?>') establerta amb èxit!</p>
                            <p class="text-base sm:text-lg mt-2">Usuari ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
                        </div>
                    </section>
                    <?php
                    break;

                case 'logout':
                    session_destroy();
                    header("Location: index.php?page=inici");
                    exit;
                    break;

                default:
                    header("Location: index.php?page=inici");
                    exit;
            }
            ?>
        </main>

        <!-- Footer -->
        <footer class="gradient-bg glass text-white text-center p-4 sm:p-6">
            <p class="text-base sm:text-lg">&copy; <?php echo date('Y'); ?> Sistema Senzill. Tots els drets reservats.</p>
        </footer>
    </div>

    <script>
        function toggleMenu() {
            const menu = document.querySelector('.mobile-menu');
            const hamburger = document.querySelector('.hamburger');
            menu.classList.toggle('active');
            hamburger.classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');
        }
    </script>
</body>
</html>
<?php
} catch (Exception $e) {
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - Sistema Senzill</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .glass {
            background: rgba(31, 41, 55, 0.2);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #374151 0%, #111827 100%);
        }
    </style>
</head>
<body class="bg-gray-900 text-white font-poppins">
    <div class="container mx-auto p-4 sm:p-6">
        <div class="glass rounded-2xl shadow-2xl p-6 sm:p-8">
            <h2 class="text-2xl sm:text-3xl font-bold text-red-400 mb-4 sm:mb-6">Error</h2>
            <div class="bg-red-500/10 border-l-4 border-red-400 text-red-100 p-4 rounded-lg">
                <p class="text-base sm:text-lg"><?php echo htmlspecialchars($e->getMessage()); ?></p>
            </div>
        </div>
    </div>
</body>
</html>
<?php
} finally {
    // Clean up
    if (isset($conn) && $conn) {
        $conn->close();
    }
    ob_end_flush();
}
?>
