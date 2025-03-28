<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoomShare - Create Account</title>
    <!-- Bootstrap 5 CSS from CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/register.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="register-container mx-auto">
      <div class="card shadow">
        <div class="card-body p-4 p-md-5">
          <div class="text-center">
            <img src="../assets/images/200x60.svg" alt="RoomShare Logo" class="brand-logo">
            <h2 class="mb-4">Create your account</h2>
          </div>
          
          <form>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control form-control-lg" id="firstName" placeholder="Enter your first name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control form-control-lg" id="lastName" placeholder="Enter your last name" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control form-control-lg" id="email" placeholder="name@example.com" required>
              <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            
            <div class="mb-3">
              <label for="phone" class="form-label">Phone number</label>
              <input type="tel" class="form-control form-control-lg" id="phone" placeholder="Enter your phone number">
            </div>
            
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control form-control-lg" id="password" placeholder="Create a password" required>
              <div class="form-text">Must be at least 8 characters with a number and a special character.</div>
            </div>
            
            <div class="mb-4">
              <label for="confirmPassword" class="form-label">Confirm password</label>
              <input type="password" class="form-control form-control-lg" id="confirmPassword" placeholder="Confirm your password" required>
            </div>
            
            <div class="mb-4 form-check">
              <input class="form-check-input" type="checkbox" id="terms" required>
              <label class="form-check-label" for="terms">
                I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
              </label>
            </div>
            
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
            </div>
          </form>
          
          <div class="divider">
            <span>OR</span>
          </div>
          
          <div class="d-grid gap-2">
            <button type="button" class="btn btn-outline-dark btn-lg">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google me-2" viewBox="0 0 16 16">
                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
              </svg>
              Sign up with Google
            </button>
          </div>
          
          <p class="text-center mt-4">
            Already have an account? <a href="login.php" class="text-decoration-none">Log in</a>
          </p>
        </div>
      </div>
      
      <div class="text-center mt-4 text-muted">
        <small>© 2025 RoomShare. All rights reserved.</small>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle with Popper from CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>