<?php
$users2 = array(
    array('id' => '1', 'username' => 'ahmed', 'address' => 'muthana', 'phone' => '07740887522', 'oldnumber' => '23769', 'dateoldnumber' => '2024-05-05', 'number' => '23769', 'datenumber' => '0000-00-00', 'newnumber' => '7606080', 'datenewnumber' => '0000-00-00'),
    array('id' => '2', 'username' => 'bashar', 'address' => 'muthana', 'phone' => '07740887522', 'oldnumber' => '1000', 'dateoldnumber' => '0000-00-00', 'number' => '203040', 'datenumber' => '2024-05-05', 'newnumber' => '5000', 'datenewnumber' => '0000-00-00'),
    array('id' => '3', 'username' => 'alaa', 'address' => 'shoqaq', 'phone' => '0771302254648', 'oldnumber' => '1000', 'dateoldnumber' => '0000-00-00', 'number' => '202020', 'datenumber' => '2024-06-05', 'newnumber' => '4000', 'datenewnumber' => '0000-00-00'),
    array('id' => '4', 'username' => 'hasan amar', 'address' => 'alkindy', 'phone' => '077408807707', 'oldnumber' => '1500', 'dateoldnumber' => '0000-00-00', 'number' => '', 'datenumber' => '0000-00-00', 'newnumber' => '3000', 'datenewnumber' => '0000-00-00'),
    array('id' => '5', 'username' => 'raed', 'address' => 'baghdad', 'phone' => '07740887522', 'oldnumber' => '1010', 'dateoldnumber' => '2023-05-05', 'number' => '5050', 'datenumber' => '2024-05-05', 'newnumber' => '10100', 'datenewnumber' => '0000-00-00')
);
$id = isset($_GET['id']) ? $_GET['id'] : null;
$userData = null;
if ($id !== null) {
    foreach ($users2 as $user) {
        if ($user['id'] == $id) {
            $userData = $user;
            break;
        }
    }
    if ($userData) {
        $username = $userData['username'];
        $address = $userData['address'];
        $phone = $userData['phone'];
        $oldnumber = $userData['oldnumber'];
        $newnumber = $userData['newnumber'];
        $consumption = $newnumber - $oldnumber;
        $totalAmount = $consumption * 0.5; // Unit price: 0.5 Dinar
    } else {
        echo "<p>لم يتم العثور على بيانات للمستخدم برقم التسلسل: " . $id . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>فاتورة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <form method="GET" action="">
            <label for="id">Enter User ID:</label>
            <input type="text" id="id" name="id">
            <input type="submit" value="Search">
        </form>
        <?php if ($userData): ?>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h2>فاتورة</h2>
                            </td>
                            <td>
                                تاريخ الفاتورة: <?php echo date("Y-m-d"); ?><br>
                                رقم الفاتورة: <?php echo rand(1000, 9999); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <?php echo $username; ?><br>
                                <?php echo $address; ?><br>
                                <?php echo $phone; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>البند</td>
                <td>القيمة</td>
            </tr>
            <tr class="item">
                <td>استهلاك الكهرباء</td>
                <td><?php echo $consumption; ?> وحدة</td>
            </tr>
            <tr class="details">
                <td>السعر لكل وحدة</td>
                <td>0.5 دينار</td>
            </tr>
            <tr class="details">
                <td>القراءة السابقة</td>
                <td><?php echo $oldnumber; ?> وحدة</td>
            </tr>
            <tr class="details">
                <td>القراءة الحالية</td>
                <td><?php echo $newnumber; ?> وحدة</td>
            </tr>
            <tr class="total">
                <td></td>
                <td>الإجمالي: <?php echo $totalAmount; ?> دينار</td>
            </tr>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>
