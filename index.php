<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading Multiple FIles</title>
</head>
<body>
   <h2>Uploading Multiple FIles</h2> 
   <form action="upload.php" method="post" enctype="multipart/form-data">
    Select files to upload:
    <input type="file" name="files[]" multiple> <br> <br>
    <input type="submit" value="uploading files">
   </form>
</body>
</html>