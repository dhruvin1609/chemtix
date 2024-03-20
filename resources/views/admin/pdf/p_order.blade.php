<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
                /*
        1. Use a more-intuitive box-sizing model.
        */
        *, *::before, *::after {
        box-sizing: border-box;
        }
        /*
        2. Remove default margin
        */
        * {
        margin: 0;
        }
        /*
        Typographic tweaks!
        3. Add accessible line-height
        4. Improve text rendering
        */
        body {
        line-height: 1.5;
        -webkit-font-smoothing: antialiased;
        }
        /*
        5. Improve media defaults
        */
        img, picture, video, canvas, svg {
        display: block;
        max-width: 100%;
        }
        /*
        6. Remove built-in form typography styles
        */
        input, button, textarea, select {
        font: inherit;
        }
        /*
        7. Avoid text overflows
        */
        p, h1, h2, h3, h4, h5, h6 {
        overflow-wrap: break-word;
        }
        /*
        8. Create a root stacking context
        */
        #root, #__next {
        isolation: isolate;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 10px;
        }

        .company-details, .invoice-details, .totals, .terms {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #114989;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 12px;
        }

        td {
            font-size: 14px;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
        }

        .terms {
            margin-top: 20px;
            font-size: 14px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .signature {
            width: 150px;
            height: auto;
            margin-top: 20px;
        }

        .footer-text {
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }

        .footer-text a {
            color: #114989;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-details .left,
        .invoice-details .right {
            flex: 1;
        }

        .company-details {
            display: flex;
            justify-content: space-between;
        }

        .company-details .address {
            max-width: 600px;
        }

        .company-details .terms {
            flex: 1;
            text-align: right;
        }

        .company-details .address p {
            margin-bottom: 5px;
        }

        .company-details .terms p {
            margin-top: 5px;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .from{
            font-weight: 700;
            color: #114989;
        }

        .totals-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
        }
        

    </style>
</head>
<body>
    <div class="">
        <div class="header">
            <div class="logo">
                <img class="logo" src="/images/setting/setting_primary_logo_1710574545.png" alt="Company Logo">
            </div>
            <h2 style="color: #114989;">Purchase Order</h2>
        </div>
        <div class="company-details">
            <div class="address">
                <p>Office - U.L.4, Ghanshyam Complex</p>
                <p>Nr. Chandlodiya Over Bridge, Chandlodiya,</p>
                <p>Ahmedabad-382481, Gujarat, India</p>
                <p><strong>Mobile:</strong> : 8866131877 | 8980590560</p>
                <p><strong>Email:</strong> info@chemtix.in</p>
                <p><strong>Website:</strong> www.chemtix.in</p>
            </div>
            <div class="terms">
                <p><strong>Purchase Order No:</strong> PO-014</p>
                <p><strong>Dated:</strong> 30-01-2024</p>
                <p><strong>Terms of Delivery:</strong> Included</p>
                <p><strong>Payment Terms:</strong> Advance</p>
                <p><strong>GST No:</strong> 24AASFC7948K1ZQ</p>
                <p><strong>PAN CARD:</strong> AASFC7948K</p>
            </div>
        </div>
        <hr>
        <div class="invoice-details">
            <div class="left">
                <h3>From:</h3>
                <p class="from">ANUGRAHA CHEMICALS</p>
                <p>No 06, SFS No 208, Opp To Mother Dairy New town <br>
                    Yelahanka, Bengaluru Urban, Karnataka, 560064</p>
                <p class="from">GST NO :</p> 29AABFA7337B1ZR
                <h3>To:</h3>
                <p class="from">CHEMTIX</p>
                <p>Office - U.L.4, Ghanshyam Complex <br>
                    Nr. Chandlodiya Over Bridge, Chandlodiya,<br>
                    Ahmedabad-382481, Gujarat, India</p>
            </div>
            <div class="right">
                <h3>To:</h3>
                <p class="from">CHEMTIX</p>
                <p>Office - U.L.4, Ghanshyam Complex <br>
                    Nr. Chandlodiya Over Bridge, Chandlodiya,<br>
                    Ahmedabad-382481, Gujarat, India</p>
                    <h3>To:</h3>
                <p class="from">CHEMTIX</p>
                <p>Office - U.L.4, Ghanshyam Complex <br>
                    Nr. Chandlodiya Over Bridge, Chandlodiya,<br>
                    Ahmedabad-382481, Gujarat, India</p>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>SI No</th>
                    <th>Description of Goods</th>
                    <th>HSN</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Per</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        Product 1 Description <br>
                        <strong>CAS NO :</strong>61-12-1
                    </td>
                    <td>HSN 1</td>
                    <td>1</td>
                    <td>10</td>
                    <td>Gram</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Product 2 Description<br>
                        <strong>CAS NO :</strong>61-12-1

                    </td>
                    <td>HSN 2</td>
                    <td>2</td>
                    <td>20</td>
                    <td>Gram</td>
                    <td>40</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Product 2 Description<br>
                        <strong>CAS NO :</strong>61-12-1

                    </td>
                    <td>HSN 2</td>
                    <td>2</td>
                    <td>20</td>
                    <td>Gram</td>
                    <td>40</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Product 2 Description<br>
                        <strong>CAS NO :</strong>61-12-1

                    </td>
                    <td>HSN 2</td>
                    <td>2</td>
                    <td>20</td>
                    <td>Gram</td>
                    <td>40</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align: right; font-weight:700;">Freight</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right;font-weight:700;">Insurance</td>
                    <td>450</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right;font-weight:700;">CGST</td>
                    <td>720</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right;font-weight:700;">SGST</td>
                    <td>720</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right;font-weight:700;">Total</td>
                    <td>10,040</td>
                </tr>
            </tfoot>
        </table>
        <div class="terms">
           <p class="from">D.L.NO. 20 B : GJ-AD2-227313 Upto 30/08/2028</p>  
           <p class="from">D.L.NO. 21 B : GJ-AD2-227314 Upto 30/08/2028 </p> 
           <p class="from">MSMS & UDYAM : GJ-01-028002</p> 
        </div>
    </div>
    <div class="footer">
        <img class="signature" src="https://dummyimage.com/150x150/000/fff&text=Signature" alt="Signature">
        <div class="footer-text">
            <p>For any queries, contact us at <a href="mailto:info@abccorp.com">info@abccorp.com</a></p>
            <p>&copy; 2022 ABC Corporation. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
