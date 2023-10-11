<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Formulir Registrasi</title>
    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="container">
        <header>Formulir Masuk</header>
        <div class="form-outer">
            <form action="#">

                <div class="page slide-page"> 
                    <div class="field">
                        <div class="label">
                            <label for="email">Alamat Email<span class="required">*</span></label>
                        </div>
                        <input name="email" autocomplete="off" id="email" type="email" required>
                        <div id="error-email" style="color: red;"></div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label for="password">Kata Sandi<span class="required">*</span></label> 
                        </div>
                        <input name="password" id="password" type="password" required>
                        <div id="error-password" style="color: red;"></div>
                    </div> 

                    <div class="field">
                        <button class="firstNext next">Masuk</button>
                        
                        <!-- <button class="submit">Daftar</button> -->
                    </div>
                </div>
 

            </form>
        </div>
    </div>


    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="js/login.js"></script>
</body>

</html>