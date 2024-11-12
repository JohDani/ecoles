
<main id="main" class="main">
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="pages/images/maison.jpg" width="100" height="100" class="rounded-circle">
              <h2>Kevin Anderson</h2>
              <p><i>Secretaire</i></p>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs bg-light nav-tabs-bordered">
                <li class="nav-item">
                    <a class="nav-link bg-light active" href="#" data-bs-toggle="tab" data-bs-target="#profile-overview">Aperçu</a>
                  <!-- <button >Overview</button> -->
                </li>
                <li class="nav-item mx-1">
                    <a href="#"class="nav-link bg-light" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier Profile</a>
                  <!-- <button >Edit Profile</button> -->
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link bg-light" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mot de passe</a>
                  <!-- <button>Change Password</button> -->
                </li>
              </ul>
              <div class="tab-content bg-light">
                <div class="tab-pane bg-light text-dark fade show active profile-overview" id="profile-overview">               
                  <h5 class="card-title bg-light text-dark">Profile Details</h5>
                  <div class="row bg-light text-dark">
                    <div class="col-lg-3 col-md-4 label bg-light text-dark ">Full Name</div>
                    <div class="col-lg-9 col-md-8 bg-light text-dark">Kevin Anderson</div>
                  </div>
                  <div class="row bg-light text-dark">
                    <div class="col-lg-3 col-md-4 label bg-light text-dark">Address</div>
                    <div class="col-lg-9 col-md-8 bg-light text-dark">A108 Adam Street, New York, NY 535022</div>
                  </div>
                  <div class="row bg-light text-dark">
                    <div class="col-lg-3 col-md-4 label bg-light text-dark">Phone</div>
                    <div class="col-lg-9 col-md-8 bg-light text-dark">(436) 486-3538 x29071</div>
                  </div>
                  <div class="row bg-light text-dark">
                    <div class="col-lg-3 col-md-4 label bg-light text-dark">Email</div>
                    <div class="col-lg-9 col-md-8 bg-light text-dark">k.anderson@example.com</div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="pages/images/maison.jpg" width="100" height="100">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="" type="text" class="form-control" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Travail</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="" type="text" class="form-control" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="" type="text" class="form-control" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="" type="text" class="form-control" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="" type="text" class="form-control" value="">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>
               
                <div class="tab-pan fade pt-3 bg-dark" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                  </form><!-- End Change Password Form -->
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <script src="nav/bootstrap.bundle.min.js"></script>