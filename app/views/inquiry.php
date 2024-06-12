<?php
require_once ("app/views/partials/header.php");
?>
<table class="table ">
    <thead>
        <tr>
            <th scope="col">Inquiry Id</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inquiries as $inquiry) {
            $inquiry_id = $inquiry['id'];
            $inquiry_sub = $inquiry['subject'];
            $inquiry_msg = $inquiry['message'];
            echo "
            <tr>
                <td>$inquiry_id</td>
                <td>$inquiry_sub</td>
                <td>$inquiry_msg</td>
            </tr>
         ";
        } ?>
    </tbody>
</table>

<?php require_once ("app/views/partials/footer.php"); ?>