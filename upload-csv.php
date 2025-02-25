<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV</title>
</head>
<body>
    <h2>Upload CSV File</h2>
    <form action="upload-csv-processing.php" method="post" enctype="multipart/form-data">
        <input type="file" name="csvFile" accept=".csv">
        <input type="submit" value="Upload CSV">
    </form>
</body>
</html>