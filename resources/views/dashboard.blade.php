<x-app-layout>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Manajemen Proyek</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            color: var(--dark);
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .logo i {
            margin-right: 10px;
        }
        
        .date-card {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            text-align: center;
            min-width: 180px;
        }
        
        .date-day {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .date-month {
            font-size: 1rem;
            text-transform: uppercase;
            color: var(--dark);
            margin-top: -5px;
        }
        
        .date-year {
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        /* Welcome Card */
        .welcome-card {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            border-left: 5px solid var(--primary);
        }
        
        .welcome-title {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
        }
        
        .welcome-text {
            line-height: 1.8;
            color: #495057;
            font-size: 1.1rem;
        }
        
        .welcome-text ul {
            padding-left: 1.5rem;
        }
        
        .welcome-text li {
            margin-bottom: 0.8rem;
        }
        
        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 1.8rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 3px solid var(--accent);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 2.2rem;
            color: var(--accent);
            margin-bottom: 1.2rem;
        }
        
        .feature-title {
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
            color: var(--dark);
        }
        
        .feature-desc {
            color: #6c757d;
            font-size: 1rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <i class="fas fa-project-diagram"></i> MANPRO<span>JENDRAL</span>
            </div>
            <div class="date-card" id="realtime-date">
                <!-- Date will be inserted by JavaScript -->
            </div>
        </div>
        
        <!-- Welcome Card -->
        <div class="welcome-card">
            <h2 class="welcome-title">Sistem Manajemen Proyek</h2>
            <div class="welcome-text">
                <p>Sistem Manajemen Proyek (Project Management System) adalah platform terintegrasi yang dirancang untuk membantu Anda mengelola seluruh siklus hidup proyek secara efisien dan efektif.</p>
                
                <p>Dengan sistem ini, Anda dapat:</p>
                <ul>
                    <li>Merencanakan dan menjadwalkan proyek dengan timeline visual</li>
                    <li>Mengalokasikan sumber daya dan mengelola tim proyek</li>
                    <li>Memantau kemajuan dan penggunaan anggaran secara real-time</li>
                    <li>Membuat invoice otomatis berdasarkan termin pembayaran</li>
                    <li>Berkolaborasi dengan seluruh stakeholder proyek</li>
                </ul>
                
                <p>Sistem memberikan dashboard analitik untuk pengambilan keputusan berbasis data dan membantu mengidentifikasi risiko proyek lebih dini.</p>
            </div>
        </div>
        
        <!-- Features Section -->
        <h2 style="color: var(--primary); margin-top: 1rem; font-size: 1.5rem;">Fitur Utama Sistem</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3 class="feature-title">Pelacakan Proyek</h3>
                <p class="feature-desc">Visualisasi Gantt Chart untuk memantau timeline dan milestone proyek dengan indikator pencapaian yang jelas.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <h3 class="feature-title">Manajemen Anggaran</h3>
                <p class="feature-desc">Tracking pengeluaran vs anggaran dengan notifikasi otomatis saat mendekati batas anggaran.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <h3 class="feature-title">Invoice Otomatis</h3>
                <p class="feature-desc">Generate invoice profesional berdasarkan termin pembayaran dengan template yang bisa disesuaikan.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h3 class="feature-title">Analisis & Laporan</h3>
                <p class="feature-desc">Dashboard analitik dengan berbagai metrik KPI proyek dan ekspor laporan dalam berbagai format.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="feature-title">Kolaborasi Tim</h3>
                <p class="feature-desc">Diskusi terpusat, berbagi dokumen, dan notifikasi real-time untuk semua anggota tim.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="feature-title">Akses Mobile</h3>
                <p class="feature-desc">Akses sistem dari perangkat mobile dengan antarmuka yang dioptimalkan untuk smartphone.</p>
            </div>
        </div>
    </div>

    <script>
        // Realtime Date Update
        function updateDate() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                day: 'numeric', 
                month: 'long', 
                year: 'numeric' 
            };
            const dateStr = now.toLocaleDateString('id-ID', options).replace(',', '');
            const [hari, tanggal, bulan, tahun] = dateStr.split(' ');
            
            document.getElementById('realtime-date').innerHTML = `
                <div class="date-day">${tanggal}</div>
                <div class="date-month">${bulan}</div>
                <div class="date-year">${hari}, ${tahun}</div>
            `;
        }
        
        // Update immediately
        updateDate();
        
        // Update every day at midnight to change date
        const now = new Date();
        const midnight = new Date(
            now.getFullYear(),
            now.getMonth(),
            now.getDate() + 1,
            0, 0, 0
        );
        const timeToMidnight = midnight - now;
        
        setTimeout(function() {
            updateDate();
            // Update every 24 hours after that
            setInterval(updateDate, 86400000);
        }, timeToMidnight);
        
        // Tab navigation
        document.querySelectorAll('.nav-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
</x-app-layout>
