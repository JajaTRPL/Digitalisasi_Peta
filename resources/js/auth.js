function togglePassword(inputId, eyeId, slashId) {
    // Cari elemen input password, ikon mata terbuka, dan ikon mata tertutup
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(eyeId);
    const eyeSlash = document.getElementById(slashId);

    // Debugging: Log ID dan elemen yang ditemukan
    console.log("Memanggil togglePassword dengan:");
    console.log("Input ID:", inputId, "Elemen:", passwordInput);
    console.log("Eye Icon ID:", eyeId, "Elemen:", eyeIcon);
    console.log("Eye Slash ID:", slashId, "Elemen:", eyeSlash);

    // Jika elemen tidak ditemukan, tampilkan pesan error dan hentikan fungsi
    if (!passwordInput || !eyeIcon || !eyeSlash) {
        console.error("Error: Salah satu elemen tidak ditemukan!");
        return;
    }

    // Toggle visibility password
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'; // Tampilkan password
        eyeSlash.style.display = "block"; // Tampilkan ikon mata tertutup
        eyeIcon.style.display = "none"; // Sembunyikan ikon mata terbuka
    } else {
        passwordInput.type = 'password'; // Sembunyikan password
        eyeSlash.style.display = "none"; // Sembunyikan ikon mata tertutup
        eyeIcon.style.display = "block"; // Tampilkan ikon mata terbuka
    }
}