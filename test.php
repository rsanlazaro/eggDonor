<?php
include 'includes/templates/header.php';
?>
<?php
include "includes/app.php";
$ext_img_1 = "https://res.cloudinary.com/dyn4nexb0/image/upload/v1712164427/test/_1.png";

$conn = connectDB();
?>
<main class="register">
    <div class="register-info">
        <h3>Test para imágenes</h3>
    </div>
    <div class="register-form new-user">
        <div class="form-body">
            <div class="contact-form">
                <h2 class="contact-form-title">Carga de imagen</h1>
                    <form class="form" action="updateTest.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Imagen 1 (relación de imagen recomendada: 1200x1600):</label>
                                <input type="file" onchange="previewFile()" class="form-control img-1-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-1" />
                                <img class="img-1-pre" height="200" alt="Image preview...">
                                <div class="invalid-feedback">
                                    <div>Seleccione una imagen</div>
                                </div>
                                <div class="delete-btn">
                                    <button type="button" id="btn1">Borrar imagen</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-btn">
                            <button class="btn btn-send" type="submit">
                                <div>Actualizar datos</div>
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</main>
<script src="build/js/bundle.min.js"></script>
<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>

<script type="text/javascript">
    function previewFile() {
        var preview = document.querySelector(".img-1-pre");
        var file = document.querySelector(".img-1-input").files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.height = '25rem';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile2() {
        var preview = document.querySelector(".img-2-pre");
        var file = document.querySelector(".img-2-input").files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.height = '25rem';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile3() {
        var preview = document.querySelector(".img-3-pre");
        var file = document.querySelector(".img-3-input").files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.height = '25rem';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile4() {
        var preview = document.querySelector(".img-4-pre");
        var file = document.querySelector(".img-4-input").files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.height = '25rem';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    document.getElementById("btn1").addEventListener("click", function() {
        var jsVar = "<?php echo $ext_img_1; ?>";
        fetch('testDelete.php', {
                method: 'POST', // Use POST method
                headers: {
                    'Content-Type': 'application/json', // Sending JSON data
                },
                body: JSON.stringify(jsVar) // Convert the data to a JSON string
            })
            // .then(response => response.text()) // Get the text response
            // .then(data => {
            //     console.log(data); // Log the response from PHP
            // })
            // .catch(error => console.error('Error:', error)); // Handle errors
    });
</script>
</body>

</html>