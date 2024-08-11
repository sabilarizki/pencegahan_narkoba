<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencegahan Narkoba</title>
    <link rel="stylesheet" href="styles.css"> <!-- Panggil file CSS -->
    <script>
        let currentIndex = 0;
        const images = ["1.jpg", "2.jpg", "3.jpg", "4.jpg"]; // ganti dengan path gambar Anda

        function showNextImage() {
            const carousel = document.querySelector('.carousel');
            carousel.children[currentIndex].style.display = 'none';
            currentIndex = (currentIndex + 1) % images.length;
            carousel.children[currentIndex].style.display = 'block';
        }

        function startCarousel() {
            setInterval(showNextImage, 3000);
        }

        function handleSubmit(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            
            fetch('koneksi.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('attendance-result').innerText = data;
                document.querySelector('.form-container').classList.remove('active');
                document.querySelector('.attendance-result').classList.add('active');

                setTimeout(() => {
                    document.querySelector('.attendance-result').classList.remove('active');
                    document.querySelector('.form-container').classList.add('active');
                }, 20000); // kembali ke form setelah 20 detik
            })
            .catch(error => console.error('Error:', error));
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('.carousel-container').classList.add('active');
            startCarousel();
        });
    </script>
</head>
<body>
    <div class="carousel-container carousel">
        <img src="1.jpg" alt="Image 1"> <!-- Ganti dengan path gambar Anda -->
        <img src="2.jpg" alt="Image 2"> <!-- Ganti dengan path gambar Anda -->
        <img src="3.jpg" alt="Image 3"> <!-- Ganti dengan path gambar Anda -->
        <img src="4.jpg" alt="Image 4"> <!-- Ganti dengan path gambar Anda -->
    </div>
    
    <div class="attendance-result" id="attendance-result">
        <!-- Hasil absensi akan ditampilkan di sini -->
    </div>
</body>
</html>
