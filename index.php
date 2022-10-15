<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HASH &amp; Encoder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                HASH  &amp; Encoder
            </h1>
            <p class="subtitle">
                <div class="columns">
                    <div class="column">
                    </div>
                    <div class="column">
                        <form method="post" action="hash.php" target="proses">
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea" id="from" name="from" onkeyup="counter(this)" placeholder="input"></textarea>
                                    <center><small id="counter">0</small></center>
                                </div>
                                <br>
                                <div class="columns">
                                    <div class="column">
                                    <div class="select">
                                        <select name="tipe">
                                            <optgroup label="hash">
                                                <?php foreach (hash_algos() as $v) { ?>
                                                <option><?=$v?></option>
                                                <?php } ?>
                                                <option>password_hash</option>
                                                <option>crypt</option>
                                            </optgroup>
                                            <optgroup label="encoder">
                                                <option>base64encode</option>
                                                <option>base64decode</option>
                                                <option>base58encode</option>
                                                <option>base58decode</option>
                                                <option>urlencode</option>
                                                <option>urldecode</option>
                                                <option>str2hex</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="column">
                                        <button type="submit" class="button is-link is-fullwidth">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <textarea class="textarea" readonly id="result" placeholder="output" onfocus="this.select()"></textarea>
                        <center><small id="count">0</small></center>
                    </div>
                    <div class="column">
                    </div>
                </div>
            </p>
        </div>
    </section>
    <!-- an ajax using iframe -->
    <iframe name="proses" style="display: none"></iframe>
    <script>
        function counter(input){
            document.getElementById('counter').innerHTML = input.value.length+" characters";
        }
        counter(document.getElementById('from'));
    </script>
</body>
</html>