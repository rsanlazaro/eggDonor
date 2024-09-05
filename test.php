<?php
session_start();
include "includes/app.php";

$conn = connectDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "FIRST OK";
    if (isset($_FILES['image-1']['name'])) {
        $file = $_FILES['image-1']['name'];
        $path = pathinfo($file);
        $_FILES['image-1']['name'] = "1_1";
        if (($_FILES['image-1']['size']) > 0) {
            $result = $cloudinary->uploadApi()->upload(
                $_FILES['image-1']['tmp_name'],
                [
                    'public_id' => $_FILES['image-1']['name'],
                    'overwrite' => true,
                    'folder' => 'test',
                    'format' => 'png',
                    'invalidate' => true
                ]
            );
            $json  = json_encode($result);
            $array = json_decode($json, true);
            $secureUrl = $array['secure_url'];
            // $query = "UPDATE donants SET ext_img_1='${secureUrl}' WHERE id = ${id}";
            // $result   = mysqli_query($conn, $query);
            echo "THIRD OK";
        }
        echo "SECOND OK";
        // header('Location: test.php?msg=La imagen se subio correctamente');
    }
}
?>
<main class="register">
    <div class="register-info">
        <h3>Editar información de donante</h3>
    </div>
    <div class="register-form new-user">
        <div class="form-body">
            <div class="contact-form">
                <h2 class="contact-form-title">TEST</h1>
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="1">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Imagen 1 (relación de imagen recomendada: 1200x1600):</label>
                                <input type="file" onchange="previewFile()" class="form-control img-1-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-1" />
                                <img class="img-1-pre" src=<?php echo $ext_img_1 ?> height="200" alt="Image preview...">
                                <div class="invalid-feedback">
                                    <div>Seleccione una imagen</div>
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
</script>
</body>

</html>