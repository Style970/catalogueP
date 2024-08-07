<?php
session_start();
$page_title = "Dashboard page";
include "include/header.php";
include('include/topbar.php');
include('include/sidebar.php');
include "../admin/config/dbconn.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <?php
            include('../admin/alert.php');
            ?>
            <h1 class="m-0">Terms & Conditions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Terms & Conditions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    
            <!-- Main content -->
    <section class="content">
          <!-- Terms & Conditions Section -->
    <div class="container content-section">
        <p>Effective Date: [Insert Date]</p>

        <h3>1. Introduction</h3>
        <p>Welcome to ApnaCatalogue. These Terms & Conditions govern your use of our website located at [www.apnacatalogue.com](http://www.apnacatalogue.com) (the "Site"). By accessing this website, you agree to be bound by these Terms & Conditions and our Privacy Policy.</p>

        <h3>2. Intellectual Property Rights</h3>
        <p>Unless otherwise indicated, the Site and its entire contents, features, and functionality (including but not limited to all information, software, text, displays, images, video, and audio, and the design, selection, and arrangement thereof) are owned by ApnaCatalogue, its licensors, or other providers of such material and are protected by international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws.</p>

        <h3>3. User Representations</h3>
        <p>By using the Site, you represent and warrant that:</p>
        <ul>
            <li>All registration information you submit will be true, accurate, current, and complete;</li>
            <li>You will maintain the accuracy of such information and promptly update such registration information as necessary;</li>
            <li>You have the legal capacity and you agree to comply with these Terms & Conditions;</li>
            <li>You are not a minor in the jurisdiction in which you reside;</li>
            <li>You will not access the Site through automated or non-human means, whether through a bot, script, or otherwise;</li>
            <li>You will not use the Site for any illegal or unauthorized purpose;</li>
            <li>Your use of the Site will not violate any applicable law or regulation.</li>
        </ul>

        <h3>4. Prohibited Activities</h3>
        <p>You may not access or use the Site for any purpose other than that for which we make the Site available. The Site may not be used in connection with any commercial endeavors except those that are specifically endorsed or approved by us. As a user of the Site, you agree not to:</p>
        <ul>
            <li>Systematically retrieve data or other content from the Site to create or compile, directly or indirectly, a collection, compilation, database, or directory without written permission from us.</li>
            <li>Make any unauthorized use of the Site, including collecting usernames and/or email addresses of users by electronic or other means for the purpose of sending unsolicited email, or creating user accounts by automated means or under false pretenses.</li>
            <li>Use the Site to advertise or offer to sell goods and services.</li>
            <li>Engage in unauthorized framing of or linking to the Site.</li>
            <li>Trick, defraud, or mislead us and other users, especially in any attempt to learn sensitive account information such as user passwords.</li>
            <li>Engage in any automated use of the system, such as using scripts to send comments or messages, or using any data mining, robots, or similar data gathering and extraction tools.</li>
            <li>Attempt to impersonate another user or person or use the username of another user.</li>
            <li>Sell or otherwise transfer your profile.</li>
            <li>Use any information obtained from the Site in order to harass, abuse, or harm another person.</li>
            <li>Use the Site as part of any effort to compete with us or otherwise use the Site and/or the Content for any revenue-generating endeavor or commercial enterprise.</li>
            <li>Decipher, decompile, disassemble, or reverse engineer any of the software comprising or in any way making up a part of the Site.</li>
        </ul>

        <h3>5. Modifications and Interruptions</h3>
        <p>We reserve the right to change, modify, or remove the contents of the Site at any time or for any reason at our sole discretion without notice. However, we have no obligation to update any information on our Site. We also reserve the right to modify or discontinue all or part of the Site without notice at any time. We will not be liable to you or any third party for any modification, price change, suspension, or discontinuance of the Site.</p>

        <h3>6. Governing Law</h3>
        <p>These Terms shall be governed by and defined following the laws of [Your Country]. ApnaCatalogue and yourself irrevocably consent that the courts of [Your Country] shall have exclusive jurisdiction to resolve any dispute which may arise in connection with these terms.</p>

        <h3>7. Contact Us</h3>
        <p>In order to resolve a complaint regarding the Site or to receive further information regarding use of the Site, please contact us at:</p>
        <address>
            <strong>ApnaCatalogue</strong><br>
            Email: <a href="mailto:support@apnacatalogue.com">support@apnacatalogue.com</a><br>
            Address: [Your Company Address]<br>
            Phone: [Your Contact Number]
        </address>
    </div>
    </section>
    <!-- /.content -->
    
  </div><!--content-wrapper-->
<?php include ("include/footer.php"); ?>