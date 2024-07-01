<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outspace</title>
    <link rel="icon" type="image/icon" href="/Logo Outspace - Copy.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- end link  poppins -->
    <link rel="stylesheet" href="style.css">
    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
*{
padding: 0;
margin: 0;
box-sizing: border-box;
list-style-type: none; 
text-decoration: none;
font-family: 'Poppins', sans-serif;
}
/* sidebar */
.sidebar {
background-color: #023246;
width: 259px;
height: 768px;
gap: 0px;
opacity: 0px;
position: fixed;
left: 0;
top: 0;
}
.sidebar-menu{
    color: #fff;
}
.sidebar-brand{
    width: 194px;
    height: 54px;
    padding: 1rem 0rem 1rem 2rem;
    color: #fff;
}
.sidebar-brand span{
    display: inline-block;
    font-weight: 700;
    font-size: 36px;
    line-height: 54px;
    align-items: center;
}
.sidebar-menu ul{
    padding: 0%;
}
.sidebar-menu li{
    margin-bottom: 1.3rem;
    width: 266px;
    margin-left: 0;
    padding-left: 16px;
}
.sidebar-menu a{
    display: block;
    color: #fff;
    font-size: 1rem;
    text-decoration: none;
    cursor: pointer;
}
.sidebar-menu i{
    font-size: x-large;
    color: #fff;
}
.sidebar-menu a.active,i.active{
    background: #fff;
    padding: 5px 0px 5px 0px;
    color: #023246;
    border-radius: 30px 0 0 30px;
}
.sidebar-menu span{
    padding-left: 25px;
}
.main-content{
    margin-left: 323px;
}
.arrow{
    margin-top: 214px;
    padding-left: 100px;
}
.arrow i{
    color: #fff;
    font-size: 50px;
}
/* end sidebar */
/* main content */
.header-title{
    margin-top: 34px;
}
.header-title b{
    font-size: 36px;
    color: #023246;
}

/* table */
.card-bd table{
    width: 950px;
    margin-top: 10px;
}
.card-bd tr{
    border-bottom: 1px solid black;
}
.card-bd td{
    padding: 10px;
}
.card-bd button{
    width: 80px;
    height: 18px;
    font-size: 12px;
    align-items: center;
    border-radius: 5px;
    border: none;
}
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand mt-4">
            <span>OUTSPACE</span>
        </div>
        <div class="sidebar-menu mt-lg-5">
            <ul>
                <li>
                    <a href="Dhome.php"><i class="bi bi-house-door-fill"></i> <span>Beranda</span></a>
                </li>
                <li>
                    <a href="Dshop.php" class="active"><i class="bi bi-bag-dash-fill active"></i> <span>Pesanan</span></a>
                </li>
                <li>
                    <a href="Dstatistik.php"><i class="bi bi-bar-chart-fill"></i><span>Statistik</span></a>
                </li>
                <li>
                    <button  type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#logout" ><a href="#"><i class="bi bi-box-arrow-right p-0"></i><span>Log Out</span></a></button>
                </li>
            </ul>
        </div>
        <div class="arrow">
            <a href="index.php"><i class="bi bi-arrow-left-circle-fill"></i></a>
        </div>
    </div>
    <!-- end sidebar -->
    <!-- modal -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Log Out</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Anda yakin ingin keluar?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ya</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal -->



    <div class="main-content">
        <header>
            <div class="header-title">
                <b>Dashboard</b>
                <p>Hi Admin, Welcome in Dashboard</p>
            </div>
        </header>

        <main>
            <div class="card-bd">
                <table class="shadow">
                    <thead>
                        <tr class="text-center">
                            <td>Pesanan</td>
                            <td>Pembeli</td>
                            <td>Pcs</td>
                            <td>Tanggal</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center border-bottom">
                            <td>#BND-2345-MNOP</td>
                            <td>Rehan</td>
                            <td>1</td>
                            <td>20/5/2024</td>
                            <td>Rp.140.000</td>
                        </tr>
                        <tr class="text-center border-bottom">
                            <td>#SBY-6789-QRST</td>
                            <td>Bima</td>
                            <td>2</td>
                            <td>22/6/2024</td>
                            <td>Rp.280.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>