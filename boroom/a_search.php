<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="icon" type="image/png" href="./assets/logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>BOROOM</title>
</head>


<body>
<section class="main">
<div class="boxs">
  <div class="header">
  <a href="indexadmin.php" class="back-btn"><img src="./assets/back.png" alt="Back"></a>
    <div class="search-container">
        <select id="search-select">
            <option value=""><img src="./assets/search.png" alt="Search"> Cari Ruangan</option>
            <option value="R301">R301</option>
            <option value="R302">R302</option>
            <option value="R303">R303</option>
        </select>
    </div>
  </div>
<table>
  <tr>
    <th>No</th>
    <th>Ruang</th>
    <th>Keperluan</th>
    <th>Tanggal</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>1</td>
    <td>R301</td>
    <td>Rapat</td>
    <td>2023-01-02</td>
    <td><span class="reserved">Reserved</td></span>
  </tr>
  <tr>
    <td>2</td>
    <td>R302</td>
    <td>Rapat</td>
    <td>2023-01-03</td>
    <td><span class="reserved">Reserved</td></span>
  </tr>
  <tr>
    <td>3</td>
    <td>R303</td>
    <td>Rapat</td>
    <td>2023-01-04</td>
    <td><span class="reserved">Reserved</td></span>
  </tr>
</table>
</div>
</section>
</body>

<!-- AUTO REFRESH SELAMA 6 HARI-->
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 518400000);   //interval berdasarkan millisecond
</script>
</html>