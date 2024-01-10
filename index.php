<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WHOIS Sorgu | kolan.net.tr</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<!--- www.kolan.net.tr | DDoS ve Botnet Korumalı Hizmet Sağlayıcısı -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <center>
                    <h5 class="card-title"><i class="fa-solid fa-info"></i> WHOIS Sorgusu</h5>
</center>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="domain" class="form-label">Domain Adı:</label>
                            <input type="text" class="form-control" id="domain" name="domain" required>
                        </div>
                        <center>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Sorgula</button>
</center>
                    </form>
<!--- www.kolan.net.tr | DDoS ve Botnet Korumalı Hizmet Sağlayıcısı -->
                    <?php
                if (isset($_POST['domain'])) {
                    $license_key = 'lisans anahtarı'; // IP2WHOIS API lisans anahtarınızı buraya ekleyin.
                    $domain = $_POST['domain'];
                    $api_url = "https://api.ip2whois.com/v2?key={$license_key}&domain={$domain}";

                    $ch = curl_init($api_url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    $response = curl_exec($ch);

                    if (curl_errno($ch)) {
                        echo '<div class="alert alert-danger">Hata: ' . curl_error($ch) . '</div>';
                    } else {
                        $data = json_decode($response, true);

                        if ($data && isset($data['domain'])) {
                            $whois_data = $data;

							echo '<center>';
							echo '<br>';
							echo '<hr>';
							echo '<br>';
                            echo '<i class="fas fa-globe"></i> <font color="black"><strong>Domain Adı:</font><font color="red"></strong> ' . $whois_data['domain'] . '<br></font>';
                            echo '<i class="far fa-calendar-alt"></i> <font color="black"><strong>Kayıt Tarihi:</font><font color="red"></strong> ' . $whois_data['create_date'] . '<br></font>';
                            echo '<i class="fas fa-sync-alt"></i> <font color="black"><strong>Güncelleme Tarihi:</font><font color="red"></strong> ' . $whois_data['update_date'] . '<br></font>';
                            echo '<i class="far fa-calendar-times"></i> <font color="black"><strong>Bitiş Tarihi:</font><font color="red"></strong> ' . $whois_data['expire_date'] . '<br></font>';
                            echo '<i class="fas fa-building"></i> <font color="black"><strong>Registrar:</font><font color="red"></strong> ' . $whois_data['registrar']['name'] . '<br></font>';
                            echo '<i class="fas fa-user"></i> <font color="black"><strong>Admin:</font><font color="red"></strong> ' . $whois_data['admin']['name'] . '<br></font>';

								echo '<br>';
							echo '<hr>';
                        } else {
							echo '<br>';
							echo '<hr>';
							echo '<center>';
							echo '<br>';
                            echo '<font color="red"><div class="alert alert-danger"><i class="fa-solid fa-ban"></i> WHOIS bilgileri bulunamadı. </div></font>';
							echo '<br>';
							echo '<hr>';
							echo '</center>';
                        }
                    }

                    curl_close($ch);
                }
                ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!--- www.kolan.net.tr | DDoS ve Botnet Korumalı Hizmet Sağlayıcısı -->
