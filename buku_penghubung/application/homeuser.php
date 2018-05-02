  <style>
	table{
		border-collapse : collapse;
		margin-top : 350px;
	}
	
	td,th{
		padding : .8em;
	}
	
	table img{
		width  : 200px;
		height : 380px;
	}
	
  </style>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><span>Aplikasi Perpustakaan</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/images/<?php echo $cek_id['username'];?>.jpg"" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $cek_id['nama'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3><?php echo $cek_id['jenis_akses']?></h3>
                <ul class="nav side-menu">
                  <li><a href=""><i class="fa fa-home"></i>Home</a>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>Data Master<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="homeuser/viewdatabuku">Lihat Buku</a>
					  <li><a href="homeuser/viewformrequest">Request Buku</a>
					  </li>
                    </ul>
                  </li>
				  <li>
					
					<li><a><i class="fa fa-table"></i>History<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="homeuser/history">History Peminjaman</a>
                      </li>
					</ul>
				  </li>
					
				  
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
             
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/images/<?php echo $cek_id['username'];?>.jpg"" alt=""><?php echo $cek_id['nama'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="homeuser/editaccount/<?php echo $cek_id['username']; ?>">Edit Account</a></li>
                    <li><a href="homeuser/help"></i>help</a>
					<li><a href="./verifyLogin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>

                  </ul>
                </li>

              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

          <!-- top tiles -->
        
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Aplikasi Pengolahan Data</h3>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
					<img src="<?php echo base_url(); ?>assets/images/logo_telu.png" alt="" style="float:left;">
					<p align="justify">Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak Aplikasi ini buat untuk memudahkan client melakukan pengolahan data pada sebuah perusahaan yang memiliki banyak </p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
					<div style="float:left; margin-left:20pt; margin-right:10pt; width:1px; length:280px; background-color:#F7F7F7;"></div>
					<div style="float:left; margin-left:20pt; margin-right:10pt; width:1px; height:280px; background-color:#F7F7F7;"></div>
                </div>
		  <table align="center">
			<tr>
				<td colspan="2"><h2>Top Book</h2></td>
			</tr>
			<tr>
				<td rowspan="3"><img src="cover/41yVL8YcZwL.jpg"></td>
				<td>Silent Comedy</td>
				<td rowspan="3"><img src="cover/500full.jpg"></td>
				<td>Naruto</td>
				<td rowspan="3"><img src="cover/cover-deskripsi-3-kecil.jpg"></td>
				<td>Deskripsi Analisi APBD 2012</td>
			</tr>
			<tr>
				<td>Comedy</td>
				<td>Adventure</td>
				<td>Science</td>
			</tr>
			<tr>
				<td>Rating 75%</td>
				<td>Rating 80%</td>
				<td>Rating 79%</td>
			</tr>
		  </table>
                <div class="clearfix"></div>
              </div>
            </div>

          </div>	
          <br/>
                <!-- Start to do list -->
                <
                <!-- End to do list -->
                
                <!-- start of weather widget -->

                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        
        <!-- /page content -->
		
