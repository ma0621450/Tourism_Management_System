<?php
require_once ("app/views/partials/header.php");
?>
<table class="table ">
    <thead>
        <tr>
            <th scope="col">Inquiry Id</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Response</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inquiries as $inquiry) { ?>

            <tr>
                <td><?php echo $inquiry['id'] ?></td>
                <td><?php echo $inquiry['subject'] ?></td>
                <td> <?php echo $inquiry['message'] ?> </td>
                <?php if (!$inquiry['response']) {
                    echo "<td>No Response</td>";
                } else {
                    echo $inquiry['response'];
                } ?>
            </tr>

        <?php } ?>
    </tbody>
</table>

<?php require_once ("app/views/partials/footer.php") ?>