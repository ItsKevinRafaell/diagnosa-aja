<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="css/chat.css">

    <title>Hello, world!</title>
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <main>

        <div class="container">

            <div class="center-text">
                <h2>Diagnosa <span>Aja!</span></h2>
                <!--  <p>Beritahu kami keluhanmu</p>  -->
            </div>

            <div class="chat-box">
                <div class="chat-box-body">
                    <div class="chat-box-overlay">


                    </div>

                    <!--chat-log -->
                    <div class="chat-logs" id="chat-logs">



                    </div>
                </div>
                <div class="chat-input">
                    <textarea autofocus id="chat-input" placeholder="Beritahu gejala Anda"></textarea></textarea>
                    <!-- <input type="text" id="chat-input" placeholder="Send a message..." /> -->
                    <button type="submit" class="chat-submit btn-lg" id="chat-submit"><i
                            class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>

    </main>
    
    <aside>
        <button class="btn btn-book rounded-circle position-fixed" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"
            style="top: 20px; left: 20px; z-index: 999;"><i class="fas fa-book-open"></i></button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Panduan Penggunaan</h5>
                <button type="button" class=" text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fas fa-arrow-left"></i>
                </button>
            </div>
            <div class="offcanvas-body">
                <p>Try scrolling the rest of the page to see this option in action.</p>
            </div>
        </div>
    </aside>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="js/chat.js"></script>
</body>

</html>
<!-- <div class="chat-box">
    <div class="chat-box-header">
        ChatBot
        <span class="chat-box-toggle"><i class="material-icons">close</i></span>
    </div>
    <div class="chat-box-body">
        <div class="chat-box-overlay">
        </div>
        <div class="chat-logs">

        </div> chat-log
</div>
<div class="chat-input">
    <form>
        <input type="text" id="chat-input" placeholder="Send a message..." />
        <button type="submit" class="chat-submit" id="chat-submit"><i class="material-icons">send</i></button>
    </form>
</div>
</div> -->