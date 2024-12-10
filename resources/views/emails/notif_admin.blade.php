<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Laporan Ditangani</title>
</head>
<body>
    <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
        <header>
            <a href="#">
                <img class="w-auto h-7 sm:h-8" src="img/pens.png" alt="">
            </a>
        </header>
    
        <main class="mt-8">
            <h2 class="mt-6 text-gray-700 dark:text-gray-200">Halo {{ $reporterName }}!</h2>
        
            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                Kami telah menerima laporanmu atas masalah '{!! $reportTopic !!}' <br><br>
                
                Untuk itu, Kami ingin memberitahukan bahwa laporan yang Anda kirimkan berhasil kami tangani. <br>
                Jika Anda membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi kami kembali. <br><br>
                
                Terima kasih atas kepercayaan anda!!.<br>
            </p>
        </main>
    
        <footer class="mt-8">
            <p class="mt-3 text-gray-500 dark:text-gray-400">© {{ date('Y') }} Politeknik Elektronika Negeri Surabaya. All Rights Reserved.</p>
        </footer>
    </section>
</body>
</html>