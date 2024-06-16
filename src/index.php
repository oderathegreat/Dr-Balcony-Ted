<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1>User Registration</h1>
    <form>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="col">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number (Optional)</label>
        <input type="tel" class="form-control" id="phone" name="phone">
      </div>
      <div class="mb-3">
        <label for="bio" class="form-label">Bio (Optional)</label>
        <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-GJvo0DyAV9u2oLS4NLO5b2mDwPfHQIj1lNIcSKi6xhvqT9JY4JIaMvJdaNB6vtQm" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-tjRVpV4GfNNjv/uRuqs84pNHUm/7TAl1t22NRGrru3GmN7QX5wJw3W/CI8Z1O6wC" crossorigin="anonymous"></script>
</body>
</html>
