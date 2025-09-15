     /* ===== Modal Styling ===== */
      .modal {
        display: none;
        position: fixed;
        z-index: 2000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        justify-content: center;
        align-items: center;
      }

      .modal-content {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        width: 350px;
        text-align: center;
        position: relative;
        animation: fadeIn 0.4s ease-in-out;
      }

      @keyframes fadeIn {
        from {opacity: 0; transform: scale(0.9);}
        to {opacity: 1; transform: scale(1);}
      }

      .close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
      }

      .btn {
        background: #541212;
        color: #fff;
        padding: 10px 20px;
        border: none;
        margin-top: 15px;
        cursor: pointer;
        border-radius: 5px;
      }
      .btn:hover {
        background: #7a1c1c;
      }
  </style>

<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content glass">
    <span class="close">&times;</span>

    <!-- Tab Buttons -->
    <div class="tab-buttons">
      <button class="tab-btn active" onclick="switchTab('login')">Login</button>
      <button class="tab-btn" onclick="switchTab('signup')">Sign Up</button>
    </div>

    <!-- Login Form -->
    <form id="loginForm" method="POST" action="auth.php">
      <h2>Welcome Back</h2>
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit" class="btn" name="login">Login</button>
    </form>

    <!-- Signup Form -->
    <form id="signupForm" method="POST" action="auth.php" style="display:none;">
      <h2>Create Account</h2>
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit" class="btn" name="signup">Sign Up</button>
    </form>
  </div>
</div>


  <!-- Script -->
  <script>
    function toggleMenu() {
      document.querySelector(".nav-links").classList.toggle("show");
    }

    // Modal Logic
    const modal = document.getElementById("myModal");
    const modalTitle = document.getElementById("modalTitle");
    const closeBtn = document.querySelector(".close");
    const openButtons = document.querySelectorAll(".openModal");

    openButtons.forEach(btn => {
      btn.addEventListener("click", () => {
        modal.style.display = "flex";
        modalTitle.innerText = btn.getAttribute("data-title");
      });
    });

    closeBtn.onclick = () => {
      modal.style.display = "none";
    };

    window.onclick = (event) => {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    };
  </script>

