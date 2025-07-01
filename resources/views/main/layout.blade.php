<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman {{ $title }} </title>
    {{-- bs cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    {{-- js cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- cusutom css --}}
    <link rel="stylesheet" href="css/custom.css">
    {{-- font google --}}
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            padding-top: 56px; /* Memberi ruang untuk navbar fixed */
        }

        /* Navbar styling */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030; /* Nilai z-index lebih tinggi dari sidebar */
        }
        
        /* Wrapper untuk sidebar dan content */
        .wrapper {
            display: flex;
            min-height: 100vh;
            padding-top: 56px; /* Sesuaikan dengan tinggi navbar */
        }
        
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            height: calc(100vh - 56px); /* Tinggi viewport dikurangi navbar */
            position: fixed;
            left: 0;
            top: 56px; /* Sesuaikan dengan tinggi navbar */
            background: linear-gradient(180deg, #0b3d0b, #145214);
            color: white;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            z-index: 1020; /* Lebih rendah dari navbar */
            font-family: 'Poppins', sans-serif;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
            margin-bottom: 10px;
        }
        
        .sidebar-menu a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .sidebar-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.1);
            margin-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
        }
        
        .logout-btn:hover {
            background-color: rgba(255,255,255,0.2) !important;
        }
        
        .main-content {
            margin-left: 0; /* Default tanpa sidebar */
            padding: 20px;
            transition: margin-left 0.3s;
            padding-top: 76px; /* Ruang untuk navbar */
        }
        
        @auth
            .main-content {
                margin-left: 250px; /* Geser untuk sidebar */
            }
        @endauth

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                top: 0;
            }
            
            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body @yield('body-attr')>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top" style="background-color:rgb(13, 159, 44);">
        @include('partial.navbar')
    </nav>
    <div class="wrapper">
        @auth
            <!-- Sidebar -->
            @include('partial.sidebar')
        @endauth
        
        <!-- Main Content yang menyesuaikan -->
        <div class="main-content">
            <div class="container mt-3">
                @yield('container')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    
    <script>
        // Toggle sidebar untuk mobile
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            if (sidebar) {
                if (window.innerWidth <= 768) {
                    sidebar.style.display = sidebar.style.display === 'none' ? 'block' : 'none';
                }
            }
        }
        
        // Tambahkan class auth ke body jika user login
        document.addEventListener('DOMContentLoaded', function() {
            @auth
                document.body.classList.add('auth');
            @endauth
        });
    </script>
</body>
</html>
