<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Assets</title>
</head>
<body>
    <h2>Import Assets Date (CSV)</h2>
    <form action ="import_export/import_process.php" method="post" enctype="multipart/form-data">
        <label> Select CSV File: </label>
        <input type ="file" name="file" accept=".csv" required>
        <br><br>
        <button type ="submit" name="import" >Import</button>
    </form>
</body>
</html>