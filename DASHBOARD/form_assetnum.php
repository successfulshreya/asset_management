<?php
$host="localhost"; $user="root"; $password=""; $dbname="assets_db";
$conn = mysqli_connect($host,$user,$password,$dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$company = $Asset = $Assigned = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['company'], $_POST['Asset'], $_POST['Assigned'])) {

    $company  = trim($_POST['company']);
    $Asset    = intval($_POST['Asset']);
    $Assigned = intval($_POST['Assigned']);

    if ($company !== '' && $Asset > 0) {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO dashboard (company, Asset, Assigned) VALUES (?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, 'sii', $company, $Asset, $Assigned);

        if (mysqli_stmt_execute($stmt)) {
            echo "<h3>SUCCESSFULLY ADDED !!</h3>";
        } else {
            echo "Database error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Please enter a company name and a valid asset number.";
    }
}

mysqli_close($conn);
?>

<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="UTF‑8">
  <title>Dashboard Form</title>
</head>
<body>
  <form method="POST" action="">
    <label>Company:
      <input type="text" name="company" required>
    </label><br>

    <label>Total Number of Assets:
      <input type="number" name="Asset" min="1" required>
    </label><br>

    <label>Assigned:
      <input type="number" name="Assigned" min="0">
    </label><br>

    <button type="submit">Submit</button>
  </form>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Base & Variables */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
    :root {
      --primary-color: #5c67f2;
      --bg-color: #f5f7fa;
      --form-bg: #ffffff;
      --text-color: #333;
      --input-border: #ccc;
      --shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }

    body {
      background: var(--bg-color);
      color: var(--text-color);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 1rem;
    }

    .form-container {
      background: var(--form-bg);
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: var(--shadow);
      width: 100%;
      max-width: 400px;
    }

    h1 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .field-group {
      margin-bottom: 1.25rem;
    }

    label {
      display: block;
      font-weight: 500;
      margin-bottom: 0.5rem;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid var(--input-border);
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(92, 103, 242, 0.2);
      outline: none;
    }

    button {
      width: 100%;
      padding: 0.75rem;
      background-color: var(--primary-color);
      color: white;
      font-size: 1.1rem;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #4a54d1;
    }

    @media (max-width: 500px) {
      .form-container {
        padding: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <form class="form-container" method="POST" action="">
    <h1>Asset Dashboard</h1>
    <div class="field-group">
      <label for="company">Company</label>
      <input id="company" name="company" type="text" required>
    </div>
    <div class="field-group">
      <label for="asset-count">Total Number of Assets</label>
      <input id="asset-count" name="Asset" type="number" min="1" required>
    </div>
    <div class="field-group">
      <label for="assigned">Assigned</label>
      <input id="assigned" name="Assigned" type="number" min="0">
    </div>
    <button type="submit">Submit</button>
  </form>
 

</body>
</html>
