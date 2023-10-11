<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Diagnosa Aja</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body class="container mt-5">
        <section class="...">
            <div class="...">
                <div class="...">
                <div class="...">
                    <div class="...">
                    <div class="...">
                        <div>
                        <p class="...">Laravel Streaming OpenAI</p>
                        <p class="...">
                            Streaming OpenAI Responses in Laravel with Server-Sent Events
                            (SSE).
                            <a class="..." href="...">Read tutorial here</a>
                        </p>
                        <p id="question" class="..."></p>
                        <p id="result" class="..."></p>
                        </div>
                        <form id="form-question" class="...">
                        <input
                            required
                            type="text"
                            name="input"
                            placeholder="Type your question here!"
                            class="..."
                        />
                        <button type="submit" href="#" class="...">
                            Submit
                            <span aria-hidden="true"> → </span>
                        </button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            const form = document.querySelector("form");
            const result = document.getElementById("result");

            form.addEventListener("submit", async (event) => {
                event.preventDefault();
                const input = event.target.input.value;
                if (input === "") return;
                const question = document.getElementById("question");
                question.innerText = input;
                event.target.input.value = "";

                const queryQuestion = encodeURIComponent(input);
                const source = new EventSource("/diagnosa?question=" + queryQuestion);
                
                // Menggunakan Promise untuk menunggu selesainya SSE dan mengeksekusi kode di finally
                const ssePromise = new Promise((resolve) => {
                    source.addEventListener("update", function (event) {
                        if (event.data === "<END_STREAMING_SSE>") {
                            source.close();
                            resolve(); // Selesaikan Promise setelah SSE selesai
                            return;
                        }
                        result.innerText += event.data;
                    });
            });

            try {
                await ssePromise; // Tunggu hingga SSE selesai
            } catch (error) {
                console.error("Error:", error);
            } finally {
                // Setelah SSE selesai, jalankan kode Ajax untuk memanggil storeResponse
                await runStoreResponse(queryQuestion);
                console.log("Kode di finally dijalankan setelah SSE selesai");
            }
            });

            async function runStoreResponse(queryQuestion) {
                try {
                    const response = await fetch('/store-diagnosa?question=' + encodeURIComponent(queryQuestion), {
                        method: 'POST',
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json',
                },
                    });
                    if (response.ok) {
                        console.log("storeResponse selesai");
                    } else {
                        console.error("storeResponse gagal:", response.status);
                    }
                } catch (error) {
                    console.error("Error saat menjalankan storeResponse:", error);
                }
            }
        </script>
    </body>
</html>
