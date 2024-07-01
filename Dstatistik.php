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
        body {
            font-family: 'Poppins', sans-serif;
          margin: 0;
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
.sidebar-menu button{
    border: none;
    background-color: #023246;
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
        /* main */
        .container {
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 20px;
          margin-left: 170px;
        }
        
        .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          width: 80%;
          height: 100px;
          background-color: #023246;
          box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.25);
          color: white;
          padding: 10px 20px;
          border-radius: 15px;
          margin-top: 50px;
          margin-bottom: 20px;
        }
        
        .header-item {
          display: flex;
          flex-direction: column;
          align-items: center;
          font-size: 16px;
        }
        
        .header-item h2 {
          margin: 0;
          margin-right: 10px;
        }
        
        .header-item .icon {
          font-size: 18px;
        }
        
        .content {
          display: flex;
          justify-content: space-between;
          width: 80%;
          background-color: white;
          box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.25);
          padding: 20px;
          border-radius: 5px;
        }
        
        .card {
          display: flex;
          flex-direction: column;
          width: 45%;
          background-color: #fff;
          padding: 20px;
          border-radius: 15px;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .card-title {
          font-size: 16px;
        }
        
        .card-value {
          font-size: 20px;
          margin-top: -10px;
          font-weight: bold;
        }
        
        .chart {
          width: 100%;
          height: 200px;
          display: flex;
          justify-content: space-between;
          align-items: flex-end;
        }
        
        .chart-bar {
          width: 12%;
          height: 0;
          background-color: #d9d9d9;
          margin: 0 5px 5px 20px;
          border-radius: 5px;
          transition: height 0.3s ease;
        }
        
        .chart-bar.active {
          background-color: #287194;
        }
        
        .chart-label {
          margin: 2px 15px 2px 20px;
          font-size: 12px;
          margin-top: 5px;
        }
        
        .label{
          display: flex;
          margin-bottom: -15px;
        }
        /* end main */
        </style>
        </head>
        <body>
          <!-- sidebar -->
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
                        <a href="Dshop.php"><i class="bi bi-bag-dash-fill"></i> <span>Pesanan</span></a>
                    </li>
                    <li>
                        <a href="Dstatistik.php" class="active"><i class="bi bi-bar-chart-fill active"></i><span>Statistik</span></a>
                    </li>
                    <li>
                      <button  type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#logout" ><a href="#"><i class="bi bi-box-arrow-right p-0"></i><span>Log Out</span></a></button>
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
  

        <!-- main -->
        <div class="container">
          <div class="header">
            <div class="header-item">
              <h6>Total Revenue</h6>
              <h4>Rp 5.720.000.00</h4>
            </div>
            <div class="header-item">
              <h6>Clients</h6>
              <h4>497</h4>
            </div>
            <div class="header-item">
              <h6>Loyalty</h6>
              <h4>68%</h4>
            </div>
          </div>
        
          <div class="content">
            <div class="card">
              <div class="card-title">Income Per Month</div>
              <div class="card-value">Rp 1.355.000.00</div>
              <div class="chart">
                <div class="chart-bar" style="height: 50px;">
                </div>
                <div class="chart-bar" style="height: 100px;">
                </div>
                <div class="chart-bar" style="height: 150px;">
                </div>
                <div class="chart-bar active" style="height: 200px;">
                </div>
                <div class="chart-bar" style="height: 150px;">
                </div>
                <div class="chart-bar" style="height: 180px;">
                </div>
              </div>
              <div class="label">
                <span class="chart-label">Jan</span>
                <span class="chart-label">Feb</span>
                <span class="chart-label">Mar</span>
                <span class="chart-label">Apr</span>
                <span class="chart-label">Mei</span>
                <span class="chart-label">Jun</span>
              </div>
            </div>
            <div class="card">
              <div class="card-title">Spending Per Month</div>
              <div class="card-value">-Rp 640.000.00</div>
              <div class="chart">
                <div class="chart-bar" style="height: 20px;">
                </div>
                <div class="chart-bar" style="height: 50px;">
                </div>
                <div class="chart-bar active" style="height: 100px;">
                </div>
                <div class="chart-bar" style="height: 150px;">
                </div>
                <div class="chart-bar" style="height: 80px;">
                </div>
                <div class="chart-bar" style="height: 100px;">
                </div>
                </div>
                <div class="label">
                  <span class="chart-label active">Jan</span>
                  <span class="chart-label active">Feb</span>
                  <span class="chart-label active">Mar</span>
                  <span class="chart-label active">Apr</span>
                  <span class="chart-label active">Mei</span>
                  <span class="chart-label active">Jun</span>
                </div>
                </div>
          </div>
        </div>
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>