 <div class="toggle-nav">
              <div class="icon-reorder tooltips" data-original-title="Contents click here" data-placement="bottom"></div>
          </div>

          <!--logo start-->
          <a href="index-2.html" class="logo">ZAHIRA<span>Primary School</span></a>
          <!--logo end-->

          
          <div class="top-nav notification-row">
              <!-- notificatoin dropdown start-->
              <ul class="nav pull-right top-menu">
        
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <span class="name">LOGIN USER:</span>
                           <span class="username"><span class="size2"><?php echo $_SESSION['login_user']; ?></span></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu  logout animated fadeInUp">
                          <div class="notify-arrow notify-arrow-blue"></div>
                          <li class="eborder-top">
                              <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
                          </li>
                        
                          <li>
                              <a href="logout.php"><i class="icon-lock"></i> Log Out</a>
                          </li>
                        
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
              <!-- notificatoin dropdown end-->
          </div>