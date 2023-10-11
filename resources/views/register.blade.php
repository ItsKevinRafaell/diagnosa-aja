<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Formulir Registrasi</title>
    <link rel="stylesheet" href="css/register.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="container">
        <header>Formulir Registrasi</header>
        <div class="progress-bar">
            <div class="step">
                <p>
                    Data
                </p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Usia
                </p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Riwayat
                </p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Daftar
                </p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>
        <div class="form-outer">
            <form action="#">

                <div class="page slide-page">
                    <!-- <div class="title">
                        Basic Info:
                    </div> -->
                    <div class="field">
                        <div class="label">
                            <label for="nama-depan required" required="required">Nama Depan<span class="required">*</span></label>
                        </div>
                        <input name="nama-depan" id="nama-depan" type="text" required> 
                        <div id="error-nama" style="color: red;"></div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label for="email">Alamat Email<span class="required">*</span></label>
                        </div>
                        <input name="email" id="email" type="email" required>
                        <div id="error-email" style="color: red;"></div>
                    </div>
                    <div class="field">
                        <button class="firstNext next">Selanjutnya</button>
                    </div>
                </div>

                <div class="page">
                    <!-- <div class="title">
                        Contact Info:
                    </div> -->
                    <div class="field">
                        <div class="label">
                            <label for="umur">Umur<span class="required">*</span></label>
                        </div>
                        <input name="umur" id="umur" maxlength="3" type="number" min="1" max="200" required>
                        <div id="error-umur" style="color: red;"></div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label for="gender">Jenis Kelamin<span class="required">*</span></label>

                        </div>
                        <select name="gender" id="gender" required>
                            <option value="" disabled selected>Pilih jenis kelamin</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <div id="error-gender" style="color: red;"></div>
                    </div>
                    <div class="field btns">
                        <button class="prev-1 prev">Kembali</button>
                        <button class="next-1 next">Selanjutnya</button>
                    </div>
                </div>

                <div class="page riwayat">
                    
                    <div class="field">
                        <div class="title">
                            Riwayat Penyakit: 
                        </div> 
                    </div> 
                    <!-- div dengan overlay-y, jadi ketika content nya tidak cukup maka bisa di scroll berdasarkan sumbu y -->
                    
                    <div class="field">
                        <div class="overlay-riwayat">
                            <!-- <div class="box-riwayat">
                                <input type="text" class="riwayat" id="riwayat-1"> <div class="trash fas fa-trash"></div>
                            </div>
                            <div class="box-riwayat">
                                <input type="text" class="riwayat" id="riwayat-1"> <div class="trash fas fa-trash"></div>
                            </div>
                            <div class="box-riwayat">
                                <input type="text" class="riwayat" id="riwayat-1"> <div class="trash fas fa-trash"></div>
                            </div>
                            <div class="box-riwayat">
                                <input type="text" class="riwayat" id="riwayat-1"> <div class="trash fas fa-trash"></div>
                            </div>
                            <div class="box-riwayat">
                                <input type="text" class="riwayat" id="riwayat-1"> <div class="trash fas fa-trash"></div>
                            </div>
                            <div class="box-riwayat">
                                <input type="text" class="riwayat" id="riwayat-1"> <div class="trash fas fa-trash"></div>
                            </div>
                            <div class="box-riwayat">
                                <input type="text" class="riwayat" id="riwayat-1"> <div class="trash fas fa-trash"></div>
                            </div>
                            <div class="box-riwayat">
                                <input type="text" class="riwayat" id="riwayat-1"> <div class="trash fas fa-trash"></div>
                            </div> -->
                            <div class="add-input fas fa-plus"><div style="font-family: 'Poppins', sans-serif; font-weight : 300;">Tambah Input</div></div>

                        </div>
                    </div>
                    <div class="field btns">
                        <button class="prev-2 prev" id="reg">Kembali</button>
                        <button class="next-2 next" id="reg">Selanjutnya</button>
                    </div>
                </div>

                <div class="page">
                    <div class="title">
                        Detail Masuk :
                    </div>
                    <!-- <div class="field">
                        <div class="label">
                            <label for="username">Nama Pengguna</label>
                        </div>
                        <input name="username" id="username" type="text">
                        <div id="error-username" style="color: red;"></div>
                    </div> -->
                    <div class="field">
                        <div class="label">
                            <label for="password">Kata Sandi<span class="required">*</span></label>

                        </div>
                        <input name="password" id="password" type="password" required>
                        <div id="error-password" style="color: red;"></div>
                    </div>
                    <div class="field btns">
                        <button class="prev-3 prev">Kembali</button>
                        <button class="submit" >Daftar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="js/register.js"></script>
</body>

</html>