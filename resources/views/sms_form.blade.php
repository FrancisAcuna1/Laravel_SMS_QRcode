<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/assets/style.css')}}" rel="stylesheet">
    <title>Send Message</title>
</head>
<body>
<div class="container pt-5">
        <div class="row justify-content- mt-3">
            <div id="form-box" class="col-sm-8 border border-radius-3 m-5 mx-auto my-auto">
                <h2 class="text-center pt-4">QR Code Generator</h2>
                <form action="{{url('generate_qr')}}" method="post" autocomplete="off">
                @csrf 
                    <div class="mt-5 px-4">
                        <label for="cpNumber">Enter CP Number<span class="text-danger"> *</span></label>   
                        <input type="text" name="cpnumber" class="form-control p-3 mt-2" id="cpNumber" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" placeholder="xxxxxxxxxxx" required>
                        <small id="cpNumberHelp" class="form-text text-muted">Format: XXXXXXXXXXX</small>
                    </div>
                    <div class="mt-4 px-4">
                        <label for="message">Message<span class="text-danger"> *</span></label>
                        <textarea name="message" id="message" class="form-control mt-2" rows="5" placeholder="Enter your message" required></textarea>
                    </div>
                    <div class="form-group  mx-4 my-4">
                        <input class="btn btn-dark px-3 py-2" type="submit" value="Generate QR">
                    </div>
                </form>
                <div class="px-2 py-3">
                @isset($cp, $message)
                    {!! QrCode::size(300)->generate("http://127.0.0.1:8000/sendMess/cp/$message") !!}
                @endisset
                </div>
              

            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
