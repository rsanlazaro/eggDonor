<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button id="upload_widget" class="cloudinary-button">Upload files</button>

    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>

    <script type="text/javascript">
        var myWidget_1 = cloudinary.createUploadWidget({
            cloudName: 'dyn4nexb0',
            uploadPreset: 'eggdonor',
            prepareUploadParams: (cb, params) => {
                params = {
                    publicId: "RAFA-IMG-TESTSTS",
                };
                cb(params);
            }
        }, (error, result) => {
            if (!error && result && result.event === "success") {
                console.log('Done! Here is the image info: ', result.info);
            }
        })

        document.getElementById("upload_widget").addEventListener("click", function() {
            myWidget_1.open();
        }, false);
    </script>
</body>

</html>