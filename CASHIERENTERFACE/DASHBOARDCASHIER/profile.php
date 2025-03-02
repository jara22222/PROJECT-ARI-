<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
        <div class="profile-layout">
        <div class="side-bar ">
            <div class="user-profile">
                <div class="avatar">
                    <img style="height: 80px; width: 80px; border-radius: 50%;" src="https://api.dicebear.com/7.x/avataaars/svg?seed=john" alt="John Doe"/>
                </div>
               
            </div>
             <div class="info text-center">
                    <h3>John Doe</h3>
                    <small class="text-muted">JohnDoe@gmail.com</small>
                    
                </div>
                <div class="edit d-flex justify-content-center">
                    <button class="btn btn-outline-secondary w-75 mt-3">Edit Profile</button>
                </div>
                
                <hr>
                <div class="side-nav">
                    <small class="text-muted px-3">Navigations</small>
                    <ul>
                        <li><button class="nav-item active btn" data-section="personal-information"><span class="icon">👤</span>
                &nbsp;Personal Information</button></li>
                <li><button class="nav-item btn" data-section="account-information"><span class="icon">🎭</span>
                &nbsp;Account Information</button></li>
                        <li><button class="nav-item btn" data-section="performance-dashboard"><span class="icon">📊</span>
                &nbsp;Performance Dashboard</button></li>
                <li><button class="nav-item btn" data-section="security-settings"><span class="icon">🔒</span>
                &nbsp;Security Settings</button></li>
                    </ul>
                </div>
                <hr>
            <div class="side-footer px-4">


             <button class="btn btn-outline-danger form-control">Log out &nbsp;<i class="bi bi-box-arrow-in-left"></i></button>      
                    
            </div>
        
                </div>
        <div class="main-content ">
            <div class="tabs d-flex border rounded p-2 shadow-sm">
                <button class="tab btn form-control border">Profile</button>
                <button class="tab btn form-control border">Security</button>
            </div>

            <div class="contents">
                <div class="personal-information border rounded p-md-2 mt-4 shadow-sm">
                    <div class="personal-info">
                        <h3>Personal Information</h3>
                        <div class="form-group">
                           <form action="">
                            <div class="row">
                                <div class="col-md-4 my-md-4">
                                    <label for="first-name">First Name</label>
                                    <input type="text" class="form-control" id="first-name" placeholder="First Name">
                                </div>
                                <div class="col-md-4 my-md-4">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" placeholder="Last Name">
                                </div>
                                <div class="col-md-4 my-md-4">
                                    <label for="middle-name">Middle Name</label>
                                    <input type="text" class="form-control" id="middle-name" placeholder="Middle Name">
                                </div>
                                <div class="col-md-6 my-md-4">
                                    
                                    <label for="phone-number">Phone Number</label>
                                    <input type="text" class="form-control" id="phone-number" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6 my-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="col-md-6 my-md-4">
                                     <label for="age">Age</label>
                                    <input type="text" class="form-control" id="age" placeholder="Age">
                                </div>

                                <div class="col-md-6 my-md-4">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="form-control" id="gender" placeholder="Gender">
                                </div>
                                <div class="col my-md-3 my-md-4">
                                    <label for="address">Street</label>
                                    <input type="text" class="form-control" id="address" placeholder="Street">
                                </div>
                                <div class="col-md-3 my-md-4">
                                     <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="City">
                                </div>
                                <div class="col-md-3 my-md-4">
                                    <label for="province">Province</label>
                                    <input type="text" class="form-control" id="province" placeholder="Province">
                                </div>
                                <div class="col-md-3 my-md-4">
                                    <label for="postal-code">Postal Code</label>
                                    <input type="text" class="form-control" id="postal-code" placeholder="Postal Code">
                                </div>
                                
                                <div class="col-md-12 my-md-4 d-flex justify-content-center">
                                    <button type="submit" style="width: 16rem;" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
    
</div>
    
</body>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".nav-item, .tab").forEach(item => {
          item.addEventListener("click", function () {
              // Remove "active" from all items
              document.querySelectorAll(".nav-item, .tab").forEach(btn => btn.classList.remove("active"));
             
              // Add "active" to the clicked item
              this.classList.add("active");
          });
      });
  });
</script>

</html>