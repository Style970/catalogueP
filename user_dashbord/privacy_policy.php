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
            <h1 class="m-0">Privacy Policy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Privacy Policy</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <!-- Privacy Policy Section -->
    <div class="container content-section">
        <p>Effective Date: [Insert Date]</p>

        <h3>1. Introduction</h3>
        <p>Welcome to ApnaCatalogue. We are committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website, [www.apnacatalogue.com](http://www.apnacatalogue.com). Please read this privacy policy carefully. If you do not agree with the terms of this privacy policy, please do not access the site.</p>

        <h3>2. Information We Collect</h3>
        <p>We may collect information about you in a variety of ways. The information we may collect on the Site includes:</p>
        <ul>
            <li><strong>Personal Data:</strong> Personally identifiable information, such as your name, shipping address, email address, and telephone number, and demographic information, such as your age, gender, hometown, and interests, that you voluntarily give to us when you register with the Site or when you choose to participate in various activities related to the Site, such as online chat and message boards.</li>
            <li><strong>Derivative Data:</strong> Information our servers automatically collect when you access the Site, such as your IP address, your browser type, your operating system, your access times, and the pages you have viewed directly before and after accessing the Site.</li>
            <li><strong>Financial Data:</strong> Financial information, such as data related to your payment method (e.g., valid credit card number, card brand, expiration date) that we may collect when you purchase, order, return, exchange, or request information about our services from the Site.</li>
        </ul>

        <h3>3. Use of Your Information</h3>
        <p>Having accurate information about you permits us to provide you with a smooth, efficient, and customized experience. Specifically, we may use information collected about you via the Site to:</p>
        <ul>
            <li>Create and manage your account.</li>
            <li>Process your transactions and deliver the services you request.</li>
            <li>Email you regarding your account or order.</li>
            <li>Fulfill and manage purchases, orders, payments, and other transactions related to the Site.</li>
            <li>Generate a personal profile about you to make future visits to the Site more personalized.</li>
            <li>Increase the efficiency and operation of the Site.</li>
            <li>Monitor and analyze usage and trends to improve your experience with the Site.</li>
            <li>Perform other business activities as needed.</li>
        </ul>

        <h3>4. Disclosure of Your Information</h3>
        <p>We may share information we have collected about you in certain situations. Your information may be disclosed as follows:</p>
        <ul>
            <li><strong>By Law or to Protect Rights:</strong> If we believe the release of information about you is necessary to respond to legal process, to investigate or remedy potential violations of our policies, or to protect the rights, property, and safety of others, we may share your information as permitted or required by any applicable law, rule, or regulation.</li>
            <li><strong>Third-Party Service Providers:</strong> We may share your information with third parties that perform services for us or on our behalf, including payment processing, data analysis, email delivery, hosting services, customer service, and marketing assistance.</li>
            <li><strong>Business Transfers:</strong> We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.</li>
        </ul>

        <h3>5. Security of Your Information</h3>
        <p>We use administrative, technical, and physical security measures to help protect your personal information. While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse.</p>

        <h3>6. Policy for Children</h3>
        <p>We do not knowingly solicit information from or market to children under the age of 13. If we learn that we have collected personal information from a child under age 13 without verification of parental consent, we will delete that information as quickly as possible.</p>

        <h3>7. Changes to This Privacy Policy</h3>
        <p>We may update this Privacy Policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal, or regulatory reasons. If we make material changes to this policy, we will notify you here, by email, or by means of a notice on our homepage.</p>

        <h3>8. Contact Us</h3>
        <p>If you have questions or comments about this Privacy Policy, please contact us at:</p>
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