<?php 
    // dd($date);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt</title>
</head>
<body>

    <div class="card " id="receipt" style="width:50%">
        <div class="card-header row">
        </div>

        <div class="card-body">
            <div>
                <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                        <tr>
                            <td valign="top" bgcolor="#dcddde" style="line-height:0px;background-color:#dcddde;border-left:1px solid #dcddde">
                                <h1 alt="" width="100%" border="0" class="CToWUd" data-bit="iit">
                                    <h1 >Receipt For Donation</h1>
                                    <h3 style="float: right;text-align: center; margin-top: -17px;margin-right: 15px;">Date : {{$date}}</h3>
                                </h1>
                            </td>
                        </tr>
    
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td valign="top" align="center">
                                                <table align="center" width="550" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="550" valign="top" align="center">
                                                                <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%!important;text-align:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="left" valign="middle" style="font-family:Arial;font-size:16px;line-height:22px;color:#000;font-weight:normal;text-align:left" class="m_7356313407093408301td">Dear {{$sender}},<br> <br> Your payment Rs.{{$amount}} received by {{$receiver}} on {{$date}}.
                                                                                <span class="im"><br> <br> <br><br><br> 
                                                                                    <table class="table table-striped" style="border-bottom-style: solid;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col col-sm-6" >Description</th>
                                                                                                <th scope="col col-sm-6" style="text-align: center;">Total price</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <th scope="row">Monthly Share for May </th>
                                                                                                <td style="text-align: center;">&#8377; {{$amount}}</td>
                                                                                            </tr>
                                                                                            <tfoot>
                                                                                                <tr>
                                                                                                    <td style="border-bottom:1px solid #cccccc;border-top:1px solid #cccccc;border-left:-1px solid #cccccc;border-right:1px solid #cccccc">
                                                                                                    </td>
                                                                                                    <td style="border-bottom:1px solid #cccccc;border-top:1px solid #cccccc;border-left:-1px solid #cccccc;border-right:1px solid #cccccc">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row" style="text-align: right;">Totals</th>
                                                                                                    <td style="text-align: center;">&#8377; {{$amount}}</td>
                                                                                                </tr>
                                                                                            </tfoot>
                                                                                        </tbody>
                                                                                    </table>

                                                                                    <br><br> Warm Regards,<br> <b>Annai sarathai tuition center By RKMSH 2019 Alumni, </b>
                                                                                    <br>Kaniyambakkam,
                                                                                    <br>Tiruvallur Dt,
                                                                                    <br>Tamilnadu,India.
                                                                                </span>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="25"></td>
                                                                        </tr>
                   
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
    
                            <tr>
                                <td style="border-bottom:1px solid #cccccc;border-top:1px solid #cccccc;border-left:1px solid #cccccc;border-right:1px solid #cccccc">
                                </td>
                            </tr>
 
                        </tbody>
                    </table>
                    <div class="yj6qo">
                        
                    </div>
                    <div class="adL">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>