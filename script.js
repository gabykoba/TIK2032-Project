// Log saat website dimuat
window.addEventListener("load", () => {
    console.log("Website Gaby sudah dimuat 🚀");
  });
  
  // Validasi form kontak
  const form = document.querySelector("form");
  if (form) {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
  
      const nama = document.getElementById("nama").value.trim();
      const email = document.getElementById("email").value.trim();
      const pesan = document.getElementById("pesan").value.trim();
  
      if (!nama || !email || !pesan) {
        alert("Semua field harus diisi ya 😅");
        return;
      }
  
      console.log("Form dikirim ✅");
      console.log(`Nama: ${nama}`);
      console.log(`Email: ${email}`);
      console.log(`Pesan: ${pesan}`);
  
      alert("Terima kasih sudah menghubungi! 🥰");
      form.reset();
    });
  }
  
  // Fade-in saat scroll
  const faders = document.querySelectorAll(".fade-in");
  
  const appearOptions = {
    threshold: 0.2,
    rootMargin: "0px 0px -50px 0px"
  };
  
  const appearOnScroll = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
  
      entry.target.classList.add("appear");
      observer.unobserve(entry.target);
    });
  }, appearOptions);
  
  faders.forEach(fader => {
    appearOnScroll.observe(fader);
  });
  
  // Modal Gambar (versi fix dengan modal statis dari HTML)
  document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".modal");
    const modalImg = modal?.querySelector("img");
    const closeBtn = modal?.querySelector(".modal-close");
  
    const images = document.querySelectorAll(".card img");
  
    images.forEach(img => {
      img.addEventListener("click", () => {
        if (modal && modalImg) {
          modal.classList.add("show");
          modalImg.src = img.src;
          modalImg.alt = img.alt;
        }
      });
    });
  
    if (closeBtn) {
      closeBtn.addEventListener("click", () => {
        modal.classList.remove("show");
        modalImg.src = "";
      });
    }
  
    if (modal) {
      modal.addEventListener("click", (e) => {
        if (e.target === modal) {
          modal.classList.remove("show");
          modalImg.src = "";
        }
      });
    }
  
    // Typewriter dengan emoji fade-in
    const el = document.getElementById("typewriter");
    const emojiEl = document.querySelector(".emoji");
  
    const words = [
      { text: "Someone who loves cats ", emoji: "🐱" },
      { text: "Coffee enthusiast ", emoji: "☕" },
      { text: "Matcha addict ", emoji: "🍵" },
      { text: "Music explorer ", emoji: "🎧" },
      { text: "Movie marathoner ", emoji: "🎬" }
    ];
  
    let i = 0, j = 0, isDeleting = false;
  
    function type() {
      if (!el || !emojiEl) return;
  
      const current = words[i];
      const fullText = current.text;
  
      let displayText = "";
  
      if (!isDeleting) {
        displayText = fullText.substring(0, j++);
        emojiEl.classList.remove("show");
      } else {
        displayText = fullText.substring(0, j--);
        emojiEl.classList.remove("show");
      }
  
      el.textContent = displayText;
  
      let speed = isDeleting ? 50 : 100;
  
      // Saat selesai mengetik
      if (!isDeleting && j === fullText.length) {
        speed = 1200;
        isDeleting = true;
  
        // Tampilkan emoji
        emojiEl.textContent = current.emoji;
        setTimeout(() => emojiEl.classList.add("show"), 100);
      }
  
      // Saat selesai menghapus
      else if (isDeleting && j === 0) {
        isDeleting = false;
        i = (i + 1) % words.length;
        speed = 500;
      }
  
      setTimeout(type, speed);
    }
  
    if (el) type();
  });
  