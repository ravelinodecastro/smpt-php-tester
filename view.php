<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SMTP Tester</title>
</head>
<body>
    <div class="container mt-5">
        <form action="/" method="post">
            <div class="mb-3">
                <label for="host" class="form-label">Host</label>
                <input type="text" required class="form-control" id="host" name="host" placeholder="smpt.gmail.com" value="<?php echo $_ENV['MAIL_HOST']; ?>">
            </div>
            <div class="mb-3">
                <label for="port" class="form-label">Port</label>
                <input type="number" class="form-control" id="port" name="port" placeholder="587" value="<?php echo $_ENV['MAIL_PORT']; ?>">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="true" id="auth" name="auth" checked>
                <label class="form-check-label" for="auth">
                    Auth
                </label>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" required class="form-control" id="username" name="username" placeholder="betkwanzaao@gmail.com" value="<?php echo $_ENV['MAIL_USERNAME']; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $_ENV['MAIL_PASSWORD']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-check-label" for="encryption">
                    Encryption
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="encryption" id="tls">
                    <label class="form-check-label" for="tls">
                        TLS
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="encryption" id="ssl" checked>
                    <label class="form-check-label" for="ssl">
                        SSL
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="from" class="form-label">From Address</label>
                <input type="email" required class="form-control" id="from" name="from" placeholder="name@example.com" value="<?php echo $_ENV['MAIL_FROM_ADDRESS']; ?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">From Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $_ENV['MAIL_FROM_NAME']; ?>">
            </div>
            <div class="mb-3">
                <label for="to" class="form-label">To Address</label>
                <input type="email" required class="form-control" id="to" name="to" placeholder="name@example.com" >
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" required class="form-control" id="subject" name="subject" placeholder="Test" value="Test SMTP">
            </div>
            <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body" required rows="3" value="Test body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>