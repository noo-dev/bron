<!DOCTYPE html>
<html>
<head>
    <title>Bilet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: 'DejaVu Sans';
        }
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        page[size="A4"] {  
            width: 21cm;
            height: 29.7cm; 
            padding: .5in .5in .5in .5in; 
        }

        table a:link {
            color: #666;
            font-weight: bold;
            text-decoration:none;
        }
        table a:visited {
            color: #999999;
            font-weight:bold;
            text-decoration:none;
        }
        table a:active,
        table a:hover {
            color: #bd5a35;
            text-decoration:underline;
        }
        table {
            color:#666;
            font-size:12px;
            text-shadow: 1px 1px 0px #fff;
            background:#eaebec;
            margin:20px;
            border:#ccc 1px solid;
            border-radius:3px;
            width: 80%;
            box-shadow: 0 1px 2px #d1d1d1;
        }
        table th {
            padding:21px 25px 22px 25px;
            border-top:1px solid #fafafa;
            border-bottom:1px solid #e0e0e0;

            background: #ededed;
            background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
            background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
        }
        table th:first-child {
            text-align: left;
            padding-left:20px;
        }
        table tr:first-child th:first-child {
            -moz-border-radius-topleft:3px;
            -webkit-border-top-left-radius:3px;
            border-top-left-radius:3px;
        }
        table tr:first-child th:last-child {
            -moz-border-radius-topright:3px;
            -webkit-border-top-right-radius:3px;
            border-top-right-radius:3px;
        }
        table tr {
            text-align: center;
            padding-left:20px;
        }
        table td:first-child {
            text-align: left;
            padding-left:20px;
            border-left: 0;
        }
        table td {
            padding:18px;
            border-top: 1px solid #ffffff;
            border-bottom:1px solid #e0e0e0;
            border-left: 1px solid #e0e0e0;

            background: #fafafa;
            background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
            background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
        }
        table tr.even td {
            background: #f6f6f6;
            background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
            background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
        }
        table tr:last-child td {
            border-bottom:0;
        }
        table tr:last-child td:first-child {
            -moz-border-radius-bottomleft:3px;
            -webkit-border-bottom-left-radius:3px;
            border-bottom-left-radius:3px;
        }


    </style>
</head>
<body>

        <h1>Siziň onlaýn bilediňiz</h1>
    

        <!-- Booking details -->
        <table cellspacing='0'> <!-- cellspacing='0' is important, must stay -->
            <!-- Table Header -->
            <thead>
                <tr>
                    <th>Başlanýan wagty</th>
                    <th>Tamamlanýan wagty</th>
                    <th>Otag görnüşi</th>
                    <th>Uly adam</th>
                    <th>Çagalar</th>
                </tr>
            </thead>
            <!-- Table Header -->

            <!-- Table Body -->
            <tbody>

                <tr>
                    <td>13 Maý, 2023</td>
                    <td>26 Maý, 2023</td>
                    <td>Lýuks</td>
                    <td>2</td>
                    <td>-</td>
                </tr><!-- Table Row -->

                {{-- <tr class="even">
                    <td>Take the dog for a walk</td>
                    <td>100%</td>
                    <td>Yes</td>
                </tr><!-- Darker Table Row --> --}}


            </tbody>
            <!-- Table Body -->

        </table>
        <!-- Customer Details -->
        <table cellspacing='0'> <!-- cellspacing='0' is important, must stay -->
            <!-- Table Header -->
            <thead>
                <tr>
                    <th colspan="2">Müşderi maglumatlary</th>
                </tr>
            </thead>
            <!-- Table Header -->

            <!-- Table Body -->
            <tbody>

                <tr>
                    <td>Famiiýasy, ady</td>
                    <td>John Doe</td>
                </tr><!-- Table Row -->
                <tr>
                    <td>Telefon belgisi</td>
                    <td>+993 6X XXXXXX</td>
                </tr><!-- Table Row -->
                <tr>
                    <td>Pasport belgisi</td>
                    <td>I-XX XXXXXX</td>
                </tr><!-- Table Row -->

                {{-- <tr class="even">
                    <td>Take the dog for a walk</td>
                    <td>100%</td>
                    <td>Yes</td>
                </tr><!-- Darker Table Row --> --}}


            </tbody>
            <!-- Table Body -->

        </table>
        <!-- Payment Details -->
        <table cellspacing='0'> <!-- cellspacing='0' is important, must stay -->
            <!-- Table Header -->
            <thead>
                <tr>
                    <th colspan="2">Töleg maglumatlary</th>
                </tr>
            </thead>
            <!-- Table Header -->

            <!-- Table Body -->
            <tbody>

                <tr>
                    <td>Gün sany</td>
                    <td>6</td>
                </tr><!-- Table Row -->
                <tr>
                    <td>Otagyň bir günki bahasy</td>
                    <td>200 manat</td>
                </tr><!-- Table Row -->
                <tr style="font-weight: bold">
                    <td>JEMI TÖLEG</td>
                    <td>1200</td>
                </tr><!-- Table Row -->


            </tbody>
            <!-- Table Body -->

        </table>

        <br>


        <h4>Dykgatyňyza ýetirýäris</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi incidunt saepe quaerat nisi facilis magnam, esse harum commodi voluptatibus itaque,
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, distinctio.
        </p>

    
</body>
</html>