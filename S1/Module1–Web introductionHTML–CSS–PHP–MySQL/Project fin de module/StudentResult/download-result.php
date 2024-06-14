<?php
session_start();

require_once('includes/configpdo.php');
require "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

ob_start();
?>

<html>
<style>
    body {
        padding: 4px;
        text-align: center;
    }

    table {
        width: 100%;
        margin: 10px auto;
        table-layout: auto;
    }

    .fixed {
        table-layout: fixed;
    }

    table,
    td,
    th {
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1px;
        border: solid 1px;
        text-align: center;
    }
</style>

<?php
$totlcount = 0;
$rollid = $_SESSION['rollid'];
$classid = $_SESSION['classid'];

// Display student details
$query = "SELECT tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section FROM tblstudents JOIN tblclasses ON tblclasses.id=tblstudents.ClassId WHERE tblstudents.RollId=? AND tblstudents.ClassId=?";
$stmt21 = $mysqli->prepare($query);
$stmt21->bind_param("ss", $rollid, $classid);
$stmt21->execute();
$res1 = $stmt21->get_result();
$cnt = 1;
while ($result = $res1->fetch_object()) {
    ?>
    <p><b>Nom d'étudiant :</b> <?php echo htmlentities($result->StudentName);?></p>
    <p><b>Id :</b> <?php echo htmlentities($result->RollId);?></p>
    <p><b>Classe d'étudiant :</b> <?php echo htmlentities($result->ClassName);?>(<?php echo htmlentities($result->Section);?>)</p>
    <?php
}

// Display results in a table
?>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Module</th>
            <th>notes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Code for result
        $query = "SELECT t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName FROM (SELECT sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId FROM tblstudents AS sts JOIN tblresult AS tr ON tr.StudentId=sts.StudentId) AS t JOIN tblsubjects ON tblsubjects.id=t.SubjectId WHERE (t.RollId=? AND t.ClassId=?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ss", $rollid, $classid);
        $stmt->execute();
        $res = $stmt->get_result();
        $cnt = 1;
        while ($row = $res->fetch_object()) {
            ?>
            <tr>
                <td><?php echo htmlentities($cnt);?></td>
                <td><?php echo htmlentities($row->SubjectName);?></td>
                <td><?php echo htmlentities($totalmarks = $row->marks);?></td>
            </tr>
            <?php
            $totlcount += $totalmarks;
            $cnt++;
        }
        ?>
        <tr>
            <th scope="row" colspan="2">Note Total</th>
            <td><b><?php echo htmlentities($totlcount); ?></b> / <b><?php echo htmlentities($outof = ($cnt - 1) * 20); ?></b></td>
        </tr>
    </tbody>
</table>
</html>

<?php
$html = ob_get_clean();

$dompdf = new dompdf();
$dompdf->set_option('enable_html5_parser', TRUE);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("result");
?>
