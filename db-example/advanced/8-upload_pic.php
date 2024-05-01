<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
  <label for="fileToUpload">Select image to upload:</label>

  <input type="file" id="fileToUpload" name="fileToUpload" />
  <button type="submit">Upload</button>
  <!-- <input type="submit" value="Upload Image" name="submit"> DEPRECATED -->
</form> -->


<?php

if (isset($_FILES['fileToUpload'])) {
  // Get reference to uploaded image
  $image = $_FILES['fileToUpload'];

  // Check if image file is an actual image
  if (!isset($image['error']) && $image['error'] == 0) {
    // Get image file extension
    $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    // Check allowed file types, INSECURE !
    $allowedFileTypes = [
      'jpg',
      'jpeg',
      'png',
      'gif',
    ];

    // use :
    // $imageInfo = getimagesize($image['tmp_name']);
    // if ($imageInfo === false) {
    // echo "Invalid image file";
    // } else {
    // // Check if image type is valid
    // $allowedImageTypes = [
    //     IMAGETYPE_GIF,
    //     IMAGETYPE_JPEG,
    //     IMAGETYPE_PNG,
    // ];

    // if (in_array($imageInfo[2], $allowedImageTypes)) {
    //     // Image type is valid, proceed with upload
    // } else {
    //     echo "Invalid image format";
    // }
    // }

    if (in_array($imageFileType, $allowedFileTypes)) {
      // Check file size
      if ($image['size'] <= 5000000) {
        // Get random filename
        $newFilename = uniqid() . '.' . $imageFileType;

        // Move uploaded image to uploads directory
        $targetPath = 'uploads/' . $newFilename;
        if (move_uploaded_file($image['tmp_name'], $targetPath)) {
          // Upload successful
          echo "Image uploaded successfully";
        } else {
          // Upload failed
          echo "Failed to upload image";
        }
      } else {
        // File size too large
        echo "File size exceeds the maximum limit of 5MB";
      }
    } else {
      // Invalid file type
      echo "Invalid file type. Only JPG, JPEG, PNG, and GIF images are allowed";
    }
  } else {
    // Upload error
    echo "An error occurred during the upload";
  }
}

?>