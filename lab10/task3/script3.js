function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var errorMessage = document.getElementById('error-message');
  
    // Simple validation
    if (username === '' || password === '') {
      errorMessage.textContent = 'Please enter both username and password.';
    } else if (username.length < 4 || username.length > 20) {
      errorMessage.textContent = 'Username must be between 4 and 20 characters.';
    } else if (password.length < 6 || password.length > 20) {
      errorMessage.textContent = 'Password must be between 6 and 20 characters.';
    } else {
      // Simulate successful login
      // In a real-world scenario, you would perform server-side validation
      alert('Login successful!');
      errorMessage.textContent = '';
      document.getElementById('authorizationForm').reset();
    }
  }
  