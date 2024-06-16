<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Order Form</title>
</head>
<body>
  <div class="container mt-5">
    <h1>Order Registration</h1>
    <form method="POST" action="submit_order.php">
      <div class="mb-3">
        <label for="userName" class="form-label">Search User By Name</label>
        <input type="text" class="form-control" id="userName" name="userName" onkeyup="fetchUsers(this.value)">
        <div id="userSuggestions"></div>
      </div>

      
      <div class="mb-3">
        <label for="orderDetails" class="form-label">Order Details</label>
        <textarea class="form-control" id="orderDetails" name="orderDetails" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Register Order</button>
    </form>
  </div>

  <script>
    function fetchUsers(input) {
      if (input.length === 0) {
        document.getElementById('userSuggestions').innerHTML = '';
        return;
      }
      
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          document.getElementById('userSuggestions').innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "getUsers.php?q=" + input, true);
      xmlhttp.send();
    }
  </script>
</body>
</html>
