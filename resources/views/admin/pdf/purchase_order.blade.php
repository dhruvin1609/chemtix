<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <style>
      body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #e6f0fb;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
    </style>
    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container">
       <div class="col-md-12">
          <div class="invoice">
             <!-- begin invoice-company -->
             <div class="invoice-company text-inverse f-w-600">
                <img src="/1.png" alt="">
             </div>
             <!-- end invoice-company -->
             <!-- begin invoice-header -->
             <div class="invoice-header">
                <div class="invoice-from">
                   <strong>From</strong>
                   <address class="m-t-5 m-b-5">
                      <strong class="text-inverse">ANUGRAHA CHEMICALS</strong><br>
                      No 06, SFS No 208,<br>
                      Opp To Mother Diary New town<br>
                      Yelahanka, Bengaluru Urban,<br>
                      Karnataka, 560064<br>
                   </address>
                   <div class="contact-person">
                      <strong class="text-inverse">Person :</strong> Deepika SM <br>
                      <strong class="text-inverse">Mobile :</strong> 9606021767 <br>
                      <strong class="text-inverse">E-Mail :</strong> sales@anugrahachemicals.in <br>
                   </div>
                </div>
                <div class="invoice-to">
                   <strong>To</strong>
                   <address class="m-t-5 m-b-5">
                      <strong class="text-inverse">Chemtix</strong><br>
                      Office - U.L.4, Ghanshyam Complex<br>
                      Nr. Chandlodiya Over Bridge, Chandlodiya, <br>
                      Ahmedabad-382481, Gujarat, India.<br>
                   </address>
                   <div class="contact-person">
                    <strong class="text-inverse">Person :</strong> Vedant Nimavat <br>
                    <strong class="text-inverse">Mobile :</strong> 96060217674 <br>
                    <strong class="text-inverse">E-Mail :</strong> Purchase.chemtix@gmail.com
                    <br>
                 </div>
                </div>
                <div class="invoice-date">
                   <span>Invoice Number :</span>  <strong>PO-014</strong>  <br>
                   <span>Invoice Date :</span>  <strong>30-01-2024</strong>  <br>
                   <span>Terms of Delivery :</span>  <strong>Included</strong>  <br>
                   <span>Payment Terms :</span>  <strong>Advance</strong>  <br>
                   <span>GST No :</span>  <strong>24AASFC7948K1ZQ</strong>  <br>
                   <span>PAN CARD :</span>  <strong>AASFC7948K</strong>  <br>
                </div>
             </div>
             <!-- end invoice-header -->
             <!-- begin invoice-content -->
             <div class="invoice-content">
                <!-- begin table-responsive -->
                <table class="table">
                  <thead>
                    <tr>
                      <th>SI NO.</th>
                      <th>Description of Goods</th>
                      <th>HSN/SAC</th>
                      <th>Quantity</th>
                      <th>Rate</th>
                      <th>Per</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td scope="row">1.</td>
                      <td>
                        <p>Dibucaine hydrochloride </p>
                      </td>
                      <td>8418</td>
                      <td>25</td>
                      <td>43</td>
                      <td>GM</td>
                      <td></td>
                    </tr>
                    
                  </tbody>
                </table>
                <!-- end table-responsive -->
                <!-- begin invoice-price -->
                <div class="invoice-price">
                   <div class="invoice-price-left">
                      <div class="invoice-price-row">
                         <div class="sub-price">
                            <small>SUBTOTAL</small>
                            <span class="text-inverse">$4,500.00</span>
                         </div>
                         <div class="sub-price">
                            <i class="fa fa-plus text-muted"></i>
                         </div>
                         <div class="sub-price">
                            <small>PAYPAL FEE (5.4%)</small>
                            <span class="text-inverse">$108.00</span>
                         </div>
                      </div>
                   </div>
                   <div class="invoice-price-right">
                      <small>TOTAL</small> <span class="f-w-600">$4508.00</span>
                   </div>
                </div>
                <!-- end invoice-price -->
             </div>
             <!-- end invoice-content -->
             <!-- begin invoice-note -->
             <div class="invoice-note">
                * Make all cheques payable to [Your Company Name]<br>
                * Payment is due within 30 days<br>
                * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
             </div>
             <!-- end invoice-note -->
             <!-- begin invoice-footer -->
             <div class="invoice-footer">
                <p class="text-center m-b-5 f-w-600">
                   THANK YOU FOR YOUR BUSINESS
                </p>
                <p class="text-center">
                   <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                   <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                   <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
                </p>
             </div>
             <!-- end invoice-footer -->
          </div>
       </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
