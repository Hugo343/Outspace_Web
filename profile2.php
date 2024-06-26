<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outspace</title>
    <link rel="icon" type="image/icon" href="/Logo Outspace - Copy.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    body{
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
          display: flex;
          justify-content: space-evenly;
        }
        
        .profile-card {
          background-color: white;
          border-radius: 10px;
          box-shadow: 0px 4px 10px rgba(19, 18, 18, 0.19);
          padding: 30px;
          width: 300px;
          height: 600px;
          margin-top: 30px;
          margin-bottom: 10px;
}
        


        .profile-card img{
          width: 170px;
          height: 170px;
          border-radius: 50%;
          margin: 20px 70px 20px 30px;
        }

        .profile-buttons {
          margin-top: 20px;
        }
        
        .profile-buttons button {
          display: block;
          width: 100%;
          padding: 5px;
          margin: 10px;
          border: none;
          border-radius: 5px;
          background-color: #023246;
          color: white;
          cursor: pointer;
        }
        
        .profile-buttons button:hover {
          background-color: #287094;
        }
    .profile-info{
        background-color: white;
        width: 410px;
        height: 560px;
        margin-top: 20px;
        margin-bottom: 30px;
        padding: 20px;
    }

.profile-info label {
  display: block;
  margin-bottom: 5px;
  border: none;
}
.profile-info p {
  font-size: 20px;
}
.profile-info input {
  width: 100%;
  height: 44px;
  padding: 10px;
  border: none;
}
.profile-info textarea{
    height: 370px;
    width: 100%;
    padding: 10px;
    border: none;
}
.profile-info .buttons {
          display: flex;
          justify-content: space-between;
          margin-top: 20px;
        }
    .card {
      height: 500px;
        margin-top: 60px;
    }
    .card img{
width: 350px;
height: 500px;
left: 877px;
top: 79px;
    }
    .profile-buttons .log{
      background-color: #ff0000;
      margin-top: 224px;
    }
    .profile-info b {
      font-size: 40px;
    }
</style>
<body>
    <div class="container">
        <div class="profile-card">
            <img src="Nadia - Copy.jpg" class="profile-image">
            <div class="profile-buttons">
              <button>Edit profile</button>
              <button class="log">LOG OUT</button>
            </div>
        </div>
        <div class="profile-info text-black">
            <b>Profile Account</b>
            <p><a class="text-decoration-none text-black" href="index.php">Home</a> > Profile</p>
            <label for="name">Name</label>
            <input class="bg-light" type="text" id="name" placeholder="Name">
            <label for="bio">Bio</label>
            <textarea class="bg-light" id="bio" placeholder="Optional"></textarea>
        </div>
        <div class="card text-bg-light">
            <img src="slide3.jpg" class="card-img" alt="baju">
            <div class="card-img-overlay">
            <p class="card-text text-light">Find your favorite and what suits you here now and get 20% off.</p>
            </div>
        </div>
    </div>
</body>
</html>
