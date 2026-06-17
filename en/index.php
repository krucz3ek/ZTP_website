
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration of Public Transport</title>
    <link rel="shortcut icon" href="/img/ztp_w.webp" type="image/webp">
    <link rel="stylesheet" href="/all/style.css">
    <meta name="robots" content="noindex, nofollow, none, noarchive, nosnippet, noimageindex">
    <script src="/all/js.js"></script>
</head>
<body>
    <noscript>Enable JavaScript. pls 🥺</noscript>
    <header>
        <div class="logo" onclick="location.href='/en'">
            <img src="/img/ztp_w.webp" alt="ZTP_Logo" class="logo_img">
            <p>Administration of Public Transport</p>
        </div>
        <div class="acco">
            <div class="signin">
                <span>Signin</span>
            </div>
            <span class="login"><a href="">Login</a></span>
        </div>
        <div class="menu">
            <span>Annaucments<span>▼</span></span>
            <span>Lists<span>▼</span></span>
            <span>Documents<span>▼</span></span>
            <span>Forms<span class="end">▼</span></span>
        </div>
        <div class="dropdowns">
            <div class="anna" id="anna">
                <p><a href="">General</a></p>
                <p><a href="">New lines</a></p>
                <p><a href="">New stations</a></p>
                <p><a href="">New rolling-stocks</a></p>
                <p class="end"><a href="">Job</a></p>
            </div>
            <div class="list" id="list">
                <p><a href="">General</a></p>
                <p><a href="">Carriers</a></p>
                <p><a href="">Lines</a></p>
                <p><a href="">Stations</a></p>
                <p class="end"><a href="">Rolling-stocks</a></p>
            </div>
            <div class="docs" id="docs">
                <p><a href="">Protocols</a></p>
                <div class="proto">
                    <p><a href="">Lines</a></p>
                    <p><a href="">Stations</a></p>
                    <p><a href="">Rolling-stocks</a></p>
                </div>
                <p><a href="">Standards</a></p>
                <div class="standards">
                    <p><a href="">General</a></p>
                    <p><a href="">Lines</a></p>
                    <p><a href="">Stations</a></p>
                    <p><a href="">Rolling-stocks</a></p>
                </div>
                <p><a href="">Informationals</a></p>
            </div>
            <div class="forms" id="forms">
                <p><a href="">Report error</a></p>
                <p><a href="">Request connection</a></p>
            </div>
        </div>
    </header>
    <main>
        <div class="anna_php">
            <div class="text">Annaucments<hr></div><br>
            <div class="anna_php_echo">
                    <?php
                        // Database connection (adjust credentials as needed)
                        $mysqli = new mysqli("localhost", "root", "", "web_db");

                        // SQL query
                        $sql = "SELECT 
                                    TRIM(SUBSTRING(ag.title, POSITION('EN:' IN ag.title) + 3, POSITION('PL:' IN ag.title) - POSITION('EN:' IN ag.title) - 3)) AS english_title,
                                    TRIM(SUBSTRING(ag.title, POSITION('PL:' IN ag.title) + 3)) AS polish_title,
                                    ag.img, ag.alt_img, ag.`timestamp`, u.name
                                FROM anna_gen ag 
                                INNER JOIN users u ON ag.by_who = u.user_id ORDER BY ag.`timestamp` LIMIT 5";

                        // Execute query
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                $imgData = base64_encode($row["img"]);
                                $imgType = "image/webp";
                                echo "<div class='anna_echo'>";
                                echo "<img src='data:" . $imgType . ";base64," . $imgData . "' alt='$row[alt_img]'>";
                                echo "<span class='title'>". $row["english_title"] . "</span><br>";
                                echo "<span class='time'>" . $row["timestamp"] . "</span><br>";
                                echo "<span class='user'>". $row["name"] . "</span>";
                                echo "</div>";
                                }
                        }

                        $mysqli->close();
                    ?>
            </div>
        </div>
        <div class="other">
            <div class="text">Other<hr></div><br>
            <div class="other_all">
                <div class="other_t" onclick="location.href='/en/lists/carriers'">
                    <img src="/img/ztp_b.webp" alt="">
                    <span>Carriers</span>
                </div>
                <div class="other_t" onclick="location.href='/en/lists/lines'">
                    <img src="/img/line.svg" alt="">
                    <span>Lines</span>
                </div>
                <div class="other_t" onclick="location.href='/en/lists/stations'">
                    <img src="/img/ztp_b.webp" alt="">
                    <span>Stations</span>
                </div>
                <div class="other_t" onclick="location.href='/en/documents/protocols'">
                    <img src="/img/ztp_b.webp" alt="">
                    <span>Protocols</span>
                </div>
                <div class="other_t" onclick="location.href='/en/documents/standards'">
                    <img src="/img/ztp_b.webp" alt="">
                    <span>Standards</span>
                </div>
                <div class="other_t" onclick="location.href='/en/documents/informations'">
                    <img src="/img/ztp_b.webp" alt="">
                    <span>informations</span>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <span><a href="/en/web/about">About</a></span>
        <span><a href="/en/web/contact">Contact</a></span>
        <span><a href="/en/web/cookies">Cookies</a></span>
        <span><a href="/en/web/privacy">Privacy policy</a></span>
        <span><a href="/en/web/legal_notice">Legal notice</a></span>
        <span><a href="/en/web/accessibility">Accessibility</a></span>
        <span class="end" onclick="lang_but()">🌏︎ Language</span>
    </footer>
    <div class="lang" id="lang">
        <p class="text">Languages</p><hr>
        <p><a href="/pl">Polish</a></p>
        <p><a href="/en">English</a></p>
    </div>
</body>
</html>
