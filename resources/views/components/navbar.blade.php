<!-- jQuery & Toastify CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<style>
  /* Enhanced Spinner Overlay */
  #spinnerOverlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.95);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999999;
    backdrop-filter: blur(3px);
    transition: all 0.3s ease;
  }

  .spinner-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
  }

  .spinner {
    width: 5rem;
    height: 5rem;
    border: 6px solid rgba(102, 108, 255, 0.2);
    border-top-color: #666CFF;
    border-radius: 50%;
    animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    position: relative;
  }

  .spinner::before,
  .spinner::after {
    content: '';
    position: absolute;
    border-radius: 50%;
  }

  .spinner::before {
    width: 100%;
    height: 100%;
    border: 6px solid transparent;
    border-top-color: rgba(102, 108, 255, 0.4);
    animation: spin 1.5s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    top: -6px;
    left: -6px;
  }

  .spinner::after {
    width: 70%;
    height: 70%;
    top: 15%;
    left: 15%;
    border: 4px solid transparent;
    border-top-color: rgba(102, 108, 255, 0.6);
    animation: spinReverse 1s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  }

  .spinner-text {
    color: #666CFF;
    font-weight: 500;
    font-size: 1.2rem;
    text-align: center;
    animation: pulse 1.5s ease-in-out infinite;
  }

  @keyframes spin {
    to {
      transform: rotate(360deg);
    }
  }

  @keyframes spinReverse {
    to {
      transform: rotate(-360deg);
    }
  }

  @keyframes pulse {
    0%, 100% {
      opacity: 0.8;
      transform: scale(0.98);
    }
    50% {
      opacity: 1;
      transform: scale(1.02);
    }
  }

  
</style>

<!-- Enhanced Spinner HTML -->
<div id="spinnerOverlay">
  <div class="spinner-container">
    <div class="spinner"></div>
    <div class="spinner-text">Logging out...</div>
  </div>
</div>

<!-- Navbar (unchanged) -->
<nav class="bg-white shadow-md sticky top-0 z-[999999]">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-4">
      <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12">
    </div>
    <div id="navLinks" class="items-center flex space-x-4">
      <a id="dashboard" href="{{route('dashboard')}}" class="text-[#666CFF] hover:text-black">Dashboard</a>
      <a id="viewPeta" href="{{route('ViewPeta')}}" class="text-[#666CFF] hover:text-black">Maps</a>
      <a id="manageAdmin" href="{{route('manageAdmin')}}" class="text-[#666CFF] hover:text-black hidden">Kelola Admin</a>
      <a id="manageGround" href="{{route('ManageGround')}}" class="text-[#666CFF] hover:text-black hidden">Kelola Ground</a>

      <div class="relative inline-block text-left">
        <img src="{{ asset('images/Avatar.png') }}" alt="Profile" class="profile-avatar cursor-pointer w-10 h-10 rounded-full">
        <div class="dropdown-content absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
          <div class="py-1">
            <a id="user-name" href="#" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-blue-50 hover:bg-blue-200 hover:text-blue-800 rounded-md transition duration-200 ease-in-out">
              <svg class="w-4 h-4 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a6 6 0 016 6 5.989 5.989 0 01-3.6 5.48c-.227.11-.34.366-.25.6l1.94 4.86a1 1 0 01-.92 1.4H5.83a1 1 0 01-.92-1.4l1.94-4.86c.09-.234-.023-.49-.25-.6A5.99 5.99 0 014 8a6 6 0 016-6z" />
              </svg>
            </a>
            <form>
              <button id="logout" type="submit" class="flex items-center gap-2 w-full px-4 py-2 text-sm font-medium text-gray-700 bg-red-50 hover:bg-red-200 hover:text-red-800 rounded-md transition duration-200 ease-in-out">
                <svg class="w-4 h-4 text-red-700" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8.707 15.707a1 1 0 01-1.414 0L2.586 11l4.707-4.707a1 1 0 011.414 1.414L5.414 11l3.293 3.293a1 1 0 010 1.414zm9.414-1.414a1 1 0 01-1.414 0L11 8.414V7h2a3 3 0 000-6H7a3 3 0 000 6h2v1.414l-5.707 5.707a1 1 0 01-1.414-1.414L7 7.586V7a1 1 0 011-1h4a1 1 0 011 1v5.586l5.293 5.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Log Out
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Enhanced Script -->
<script>
    const avatar = document.querySelector('.profile-avatar');
            const dropdown = document.querySelector('.dropdown-content');

            avatar.addEventListener('click', function(event) {
                event.stopPropagation();
                dropdown.classList.toggle('hidden');
            });

            window.addEventListener('click', function(event) {
                if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });

  $(document).ready(function () {
    const token = localStorage.getItem('token');

    function showSpinner(show = true, message = 'Loading...') {
      if (show) {
        $('.spinner-text').text(message);
        $('#spinnerOverlay').css('display', 'flex').hide().fadeIn(200);
      } else {
        $('#spinnerOverlay').fadeOut(200);
      }
    }

    function showToast(message, color = "linear-gradient(to right, #00b09b, #96c93d)") {
      Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: color,
        stopOnFocus: true
      }).showToast();
    }

    if (token) {
      showSpinner(true, 'Loading...');
      $.ajax({
        url: 'http://127.0.0.1:8000/api/user',
        type: 'GET',
        headers: {
          'Authorization': 'Bearer ' + token
        },
        success: function(user) {
          localStorage.setItem('userData', JSON.stringify(user));
          $('#user-name').text(user.name);

          const roles = user.roles || [];
          if (roles.includes('admin')) $('#manageGround').removeClass('hidden');
          if (roles.includes('superAdmin')) {
            $('#manageAdmin').removeClass('hidden');
            $('#manageGround').removeClass('hidden');
          }
          showSpinner(false);
        },
        error: function(xhr) {
          showSpinner(false);
          console.error('Failed to fetch user data:', xhr);
        }
      });
    } else {
      console.warn('Token not found.');
    }

    $(document).on('click', '#logout', function (e) {
      e.preventDefault();
      showSpinner(true, 'Logging out...');

      // Add slight delay to ensure spinner is visible
      setTimeout(() => {
        $.ajax({
          url: 'http://127.0.0.1:8000/api/logout',
          type: 'POST',
          headers: {
            'Authorization': 'Bearer ' + token
          },
          success: function(response) {
            showToast("Logout successful", "linear-gradient(to right, #00b09b, #96c93d)");
            localStorage.removeItem('token');
            localStorage.removeItem('userData');
            
            // Add delay before redirect to show spinner animation
            setTimeout(() => {
              window.location.href = "/login";
            }, 800);
          },
          error: function(xhr) {
            showSpinner(false);
            let errorMessage = "Logout failed";
            if (xhr.responseJSON && xhr.responseJSON.message) {
              errorMessage = xhr.responseJSON.message;
            }
            showToast(errorMessage, "linear-gradient(to right, #ff5f6d, #ffc371)");
          }
        });
      }, 300);
    });

    $('#navLinks a').on('click', function () {
      showSpinner(true, 'Loading page...');
    });
  });

  
</script>