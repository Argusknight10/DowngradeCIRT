<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Laporan Masuk</title>
</head>
<body>
    <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
        <header>
            <a href="#">
                <img class="w-auto h-7 sm:h-8" src="img/pens.png" alt="">
            </a>
        </header>
    
        <main class="mt-8">
            <h2 class="mt-6 text-gray-700 dark:text-gray-200">Halo admin!</h2>
        
            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                Kami mendapat laporan baru terkait {!! $reportTopic !!} dengan data pelapor sebagai berikut: <br> <br>
                
                Nama Pelapor: {{ $reporterName }}. <br>
                Email Pelapor: {{ $reporterEmail }}. <br>
            </p>
        
            {{-- <a href="http://cirt-laravel11.test/dashboard/reports" style="display: inline-block; padding: 12px 24px; margin-top: 16px; font-size: 14px; font-weight: 500; text-align: center; text-decoration: none; color: white; background-color: #3B82F6; border-radius: 8px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#2563EB'" onmouseout="this.style.backgroundColor='#3B82F6'">
                Terima Laporan
            </a> --}}
            <a href="http://ent_cirt.test/dashboard/reports" style="display: inline-block; padding: 12px 24px; margin-top: 16px; font-size: 14px; font-weight: 500; text-align: center; text-decoration: none; color: white; background-color: #3B82F6; border-radius: 8px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#2563EB'" onmouseout="this.style.backgroundColor='#3B82F6'">
                Terima Laporan
            </a>
            
        </main>
    
        <footer class="mt-8">
            <p class="mt-3 text-gray-500 dark:text-gray-400">© {{ date('Y') }} Politeknik Elektronika Negeri Surabaya. All Rights Reserved.</p>
        </footer>
    </section>
</body>
</html>