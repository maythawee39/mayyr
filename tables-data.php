<?php
include_once("include/db_connect_2.php");
include("include/header.php");
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <!--  <h5 class="card-title">Data Tables</h5> -->
            <?php
            include_once("include/db_connect_2.php");
            $searchErr = '';
            $Tack_details = '';
            if (isset($_POST['save'])) {
              if (!empty($_POST['search'])) {
                $search = $_POST['search'];
                //$conn->setAttribute(PDO::FETCH_ASSOC, true);
                $query = "SELECT CustID,CustName,PartNo,PartName,Line,Packing,DuePeriod
        ,SUM(ORD_01) AS ORD_01,SUM(TAC_01) AS TAC_01
        ,SUM(ORD_02) AS ORD_02,SUM(TAC_02) AS TAC_02
        ,SUM(ORD_03) AS ORD_03,SUM(TAC_03) AS TAC_03
        ,SUM(ORD_04) AS ORD_04,SUM(TAC_04) AS TAC_04
        ,SUM(ORD_05) AS ORD_05,SUM(TAC_05) AS TAC_05
        ,SUM(ORD_06) AS ORD_06,SUM(TAC_06) AS TAC_06
        ,SUM(ORD_07) AS ORD_07,SUM(TAC_07) AS TAC_07
        ,SUM(ORD_08) AS ORD_08,SUM(TAC_08) AS TAC_08
        ,SUM(ORD_09) AS ORD_09,SUM(TAC_09) AS TAC_09
        ,SUM(ORD_10) AS ORD_10,SUM(TAC_10) AS TAC_10
        ,SUM(ORD_11) AS ORD_11,SUM(TAC_11) AS TAC_11
        ,SUM(ORD_12) AS ORD_12,SUM(TAC_12) AS TAC_12
        ,SUM(ORD_13) AS ORD_13,SUM(TAC_13) AS TAC_13
        ,SUM(ORD_14) AS ORD_14,SUM(TAC_14) AS TAC_14
        ,SUM(ORD_15) AS ORD_15,SUM(TAC_15) AS TAC_15
        ,SUM(ORD_16) AS ORD_16,SUM(TAC_16) AS TAC_16
        ,SUM(ORD_17) AS ORD_17,SUM(TAC_17) AS TAC_17
        ,SUM(ORD_18) AS ORD_18,SUM(TAC_18) AS TAC_18
        ,SUM(ORD_19) AS ORD_19,SUM(TAC_19) AS TAC_19
        ,SUM(ORD_20) AS ORD_20,SUM(TAC_20) AS TAC_20
        ,SUM(ORD_21) AS ORD_21,SUM(TAC_21) AS TAC_21
        ,SUM(ORD_22) AS ORD_22,SUM(TAC_22) AS TAC_22
        ,SUM(ORD_23) AS ORD_23,SUM(TAC_23) AS TAC_23
        ,SUM(ORD_24) AS ORD_24,SUM(TAC_24) AS TAC_24
        ,SUM(ORD_25) AS ORD_25,SUM(TAC_25) AS TAC_25
        ,SUM(ORD_26) AS ORD_26,SUM(TAC_26) AS TAC_26
        ,SUM(ORD_27) AS ORD_27,SUM(TAC_27) AS TAC_27
        ,SUM(ORD_28) AS ORD_28,SUM(TAC_28) AS TAC_28
        ,SUM(ORD_29) AS ORD_29,SUM(TAC_29) AS TAC_29
        ,SUM(ORD_30) AS ORD_30,SUM(TAC_30) AS TAC_30
        ,SUM(ORD_31) AS ORD_31,SUM(TAC_31) AS TAC_31
        ,SUM(ORD_01+ORD_02+ORD_03+ORD_04+ORD_05+ORD_06+ORD_07+ORD_08+ORD_09+ORD_10
	  +ORD_11+ORD_12+ORD_13+ORD_14+ORD_15+ORD_16+ORD_17+ORD_18+ORD_19+ORD_20
	  +ORD_21+ORD_22+ORD_23+ORD_24+ORD_25+ORD_26+ORD_27+ORD_28+ORD_29+ORD_30
	  +ORD_31) AS TOTAL_ORD
	  ,SUM(TAC_01+TAC_02+TAC_03+TAC_04+TAC_05+TAC_06+TAC_07+TAC_08+TAC_09+TAC_10
	  +TAC_11+TAC_12+TAC_13+TAC_14+TAC_15+TAC_16+TAC_17+TAC_18+TAC_19+TAC_20
	  +TAC_21+TAC_22+TAC_23+TAC_24+TAC_25+TAC_26+TAC_27+TAC_28+TAC_29+TAC_30
	  +TAC_31) AS TOTAL_TAC
  FROM
  (SELECT CustID,CustName,PartNo,PartName,Line,Packing,DuePeriod
        ,CASE DueDay WHEN '01' THEN OrderQty ELSE 0 End ORD_01
        ,CASE DueDay WHEN '01' THEN Tack_QTY ELSE 0 End TAC_01
        ,CASE DueDay WHEN '02' THEN OrderQty ELSE 0 End ORD_02
        ,CASE DueDay WHEN '02' THEN Tack_QTY ELSE 0 End TAC_02
        ,CASE DueDay WHEN '03' THEN OrderQty ELSE 0 End ORD_03
        ,CASE DueDay WHEN '03' THEN Tack_QTY ELSE 0 End TAC_03
        ,CASE DueDay WHEN '04' THEN OrderQty ELSE 0 End ORD_04
        ,CASE DueDay WHEN '04' THEN Tack_QTY ELSE 0 End TAC_04
        ,CASE DueDay WHEN '05' THEN OrderQty ELSE 0 End ORD_05
        ,CASE DueDay WHEN '05' THEN Tack_QTY ELSE 0 End TAC_05
        ,CASE DueDay WHEN '06' THEN OrderQty ELSE 0 End ORD_06
        ,CASE DueDay WHEN '06' THEN Tack_QTY ELSE 0 End TAC_06
        ,CASE DueDay WHEN '07' THEN OrderQty ELSE 0 End ORD_07
        ,CASE DueDay WHEN '07' THEN Tack_QTY ELSE 0 End TAC_07
        ,CASE DueDay WHEN '08' THEN OrderQty ELSE 0 End ORD_08
        ,CASE DueDay WHEN '08' THEN Tack_QTY ELSE 0 End TAC_08
        ,CASE DueDay WHEN '09' THEN OrderQty ELSE 0 End ORD_09
        ,CASE DueDay WHEN '09' THEN Tack_QTY ELSE 0 End TAC_09
        ,CASE DueDay WHEN '10' THEN OrderQty ELSE 0 End ORD_10
        ,CASE DueDay WHEN '10' THEN Tack_QTY ELSE 0 End TAC_10
        ,CASE DueDay WHEN '11' THEN OrderQty ELSE 0 End ORD_11
        ,CASE DueDay WHEN '11' THEN Tack_QTY ELSE 0 End TAC_11
        ,CASE DueDay WHEN '12' THEN OrderQty ELSE 0 End ORD_12
        ,CASE DueDay WHEN '12' THEN Tack_QTY ELSE 0 End TAC_12
        ,CASE DueDay WHEN '13' THEN OrderQty ELSE 0 End ORD_13
        ,CASE DueDay WHEN '13' THEN Tack_QTY ELSE 0 End TAC_13
        ,CASE DueDay WHEN '14' THEN OrderQty ELSE 0 End ORD_14
        ,CASE DueDay WHEN '14' THEN Tack_QTY ELSE 0 End TAC_14
        ,CASE DueDay WHEN '15' THEN OrderQty ELSE 0 End ORD_15
        ,CASE DueDay WHEN '15' THEN Tack_QTY ELSE 0 End TAC_15
        ,CASE DueDay WHEN '16' THEN OrderQty ELSE 0 End ORD_16
        ,CASE DueDay WHEN '16' THEN Tack_QTY ELSE 0 End TAC_16
        ,CASE DueDay WHEN '17' THEN OrderQty ELSE 0 End ORD_17
        ,CASE DueDay WHEN '17' THEN Tack_QTY ELSE 0 End TAC_17
        ,CASE DueDay WHEN '18' THEN OrderQty ELSE 0 End ORD_18
        ,CASE DueDay WHEN '18' THEN Tack_QTY ELSE 0 End TAC_18
        ,CASE DueDay WHEN '19' THEN OrderQty ELSE 0 End ORD_19
        ,CASE DueDay WHEN '19' THEN Tack_QTY ELSE 0 End TAC_19
        ,CASE DueDay WHEN '20' THEN OrderQty ELSE 0 End ORD_20
        ,CASE DueDay WHEN '20' THEN Tack_QTY ELSE 0 End TAC_20
        ,CASE DueDay WHEN '21' THEN OrderQty ELSE 0 End ORD_21
        ,CASE DueDay WHEN '21' THEN Tack_QTY ELSE 0 End TAC_21
        ,CASE DueDay WHEN '22' THEN OrderQty ELSE 0 End ORD_22
        ,CASE DueDay WHEN '22' THEN Tack_QTY ELSE 0 End TAC_22
        ,CASE DueDay WHEN '23' THEN OrderQty ELSE 0 End ORD_23
        ,CASE DueDay WHEN '23' THEN Tack_QTY ELSE 0 End TAC_23
        ,CASE DueDay WHEN '24' THEN OrderQty ELSE 0 End ORD_24
        ,CASE DueDay WHEN '24' THEN Tack_QTY ELSE 0 End TAC_24
        ,CASE DueDay WHEN '25' THEN OrderQty ELSE 0 End ORD_25
        ,CASE DueDay WHEN '25' THEN Tack_QTY ELSE 0 End TAC_25
        ,CASE DueDay WHEN '26' THEN OrderQty ELSE 0 End ORD_26
        ,CASE DueDay WHEN '26' THEN Tack_QTY ELSE 0 End TAC_26
        ,CASE DueDay WHEN '27' THEN OrderQty ELSE 0 End ORD_27
        ,CASE DueDay WHEN '27' THEN Tack_QTY ELSE 0 End TAC_27
        ,CASE DueDay WHEN '28' THEN OrderQty ELSE 0 End ORD_28
        ,CASE DueDay WHEN '28' THEN Tack_QTY ELSE 0 End TAC_28
        ,CASE DueDay WHEN '29' THEN OrderQty ELSE 0 End ORD_29
        ,CASE DueDay WHEN '29' THEN Tack_QTY ELSE 0 End TAC_29
        ,CASE DueDay WHEN '30' THEN OrderQty ELSE 0 End ORD_30
        ,CASE DueDay WHEN '30' THEN Tack_QTY ELSE 0 End TAC_30
        ,CASE DueDay WHEN '31' THEN OrderQty ELSE 0 End ORD_31
        ,CASE DueDay WHEN '31' THEN Tack_QTY ELSE 0 End TAC_31
  FROM
  (SELECT OB_1.*
        ,CASE WHEN LEN(Packing)>0 THEN CEILING(OrderQty/Packing) ELSE -1 end Tack_QTY
  FROM
  (SELECT OBDWDT AS DueDate,LEFT(OBDWDT,6) AS DuePeriod,RIGHT(OBDWDT,2) AS DueDay,OBCUNO AS CustID
        ,OKCUNM AS CustName,OBITNO AS PartNo,OBITDS AS PartName,OBADID AS Line
        ,CASE WHEN (OBCUNO='103KMT' or OBCUNO = '103KMF') and OBADID = 'RKD' 
              THEN MMDIM2 ELSE MMDIM1 END Packing
        ,CONVERT(INTEGER,SUM(OBORQT)) AS OrderQty
  
  FROM MVXJDTA.OOLINE 
  LEFT JOIN MVXJDTA.OCUSMA ON OBCUNO = OKCUNO 
  LEFT JOIN MVXJDTA.MITMAS ON MMITNO = OBITNO
  
  WHERE OBDWDT like '%$search%' AND OBCUNO IN ('103KMF','103KMT','101THI','102TSM','104SYM')  --AND OBADID = '06217'
  GROUP BY OBDWDT,LEFT(OBDWDT,6),RIGHT(OBDWDT,2),OBCUNO,OKCUNM,OBITNO,OBITDS,OBADID
          ,CASE WHEN (OBCUNO='103KMT' or OBCUNO = '103KMF') and OBADID = 'RKD' 
                THEN MMDIM2 ELSE MMDIM1 END
  )OB_1)PIV)SMY
  GROUP BY CustID,CustName,PartNo,PartName,Line,Packing,DuePeriod
  ORDER BY CustID,CustName,PartNo,PartName,Line";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $Tack_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
              } else {
                $searchErr = "Please enter the information";
              }
            }
            ?>
            <html>

            <head>
              <title>Tack Slip</title>
              <style>
                .container {
                  width: 100%;
                  height: 30%;
                  padding: 20px;
                }

                .table_wrapper {
                  display: block;
                  overflow-x: auto;
                  white-space: nowrap;
                }
              </style>
            </head>

            <body>
              <div class="container">
                <form class="form-horizontal" action="#" method="post">
                  <div class="row">
                    <div class="form-group">
                      <!--<label class="control-label col-sm-4" for="email"><b>Search by DueDate:</b></label> -->
                      <div class="col-sm-4">
                        <div class="form-group">
                          <span class="error" style="color:red;">* <?php echo $searchErr; ?></span>
                        </div>
                        <input type="text" class="form-control" name="search" placeholder="Input Due Period : Ex 202309">
                      </div>
                      </br>
                      <div class="col-sm-2">
                        <button type="submit" name="save" class="btn btn-dark">Search</button>
                      </div>
                    </div>
                  </div>
                </form>
                </br>
                <div class="col">
                  <!--<div class="p-3 border bg-light col-sm-4">Tack Slip Display</div>-->
                </div>
                <script src="assets/js/export2.js"></script>
                <table id="example" class="display nowrap table_wrapper" style="width:100%">
                  <thead class="">
                    <tr><br>
                      <th>Row</th>
                      <th>DuePeriod</th>
                      <th>Line</th>
                      <th>Customer ID</th>
                      <th>Customer Name</th>
                      <th>PartNo</th>
                      <th>PartName</th>
                      <th>Packing</th>
                      <th>ORD_01</th>
                      <th>TAC_01</th>
                      <th>ORD_02</th>
                      <th>TAC_02</th>
                      <th>ORD_03</th>
                      <th>TAC_03</th>
                      <th>ORD_04</th>
                      <th>TAC_04</th>
                      <th>ORD_05</th>
                      <th>TAC_05</th>
                      <th>ORD_06</th>
                      <th>TAC_06</th>
                      <th>ORD_07</th>
                      <th>TAC_07</th>
                      <th>ORD_08</th>
                      <th>TAC_08</th>
                      <th>ORD_09</th>
                      <th>TAC_09</th>
                      <th>ORD_10</th>
                      <th>TAC_10</th>
                      <th>ORD_11</th>
                      <th>TAC_11</th>
                      <th>ORD_12</th>
                      <th>TAC_12</th>
                      <th>ORD_13</th>
                      <th>TAC_13</th>
                      <th>ORD_14</th>
                      <th>TAC_14</th>
                      <th>ORD_15</th>
                      <th>TAC_15</th>
                      <th>ORD_16</th>
                      <th>TAC_16</th>
                      <th>ORD_17</th>
                      <th>TAC_17</th>
                      <th>ORD_18</th>
                      <th>TAC_18</th>
                      <th>ORD_19</th>
                      <th>TAC_19</th>
                      <th>ORD_20</th>
                      <th>TAC_20</th>
                      <th>ORD_21</th>
                      <th>TAC_21</th>
                      <th>ORD_22</th>
                      <th>TAC_22</th>
                      <th>ORD_23</th>
                      <th>TAC_23</th>
                      <th>ORD_24</th>
                      <th>TAC_24</th>
                      <th>ORD_25</th>
                      <th>TAC_25</th>
                      <th>ORD_26</th>
                      <th>TAC_26</th>
                      <th>ORD_27</th>
                      <th>TAC_27</th>
                      <th>ORD_28</th>
                      <th>TAC_28</th>
                      <th>ORD_29</th>
                      <th>TAC_29</th>
                      <th>ORD_30</th>
                      <th>TAC_30</th>
                      <th>ORD_31</th>
                      <th>TAC_31</th>
                      <th>Total ORD</th>
                      <th>Total TAC</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!$Tack_details) {
                      echo '<tr>No data found</tr>';
                    } else {
                      foreach ($Tack_details as $key => $value) {
                    ?>
                        <tr>
                          <td><?php echo $key + 1; ?></td>
                          <td><?php echo $value['DuePeriod']; ?></td>
                          <td><?php echo $value['Line']; ?></td>
                          <td><?php echo $value['CustID']; ?></td>
                          <td><?php echo $value['CustName']; ?></td>
                          <td><?php echo $value['PartNo']; ?></td>
                          <td><?php echo $value['PartName']; ?></td>
                          <td><?php echo $value['Packing']; ?></td>
                          <td><?php echo $value['ORD_01']; ?></td>
                          <td><?php echo $value['TAC_01']; ?></td>
                          <td><?php echo $value['ORD_02']; ?></td>
                          <td><?php echo $value['TAC_02']; ?></td>
                          <td><?php echo $value['ORD_03']; ?></td>
                          <td><?php echo $value['TAC_03']; ?></td>
                          <td><?php echo $value['ORD_04']; ?></td>
                          <td><?php echo $value['TAC_04']; ?></td>
                          <td><?php echo $value['ORD_05']; ?></td>
                          <td><?php echo $value['TAC_05']; ?></td>
                          <td><?php echo $value['ORD_06']; ?></td>
                          <td><?php echo $value['TAC_06']; ?></td>
                          <td><?php echo $value['ORD_07']; ?></td>
                          <td><?php echo $value['TAC_07']; ?></td>
                          <td><?php echo $value['ORD_08']; ?></td>
                          <td><?php echo $value['TAC_08']; ?></td>
                          <td><?php echo $value['ORD_09']; ?></td>
                          <td><?php echo $value['TAC_09']; ?></td>
                          <td><?php echo $value['ORD_10']; ?></td>
                          <td><?php echo $value['TAC_10']; ?></td>
                          <td><?php echo $value['ORD_11']; ?></td>
                          <td><?php echo $value['TAC_11']; ?></td>
                          <td><?php echo $value['ORD_12']; ?></td>
                          <td><?php echo $value['TAC_12']; ?></td>
                          <td><?php echo $value['ORD_13']; ?></td>
                          <td><?php echo $value['TAC_13']; ?></td>
                          <td><?php echo $value['ORD_14']; ?></td>
                          <td><?php echo $value['TAC_14']; ?></td>
                          <td><?php echo $value['ORD_15']; ?></td>
                          <td><?php echo $value['TAC_15']; ?></td>
                          <td><?php echo $value['ORD_16']; ?></td>
                          <td><?php echo $value['TAC_16']; ?></td>
                          <td><?php echo $value['ORD_17']; ?></td>
                          <td><?php echo $value['TAC_17']; ?></td>
                          <td><?php echo $value['ORD_18']; ?></td>
                          <td><?php echo $value['TAC_18']; ?></td>
                          <td><?php echo $value['ORD_19']; ?></td>
                          <td><?php echo $value['TAC_19']; ?></td>
                          <td><?php echo $value['ORD_20']; ?></td>
                          <td><?php echo $value['TAC_20']; ?></td>
                          <td><?php echo $value['ORD_21']; ?></td>
                          <td><?php echo $value['TAC_21']; ?></td>
                          <td><?php echo $value['ORD_22']; ?></td>
                          <td><?php echo $value['TAC_22']; ?></td>
                          <td><?php echo $value['ORD_23']; ?></td>
                          <td><?php echo $value['TAC_23']; ?></td>
                          <td><?php echo $value['ORD_24']; ?></td>
                          <td><?php echo $value['TAC_24']; ?></td>
                          <td><?php echo $value['ORD_25']; ?></td>
                          <td><?php echo $value['TAC_25']; ?></td>
                          <td><?php echo $value['ORD_26']; ?></td>
                          <td><?php echo $value['TAC_26']; ?></td>
                          <td><?php echo $value['ORD_27']; ?></td>
                          <td><?php echo $value['TAC_27']; ?></td>
                          <td><?php echo $value['ORD_28']; ?></td>
                          <td><?php echo $value['TAC_28']; ?></td>
                          <td><?php echo $value['ORD_29']; ?></td>
                          <td><?php echo $value['TAC_29']; ?></td>
                          <td><?php echo $value['ORD_30']; ?></td>
                          <td><?php echo $value['TAC_30']; ?></td>
                          <td><?php echo $value['ORD_31']; ?></td>
                          <td><?php echo $value['TAC_31']; ?></td>
                          <td><?php echo $value['TOTAL_ORD']; ?></td>
                          <td><?php echo $value['TOTAL_TAC']; ?></td>
                        </tr>

                    <?php
                      }
                    }
                    ?>

                  </tbody>
                </table>
              </div>
          </div>
          <?php include("include/footer.php"); ?>
          </body>

          </html>